<?php

namespace Modules\Quiz\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\AdminController;
use Modules\Quiz\Entities\Interest;
use Modules\Quiz\Entities\Advertisement;

class AdvertisementController  extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/advertisement');
        parent::__construct();
    }

    public function index()
    {
        $dataAdvertisement = Advertisement::query()->orderBy('id', 'desc');

        $data = [
            'rows'        => $dataAdvertisement->with("interest")->paginate(20),
            'breadcrumbs' => [
                [
                    'name' => 'Advertisement',
                    'url'  => 'admin/module/advertisement'
                ],
                [
                    'name'  => 'All',
                    'class' => 'active'
                ],
            ],
            'page_title'=> "Advertisement Management"
        ];
        return view('quiz::admin.advertisement.index', $data);
    }

    public function create(Request $request)
    {
        $row = new Advertisement();
        $data = [
            'interests'        => Interest::get(),
            'row'         => $row,
            'breadcrumbs' => [
                [
                    'name' => 'Advertisement',
                    'url'  => 'admin/module/advertisement'
                ],
                [
                    'name'  => 'Add Advertisement',
                    'class' => 'active'
                ],
            ],
        ];
        return view('quiz::admin.advertisement.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $row = Advertisement::find($id);
        if (empty($row)) {
            return redirect('admin/module/advertisement');
        }

        $data = [
            'row'  => $row,
            'interests' => Interest::get(),
        ];
        return view('quiz::admin.advertisement.detail', $data);
    }
    public function delete(Request $request, $id)
    {
        $row = Advertisement::find($id);
        if (empty($row)) {
            return redirect('admin/module/advertisement');
        }

       $delete = $row->delete();
       if($delete){
        return back()->with('error', 'Advertisement Deleted' );
       }
    }

    public function store(Request $request, $id){
        if($id>0){
            $row = Advertisement::find($id);
            if (empty($row)) {
                return redirect(route('advertisement.admin.index'));
            }
        }else{
            $row = new Advertisement();
        }
        $row->fill($request->input());
        
    
        if ($request->file('video')) {
            $request->validate([
                'video' => 'max:20480', // Adjust validation rules and size as needed (max size is in kilobytes)
            ]);
            $video = $request->file('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('advertisement'), $videoName);
    
            // You can save the video's path in the database or use it as needed.
            $videoPath = 'advertisement/' . $videoName;
            $row->video = $videoPath;
        }

        $res = $row->save();

        if ($res) {
            if($id > 0 ){
                return redirect(route('advertisement.admin.index'))->with('success', 'Advertisement updated' );
            }else{
                return redirect(route('advertisement.admin.index'))->with('success', 'Advertisement created' );
            }
        }
    }
}
