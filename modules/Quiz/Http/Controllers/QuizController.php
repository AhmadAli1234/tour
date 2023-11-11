<?php

namespace Modules\Quiz\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\AdminController;
use Modules\Quiz\Entities\Interest;
use Modules\Quiz\Entities\Quiz;
use Modules\Quiz\Entities\QuizHistory;

class QuizController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/quiz');
        parent::__construct();
    }

    public function index()
    {
        $dataQuiz = Quiz::query()->orderBy('id', 'desc');

        $data = [
            'rows'        => $dataQuiz->with("interest")->paginate(20),
            'breadcrumbs' => [
                [
                    'name' => 'Quiz',
                    'url'  => 'admin/module/quiz'
                ],
                [
                    'name'  => 'All',
                    'class' => 'active'
                ],
            ],
            'page_title'=> "Quiz Management"
        ];
        return view('quiz::admin.quiz.index', $data);
    }

    public function create(Request $request)
    {
        $row = new Quiz();
        $data = [
            'interests'        => Interest::get(),
            'row'         => $row,
            'breadcrumbs' => [
                [
                    'name' => 'Quiz',
                    'url'  => 'admin/module/quiz'
                ],
                [
                    'name'  => 'Add Quiz',
                    'class' => 'active'
                ],
            ],
        ];
        return view('quiz::admin.quiz.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $row = Quiz::find($id);
        if (empty($row)) {
            return redirect('admin/module/quiz');
        }

        $data = [
            'row'  => $row,
            'interests' => Interest::get(),
        ];
        return view('quiz::admin.quiz.detail', $data);
    }
    public function delete(Request $request, $id)
    {
        $row = Quiz::find($id);
        if (empty($row)) {
            return redirect('admin/module/quiz');
        }

       $delete = $row->delete();
       if($delete){
        return back()->with('error', 'Quiz Deleted' );
       }
    }

    public function store(Request $request, $id){
        if($id>0){
            $row = Quiz::find($id);
            if (empty($row)) {
                return redirect(route('quiz.admin.index'));
            }
        }else{
            $row = new Quiz();
        }

        $row->fill($request->input());
        $res = $row->save();

        if ($res) {
            if($id > 0 ){
                return redirect(route('quiz.admin.index'))->with('success', 'Quiz updated' );
            }else{
                return redirect(route('quiz.admin.index'))->with('success', 'Quiz created' );
            }
        }
    }

    public function report()
    {
        $quizes  = QuizHistory::with('user:id,name,first_name,last_name,referred_by')->groupBy('date')->orderBy('date','desc')->select('id','user_id','date', DB::raw('count(*) as total'), DB::raw('sum(status = 1) as win'))->get();
        $data = [
            'rows'        => $quizes,
            'breadcrumbs' => [
                [
                    'name' => 'Quiz',
                    'url'  => 'admin/module/quiz'
                ],
                [
                    'name'  => 'Report',
                    'class' => 'active'
                ],
            ],
            'page_title'=> "Quiz Report"
        ];
        return view('quiz::admin.quiz.report', $data);
    }
}
