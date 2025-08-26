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
        // Teléfono centralizado
        $phoneDisplay = config('app.support_phone_display', '(404) 555-1234');
        $phoneHref    = config('app.support_phone_href', '+14045551234');

        // Duración (ej. '90-120 minutes' -> '90-120')
        $durationRaw = $service['duration'] ?? null;
        $durationNum = $durationRaw ? \Illuminate\Support\Str::of($durationRaw)->before(' ') : null;

        // Garantía
        $warrantyRaw = $service['warranty'] ?? null;
        $wNum        = $warrantyRaw ? \Illuminate\Support\Str::of($warrantyRaw)->before(' ') : null;
        $wLabel      = $warrantyRaw ? \Illuminate\Support\Str::of($warrantyRaw)->after(' ') : null;

        // Features base + warranty si no está listada
        $features = $service['includes'] ?? [];
        if ($warrantyRaw && !collect($features)->contains(fn($f) => \Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($f), 'warranty'))) {
            $features[] = $warrantyRaw . ' warranty';
        }

        // Data-driven
        $disposalTypes = $service['disposal_types'] ?? [];
        $maintenanceTips = $service['maintenance_tips'] ?? [];

        // Imagen
        $image = $service['image'] ?? 'https://images.pexels.com/photos/8293726/pexels-photo-8293726.jpeg?auto=compress&cs=tinysrgb&w=800';
    @endphp

    {{-- Service Hero --}}
    <section class="pt-20 lg:pt-24 section-padding bg-gradient-to-br from-orange-50 to-white">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block bg-orange-100 text-orange-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
                        Kitchen Installation
                    </div>

                    <h1 class="text-4xl sm:text-5xl font-bold text-text mb-6">
                        {{ $service['title'] ?? 'Garbage Disposal Installation' }}
                    </h1>

                    <p class="text-xl text-gray-600 mb-8">
                        {{ $service['shortDescription'] ?? ($service['fullDescription'] ?? 'Professional garbage disposal installation with electrical and plumbing connections. We install all major brands and provide operation instructions for optimal performance.') }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <button @click="scrollToBooking" type="button" class="btn-primary">
                            Book Installation
                        </button>
                        <a href="tel:{{ $phoneHref }}" class="btn-secondary flex items-center justify-center gap-2">
                            <x-heroicon-o-phone class="w-5 h-5" />
                            <span>{{ $phoneDisplay }}</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-6 text-center">
                        <div>
                            <div class="text-2xl font-bold text-primary">{{ $service['price'] ?? '$175' }}</div>
                            <div class="text-sm text-gray-600">Starting Price</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-primary">{{ $durationNum ?? '90-120' }}</div>
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
                        alt="{{ $service['title'] ?? 'Garbage Disposal Installation' }}"
                        class="rounded-2xl shadow-xl w-full h-96 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Disposal Types --}}
    <section class="py-20 bg-white">
        <div class="container-width">
            <h2 class="text-3xl font-bold text-text text-center mb-12">Choose the Right Disposal for Your Home</h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @foreach($disposalTypes as $model)
                    <div class="card">
                        <div class="text-center mb-6">
                            <x-heroicon-o-wrench-screwdriver class="w-12 h-12 text-primary mx-auto mb-4" />
                            <h3 class="text-xl font-semibold text-text mb-2">{{ $model['type'] ?? '' }}</h3>
                            <p class="text-gray-600 mb-4">{{ $model['description'] ?? '' }}</p>
                            <div class="text-2xl font-bold text-primary">{{ $model['price'] ?? '' }}</div>
                        </div>

                        @if(!empty($model['features']))
                            <div class="space-y-2 mb-6">
                                @foreach($model['features'] as $f)
                                    <div class="flex items-center gap-2">
                                        <x-heroicon-o-check-circle class="w-4 h-4 text-green-500 flex-shrink-0" />
                                        <span class="text-sm text-gray-600">{{ $f }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <button type="button" @click="scrollToBooking" class="btn-primary w-full">
                            Install This Model
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Installation Process + What's Included --}}
    <section class="py-20 bg-background">
        <div class="container-width">
            <div class="grid lg:grid-cols-2 gap-16">
                <div>
                    <h2 class="text-3xl font-bold text-text mb-6">Professional Installation Process</h2>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold">1</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Assessment &amp; Preparation</h4>
                                <p class="text-gray-600">We evaluate your sink setup and electrical requirements.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold">2</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Electrical Connection</h4>
                                <p class="text-gray-600">Safe electrical wiring and switch installation if needed.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold">3</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Mounting &amp; Plumbing</h4>
                                <p class="text-gray-600">Secure mounting and proper plumbing connections.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center font-bold">4</div>
                            <div>
                                <h4 class="text-lg font-semibold text-text mb-2">Testing &amp; Training</h4>
                                <p class="text-gray-600">Complete testing and operation demonstration.</p>
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

                    <div class="p-6 bg-yellow-50 rounded-lg">
                        <div class="flex items-center gap-3 mb-3">
                            <x-heroicon-o-bolt class="w-6 h-6 text-yellow-600" />
                            <h3 class="text-xl font-semibold text-text">Electrical Requirements</h3>
                        </div>
                        <p class="text-gray-600 mb-3">
                            Garbage disposals require a dedicated electrical circuit. Our licensed electricians
                            can install the necessary wiring and switch if not already present.
                        </p>
                        <p class="text-sm text-gray-500">
                            Additional electrical work may incur extra charges — we'll provide a quote upfront.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Maintenance Tips + What NOT to Put Down --}}
    <section class="py-20 bg-white">
        <div class="container-width">
            <h2 class="text-3xl font-bold text-text text-center mb-12">Keep Your Disposal Running Smoothly</h2>

            @if(!empty($maintenanceTips))
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($maintenanceTips as $tip)
                        <div class="text-center">
                            <div class="w-16 h-16 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <span class="text-primary text-2xl">💡</span>
                            </div>
                            <h3 class="text-lg font-semibold text-text mb-3">{{ $tip['tip'] ?? '' }}</h3>
                            <p class="text-gray-600">{{ $tip['description'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- What NOT to Put Down (estático, puedes moverlo a config si lo deseas) --}}
            <div class="mt-16 bg-red-50 rounded-lg p-8">
                <h3 class="text-2xl font-bold text-text text-center mb-8">Never Put These Down Your Disposal</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                    <div class="p-4">
                        <span class="text-3xl mb-2 block">🥩</span>
                        <p class="text-sm font-medium text-gray-700">Bones &amp; Meat</p>
                    </div>
                    <div class="p-4">
                        <span class="text-3xl mb-2 block">🧅</span>
                        <p class="text-sm font-medium text-gray-700">Onion Skins</p>
                    </div>
                    <div class="p-4">
                        <span class="text-3xl mb-2 block">🥔</span>
                        <p class="text-sm font-medium text-gray-700">Potato Peels</p>
                    </div>
                    <div class="p-4">
                        <span class="text-3xl mb-2 block">🫒</span>
                        <p class="text-sm font-medium text-gray-700">Grease &amp; Oil</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-10 bg-gradient-to-r from-orange-500 to-orange-600 text-white">
        <div class="container-width text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Upgrade Your Kitchen?</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                A garbage disposal makes kitchen cleanup faster and more convenient.
                Let our experts handle the installation for safe, reliable operation.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button @click="scrollToBooking" type="button"
                        class="inline-flex items-center bg-white text-orange-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    <x-heroicon-o-calendar-days class="w-5 h-5 mr-2" />
                    Schedule Installation
                </button>
                <a href="tel:{{ $phoneHref }}"
                   class="inline-flex items-center bg-orange-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-orange-800 transition-colors border-2 border-white/20">
                    <x-heroicon-o-phone class="w-5 h-5 mr-2" />
                    Get Quote
                </a>
            </div>
        </div>
    </section>
</div>
