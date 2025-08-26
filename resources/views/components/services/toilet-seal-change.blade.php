@props(['service'])

<div
    x-data="{
        scrollToBooking() {
            const el = document.getElementById('booking');
            if (!el) return;
            el.scrollIntoView({ behavior: 'smooth' });
        }
    }"
    class="pb-24 bg-background"
>
    @php
        $phoneDisplay = config('app.support_phone_display', '(404) 555-1234');
        $phoneHref    = config('app.support_phone_href', '+14045551234');

        // Duración: '60-90 minutes' -> '60-90'
        $durationRaw = $service['duration'] ?? null;
        $durationNum = $durationRaw ? \Illuminate\Support\Str::of($durationRaw)->before(' ') : null;

        // Garantía
        $warrantyRaw = $service['warranty'] ?? null;
        $wNum        = $warrantyRaw ? \Illuminate\Support\Str::of($warrantyRaw)->before(' ') : null;
        $wLabel      = $warrantyRaw ? \Illuminate\Support\Str::of($warrantyRaw)->after(' ') : null;

        // Features desde includes + añadimos warranty si no aparece
        $features = $service['includes'] ?? [];
        if ($warrantyRaw && !collect($features)->contains(fn($f) => \Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($f), 'warranty'))) {
            $features[] = $warrantyRaw . ' warranty';
        }

        // Warning Signs y Tips desde config (con fallback)
        $warningSigns = $service['warning_signs'] ?? [
            ['sign' => 'Water Around Base', 'description' => 'Water pooling around the toilet base indicates a failed wax ring seal', 'urgency' => 'High'],
            ['sign' => 'Sewer Odors',      'description' => 'Bad smells from the bathroom suggest the seal is not blocking gases',      'urgency' => 'High'],
            ['sign' => 'Rocking Toilet',   'description' => 'A toilet that moves may have seal or flange issues',                      'urgency' => 'Medium'],
            ['sign' => 'Stained Flooring', 'description' => 'Discoloration around the toilet base from water damage',                  'urgency' => 'Medium'],
        ];

        $tips = $service['maintenance_tips'] ?? [
            'Check around the base monthly for signs of water or movement',
            'Use mild cleaners; avoid harsh chemicals that can damage seals',
            'Do not over-tighten toilet bolts to prevent cracking or flange damage',
        ];

        $image = $service['image'] ?? 'https://images.pexels.com/photos/6195125/pexels-photo-6195125.jpeg?auto=compress&cs=tinysrgb&w=800';

        // Badge por urgencia
        $urgencyClass = function ($urgency) {
            return match (\Illuminate\Support\Str::of($urgency)->lower()->value()) {
                'high'   => 'bg-red-100 text-red-700',
                'medium' => 'bg-yellow-100 text-yellow-700',
                'low'    => 'bg-green-100 text-green-700',
                default  => 'bg-gray-100 text-gray-700',
            };
        };
    @endphp

    {{-- Hero --}}
    <section class="pt-20 lg:pt-24  section-padding bg-gradient-to-br from-purple-50 to-white">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                        Toilet Repair
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-bold text-text mb-6">
                        {{ $service['title'] ?? 'Toilet Seal Change' }}
                    </h1>

                    <p class="text-xl text-gray-600 mb-8">
                        {{ $service['shortDescription'] ?? ($service['fullDescription'] ?? 'Expert toilet seal and wax ring replacement to prevent leaks, odors, and water damage. We ensure proper sealing and stable toilet installation.') }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <button @click="scrollToBooking" type="button" class="btn-primary">
                            Book Seal Replacement
                        </button>
                        <a href="tel:{{ $phoneHref }}" class="btn-secondary flex items-center justify-center gap-2">
                            <x-heroicon-o-phone class="w-5 h-5" />
                            <span>{{ $phoneDisplay }}</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-6 text-center">
                        <div>
                            <div class="text-2xl font-bold text-primary">{{ $service['price'] ?? '$110' }}</div>
                            <div class="text-sm text-gray-600">Starting Price</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-primary">{{ $durationNum ?? '60-90' }}</div>
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
                        src="{{ $image }}"
                        alt="{{ $service['title'] ?? 'Toilet Seal Change' }}"
                        class="rounded-2xl shadow-xl w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Warning Signs --}}
    <section class="py-20 bg-white">
        <div class="container-width">
            <h2 class="text-3xl font-bold text-text text-center mb-12">Warning Signs You Need Seal Replacement</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($warningSigns as $warning)
                    @php $badge = $urgencyClass($warning['urgency'] ?? ''); @endphp
                    <div class="card">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-text">{{ $warning['sign'] ?? '' }}</h3>
                            <span class="px-3 py-1 rounded-full text-sm font-medium {{ $badge }}">
                                {{ $warning['urgency'] ?? '—' }} Priority
                            </span>
                        </div>
                        <p class="text-gray-600 mb-4">{{ $warning['description'] ?? '' }}</p>
                        <button type="button" @click="scrollToBooking" class="text-primary hover:text-primary/80 font-medium">
                            Schedule Repair →
                        </button>
                    </div>
                @endforeach
            </div>

            {{-- Emergency Notice --}}
            <div class="mt-12 bg-red-50 border border-red-200 rounded-lg p-6">
                <div class="flex items-start gap-3">
                    <x-heroicon-o-exclamation-triangle class="w-6 h-6 text-red-600 flex-shrink-0 mt-1" />
                    <div>
                        <h3 class="text-lg font-semibold text-red-800 mb-2">Don't Ignore These Signs!</h3>
                        <p class="text-red-700">
                            A failed toilet seal can cause significant water damage to your flooring and subfloor.
                            The longer you wait, the more expensive the repairs become. Contact us immediately
                            if you notice any of these warning signs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Service Process + What's Included --}}
    <section class="py-10 bg-background">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl font-bold text-text mb-6">Our Replacement Process</h2>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">1</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Inspection &amp; Assessment</h4>
                                <p class="text-gray-600">We examine the toilet, flange, and surrounding area for damage.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">2</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Toilet Removal</h4>
                                <p class="text-gray-600">Careful removal of the toilet and old wax ring.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">3</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Flange Repair</h4>
                                <p class="text-gray-600">Inspection and repair of the toilet flange if needed.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">4</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">New Seal Installation</h4>
                                <p class="text-gray-600">Professional installation of new wax ring and toilet.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">5</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Testing &amp; Cleanup</h4>
                                <p class="text-gray-600">Thorough testing for leaks and complete cleanup.</p>
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
                        <h3 class="text-xl font-semibold text-text mb-3">Why Professional Installation Matters</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li>• Proper wax ring selection and placement</li>
                            <li>• Flange inspection and repair expertise</li>
                            <li>• Correct toilet alignment and leveling</li>
                            <li>• Prevention of future leaks and damage</li>
                            <li>• Warranty protection on workmanship</li>
                            <li>• Safe disposal of old materials</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Maintenance Tips --}}
    <section class="py-10 bg-white">
        <div class="container-width">
            <h2 class="text-3xl font-bold text-text text-center mb-12">Toilet Maintenance Tips</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($tips as $i => $tip)
                    <div class="text-center">
                        <div class="w-16 h-16 {{ ['bg-green-100','bg-blue-100','bg-purple-100'][$i % 3] }} rounded-lg flex items-center justify-center mx-auto mb-4">
                            {{-- Emoticones simples alternados --}}
                            <span class="{{ ['text-green-600','text-blue-600','text-purple-600'][$i % 3] }} text-2xl">
                                {{ ['👀','🧽','⚠️'][$i % 3] }}
                            </span>
                        </div>
                        <h3 class="text-lg font-semibold text-text mb-3">
                            {{ ['Regular Inspection','Gentle Cleaning','Avoid Over-tightening'][$i % 3] }}
                        </h3>
                        <p class="text-gray-600">{{ $tip }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-10 bg-gradient-to-r from-purple-500 to-purple-600 text-white">
        <div class="container-width text-center">
            <h2 class="text-3xl font-bold mb-4">Don't Let a Small Leak Become a Big Problem</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                Toilet seal problems only get worse over time. Protect your home from water damage
                with professional seal replacement service.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button @click="scrollToBooking" type="button"
                        class="inline-flex items-center bg-white text-purple-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    <x-heroicon-o-calendar-days class="w-5 h-5 mr-2" />
                    Schedule Service
                </button>
                <a href="tel:{{ $phoneHref }}"
                   class="inline-flex items-center bg-purple-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-purple-800 transition-colors border-2 border-white/20">
                    <x-heroicon-o-phone class="w-5 h-5 mr-2" />
                    Get Quote
                </a>
            </div>
        </div>
    </section>
</div>
