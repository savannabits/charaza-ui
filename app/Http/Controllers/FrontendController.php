<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome(Request  $request) {
        return view('welcome');
    }
    public function showApply(Request  $request) {
        return view('frontend.apply');
    }
    public function apply(Request  $request) {
        //
    }
}
