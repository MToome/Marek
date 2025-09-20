<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Hello, rate limiting works!'
        ]);
    }
}
