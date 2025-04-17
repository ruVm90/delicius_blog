<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index(){
        
        $categories = Category::take(8)->get();
        return view('welcome' , compact('categories'));
    }
}
