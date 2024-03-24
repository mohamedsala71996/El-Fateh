<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index(){
        return view('website.why.index');
    }
}