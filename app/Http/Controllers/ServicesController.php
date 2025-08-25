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

    public function show($slug)
    {
        $service = collect(config('servicios.services'))->first(function ($s) use ($slug) {
            return ($s['slug'] ?? $s['id']) === $slug;
        });

        if (!$service) {
            abort(404, 'Servicio no encontrado.');
        }

        return view('pages.service-detail', compact('service'));
    }
}
