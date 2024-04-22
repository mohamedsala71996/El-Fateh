<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        
        return view('website.about.index');
    }


}