<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    

class StaticController extends Controller
{
    public function index() {
      return view('static/index'); 
    }
    public function about() {
      $data = array(                    
        'title'=>'Страница про нас',
        'params'=>['BMW','AUDI','VOLVO']
      );
      return view('static/about')->with($data);
    }

    public function blog() {
      return view('static/blog');
    }
}
