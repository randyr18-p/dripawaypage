@props(['service'])

{{-- Alpine sólo para el scroll al bloque de booking --}}
<div x-data="{
        scrollToBooking() {
            const el = document.getElementById('booking');
            if (!el) return;
            el.scrollIntoView({ behavior: 'smooth' });
        }
    }"
    class=" bg-background pb-24">

    {{-- Service Hero --}}
    <section class="pt-20 lg:pt-28 pb-24  bg-gradient-to-br from-primary/10 to-white ">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    {{-- Etiqueta de categoría (opcional) --}}
                    @if(!empty($service['category']))
                        <div class="inline-block bg-primary/10 text-primary px-4 py-2 rounded-full text-sm font-medium mb-4">
                            {{ \Illuminate\Support\Str::of($service['category'])->headline() }} Services
                        </div>
                    @endif

                    {{-- Título específico del servicio --}}
                    <h1 class="text-4xl sm:text-5xl font-bold text-text mb-6">
                        {{ $service['title'] ?? 'Service' }}
                    </h1>

                    {{-- Copy hero (usa shortDescription y cae en fullDescription si no existe) --}}
                    <p class="text-xl text-gray-600 mb-8">
                        {{ $service['shortDescription'] ?? ($service['fullDescription'] ?? '') }}
                    </p>

                    {{-- CTAs --}}
                    @php
                        // Centraliza el teléfono si ya lo tienes en config; si no, usa fallback:
                        $phoneDisplay = config('app.support_phone_display', '(404) 555-1234');
                        $phoneHref    = config('app.support_phone_href', '+14045551234');
                    @endphp

                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <button @click="scrollToBooking" type="button" class="btn-primary">
                            Book {{ $service['title'] ?? 'Service' }}
                        </button>
                        <a href="tel:{{ $phoneHref }}" class="btn-secondary flex items-center justify-center space-x-2">
                            <x-heroicon-o-phone class="w-5 h-5" />
                            <span>{{ $phoneDisplay }}</span>
                        </a>
                    </div>

                    {{-- Métricas: precio, duración, garantía --}}
                    <div class="grid grid-cols-3 gap-6 text-center">
                        <div>
                            <div class="text-2xl font-bold text-primary">
                                {{ $service['price'] ?? '—' }}
                            </div>
                            <div class="text-sm text-gray-600">Starting Price</div>
                        </div>

                        <div>
                            <div class="text-2xl font-bold text-primary">
                                {{ $service['duration'] ?? '—' }}
                            </div>
                            <div class="text-sm text-gray-600">Minutes</div>
                        </div>

                        @php
                            // Si warranty viene como "90 days" lo separamos para presentarlo como en el diseño.
                            $warrantyRaw = $service['warranty'] ?? null;
                            $wNumber = $warrantyRaw ? \Illuminate\Support\Str::of($warrantyRaw)->before(' ') : null;
                            $wLabel  = $warrantyRaw ? \Illuminate\Support\Str::of($warrantyRaw)->after(' ')  : null;
                        @endphp
                        <div>
                            <div class="text-2xl font-bold text-primary">
                                {{ $warrantyRaw ? $wNumber : '—' }}
                            </div>
                            <div class="text-sm text-gray-600">
                                {{ $warrantyRaw ? \Illuminate\Support\Str::of($wLabel)->title() : 'Warranty' }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Imagen hero específica del servicio --}}
                <div class="relative">
                    <img
                        src="{{ $service['image'] ?? 'https://images.pexels.com/photos/8293726/pexels-photo-8293726.jpeg?auto=compress&cs=tinysrgb&w=800' }}"
                        alt="{{ $service['title'] ?? 'Service image' }}"
                        class="rounded-2xl shadow-xl w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Service Details --}}
    <section class="py-10 bg-white">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-16">
                {{-- What's Included --}}
                <div>
                    <h2 class="text-3xl font-bold text-text mb-6">What's Included</h2>

                    <div class="space-y-4">
                        @foreach(($service['includes'] ?? []) as $feature)
                            <div class="flex items-center space-x-3">
                                <x-heroicon-o-check-circle class="w-6 h-6 text-green-500 flex-shrink-0" />
                                <span class="text-gray-700">{{ $feature }}</span>
                            </div>
                        @endforeach

                        @if(!empty($service['warranty']))
                            <div class="flex items-center space-x-3">
                                <x-heroicon-o-shield-check class="w-6 h-6 text-green-500 flex-shrink-0" />
                                <span class="text-gray-700">{{ $service['warranty'] }} warranty</span>
                            </div>
                        @endif
                    </div>

                    {{-- Emergency Box — específico del offering si aplica --}}
                    <div class="mt-8 p-6 bg-primary/5 rounded-lg">
                        <h3 class="text-xl font-semibold text-text mb-3">Emergency Service Available</h3>
                        <p class="text-gray-600 mb-4">
                            Severe drain blockages can cause water damage and health hazards.
                            Our emergency team is available 24/7 for urgent drain issues.
                        </p>
                        <a href="tel:{{ $phoneHref }}" class="text-primary font-semibold hover:text-primary/80">
                            Call Emergency Line: {{ $phoneDisplay }}
                        </a>
                    </div>
                </div>

                {{-- Our Process — libre para personalizar 100% a este servicio --}}
                @php
                    // Puedes mover esto a config('servicios') si quieres que sea data-driven por servicio.
                    $processSteps = [
                        ['step' => 1, 'title' => 'Inspection', 'description' => 'We assess the drain and identify the type and location of the blockage.'],
                        ['step' => 2, 'title' => 'Cleaning',  'description' => 'Using professional equipment, we clear the blockage completely.'],
                        ['step' => 3, 'title' => 'Testing',   'description' => 'We test water flow to ensure the drain is working properly.'],
                        ['step' => 4, 'title' => 'Prevention','description' => 'We provide tips to help prevent future blockages.'],
                    ];
                @endphp

                <div>
                    <h2 class="text-3xl font-bold text-text mb-6">Our Process</h2>
                    <div class="space-y-6">
                        @foreach($processSteps as $step)
                            <div class="flex space-x-4">
                                <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">
                                    {{ $step['step'] }}
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-text mb-2">{{ $step['title'] }}</h4>
                                    <p class="text-gray-600">{{ $step['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Common Issues — 100% personalizable para este servicio --}}
    <section class=" bg-background py-10">
        <div class="container-width">
            <h2 class="text-3xl font-bold text-text text-center mb-12">Common Drain Issues We Fix</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="card text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <span class="text-red-600 text-2xl">🚿</span>
                    </div>
                    <h3 class="text-lg font-semibold text-text mb-3">Slow Draining</h3>
                    <p class="text-gray-600">Water drains slowly due to partial blockages from hair, soap, or debris buildup.</p>
                </div>

                <div class="card text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <span class="text-yellow-600 text-2xl">🍽️</span>
                    </div>
                    <h3 class="text-lg font-semibold text-text mb-3">Kitchen Sink Clogs</h3>
                    <p class="text-gray-600">Grease, food particles, and soap scum create stubborn kitchen drain blockages.</p>
                </div>

                <div class="card text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <span class="text-blue-600 text-2xl">🚽</span>
                    </div>
                    <h3 class="text-lg font-semibold text-text mb-3">Main Line Blockages</h3>
                    <p class="text-gray-600">Tree roots, debris, or pipe damage causing multiple drains to back up.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-10 bg-gradient-to-r from-primary to-accent text-white">
        <div class="container-width text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Clear Your Drains?</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                Don't let clogged drains disrupt your daily routine. Our professional drain cleaning
                service will have your drains flowing like new.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button @click="scrollToBooking"
                        type="button"
                        class="inline-flex items-center bg-white text-primary px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    <x-heroicon-o-calendar-days class="w-5 h-5 mr-2" />
                    Schedule Service
                </button>
                <a href="tel:{{ $phoneHref }}"
                   class="inline-flex items-center bg-primary-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-primary-800 transition-colors border-2 border-white/20">
                    <x-heroicon-o-phone class="w-5 h-5 mr-2" />
                    Call Now
                </a>
            </div>
        </div>
    </section>
</div>
