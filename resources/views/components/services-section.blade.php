@props([
    // Si no te pasan $services desde el controlador, caemos al catálogo de config
    'services' => collect(config('servicios.services'))->map(function ($s) {
        return [
            'id'          => $s['id'],
            'title'       => $s['title'],
            'slug'        => $s['slug'] ?? null,
            'description' => $s['shortDescription'] ?? $s['fullDescription'] ?? '',
            'price'       => $s['price'] ?? null,
            'icon'        => $s['icon'] ?? 'wrench-screwdriver',
            'image'       => $s['image'] ?? null,
            'category'    => $s['category'] ?? null,
        ];
    })->values()->all(),
])

@php
    // Mapeo de slugs de iconos (config) a componentes Blade Heroicons
    // Requiere: blade-ui-kit/blade-heroicons (o similar)
    $iconMap = [
        'wrench-screwdriver' => 'heroicon-o-wrench-screwdriver',
        'cog'                => 'heroicon-o-cog-6-tooth',
        'shield-check'       => 'heroicon-o-shield-check',
        // fallback si no hay match
        '_default'           => 'heroicon-o-wrench-screwdriver',
    ];

    // Teléfono centralizado (puedes moverlo a config/app.php)
    $phoneDisplay = config('app.support_phone_display', '(404) 555-1234');
    $phoneHref    = config('app.support_phone_href', '+14045551234');
@endphp

<section id="services" class="pt-0 pb-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl sm:text-5xl font-extrabold mb-6">
                <span class="text-text bg-clip-text ">
                    Professional Plumbing
                </span>
            </h2>
            <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                From <span class="font-semibold text-blue-500">routine maintenance</span> to
                <span class="font-semibold text-blue-700">emergency repairs</span>, our licensed plumbers
                provide reliable service across Atlanta.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
                @php
                    $iconComponent = $iconMap[$service['icon']] ?? $iconMap['_default'];
                @endphp

                <div class="bg-white rounded-xl p-6 group hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl border border-gray-100 flex flex-col">
                    <div class="flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl mb-6 mx-auto">
                        <x-dynamic-component :component="$iconComponent" class="w-10 h-10 text-primary" />
                    </div>

                    <h3 class="text-2xl font-bold text-gray-900 mb-3 text-center">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 mb-6 text-center min-h-[72px]">
                        {{ $service['description'] }}
                    </p>

                    <div class="mt-auto">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-lg font-bold text-primary">{{ $service['price'] }}</span>

                            {{-- Enlace a la página de detalle del servicio --}}
                            <a href="{{ route('services.show', $service['slug']) }}"
                               class="text-primary hover:text-blue-800 font-medium transition-colors">
                                Learn More &rarr;
                            </a>
                        </div>

                        {{-- CTA principal: agenda directo y aterriza en #booking del detalle --}}
                        <a href="{{ route('services.show', $service['id']) }}#booking"
                           class="block w-full text-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg font-bold hover:from-blue-600 hover:to-blue-800 transition-all">
                            Schedule Now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-16 bg-gradient-to-br from-orange-400 to-red-400 rounded-2xl p-8 text-center text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
            <x-heroicon-s-exclamation-triangle class="w-16 h-16 mx-auto mb-4 text-orange-100" />
            <h3 class="text-3xl font-bold mb-3 text-white drop-shadow">Emergency Plumbing Services</h3>
            <p class="text-xl mb-6 text-orange-50 font-medium">
                Available 24/7 for urgent plumbing emergencies in Atlanta
            </p>
            <a href="tel:{{ $phoneHref }}"
               class="inline-flex items-center bg-white text-orange-600 px-10 py-3 rounded-lg font-bold hover:bg-gray-50 transition-all duration-200 shadow-md hover:scale-[1.02]">
                <x-heroicon-o-phone class="w-6 h-6 mr-3" />
                CALL NOW: {{ $phoneDisplay }}
            </a>
        </div>
    </div>
</section>
