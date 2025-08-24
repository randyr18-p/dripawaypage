{{-- resources/views/contact/index.blade.php --}}
@extends('layouts.app')

@section('title', $meta_title ?? 'Contact | DripAway Solutions')
@section('meta_description', $meta_description ?? 'Contact Atlanta’s trusted plumbers. 24/7 emergency service, transparent pricing and fast response.')

@section('content')
@php
  $contactInfo = [
    [
      'title' => 'Phone',
      'details' => ['(404) 555-1234', 'Emergency: (404) 555-HELP'],
      'action' => 'tel:+14045551234',
      'description' => 'Call us for immediate assistance or to schedule service',
      'icon' => 'phone',
    ],
    [
      'title' => 'Email',
      'details' => ['info@dripawaysolutions.com', 'emergency@dripawaysolutions.com'],
      'action' => 'mailto:info@dripawaysolutions.com',
      'description' => "Send us a message and we'll respond within 24 hours",
      'icon' => 'mail',
    ],
    [
      'title' => 'Service Area',
      'details' => ['Atlanta & Metro Area', 'All surrounding counties'],
      'action' => '#',
      'description' => 'Serving all of Atlanta and surrounding communities',
      'icon' => 'map',
    ],
    [
      'title' => 'Business Hours',
      'details' => ['Mon–Fri: 7AM–7PM', '24/7 Emergency Service'],
      'action' => '#',
      'description' => 'Regular hours with emergency availability',
      'icon' => 'clock',
    ],
  ];

  $serviceAreas = [
    'Buckhead','Midtown','Virginia Highland','Decatur','East Atlanta','Inman Park',
    'Marietta','Roswell','Sandy Springs','Alpharetta','Dunwoody','Smyrna',
    'Brookhaven','Chamblee','Doraville','Tucker','Stone Mountain','Lithonia'
  ];

  $whyChooseUs = [
    ['title'=>'Licensed & Insured','description'=>'Fully licensed master plumbers with comprehensive insurance coverage'],
    ['title'=>'Transparent Pricing','description'=>'No hidden fees or surprise charges — you know the cost upfront'],
    ['title'=>'24/7 Emergency Service','description'=>'Available around the clock for urgent plumbing emergencies'],
    ['title'=>'Local Atlanta Team','description'=>'Born and raised in Atlanta, we understand local plumbing challenges'],
  ];
@endphp

<div class="min-h-screen bg-neutral-50">

  {{-- HERO --}}
  <section class="pt-24 lg:pt-28 bg-gradient-to-br from-neutral-50 to-white">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="text-center mb-12">
        <h1 class="text-4xl sm:text-5xl font-bold text-neutral-900 mb-6">
          Get in Touch with Atlanta's Trusted Plumbers
        </h1>
        <p class="text-xl text-neutral-600 max-w-3xl mx-auto mb-8">
          Ready to solve your plumbing problems? Contact DripAway Solutions today for fast,
          reliable service with transparent pricing. We're here to help 24/7.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="tel:+14045551234"
             class="inline-flex items-center justify-center rounded-lg bg-blue-600 text-white px-6 py-3 font-semibold hover:bg-blue-700 transition">
            {{-- phone --}}
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5A2.25 2.25 0 0 0 21 19.5v-1.2a1.05 1.05 0 0 0-.747-1.006l-3.327-1.109a1.05 1.05 0 0 0-1.172.38l-.93 1.24a1.05 1.05 0 0 1-1.224.36 12.02 12.02 0 0 1-6.64-6.64 1.05 1.05 0 0 1 .36-1.225l1.24-.93a1.05 1.05 0 0 0 .38-1.172L7.706 4.247A1.05 1.05 0 0 0 6.7 3.5H5.25A3 3 0 0 0 2.25 6.5v.25z"/>
            </svg>
            Call (404) 555-1234
          </a>
          <a href="#booking"
             class="inline-flex items-center justify-center rounded-lg border border-neutral-300 bg-white px-6 py-3 font-semibold text-neutral-800 hover:bg-neutral-100 transition">
            {{-- calendar --}}
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M8 7V5m8 2V5M3 10h18M5 10v9a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-9"/>
            </svg>
            Schedule Service
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- CONTACT CARDS --}}
  <section class="py-16 bg-white">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
        @foreach ($contactInfo as $info)
          <div class="rounded-xl bg-white p-6 text-center ring-1 ring-neutral-200 shadow-sm hover:shadow-lg transition">
            <div class="w-16 h-16 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-4">
              @if ($info['icon']==='phone')
                <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5A2.25 2.25 0 0 0 21 19.5v-1.2a1.05 1.05 0 0 0-.747-1.006l-3.327-1.109a1.05 1.05 0 0 0-1.172.38l-.93 1.24a1.05 1.05 0 0 1-1.224.36 12.02 12.02 0 0 1-6.64-6.64 1.05 1.05 0 0 1 .36-1.225l1.24-.93a1.05 1.05 0 0 0 .38-1.172L7.706 4.247A1.05 1.05 0 0 0 6.7 3.5H5.25A3 3 0 0 0 2.25 6.5v.25z"/></svg>
              @elseif ($info['icon']==='mail')
                <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7.5A2.5 2.5 0 0 1 5.5 5h13A2.5 2.5 0 0 1 21 7.5v9A2.5 2.5 0 0 1 18.5 19h-13A2.5 2.5 0 0 1 3 16.5v-9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m3 8 9 6 9-6"/></svg>
              @elseif ($info['icon']==='map')
                <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21s7-4.5 7-10a7 7 0 1 0-14 0c0 5.5 7 10 7 10z"/><circle cx="12" cy="11" r="2.5" /></svg>
              @elseif ($info['icon']==='clock')
                <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="12" r="9" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7.5V12l3.5 2"/></svg>
              @endif
            </div>
            <h3 class="text-xl font-semibold text-neutral-900 mb-3">{{ $info['title'] }}</h3>
            <div class="space-y-1 mb-3">
              @foreach ($info['details'] as $detail)
                @if ($info['action'] !== '#')
                  <a href="{{ $info['action'] }}" class="font-medium text-neutral-800 hover:text-blue-600 transition">{{ $detail }}</a><br>
                @else
                  <span class="font-medium text-neutral-800">{{ $detail }}</span><br>
                @endif
              @endforeach
            </div>
            <p class="text-sm text-neutral-500">{{ $info['description'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- FORM + INFO --}}
  <section class="py-16 bg-neutral-50">
    <div class="container mx-auto px-6 max-w-6xl grid lg:grid-cols-2 gap-16">

      {{-- FORMULARIO DE CONTACTO --}}
      <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-neutral-200">
        <div class="flex items-center gap-3 mb-6">
          {{-- mail icon --}}
          <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7.5A2.5 2.5 0 0 1 5.5 5h13A2.5 2.5 0 0 1 21 7.5v9A2.5 2.5 0 0 1 18.5 19h-13A2.5 2.5 0 0 1 3 16.5v-9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m3 8 9 6 9-6"/>
          </svg>
          <h2 class="text-2xl font-semibold text-neutral-900">Send Us a Message</h2>
        </div>

        {{-- Mensaje de éxito (flash) --}}
        @if (session('status'))
          <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
            <div class="flex items-start gap-3">
              <svg class="w-5 h-5 text-green-600 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="9"/>
              </svg>
              <div>
                <h3 class="font-semibold text-green-800">Message Sent Successfully!</h3>
                <p class="text-green-700">{{ session('status') }}</p>
              </div>
            </div>
          </div>
        @endif

        {{-- Errores de validación --}}
        @if ($errors->any())
          <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
            <p class="text-red-700 font-medium mb-2">Please fix the following errors:</p>
            <ul class="list-disc list-inside text-red-700 text-sm">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('contact.submit') }}"
              x-data="{ submitting:false }"
              x-on:submit="submitting = true"
              class="space-y-6">
          @csrf
          {{-- honeypot simple --}}
          <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-neutral-900 mb-2">Full Name *</label>
              <input name="name" type="text" required
                     value="{{ old('name') }}"
                     class="w-full p-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            </div>
            <div>
              <label class="block text-sm font-medium text-neutral-900 mb-2">Phone Number *</label>
              <input name="phone" type="tel" required
                     value="{{ old('phone') }}"
                     class="w-full p-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-neutral-900 mb-2">Email Address</label>
            <input name="email" type="email"
                   value="{{ old('email') }}"
                   class="w-full p-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
          </div>

          <div>
            <label class="block text-sm font-medium text-neutral-900 mb-2">Subject</label>
            <select name="subject"
                    class="w-full p-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
              <option value="" @selected(old('subject')==='')>Select a subject</option>
              <option value="general" @selected(old('subject')==='general')>General Inquiry</option>
              <option value="emergency" @selected(old('subject')==='emergency')>Emergency Service</option>
              <option value="estimate" @selected(old('subject')==='estimate')>Request Estimate</option>
              <option value="scheduling" @selected(old('subject')==='scheduling')>Schedule Service</option>
              <option value="complaint" @selected(old('subject')==='complaint')>Service Issue</option>
              <option value="compliment" @selected(old('subject')==='compliment')>Compliment</option>
              <option value="other" @selected(old('subject')==='other')>Other</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-neutral-900 mb-2">Message *</label>
            <textarea name="message" rows="5" required
                      placeholder="Tell us about your plumbing needs, describe the issue, or ask any questions..."
                      class="w-full p-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">{{ old('message') }}</textarea>
          </div>

          <button type="submit"
                  :disabled="submitting"
                  class="w-full py-4 rounded-lg font-semibold text-lg transition
                         disabled:cursor-not-allowed disabled:bg-neutral-300 disabled:text-neutral-500
                         bg-blue-600 text-white hover:bg-blue-700">
            <span x-show="!submitting">Send Message</span>
            <span x-show="submitting">Sending Message…</span>
          </button>
        </form>
      </div>

      {{-- INFO LATERAL --}}
      <div class="space-y-8">
        {{-- Why Choose Us --}}
        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-neutral-200">
          <h3 class="text-2xl font-semibold text-neutral-900 mb-6">Why Choose DripAway Solutions?</h3>
          <div class="space-y-4">
            @foreach ($whyChooseUs as $reason)
              <div class="flex items-start gap-3">
                {{-- check --}}
                <svg class="w-5 h-5 text-green-600 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4"/><circle cx="12" cy="12" r="9"/>
                </svg>
                <div>
                  <h4 class="font-semibold text-neutral-900 mb-1">{{ $reason['title'] }}</h4>
                  <p class="text-neutral-600">{{ $reason['description'] }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        {{-- Service Areas --}}
        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-neutral-200">
          <h3 class="text-2xl font-semibold text-neutral-900 mb-6">Service Areas</h3>
          <p class="text-neutral-600 mb-4">
            We proudly serve Atlanta and all surrounding metro areas including:
          </p>
          <div class="grid grid-cols-2 gap-2">
            @foreach ($serviceAreas as $area)
              <div class="text-sm text-neutral-700 py-1">• {{ $area }}</div>
            @endforeach
          </div>
          <p class="text-sm text-neutral-500 mt-4">
            Don't see your area listed? Call us — we may still be able to help!
          </p>
        </div>

        {{-- Response Promise --}}
        <div class="rounded-xl bg-blue-50 p-6 ring-1 ring-blue-100">
          <h3 class="text-xl font-semibold text-neutral-900 mb-4">Our Response Promise</h3>
          <div class="space-y-3">
            <div class="flex items-center gap-3">
              {{-- clock --}}
              <svg class="w-5 h-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7.5V12l3.5 2"/></svg>
              <span class="text-neutral-700">Email responses within 24 hours</span>
            </div>
            <div class="flex items-center gap-3">
              {{-- phone --}}
              <svg class="w-5 h-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5A2.25 2.25 0 0 0 21 19.5v-1.2a1.05 1.05 0 0 0-.747-1.006l-3.327-1.109a1.05 1.05 0 0 0-1.172.38l-.93 1.24a1.05 1.05 0 0 1-1.224.36 12.02 12.02 0 0 1-6.64-6.64 1.05 1.05 0 0 1 .36-1.225l1.24-.93a1.05 1.05 0 0 0 .38-1.172L7.706 4.247A1.05 1.05 0 0 0 6.7 3.5H5.25A3 3 0 0 0 2.25 6.5v.25z"/></svg>
              <span class="text-neutral-700">Phone calls answered immediately</span>
            </div>
            <div class="flex items-center gap-3">
              {{-- calendar --}}
              <svg class="w-5 h-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V5m8 2V5M3 10h18M5 10v9a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-9"/></svg>
              <span class="text-neutral-700">Service appointments within 24–48 hours</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  {{-- EMERGENCY BANNER --}}
  <section class="py-16 bg-gradient-to-r from-red-500 to-red-600 text-white">
    <div class="container mx-auto px-6 max-w-6xl text-center">
      <h2 class="text-3xl font-bold mb-4">Plumbing Emergency?</h2>
      <p class="text-xl mb-8 opacity-90">
        Don't wait for business hours! Our emergency plumbers are available 24/7 throughout Atlanta.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="tel:+14045551234"
           class="inline-flex items-center bg-white text-red-600 px-8 py-4 rounded-lg font-semibold hover:bg-neutral-100 transition">
          {{-- phone --}}
          <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5A2.25 2.25 0 0 0 21 19.5v-1.2a1.05 1.05 0 0 0-.747-1.006l-3.327-1.109a1.05 1.05 0 0 0-1.172.38l-.93 1.24a1.05 1.05 0 0 1-1.224.36 12.02 12.02 0 0 1-6.64-6.64 1.05 1.05 0 0 1 .36-1.225l1.24-.93a1.05 1.05 0 0 0 .38-1.172L7.706 4.247A1.05 1.05 0 0 0 6.7 3.5H5.25A3 3 0 0 0 2.25 6.5v.25z"/></svg>
          Emergency Line: (404) 555-1234
        </a>
        <a href="sms:+14045551234"
           class="inline-flex items-center bg-red-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-red-800 transition border-2 border-white/20">
          Text Us Now
        </a>
      </div>
    </div>
  </section>

  {{-- MAPA / PLACEHOLDER --}}
  <section class="py-16 bg-neutral-50">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-neutral-900 mb-4">Our Service Area</h2>
        <p class="text-xl text-neutral-600 max-w-2xl mx-auto">
          Serving Atlanta and all surrounding metro communities with professional plumbing services.
        </p>
      </div>

      <div class="bg-neutral-100 rounded-2xl h-96 flex items-center justify-center shadow-lg">
        <div class="text-center">
          {{-- map pin --}}
          <svg class="w-16 h-16 text-neutral-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21s7-4.5 7-10a7 7 0 1 0-14 0c0 5.5 7 10 7 10z"/><circle cx="12" cy="11" r="2.5"/></svg>
          <h3 class="text-2xl font-semibold text-neutral-700 mb-2">Atlanta Metro Service Area</h3>
          <p class="text-neutral-500 max-w-md mx-auto">
            We serve all of Atlanta and surrounding communities within a 50-mile radius.
            Contact us to confirm service availability in your area.
          </p>
        </div>
      </div>
    </div>
  </section>

  {{-- BOOKING COMPONENT --}}
  <x-booking-section id="booking" />
</div>
@endsection
