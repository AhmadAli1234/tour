<?php

namespace Modules\Quiz\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\AdminController;
use Modules\Quiz\Entities\Interest;

class InterestController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu('admin/module/interest');
        parent::__construct();
    }

    public function index()
    {
        $dataInterest = Interest::query()->orderBy('name', 'asc');

        $data = [
            'rows'        => $dataInterest->with("parent")->paginate(20),
            'breadcrumbs' => [
                [
                    'name' => 'Interest',
                    'url'  => 'admin/module/interest'
                ],
                [
                    'name'  => 'All',
                    'class' => 'active'
                ],
            ],
            'page_title'=> "Interest Management"
        ];
        return view('quiz::admin.interest.index', $data);
    }

    public function create(Request $request)
    {
        $row = new Interest();
        $data = [
            'interests'        => Interest::whereNull('parent_id')->get(),
            'row'         => $row,
            'breadcrumbs' => [
                [
                    'name' => 'Interest',
                    'url'  => 'admin/module/interest'
                ],
                [
                    'name'  => 'Add Interest',
                    'class' => 'active'
                ],
            ],
        ];
        return view('quiz::admin.interest.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $row = Interest::find($id);
        if (empty($row)) {
            return redirect('admin/module/interest');
        }

        $data = [
            'row'  => $row,
            'interests' => Interest::get(),
        ];
        return view('quiz::admin.interest.detail', $data);
    }
    public function delete(Request $request, $id)
    {
        $row = Interest::find($id);
        if (empty($row)) {
            return redirect('admin/module/interest');
        }

       $delete = $row->delete();
       if($delete){
        return back()->with('error', 'Interest Deleted' );
       }
    }

    public function store(Request $request, $id){
        if($id>0){
            $row = Interest::find($id);
            if (empty($row)) {
                return redirect(route('interest.admin.index'));
            }
        }else{
            $row = new Interest();
        }

        $row->fill($request->input());
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);
    
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('interest'), $imageName);
    
            // You can save the image's path in the database or use it as needed.
            $row->image = 'interest/' . $imageName;    
        }

        $res = $row->save();

        if ($res) {
            if($id > 0 ){
                return redirect(route('interest.admin.index'))->with('success', 'Interest updated' );
            }else{
                return redirect(route('interest.admin.index'))->with('success', 'Interest created' );
            }
        }
    }
}
