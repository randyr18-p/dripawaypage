<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $faqsHome = array_slice(config('faqs.items', []), 0, 6);
        return view('welcome', compact('faqsHome'));
    }

    public function test()
    {
        $testVariable = '¡Hola! La variable se pasó con éxito.';
        return view('test-view', compact('testVariable'));
    }
}
