{{-- resources/views/services/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg-px-8 border-2 border-red-200">
  <!-- Hero -->
  <section class="py-20 lg:py-24 section-padding bg-gradient-to-br from-background to-white text-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg-px-8">
      <h1 class="text-4xl sm:text-5xl font-bold text-text mb-6">
        Professional Plumbing Services
      </h1>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
        Comprehensive plumbing solutions for Atlanta homeowners and businesses. 
        Licensed, insured, and committed to transparent pricing.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="#booking" class="btn-primary">Book Service Now</a>
        <a href="tel:+14045551234" class="btn-secondary flex items-center justify-center space-x-2">
          <x-heroicon-o-phone class="w-5 h-5"/>
          <span>(404) 555-1234</span>
        </a>
      </div>
    </div>
  </section>

  <!-- Categories -->
  <section class="section-padding bg-white">
    {{-- <div class="container-width">
      <div class="flex flex-wrap justify-center gap-4 mb-12">
        @foreach($categories as $cat)
          <a href="{{ route('services.index', ['category' => $cat['id']]) }}"
             class="px-6 py-3 rounded-lg font-medium transition-all
                    {{ request('category','all') === $cat['id']
                       ? 'bg-primary text-white shadow-lg'
                       : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            {{ $cat['name'] }}
          </a>
        @endforeach
      </div> --}}

      <!-- Services -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        @foreach($services as $service)
          @if(request('category','all') === 'all' || $service['category'] === request('category'))
            <div class="card group hover:shadow-xl transition-all duration-300 flex flex-col">
              <!-- Imagen -->
              <div class="relative mb-6 overflow-hidden rounded-lg">
                <img src="{{ $service['image'] }}"
                     alt="{{ $service['title'] }} service in Atlanta"
                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-1">
                  <span class="text-sm font-semibold text-primary">{{ $service['price'] }}</span>
                </div>
              </div>

              <!-- Contenido -->
              <div class="flex-1 px-2 sm:px-0">
                <div class="flex items-center space-x-3 mb-4">
                  <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                    {{-- Mapea ícono por slug --}}
                    @switch($service['icon'])
                      @case('wrench-screwdriver')
                        <x-heroicon-o-wrench-screwdriver class="w-6 h-6 text-primary"/>
                        @break
                      @case('cog')
                        <x-heroicon-o-cog class="w-6 h-6 text-primary"/>
                        @break
                      @case('shield-check')
                        <x-heroicon-o-shield-check class="w-6 h-6 text-primary"/>
                        @break
                      @default
                        <x-heroicon-o-wrench-screwdriver class="w-6 h-6 text-primary"/>
                    @endswitch
                  </div>
                  <div>
                    <h3 class="text-xl font-semibold text-text">{{ $service['title'] }}</h3>
                    <p class="text-sm text-gray-600">
                      {{ $service['duration'] }} • {{ $service['warranty'] }} warranty
                    </p>
                  </div>
                </div>

                <p class="text-gray-600 my-4">{{ $service['shortDescription'] }}</p>

                <h4 class="font-semibold text-text mb-2">Service Includes:</h4>
                <ul class="space-y-1 mb-6">
                  @foreach(array_slice($service['includes'],0,3) as $item)
                    <li class="flex items-center space-x-2 text-sm text-gray-600">
                      <x-heroicon-o-check-circle class="w-4 h-4 text-green-500 flex-shrink-0"/>
                      <span>{{ $item }}</span>
                    </li>
                  @endforeach
                </ul>

                <div class="flex flex-col sm:flex-row gap-3">
                  <a href="#booking" class="btn-primary flex-1">Book This Service</a>
                  {{-- <a href="{{ route('services.show',$service['id']) }}" class="btn-secondary">Learn More</a> --}}
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>

  <!-- Features -->
  <section class="section-padding bg-background">
    <div class="container-width">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-text mb-4">
          Why Choose DripAway Solutions?
        </h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Professional service backed by experience, licensing, and our commitment to customer satisfaction.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="text-center">
          <div class="w-16 h-16 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-4">
            <x-heroicon-o-shield-check class="w-8 h-8 text-primary"/>
          </div>
          <h3 class="text-lg font-semibold text-text mb-2">Licensed & Insured</h3>
          <p class="text-gray-600">Fully licensed master plumbers with comprehensive insurance coverage.</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-accent/10 rounded-lg flex items-center justify-center mx-auto mb-4">
            <span class="text-accent font-bold text-2xl">$</span>
          </div>
          <h3 class="text-lg font-semibold text-text mb-2">Transparent Pricing</h3>
          <p class="text-gray-600">No hidden fees or surprise charges. You know the cost upfront.</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
            <x-heroicon-o-clock class="w-8 h-8 text-green-600"/>
          </div>
          <h3 class="text-lg font-semibold text-text mb-2">24/7 Emergency</h3>
          <p class="text-gray-600">Available around the clock for urgent plumbing emergencies.</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
            <x-heroicon-o-check-circle class="w-8 h-8 text-blue-600"/>
          </div>
          <h3 class="text-lg font-semibold text-text mb-2">Satisfaction Guaranteed</h3>
          <p class="text-gray-600">We stand behind our work with comprehensive warranties.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Emergency CTA -->
  <section class="section-padding bg-gradient-to-r from-red-500 to-red-600 text-white">
    <div class="container-width text-center">
      <x-heroicon-o-clock class="w-16 h-16 mx-auto mb-4 opacity-90"/>
      <h2 class="text-3xl font-bold mb-4">Plumbing Emergency?</h2>
      <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
        Don't wait for a small problem to become a big disaster. 
        Our emergency plumbers are available 24/7 across Atlanta.
      </p>
      
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="tel:+14045551234" 
           class="inline-flex items-center bg-white text-red-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
          <x-heroicon-o-phone class="w-5 h-5 mr-2"/>
          Call Emergency Line
        </a>
        <a href="#booking"
           class="inline-flex items-center bg-red-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-red-800 transition-colors">
          <x-heroicon-o-calendar-days class="w-5 h-5 mr-2"/>
          Schedule Service
        </a>
      </div>
    </div>
  </section>

  <div id="booking"></div>
</div>
@endsection
