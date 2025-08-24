<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('pages.about', [
            'meta_title' => 'About DripAway Solutions | Atlanta Plumbing Experts',
            'meta_description' => 'Discover our 15+ years of plumbing experience, core values, and commitment to Atlanta homeowners. Learn about our team and story.'
        ]);
    }
}
