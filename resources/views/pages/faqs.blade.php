{{-- resources/views/faqs/index.blade.php --}}
@extends('layouts.app')

@section('title', $meta_title ?? 'FAQs | DripAway Solutions')
@section('meta_description', $meta_description ?? 'Frequently asked questions for DripAway Solutions.')

@section('content')
<div
  class="min-h-screen bg-neutral-50"
  x-data="{
    search: '',
    open: null,
    items: {{ json_encode($faqs, JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_QUOT) }},
    get filtered() {
      if (!this.search.trim()) return this.items
      const q = this.search.toLowerCase()
      return this.items.filter(f =>
        f.question.toLowerCase().includes(q) ||
        f.answer.toLowerCase().includes(q)
      )
    }
  }"
>

  {{-- HERO --}}
  <section class="pt-24 lg:pt-28 bg-gradient-to-br from-neutral-50 to-white">
    <div class="container mx-auto px-6 max-w-6xl">
      <div class="text-center mb-12">
        <h1 class="text-4xl sm:text-5xl font-bold text-neutral-900 mb-6">
          Frequently Asked Questions
        </h1>
        <p class="text-xl text-neutral-600 max-w-3xl mx-auto mb-8">
          Clear answers about pricing, emergency response, warranties and scheduling—so you can decide con total confianza.
        </p>
      </div>
    </div>
  </section>

  {{-- SEARCH --}}
  <section class="py-16 bg-white">
    <div class="container mx-auto px-6 max-w-4xl">
      <div class="relative mb-8">
        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1 0 7.5 15a7.5 7.5 0 0 0 9.15 1.65z"/>
        </svg>
        <input
          x-model="search"
          type="text"
          placeholder="Search frequently asked questions..."
          class="w-full pl-12 pr-4 py-4 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent text-lg"
          aria-label="Search FAQs"
        >
      </div>

      {{-- Empty state --}}
      <div x-show="filtered.length === 0" class="text-center py-10">
        <p class="text-neutral-600 mb-4">No questions found matching your search.</p>
        <button
          @click="search=''; open=null"
          class="px-6 py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700"
        >
          Clear Search
        </button>
      </div>
    </div>
  </section>

  {{-- FAQ LIST (Acordeón) --}}
  <section class="pb-16 bg-white">
    <div class="container mx-auto px-6 max-w-4xl space-y-4">
      <template x-for="(faq, idx) in filtered" :key="idx">
        <div class="bg-white rounded-lg shadow-sm ring-1 ring-neutral-200 overflow-hidden">
          <button
            @click="open = (open === idx ? null : idx)"
            class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-neutral-50 transition"
            :aria-expanded="open === idx"
          >
            <h3 class="text-lg font-semibold text-neutral-900 pr-6" x-text="faq.question"></h3>
            <svg class="w-5 h-5 text-neutral-500 transition-transform" :class="{'rotate-180': open === idx}" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
            </svg>
          </button>

          <div x-show="open === idx" x-collapse>
            <div class="px-6 pb-6 pt-4 border-t border-neutral-100">
              <p class="text-neutral-700 leading-relaxed" x-text="faq.answer"></p>
            </div>
          </div>
        </div>
      </template>
    </div>
  </section>

  {{-- QUICK STATS (estático) --}}
  <section class="py-16 bg-neutral-50">
    <div class="container mx-auto px-6 max-w-4xl">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div><div class="text-3xl font-bold text-blue-600 mb-2">500+</div><div class="text-neutral-600">Happy Customers</div></div>
        <div><div class="text-3xl font-bold text-blue-600 mb-2">24/7</div><div class="text-neutral-600">Emergency Service</div></div>
        <div><div class="text-3xl font-bold text-blue-600 mb-2">15+</div><div class="text-neutral-600">Years Experience</div></div>
        <div><div class="text-3xl font-bold text-blue-600 mb-2">4.9★</div><div class="text-neutral-600">Average Rating</div></div>
      </div>
    </div>
  </section>

  {{-- CTA FINAL --}}
  <section class="py-16 mb-7 bg-gradient-to-r from-blue-600 to-rose-500 text-white">
    <div class="container mx-auto px-6 max-w-6xl text-center">
      <h2 class="text-2xl sm:text-3xl font-bold mb-4">Still Have Questions?</h2>
      <p class="text-lg mb-8 opacity-90 max-w-2xl mx-auto">
        Our team is here to help 24/7. Free estimates. Licensed & insured.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="tel:+14045551234"
           class="inline-flex items-center bg-white text-blue-700 px-8 py-4 rounded-lg font-semibold hover:bg-neutral-100 transition">
          <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-1.2a1.05 1.05 0 0 0-.747-1.006l-3.327-1.109a1.05 1.05 0 0 0-1.172.38l-.93 1.24a1.05 1.05 0 0 1-1.224.36 12.02 12.02 0 0 1-6.64-6.64 1.05 1.05 0 0 1 .36-1.225l1.24-.93a1.05 1.05 0 0 0 .38-1.172L7.706 4.247A1.05 1.05 0 0 0 6.7 3.5H5.25A3 3 0 0 0 2.25 6.5v.25z"/>
          </svg>
          Call (404) 555-1234
        </a>

        <a href="#booking"
           class="inline-flex items-center bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-blue-800 transition border-2 border-white/20">
          <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V5m8 2V5M3 10h18M5 10v9a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-9"/>
          </svg>
          Schedule Service
        </a>
      </div>
    </div>
  </section>

  {{-- BOOKING (tu componente existente) --}}
  <x-booking-section id="booking" />
</div>
@endsection
