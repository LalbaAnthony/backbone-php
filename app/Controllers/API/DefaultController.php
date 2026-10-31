<?php

namespace App\Controllers\API;

use Backbone\Http\Request;
use Backbone\Http\Controller;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        $this->json(['message' => 'This is the API root endpoint.'], 200);
    }
}
