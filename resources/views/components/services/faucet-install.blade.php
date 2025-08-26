@props(['service'])

<div
    x-data="{
        scrollToBooking() {
            const el = document.getElementById('booking');
            if (!el) return;
            el.scrollIntoView({ behavior: 'smooth' });
        }
    }"
    class=" bg-background pb-24"
>
    @php
        // Teléfono centralizado (mueve a config/app.php si lo deseas)
        $phoneDisplay = config('app.support_phone_display', '(404) 555-1234');
        $phoneHref    = config('app.support_phone_href', '+14045551234');

        // Duración (ej: '60-120 minutes' -> '60-120')
        $durationRaw  = $service['duration'] ?? null;
        $durationNum  = $durationRaw ? \Illuminate\Support\Str::of($durationRaw)->before(' ') : null;

        // Garantía (ej: '1 year' -> '1' y 'Year')
        $warrantyRaw  = $service['warranty'] ?? null;
        $wNum         = $warrantyRaw ? \Illuminate\Support\Str::of($warrantyRaw)->before(' ') : null;
        $wLabel       = $warrantyRaw ? \Illuminate\Support\Str::of($warrantyRaw)->after(' ') : null;

        // Tipos de grifos (puedes mover a config si prefieres data-driven)
        $faucetTypes = [
            ['type' => 'Single Handle',       'description' => 'Modern, easy-to-use design with temperature and flow control in one handle', 'price' => 'Starting at $150'],
            ['type' => 'Double Handle',       'description' => 'Traditional style with separate hot and cold water controls',                 'price' => 'Starting at $160'],
            ['type' => 'Pull-Out/Pull-Down',  'description' => 'Kitchen faucets with extendable spray heads for versatile use',              'price' => 'Starting at $180'],
            ['type' => 'Touchless',           'description' => 'Motion-sensor activated faucets for hands-free operation',                   'price' => 'Starting at $220'],
        ];

        // Features: partimos de includes y añadimos 'warranty' si no está listado explícitamente
        $features = $service['includes'] ?? [];
        if ($warrantyRaw && !collect($features)->contains(function($f) use ($warrantyRaw) {
            return \Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($f), 'warranty');
        })) {
            $features[] = $warrantyRaw . ' warranty';
        }
    @endphp

    {{-- Service Hero --}}
    <section class="pt-20 lg:pt-24 pb-20 section-padding bg-gradient-to-br from-blue-50 to-white">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                        Installation Services
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-bold text-text mb-6">
                        {{ $service['title'] ?? 'Faucet Installation' }}
                    </h1>

                    <p class="text-xl text-gray-600 mb-8">
                        {{ $service['shortDescription'] ?? ($service['fullDescription'] ?? 'Expert faucet installation for kitchen and bathroom upgrades. We handle all types with precision and comprehensive testing.') }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <button @click="scrollToBooking" type="button" class="btn-primary">
                            Book Installation
                        </button>
                        <a href="tel:{{ $phoneHref }}" class="btn-secondary flex items-center justify-center space-x-2">
                            <x-heroicon-o-phone class="w-5 h-5" />
                            <span>{{ $phoneDisplay }}</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-6 text-center">
                        <div>
                            <div class="text-2xl font-bold text-primary">
                                {{ $service['price'] ?? '$150' }}
                            </div>
                            <div class="text-sm text-gray-600">Starting Price</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-primary">
                                {{ $durationNum ?? '60-120' }}
                            </div>
                            <div class="text-sm text-gray-600">Minutes</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-primary">
                                {{ $wNum ?? '1' }}
                            </div>
                            <div class="text-sm text-gray-600">
                                {{ $wLabel ? \Illuminate\Support\Str::title($wLabel) : 'Year' }} Warranty
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <img
                        src="{{ $service['image'] ?? 'https://images.pexels.com/photos/6195125/pexels-photo-6195125.jpeg?auto=compress&cs=tinysrgb&w=800' }}"
                        alt="{{ $service['title'] ?? 'Faucet Installation' }}"
                        class="rounded-2xl shadow-xl w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Faucet Types --}}
    <section class="section-padding bg-white">
        <div class="container-width">
            <h2 class="text-3xl font-bold text-text text-center mb-12">Faucet Types We Install</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($faucetTypes as $ft)
                    <div class="card">
                        <div class="flex items-center space-x-3 mb-4">
                            <x-heroicon-o-wrench-screwdriver class="w-8 h-8 text-primary" />
                            <h3 class="text-xl font-semibold text-text">{{ $ft['type'] }}</h3>
                        </div>
                        <p class="text-gray-600 mb-4">{{ $ft['description'] }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-bold text-primary">{{ $ft['price'] }}</span>
                            <button type="button" @click="scrollToBooking" class="text-primary hover:text-primary/80 font-medium">
                                Book Installation →
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Service Details --}}
    <section class="section-padding bg-background">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-16">
                {{-- Installation Process --}}
                <div>
                    <h2 class="text-3xl font-bold text-text mb-6">Installation Process</h2>
                    <div class="space-y-6">
                        <div class="flex space-x-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">1</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Assessment &amp; Preparation</h4>
                                <p class="text-gray-600">We assess your current setup and prepare the installation area.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">2</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Old Faucet Removal</h4>
                                <p class="text-gray-600">Careful removal of your existing faucet and cleanup.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">3</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">New Faucet Installation</h4>
                                <p class="text-gray-600">Professional installation with proper connections and sealing.</p>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">4</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Testing &amp; Demonstration</h4>
                                <p class="text-gray-600">Thorough testing and operation demonstration.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- What's Included --}}
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

                    <div class="p-6 bg-green-50 rounded-lg">
                        <h3 class="text-xl font-semibold text-text mb-3">Why Choose Professional Installation?</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li>• Proper water line connections prevent leaks</li>
                            <li>• Correct mounting ensures long-term stability</li>
                            <li>• Professional tools for precise installation</li>
                            <li>• Warranty protection on workmanship</li>
                            <li>• Code compliance and safety assurance</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="section-padding bg-gradient-to-r from-blue-500 to-blue-600 text-white">
        <div class="container-width text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Upgrade Your Faucet?</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                Transform your kitchen or bathroom with a professionally installed faucet.
                Quality installation ensures years of reliable performance.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button @click="scrollToBooking" type="button"
                        class="inline-flex items-center bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    <x-heroicon-o-calendar-days class="w-5 h-5 mr-2" />
                    Schedule Installation
                </button>
                <a href="tel:{{ $phoneHref }}"
                   class="inline-flex items-center bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-blue-800 transition-colors border-2 border-white/20">
                    <x-heroicon-o-phone class="w-5 h-5 mr-2" />
                    Get Quote
                </a>
            </div>
        </div>
    </section>
</div>

