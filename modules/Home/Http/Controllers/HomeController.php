<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
        return view('home::quiz');
    }

    public function ticket(){
        return view('home::ticket');
    }

    public function profileDetail(){
        return view('home::profile-detail');
    }
}
