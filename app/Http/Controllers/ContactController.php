<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact', [
            'meta_title' => 'Contact Us | DripAway Solutions – Atlanta Plumbing',
            'meta_description' => 'Get in touch with DripAway Solutions for expert plumbing services in Atlanta. Call us at (123) 456-7890 or fill out our contact form online.'
        ]);
    }


}
