<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index(){
        
        return view('welcome');
    }
}
