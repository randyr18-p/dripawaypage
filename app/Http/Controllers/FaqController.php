<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = config('faqs.items');
        return view('pages.faqs', [
            'meta_title' => 'FAQs | DripAway Solutions – Plumbing in Atlanta',
            'meta_description' => 'Answers about pricing, emergency service, warranties, areas served and scheduling. 24/7 plumbing for Atlanta. Free estimates.',
            'faqs' => $faqs,
        ]);
    }
}
