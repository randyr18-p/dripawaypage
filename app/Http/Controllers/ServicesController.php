<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $categories = config('servicios.service_categories');
        $services = config('servicios.services');
        

        return view('pages.services', compact('categories', 'services'));
    }
}
