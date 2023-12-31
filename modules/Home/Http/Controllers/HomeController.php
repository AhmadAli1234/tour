<?php

namespace Modules\Home\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Quiz\Entities\Advertisement;
use Modules\Quiz\Entities\Interest;
use Modules\Quiz\Entities\Quiz;
use Modules\Quiz\Entities\QuizAttemp;
use Modules\Quiz\Entities\QuizHistory;
use Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        
        return view('home::index');
    }

    public function audioguide(){
        return view('home::audioguide');
    }
    public function quiz(){
        $user_id = Auth::user()->id;
        $attemps = QuizAttemp::where('user_id',$user_id)->count() + 1;
        $geo_quiz_ids = []; 
        if($attemps < 4){

            //geolocation quiz
            if(Session::has('latitude') && Session::has('longitude')){

            
            $latitude = Session::get('latitude');
            $longitude = Session::get('longitude');
            $radius = 10; // You can adjust this radius as needed
            // dd($latitude.'//'.$longitude);

            $geo_quiz_ids = Quiz::select('*')
                ->selectRaw(
                    '(3959 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance',
                    [$latitude, $longitude, $latitude]
                )
                ->having('distance', '<', $radius)
                ->orderBy('distance')
                ->pluck('id');
            }

            $attemped_quiz_ids = QuizAttemp::where('user_id',$user_id)->get()->pluck('quiz_id');
            $prefrences = Auth::user()->prefrences;
            $prefrences = explode(',',$prefrences);
            $quiz = Quiz::query();
            if($prefrences){
                $quiz->whereIn('interest_id',$prefrences);
            }
            if($geo_quiz_ids){
                $quiz->whereIn('id',$geo_quiz_ids);
            }
            $result = $quiz->inRandomOrder()->first();
            if($result !=''){
                $question = $result;
            }
            else{
                $question = Quiz::inRandomOrder()->first();
            }
            return view('home::quiz',compact('question','attemps'));
        }
        else{
            $result_count = QuizAttemp::where('user_id',$user_id)->where('result',true)->count();
            $store_quiz = new QuizHistory();
            $store_quiz->user_id = $user_id;
            $store_quiz->status = $result_count==3 ? true: false;
            $store_quiz->date = date('Y-m-d');
            $store_quiz->save();
            if($store_quiz){
                return redirect('/quiz/ads-result');
            }
        }
    }

    public function ticket(){
        return view('home::ticket');
    }

    public function profileDetail(){
        $interests = Interest::with('childs')->whereNull('parent_id')->get();
        return view('home::profile-detail',compact('interests'));
    }

    public function profileDetailStore(Request $request){
        $user_id = Auth::user()->id;
        $update = User::find($user_id);
        $update->gender = $request->gender;
        $update->profession = $request->profession;
        $update->income = $request->income;
        $update->add_before = $request->add_before;
        $update->prefrences = $request->interest;
        $update->add_not_show = $request->add_not_show;
        $update->save();
        if($update){
            return redirect('/quiz');
        }
        else{
            return redirect()->back();
        }
    }

    public function storeQuiz(Request $request){
        $user_id = Auth::user()->id;

        $check_attemp = QuizAttemp::where('user_id',$user_id)->count();
        $prefrences = Auth::user()->prefrences;
        $prefrences = explode(',',$prefrences);
        $adds = Advertisement::query();
        if($prefrences){
            $adds->whereIn('interest_id',$prefrences);
        }
        $result = $adds->inRandomOrder()->limit(3)->pluck('id');
        if($result !=''){
            $advertisements = $result;
        }
        else{
            $advertisements = Advertisement::inRandomOrder()->limit(3)->pluck('id');
        }
        if($check_attemp < 3){
            $check_result = Quiz::where('id',$request->quiz_id)->where('answer',$request->answer)->first();
            $store = new QuizAttemp();
            $store->user_id = $user_id;
            $store->quiz_id = $request->quiz_id;
            $store->advertisement_ids = $advertisements; 
            $store->answer = $request->answer;
            $store->result =  $check_result ? true : false;
            $store->save();
            if($store){
                return redirect('/quiz/ads')->with(['ads'=>$advertisements]);
            }
        }
        else{
          
                return redirect('/quiz/ads-result');
        }
    }
    
    public function tryMore(){
        $user_id = Auth::user()->id;
        QuizAttemp::where('user_id',$user_id)->delete();
        return redirect('/quiz');
    }

    public function ads(){
        $user_id = Auth::user()->id;
        $quiz = QuizAttemp::where('user_id',$user_id)->orderBy('id','desc')->first();
        $ad_ids = json_decode($quiz->advertisement_ids);
        $ads = Advertisement::whereIn('id',$ad_ids)->get();
        return view('home::ads',compact('ads'));
    }

    public function adsResult(){
        $user_id = Auth::user()->id;
        $quiz = QuizAttemp::where('user_id',$user_id)->count();
        if($quiz >= 3){
            $result_count = QuizAttemp::where('user_id',$user_id)->where('result',true)->count();
            if($result_count <3){
                $message = 'You Loose the Quiz';
                $status = 'fail';
            }
            else{
                $message = 'You Win the Quiz';
                $status = 'pass';
            }
            QuizAttemp::where('user_id',$user_id)->delete();
            return view('home::ads-result',compact('message','status','result_count'));
        }
        else{
            return redirect('/quiz');
        }
    }
}
