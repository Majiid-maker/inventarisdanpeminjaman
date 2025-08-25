<?php

namespace App\Http\Controllers\Super;

use Illuminate\View\view;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function index() : View
    {
        return view('content.super.dashboard');
    }
}
