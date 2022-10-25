<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Log;
use Illuminate\Http\Request;

class SiteController extends Controller
{
 
    public function landing() {
        $categories = Category::get()->sortBy('category');
        return view('pages.landing', compact('categories'));
        
        // return view('pages.landing');
    }

    public function index() {
        return view('logs');
    }

    public function logs() {
       $logs = Log::get();
        // if(auth()->check()){
        //     $logs = auth()->user()->logs;
        //     return redirect('/logs');
        // }
        //     return view('logs', compact('logs'));
        if(auth()->check()){
            $logs = auth()->user()->logs;
            return view('logs', compact('logs'));
        }else{
            return redirect('/logs');
        }
    }
}
