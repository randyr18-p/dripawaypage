{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('title', $meta_title)
@section('meta_description', $meta_description)

@section('content')
@php
  // Datos estáticos (puedes moverlos al controlador si luego quieres dinamizarlos)
  $stats = [
    ['number' => '500+', 'label' => 'Happy Customers',   'description' => 'Satisfied homeowners across Atlanta'],
    ['number' => '15+',  'label' => 'Years Experience',  'description' => 'Serving the Atlanta community'],
    ['number' => '4.9',  'label' => 'Average Rating',    'description' => 'Based on Google reviews'],
    ['number' => '24/7', 'label' => 'Emergency Service', 'description' => 'Always available when you need us'],
  ];

  $values = [
    ['icon' => 'shield', 'title' => 'Integrity First', 'description' => 'We believe in honest communication, transparent pricing, and doing the right thing even when no one is watching.'],
    ['icon' => 'users',  'title' => 'Customer Focus', 'description' => 'Every decision we make is centered around providing the best possible experience for our customers.'],
    ['icon' => 'wrench', 'title' => 'Quality Workmanship', 'description' => 'We take pride in our craft and stand behind every job with comprehensive warranties.'],
    ['icon' => 'clock',  'title' => 'Reliability', 'description' => "When we say we'll be there, we will be. On time, prepared, and ready to solve your plumbing problems."],
  ];

  $certifications = [
    ['title' => 'Georgia Master Plumber License', 'description' => 'All our plumbers hold valid Georgia master plumber licenses'],
    ['title' => 'Comprehensive Insurance', 'description' => 'Fully insured with liability and workers compensation coverage'],
    ['title' => 'Bonded & Background Checked', 'description' => 'All team members undergo thorough background checks'],
    ['title' => 'Continuing Education', 'description' => 'Regular training on latest techniques and safety protocols'],
  ];

  $teamMembers = [
    [
      'name' => 'Mike Johnson',
      'role' => 'Master Plumber & Owner',
      'experience' => '15+ years',
      'specialties' => ['Emergency Repairs', 'Leak Detection', 'Water Heaters'],
      'description' => 'Born and raised in Atlanta, Mike founded DripAway Solutions with a vision of providing honest, reliable plumbing services to his community.',
    ],
    [
      'name' => 'Sarah Davis',
      'role' => 'Senior Plumber',
      'experience' => '12+ years',
      'specialties' => ['Bathroom Remodels', 'Fixture Installation', 'Drain Cleaning'],
      'description' => 'Sarah brings precision and attention to detail to every job, specializing in complex installations and customer education.',
    ],
    [
      'name' => 'Tom Wilson',
      'role' => 'Emergency Response Specialist',
      'experience' => '10+ years',
      'specialties' => ['24/7 Emergency', 'Burst Pipes', 'Sewer Lines'],
      'description' => 'Tom leads our emergency response team, available around the clock to handle urgent plumbing situations across Atlanta.',
    ],
  ];

  $milestones = [
    ['year' => '2009', 'title' => 'Company Founded', 'description' => 'Mike Johnson starts DripAway Solutions with a single truck and a commitment to honest service'],
    ['year' => '2012', 'title' => 'Team Expansion', 'description' => 'Added our first employees and expanded service coverage across Atlanta metro'],
    ['year' => '2015', 'title' => '24/7 Emergency Service', 'description' => 'Launched round-the-clock emergency response to better serve our community'],
    ['year' => '2018', 'title' => '500th Customer', 'description' => 'Celebrated serving our 500th satisfied customer with a community appreciation event'],
    ['year' => '2020', 'title' => 'Digital Innovation', 'description' => 'Introduced online booking and contactless service options during the pandemic'],
    ['year' => '2024', 'title' => 'Continued Growth', 'description' => 'Expanding our team and services while maintaining our commitment to quality'],
  ];

  $communityInvolvement = [
    ['title' => 'Local School Support', 'description' => 'Annual donations and volunteer work at Atlanta area schools'],
    ['title' => 'Senior Citizen Discounts', 'description' => '15% discount for seniors on all non-emergency services'],
    ['title' => 'Emergency Response', 'description' => 'Free emergency assessments for flood and storm damage'],
    ['title' => 'Trade Education', 'description' => 'Mentoring programs for aspiring plumbers in the community'],
  ];
@endphp

<div class="min-h-screen pb-24 bg-neutral-50">

  {{-- HERO --}}
  <section class="pt-24 lg:pt-28 bg-gradient-to-br from-neutral-50 to-white">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="text-center mb-12">
        <h1 class="text-4xl sm:text-5xl font-bold text-neutral-900 mb-6">
          About DripAway Solutions
        </h1>
        <p class="text-xl text-neutral-600 max-w-3xl mx-auto mb-8">
          For over 15 years, we've been Atlanta's trusted plumbing professionals,
          delivering reliable service with transparent pricing and genuine care for our community.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="#booking"
             class="inline-flex items-center justify-center rounded-lg bg-blue-600 text-white px-6 py-3 font-semibold hover:bg-blue-700 transition">
            Schedule Service
          </a>
          <a href="tel:+14045551234"
             class="inline-flex items-center justify-center rounded-lg border border-neutral-300 bg-white px-6 py-3 font-semibold text-neutral-800 hover:bg-neutral-100 transition">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-1.2a1.05 1.05 0 0 0-.747-1.006l-3.327-1.109a1.05 1.05 0 0 0-1.172.38l-.93 1.24a1.05 1.05 0 0 1-1.224.36 12.02 12.02 0 0 1-6.64-6.64 1.05 1.05 0 0 1 .36-1.225l1.24-.93a1.05 1.05 0 0 0 .38-1.172L7.706 4.247A1.05 1.05 0 0 0 6.7 3.5H5.25A3 3 0 0 0 2.25 6.5v.25z"/>
            </svg>
            (404) 555-1234
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- COMPANY STATS --}}
  <section class="py-16 bg-white">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach ($stats as $stat)
          <div class="text-center">
            <div class="text-4xl font-extrabold text-blue-600 mb-2">{{ $stat['number'] }}</div>
            <div class="text-lg font-semibold text-neutral-900 mb-1">{{ $stat['label'] }}</div>
            <div class="text-sm text-neutral-600">{{ $stat['description'] }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- OUR STORY --}}
  <section class="py-16 bg-neutral-50">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
        <div>
          <h2 class="text-3xl font-bold text-neutral-900 mb-6">Our Story</h2>
          <div class="space-y-4 text-lg text-neutral-700">
            <p>
              DripAway Solutions was born from a simple belief: plumbing service should be
              honest, reliable, and fairly priced. In 2009, master plumber Mike Johnson
              started our company with just a truck and a toolbox, but with a big vision
              for how plumbing service could be different.
            </p>
            <p>
              Growing up in Atlanta, Mike saw too many homeowners frustrated by surprise
              charges, poor workmanship, and unreliable service. He knew there had to be
              a better way. That's why we built DripAway Solutions on the foundation of
              "Clear Flow. Clear Price." – transparency in everything we do.
            </p>
            <p>
              Today, we're proud to serve hundreds of Atlanta families with the same
              integrity and commitment that started our company. Every job, big or small,
              gets our full attention and professional expertise.
            </p>
          </div>
        </div>

        <div class="relative">
          <img
            src="https://images.pexels.com/photos/8447817/pexels-photo-8447817.jpeg?auto=compress&cs=tinysrgb&w=800"
            alt="DripAway Solutions team working on plumbing project"
            class="rounded-2xl shadow-xl w-full h-96 object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>

          {{-- Badge --}}
          <div class="absolute bottom-6 left-6 bg-white rounded-xl p-4 shadow-lg">
            <div class="flex items-center gap-3">
              <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M8 21h8M12 17a4 4 0 0 0 4-4v-3h1.5A2.5 2.5 0 0 0 20 7.5V6h-3V4H7v2H4v1.5A2.5 2.5 0 0 0 6.5 10H8v3a4 4 0 0 0 4 4z"/>
                </svg>
              </div>
              <div>
                <div class="font-semibold text-neutral-900">Since 2009</div>
                <div class="text-sm text-neutral-600">Serving Atlanta</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- CORE VALUES --}}
  <section class="py-16 bg-white">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-neutral-900 mb-4">Our Core Values</h2>
        <p class="text-xl text-neutral-600 max-w-2xl mx-auto">
          These principles guide every decision we make and every service we provide.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach ($values as $value)
          <div class="text-center">
            <div class="w-16 h-16 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-4">
              @if ($value['icon'] === 'shield')
                <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 3l7 4v5c0 5-3.5 7.5-7 9-3.5-1.5-7-4-7-9V7l7-4zM9 12l2 2 4-4"/>
                </svg>
              @elseif ($value['icon'] === 'users')
                <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M17 20a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4M17 11a4 4 0 1 0-8 0 4 4 0 0 0 8 0zM21 20a4 4 0 0 0-3-3.87"/>
                </svg>
              @elseif ($value['icon'] === 'wrench')
                <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M14.7 6.3a4 4 0 1 0-5.66 5.66l7.07 7.07a2 2 0 1 0 2.83-2.83L11.88 9.17"/>
                </svg>
              @elseif ($value['icon'] === 'clock')
                <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 6v6l4 2M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20z"/>
                </svg>
              @endif
            </div>
            <h3 class="text-lg font-semibold text-neutral-900 mb-3">{{ $value['title'] }}</h3>
            <p class="text-neutral-600">{{ $value['description'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- TEAM --}}
  <section class="py-16 bg-neutral-50">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-neutral-900 mb-4">Meet Our Expert Team</h2>
        <p class="text-xl text-neutral-600 max-w-2xl mx-auto">
          Licensed, experienced professionals who take pride in delivering exceptional service.
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @foreach ($teamMembers as $member)
          <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-neutral-200 text-center">
            <div class="w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-12 h-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M17 20a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4M17 11a4 4 0 1 0-8 0 4 4 0 0 0 8 0zM21 20a4 4 0 0 0-3-3.87"/>
              </svg>
            </div>

            <h3 class="text-xl font-semibold text-neutral-900 mb-1">{{ $member['name'] }}</h3>
            <p class="text-blue-600 font-medium mb-2">{{ $member['role'] }}</p>
            <p class="text-sm text-neutral-600 mb-4">{{ $member['experience'] }} experience</p>

            <div class="mb-4">
              <p class="text-sm font-medium text-neutral-900 mb-2">Specialties:</p>
              <div class="flex flex-wrap justify-center gap-2">
                @foreach ($member['specialties'] as $spec)
                  <span class="bg-blue-50 text-blue-700 px-2 py-1 rounded-full text-xs">{{ $spec }}</span>
                @endforeach
              </div>
            </div>

            <p class="text-neutral-600 text-sm">{{ $member['description'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- CERTIFICATIONS --}}
  <section class="py-16 bg-white">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-neutral-900 mb-4">Licensed & Certified</h2>
        <p class="text-xl text-neutral-600 max-w-2xl mx-auto">
          We maintain the highest professional standards with proper licensing, insurance, and ongoing education.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach ($certifications as $cert)
          <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-neutral-200">
            <div class="flex items-start gap-4">
              <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 12l2 2 4-4M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/>
                </svg>
              </div>
              <div>
                <h3 class="text-lg font-semibold text-neutral-900 mb-2">{{ $cert['title'] }}</h3>
                <p class="text-neutral-600">{{ $cert['description'] }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- TIMELINE --}}
  <section class="py-16 bg-neutral-50">
    <div class="container mx-auto px-6 max-w-5xl">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-neutral-900 mb-4">Our Journey</h2>
        <p class="text-xl text-neutral-600 max-w-2xl mx-auto">
          From a one-man operation to Atlanta's trusted plumbing team.
        </p>
      </div>

      <div class="space-y-8">
        @foreach ($milestones as $m)
          <div class="flex items-start gap-6">
            <div class="flex-shrink-0">
              <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-lg">
                {{ $m['year'] }}
              </div>
            </div>
            <div class="flex-1 bg-white rounded-lg p-6 shadow-sm ring-1 ring-neutral-200">
              <h3 class="text-xl font-semibold text-neutral-900 mb-2">{{ $m['title'] }}</h3>
              <p class="text-neutral-600">{{ $m['description'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- COMMUNITY --}}
  <section class="py-16 bg-white">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-neutral-900 mb-4">Giving Back to Atlanta</h2>
        <p class="text-xl text-neutral-600 max-w-2xl mx-auto">
          We're proud to be part of the Atlanta community and believe in supporting our neighbors beyond just plumbing services.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach ($communityInvolvement as $involvement)
          <div class="text-center">
            <div class="w-16 h-16 bg-rose-50 rounded-lg flex items-center justify-center mx-auto mb-4">
              <span class="text-2xl" aria-hidden="true">❤️</span>
            </div>
            <h3 class="text-lg font-semibold text-neutral-900 mb-3">{{ $involvement['title'] }}</h3>
            <p class="text-neutral-600">{{ $involvement['description'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- REVIEWS --}}
  <section class="py-16 bg-neutral-50">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-neutral-900 mb-4">What Our Customers Say</h2>
        <div class="flex items-center justify-center gap-2 mb-4">
          <div class="flex items-center" aria-hidden="true">
            @for ($i = 0; $i < 5; $i++)
              <svg class="w-6 h-6 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 0 0 .95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 0 0-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 0 0-1.176 0l-2.8 2.034c-.785.57-1.84-.197-1.54-1.118l1.07-3.292a1 1 0 0 0-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 0 0 .95-.69l1.07-3.292z"/>
              </svg>
            @endfor
          </div>
          <span class="text-lg font-semibold text-neutral-900">4.9/5</span>
          <span class="text-neutral-600">(248 reviews)</span>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @php
          $reviews = [
            [
              'text' => 'Mike and his team are absolutely fantastic. They fixed our emergency leak at 10 PM and the pricing was exactly what they quoted. True professionals!',
              'name' => 'Jennifer C.',
              'area' => 'Virginia Highland',
            ],
            [
              'text' => 'Best plumbing service in Atlanta! They installed our new faucet perfectly and explained everything clearly. Will definitely use them again.',
              'name' => 'Michael R.',
              'area' => 'Midtown',
            ],
            [
              'text' => 'Honest, reliable, and fairly priced. DripAway Solutions has been our go-to plumber for 5 years. They never disappoint!',
              'name' => 'Sarah J.',
              'area' => 'Buckhead',
            ],
          ];
        @endphp

        @foreach ($reviews as $rev)
          <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-neutral-200">
            <div class="flex items-center gap-1 mb-4" aria-hidden="true">
              @for ($i = 0; $i < 5; $i++)
                <svg class="w-4 h-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 0 0 .95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 0 0-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 0 0-1.176 0l-2.8 2.034c-.785.57-1.84-.197-1.54-1.118l1.07-3.292a1 1 0 0 0-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 0 0 .95-.69l1.07-3.292z"/>
                </svg>
              @endfor
            </div>
            <p class="text-neutral-700 mb-4">"{{ $rev['text'] }}"</p>
            <div class="text-sm">
              <div class="font-semibold text-neutral-900">{{ $rev['name'] }}</div>
              <div class="text-neutral-500">{{ $rev['area'] }}</div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- CTA --}}
  <section class="py-16 bg-gradient-to-r from-blue-600 to-rose-500 text-white">
    <div class="container mx-auto px-6 max-w-6xl text-center">
      <h2 class="text-3xl font-bold mb-4">Ready to Experience the DripAway Difference?</h2>
      <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
        Join hundreds of satisfied Atlanta homeowners who trust DripAway Solutions for all their plumbing needs.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="#booking" class="inline-flex items-center bg-white text-blue-700 px-8 py-4 rounded-lg font-semibold hover:bg-neutral-100 transition">
          <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M8 7V5m8 2V5M3 10h18M5 10v9a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-9"/>
          </svg>
          Schedule Service
        </a>
        <a href="tel:+14045551234"
           class="inline-flex items-center bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-blue-800 transition border-2 border-white/20">
          <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-1.2a1.05 1.05 0 0 0-.747-1.006l-3.327-1.109a1.05 1.05 0 0 0-1.172.38l-.93 1.24a1.05 1.05 0 0 1-1.224.36 12.02 12.02 0 0 1-6.64-6.64 1.05 1.05 0 0 1 .36-1.225l1.24-.93a1.05 1.05 0 0 0 .38-1.172L7.706 4.247A1.05 1.05 0 0 0 6.7 3.5H5.25A3 3 0 0 0 2.25 6.5v.25z"/>
          </svg>
          Call (404) 555-1234
        </a>
      </div>
    </div>
  </section>
</div>
{{-- BOOKING (tu componente existente) --}}
  <x-booking-section id="booking" />
@endsection
