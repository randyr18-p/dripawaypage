@props(['service'])

<div
    x-data="{
        scrollToBooking() {
            const el = document.getElementById('booking');
            if (!el) return;
            el.scrollIntoView({ behavior: 'smooth' });
        }
    }"
    class="pb-20 bg-background"
>
    @php
        $phoneDisplay = config('app.support_phone_display', '(404) 555-1234');
        $phoneHref    = config('app.support_phone_href', '+14045551234');

        $durationRaw = $service['duration'] ?? null;
        $durationNum = $durationRaw ? \Illuminate\Support\Str::of($durationRaw)->before(' ') : null;

        $warrantyRaw = $service['warranty'] ?? null;
        $wNum        = $warrantyRaw ? \Illuminate\Support\Str::of($warrantyRaw)->before(' ') : null;
        $wLabel      = $warrantyRaw ? \Illuminate\Support\Str::of($warrantyRaw)->after(' ') : null;

        // Features base
        $features = $service['includes'] ?? [];
        if ($warrantyRaw && !collect($features)->contains(fn($f) => \Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($f), 'warranty'))) {
            $features[] = $warrantyRaw . ' warranty';
        }

        // Data-driven desde config
        $issues       = $service['issues']        ?? [];   // array de ['issue','description','solution']
        $replaceWhen  = $service['replace_when']  ?? [];   // array de strings
    @endphp

    {{-- Hero --}}
    <section class="pt-20 lg:pt-24 pb-20 section-padding bg-gradient-to-br from-green-50 to-white">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                        Installation &amp; Repair
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-bold text-text mb-6">
                        {{ $service['title'] ?? 'P-Trap Replacement' }}
                    </h1>

                    <p class="text-xl text-gray-600 mb-8">
                        {{ $service['shortDescription'] ?? ($service['fullDescription'] ?? '') }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <button @click="scrollToBooking" type="button" class="btn-primary">
                            Book P-Trap Service
                        </button>
                        <a href="tel:{{ $phoneHref }}" class="btn-secondary flex items-center justify-center space-x-2">
                            <x-heroicon-o-phone class="w-5 h-5" />
                            <span>{{ $phoneDisplay }}</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-6 text-center">
                        <div>
                            <div class="text-2xl font-bold text-primary">{{ $service['price'] ?? '$125' }}</div>
                            <div class="text-sm text-gray-600">Starting Price</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-primary">{{ $durationNum ?? '45-90' }}</div>
                            <div class="text-sm text-gray-600">Minutes</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-primary">{{ $wNum ?? '1' }}</div>
                            <div class="text-sm text-gray-600">{{ $wLabel ? \Illuminate\Support\Str::title($wLabel) : 'Year' }} Warranty</div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <img
                        src="{{ $service['image'] ?? 'https://images.pexels.com/photos/8293809/pexels-photo-8293809.jpeg?auto=compress&cs=tinysrgb&w=800' }}"
                        alt="{{ $service['title'] ?? 'P-Trap Replacement' }}"
                        class="rounded-2xl shadow-xl w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- What is a P-Trap --}}
    <section class="pb-24 bg-white">
        <div class="container-width">
            <div class="max-w-4xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold text-text mb-6">What is a P-Trap?</h2>
                <p class="text-lg text-gray-600 mb-8">
                    A P-trap is the curved pipe section under your sink that holds water to prevent sewer gases from entering your home.
                    When it's damaged or improperly installed, you'll notice odors, leaks, or drainage issues.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <span class="text-blue-600 text-2xl">🛡️</span>
                    </div>
                    <h3 class="text-lg font-semibold text-text mb-3">Gas Barrier</h3>
                    <p class="text-gray-600">Prevents sewer gases from entering your home through the drain</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <span class="text-green-600 text-2xl">💧</span>
                    </div>
                    <h3 class="text-lg font-semibold text-text mb-3">Water Seal</h3>
                    <p class="text-gray-600">Maintains a water seal that blocks odors while allowing drainage</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <span class="text-purple-600 text-2xl">🔧</span>
                    </div>
                    <h3 class="text-lg font-semibold text-text mb-3">Easy Access</h3>
                    <p class="text-gray-600">Removable design allows for cleaning and maintenance access</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Common Issues (desde config) --}}
    <section class="pb-24 bg-background">
        <div class="container-width">
            <h2 class="text-3xl font-bold text-text text-center mb-12">Common P-Trap Problems</h2>

            <div class="space-y-8">
                @forelse($issues as $issue)
                    <div class="card">
                        <div class="grid md:grid-cols-3 gap-6 items-center">
                            <div>
                                <h3 class="text-xl font-semibold text-text mb-2">{{ $issue['issue'] ?? '' }}</h3>
                                <p class="text-gray-600">{{ $issue['description'] ?? '' }}</p>
                            </div>
                            <div class="text-center">
                                <x-heroicon-o-cog-6-tooth class="w-12 h-12 text-primary mx-auto" />
                            </div>
                            <div>
                                <h4 class="font-semibold text-text mb-2">Our Solution:</h4>
                                <p class="text-gray-600">{{ $issue['solution'] ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Fallback silencioso si no hay issues en config --}}
                @endforelse
            </div>
        </div>
    </section>

    {{-- Service Details --}}
    <section class="py-10 bg-white">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl font-bold text-text mb-6">Installation Process</h2>
                    <div class="space-y-6">
                        <div class="flex space-x-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">1</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Assessment</h4>
                                <p class="text-gray-600">We evaluate the current P-trap and surrounding plumbing.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">2</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Removal</h4>
                                <p class="text-gray-600">Careful removal of the old P-trap and cleaning of connections.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">3</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Installation</h4>
                                <p class="text-gray-600">Professional installation with proper alignment and sealing.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">4</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Testing</h4>
                                <p class="text-gray-600">Comprehensive leak testing and drainage verification.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-3xl font-bold text-text mb-6">What's Included</h2>

                    <div class="space-y-4 mb-8">
                        @foreach($features as $feature)
                            <div class="flex items-center space-x-3">
                                <x-heroicon-o-check-circle class="w-6 h-6 text-green-500 flex-shrink-0" />
                                <span class="text-gray-700">{{ $feature }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="p-6 bg-yellow-50 rounded-lg">
                        <h3 class="text-xl font-semibold text-text mb-3">When to Replace Your P-Trap</h3>
                        <ul class="space-y-2 text-gray-600">
                            @foreach($replaceWhen as $item)
                                <li>• {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-10 bg-gradient-to-r from-green-500 to-green-600 text-white">
        <div class="container-width text-center">
            <h2 class="text-3xl font-bold mb-4">Need P-Trap Replacement?</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                Don't let a faulty P-trap cause odors or water damage in your home.
                Our expert installation ensures proper function and long-lasting performance.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button @click="scrollToBooking" type="button"
                        class="inline-flex items-center bg-white text-green-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    <x-heroicon-o-calendar-days class="w-5 h-5 mr-2" />
                    Schedule Service
                </button>
                <a href="tel:{{ $phoneHref }}"
                   class="inline-flex items-center bg-green-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-800 transition-colors border-2 border-white/20">
                    <x-heroicon-o-phone class="w-5 h-5 mr-2" />
                    Get Quote
                </a>
            </div>
        </div>
    </section>
</div>
