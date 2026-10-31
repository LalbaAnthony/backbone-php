<?php

namespace App\Controllers\View;

use Backbone\Http\Request;
use Backbone\Http\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $this->view('home');
    }
}
