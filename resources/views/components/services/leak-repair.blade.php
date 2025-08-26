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
        // Teléfono centralizado
        $phoneDisplay = config('app.support_phone_display', '(404) 555-1234');
        $phoneHref    = config('app.support_phone_href', '+14045551234');

        // Duración (p.ej. '30-180 minutes' -> '30-180')
        $durationRaw = $service['duration'] ?? null;
        $durationNum = $durationRaw ? \Illuminate\Support\Str::of($durationRaw)->before(' ') : null;

        // Features desde includes + añadimos warranty si no aparece
        $features = $service['includes'] ?? [];
        if (!collect($features)->contains(fn($f) => \Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($f), 'warranty'))) {
            if (!empty($service['warranty'])) {
                $features[] = $service['warranty'] . ' warranty';
            } else {
                $features[] = '1-year warranty';
            }
        }

        // Data-driven (con fallback por si faltan en config)
        $leakTypes = $service['leak_types'] ?? [
            ['type' => 'Pipe Leaks',    'description' => 'Cracks or holes in water supply lines causing water damage', 'urgency' => 'High'],
            ['type' => 'Joint Leaks',   'description' => 'Loose or damaged connections between pipe sections',         'urgency' => 'Medium'],
            ['type' => 'Fixture Leaks', 'description' => 'Leaking faucets, toilets, or other plumbing fixtures',      'urgency' => 'Low'],
            ['type' => 'Hidden Leaks',  'description' => 'Leaks behind walls or under slabs requiring detection',     'urgency' => 'High'],
        ];

        $signs = $service['signs'] ?? [
            'Unexplained increase in water bills',
            'Water stains on walls or ceilings',
            'Musty odors or mold growth',
            'Sound of running water when taps are off',
            'Wet spots in yard or foundation',
            'Low water pressure throughout home',
        ];

        // Imagen
        $image = $service['image'] ?? 'https://images.pexels.com/photos/8447817/pexels-photo-8447817.jpeg?auto=compress&cs=tinysrgb&w=800';

        // Helper de badge por urgencia
        $urgencyClass = function ($urgency) {
            return match (\Illuminate\Support\Str::of($urgency)->lower()->value()) {
                'high'   => 'bg-red-100 text-red-700',
                'medium' => 'bg-yellow-100 text-yellow-700',
                'low'    => 'bg-green-100 text-green-700',
                default  => 'bg-gray-100 text-gray-700',
            };
        };
    @endphp

    {{-- Service Hero --}}
    <section class="pt-20 lg:pt-24 pb-24 section-padding bg-gradient-to-br from-red-50 to-white">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                        Emergency Repair
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-bold text-text mb-6">
                        {{ $service['title'] ?? 'Fast Leak Detection & Repair' }}
                    </h1>

                    <p class="text-xl text-gray-600 mb-8">
                        {{ $service['shortDescription'] ?? ($service['fullDescription'] ?? "Don't let water leaks cause expensive damage to your home. Our expert leak detection and repair service quickly identifies and fixes leaks to protect your property.") }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <button @click="scrollToBooking" type="button" class="btn-primary">
                            Book Leak Repair
                        </button>
                        <a href="tel:{{ $phoneHref }}" class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition-colors flex items-center justify-center gap-2">
                            <x-heroicon-o-phone class="w-5 h-5" />
                            <span>Emergency: {{ $phoneDisplay }}</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-6 text-center">
                        <div>
                            <div class="text-2xl font-bold text-primary">{{ $service['price'] ?? '$95' }}</div>
                            <div class="text-sm text-gray-600">Starting Price</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-primary">{{ $durationNum ?? '30-180' }}</div>
                            <div class="text-sm text-gray-600">Minutes</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-primary">24/7</div>
                            <div class="text-sm text-gray-600">Emergency</div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <img
                        src="{{ $image }}"
                        alt="{{ $service['title'] ?? 'Leak Repair' }}"
                        class="rounded-2xl shadow-xl w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>

                    {{-- Emergency Badge --}}
                    <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-lg text-sm font-semibold">
                        24/7 Emergency
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Emergency Warning --}}
    <section class="py-20 bg-red-600 text-white">
        <div class="container-width">
            <div class="flex items-center justify-center gap-4 text-center">
                <x-heroicon-o-exclamation-triangle class="w-12 h-12" />
                <div>
                    <h2 class="text-2xl font-bold mb-2">Water Leak Emergency?</h2>
                    <p class="text-lg opacity-90">
                        Turn off your main water supply immediately and call our emergency line:
                        <a href="tel:{{ $phoneHref }}" class="underline font-semibold">{{ $phoneDisplay }}</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Types of Leaks --}}
    <section class="py-20 bg-white">
        <div class="container-width">
            <h2 class="text-3xl font-bold text-text text-center mb-12">Types of Leaks We Repair</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($leakTypes as $leak)
                    @php $badge = $urgencyClass($leak['urgency'] ?? ''); @endphp
                    <div class="card">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-text">{{ $leak['type'] ?? '' }}</h3>
                            <span class="px-3 py-1 rounded-full text-sm font-medium {{ $badge }}">
                                {{ $leak['urgency'] ?? '—' }} Priority
                            </span>
                        </div>
                        <p class="text-gray-600 mb-4">{{ $leak['description'] ?? '' }}</p>
                        <button type="button" @click="scrollToBooking" class="text-primary hover:text-primary/80 font-medium">
                            Schedule Repair →
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Service Details --}}
    <section class="py-10 bg-background">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl font-bold text-text mb-6">Our Leak Detection Process</h2>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">1</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Initial Assessment</h4>
                                <p class="text-gray-600">We evaluate visible signs and use advanced detection equipment.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">2</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Leak Location</h4>
                                <p class="text-gray-600">Precise identification of leak source and extent of damage.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">3</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Professional Repair</h4>
                                <p class="text-gray-600">Expert repair using quality materials and proven techniques.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">4</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Testing &amp; Prevention</h4>
                                <p class="text-gray-600">Pressure testing and advice to prevent future leaks.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-3xl font-bold text-text mb-6">What's Included</h2>

                    <div class="space-y-4 mb-8">
                        @foreach($features as $feature)
                            <div class="flex items-center gap-3">
                                <x-heroicon-o-check-circle class="w-6 h-6 text-green-500 flex-shrink-0" />
                                <span class="text-gray-700">{{ $feature }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="p-6 bg-blue-50 rounded-lg">
                        <h3 class="text-xl font-semibold text-text mb-3">Signs You Need Leak Repair</h3>
                        <ul class="space-y-2 text-gray-600">
                            @foreach($signs as $s)
                                <li>• {{ $s }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-10 bg-gradient-to-r from-red-500 to-red-600 text-white">
        <div class="container-width text-center">
            <h2 class="text-3xl font-bold mb-4">Don't Wait - Leaks Get Worse!</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                Water leaks can cause thousands in damage if left untreated. Our fast response
                team is ready to protect your home 24/7.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:{{ $phoneHref }}"
                   class="inline-flex items-center bg-white text-red-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    <x-heroicon-o-phone class="w-5 h-5 mr-2" />
                    Emergency Line
                </a>
                <button @click="scrollToBooking" type="button"
                        class="inline-flex items-center bg-red-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-red-800 transition-colors border-2 border-white/20">
                    <x-heroicon-o-calendar-days class="w-5 h-5 mr-2" />
                    Schedule Repair
                </button>
            </div>
        </div>
    </section>
</div>
