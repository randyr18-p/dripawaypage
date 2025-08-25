<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $services = collect(config('servicios.services'))
            ->map(function ($s) {
                $slug = $s['slug'] ?? $s['id']; // fallback sólido
                return [
                    'id'          => $s['id'],
                    'slug'        => $slug,
                    'title'       => $s['title'],
                    'description' => $s['shortDescription'] ?? $s['fullDescription'] ?? '',
                    'price'       => $s['price'] ?? null,
                    'icon'        => $s['icon'] ?? 'wrench-screwdriver',
                    'image'       => $s['image'] ?? null,
                    'category'    => $s['category'] ?? null,
                ];
            })
            ->values()
            ->all();

        $faqsHome = array_slice(config('faqs.items', []), 0, 6);
        return view('welcome', compact('faqsHome', 'services'));
    }


    public function test()
    {
        $testVariable = '¡Hola! La variable se pasó con éxito.';
        return view('test-view', compact('testVariable'));
    }
}
