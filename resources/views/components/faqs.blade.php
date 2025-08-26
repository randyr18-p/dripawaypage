{{-- resources/views/components/faqs.blade.php --}}
@props([
    'faqs' => null,   // puedes pasar :faqs desde el caller (home)
    'limit' => null,  // opcional, para cortar lista
    'showCta' => true // muestra/oculta el CTA inferior
])

@php
    $items = $faqs ?? config('faqs.items', []);
    if (!is_null($limit)) {
        $items = array_slice($items, 0, (int) $limit);
    }
@endphp

<section id="faqs" class="pb-24 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-text mb-4">
                Frequently Asked Questions
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Get answers to common questions about our plumbing services, pricing,
                and what to expect when you choose DripAway Solutions.
            </p>
        </div>

        <div x-data="{ openFAQ: null }" class="max-w-4xl mx-auto">
            <div class="space-y-4">
                @foreach ($items as $index => $faq)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button
                            @click="openFAQ = (openFAQ === {{ $index }}) ? null : {{ $index }}"
                            class="w-full px-6 py-5 text-left flex items-center justify-between hover:bg-gray-50 transition-colors"
                        >
                            <h3 class="text-lg font-semibold text-text pr-4">
                                {{ $faq['question'] }}
                            </h3>

                            {{-- Importante: x-bind:class en componentes Blade (NO :class) --}}
                            <x-heroicon-o-chevron-down
                                class="w-5 h-5 text-gray-500 flex-shrink-0 transition-transform duration-200"
                                x-bind:class="{ 'rotate-180': openFAQ === {{ $index }} }"
                            />
                        </button>

                        <div x-show="openFAQ === {{ $index }}" x-collapse class="px-6 pb-5">
                            <div class="border-t border-gray-100 pt-4">
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $faq['answer'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($showCta)
                <div class="mt-12 text-center">
                    <div class="bg-white rounded-xl p-8 shadow-lg">
                        <h3 class="text-2xl font-semibold text-text mb-4">
                            Still Have Questions?
                        </h3>
                        <p class="text-gray-800 mb-6 max-w-2xl mx-auto">
                            Our friendly team is here to help! Contact us directly for personalized
                            answers about your specific plumbing needs.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="tel:+14045551234" class="inline-flex items-center btn-primary">
                                <x-heroicon-o-phone class="w-5 h-5 mr-2" />
                                Call (404) 555-1234
                            </a>
                            <a href="{{ route('faqs') }}" class="inline-flex items-center btn-secondary">
                                <x-heroicon-o-calendar-days class="w-5 h-5 mr-2" />
                                View All FAQs
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
