<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TestController extends Controller
{
    public function test(): View
    {
        return view('test');
    }
}
