{{-- resources/views/partials/footer.blade.php --}}
@php
    use Illuminate\Support\Arr;

    // Teléfono centralizado (opcional)
    $phoneDisplay = config('app.support_phone_display', '(404) 555-1234');
    $phoneHref    = config('app.support_phone_href', '+14045551234');

    /**
     * 1) Our Services (enlaces consistentes con el navbar)
     *    - "All Services" primero
     *    - Luego cada servicio desde config('servicios.services') con slug/id real
     */
    $servicesFromConfig = collect(config('servicios.services', []))
        ->map(function ($s) {
            return [
                'name' => $s['title'] ?? 'Service',
                'href' => route('services.show', ['slug' => $s['slug'] ?? $s['id'] ?? '']),
            ];
        })
        ->values()
        ->all();

    $servicesLinks = array_merge(
        [
            ['name' => 'All Services', 'href' => route('services.index')],
        ],
        $servicesFromConfig
    );

    // Si desde el layout/parent ya te pasan $services, lo respetamos; si no, usamos los construidos
    $services = (isset($services) && !empty($services)) ? $services : $servicesLinks;

    /**
     * 2) Quick Links alineados a rutas reales
     *    - Booking aterriza al #booking de /services (existe en tu services.index)
     */
    $defaultQuickLinks = [
        ['name' => 'Home',               'href' => route('home')],
        ['name' => 'Services',           'href' => route('services.index')],
        ['name' => 'Booking',            'href' => route('services.index') . '#booking'],
        ['name' => 'About',              'href' => route('about')],
        ['name' => 'FAQs',               'href' => route('faqs')],
        ['name' => 'Contact',            'href' => route('contact')],
        ['name' => 'Emergency Service',  'href' => 'tel:' . $phoneHref],
    ];
    $quickLinks = $quickLinks ?? $defaultQuickLinks;

    /**
     * 3) Service Areas (fallback simple)
     */
    $serviceAreas = $serviceAreas ?? [
        'Buckhead',
        'Midtown',
        'Virginia Highland',
        'Decatur',
        'East Atlanta',
        'Inman Park',
    ];
@endphp

<footer class="bg-primary-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Brand / Contact --}}
            <div>
                <h3 class="text-2xl font-bold text-gradient mb-4">DripAway Solutions</h3>
                <p class="text-gray-300 mb-6">
                    Professional plumbing services in Atlanta with transparent pricing and reliable solutions.
                    Clear flow. Clear price.
                </p>

                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-s-phone class="w-5 h-5 text-primary" />
                        <a href="tel:{{ $phoneHref }}" class="hover:text-primary transition-colors">
                            {{ $phoneDisplay }}
                        </a>
                    </div>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-s-envelope class="w-5 h-5 text-primary" />
                        <a href="mailto:info@dripawaysolutions.com" class="hover:text-primary transition-colors">
                            info@dripawaysolutions.com
                        </a>
                    </div>
                    <div class="flex items-start space-x-3">
                        <x-heroicon-s-map-pin class="w-5 h-5 text-primary mt-1" />
                        <span class="text-gray-300">
                            Serving Atlanta &amp; Metro Area
                        </span>
                    </div>
                </div>
            </div>

            {{-- Our Services (enlaces reales) --}}
            <div>
                <h4 class="text-lg font-semibold mb-4">Our Services</h4>
                <ul class="space-y-2">
                    @foreach ($services as $srv)
                        @php
                            // Soportamos tanto strings como arrays; si es string, intentamos matchear en config
                            if (is_string($srv)) {
                                $match = collect(config('servicios.services', []))->first(
                                    fn($s) => strcasecmp($s['title'] ?? '', $srv) === 0
                                );
                                $name = $srv;
                                $href = $match
                                    ? route('services.show', ['slug' => $match['slug'] ?? $match['id'] ?? ''])
                                    : (strtolower($srv) === 'all services'
                                        ? route('services.index')
                                        : route('services.index')); // fallback seguro
                            } else {
                                $name = $srv['name'] ?? $srv['title'] ?? 'Service';
                                $href = $srv['href'] ?? ($srv['slug'] ?? false
                                        ? route('services.show', ['slug' => $srv['slug']])
                                        : route('services.index'));
                            }
                        @endphp
                        <li>
                            <a href="{{ $href }}" class="text-gray-300 hover:text-primary transition-colors">
                                {{ is_string($name) && str_contains($name, '-') ? ucwords(str_replace('-', ' ', $name)) : $name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Quick Links (rutas reales) --}}
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    @foreach ($quickLinks as $lnk)
                        @php
                            $href = is_array($lnk) ? ($lnk['href'] ?? '#') : (is_object($lnk) ? data_get($lnk, 'href', '#') : '#');
                            $name = is_array($lnk) ? ($lnk['name'] ?? 'Link') : (is_object($lnk) ? data_get($lnk, 'name', 'Link') : (string) $lnk);
                        @endphp
                        <li>
                            <a href="{{ $href }}" class="text-gray-300 hover:text-primary transition-colors">
                                {{ $name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Service Areas --}}
            <div>
                <h4 class="text-lg font-semibold mb-4">Service Areas</h4>
                <ul class="space-y-2">
                    @foreach ($serviceAreas as $area)
                        @php
                            $areaText = is_array($area) ? ($area['name'] ?? $area[0] ?? 'Area')
                                        : (is_object($area) ? (data_get($area, 'name') ?? (string) $area)
                                        : (string) $area);
                        @endphp
                        <li>
                            <span class="text-gray-300">{{ $areaText }}, Atlanta</span>
                        </li>
                    @endforeach
                </ul>
                <p class="text-sm text-gray-400 mt-4">
                    And surrounding metro areas
                </p>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-12 pt-8">
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <div class="text-gray-400 text-sm mb-4 sm:mb-0">
                    © {{ now()->year }} DripAway Solutions. All rights reserved. Licensed Master Plumber.
                </div>

                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-primary transition-colors">
                        Privacy Policy
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary transition-colors">
                        Terms of Service
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary transition-colors">
                        Sitemap
                    </a>
                </div>
            </div>

            <div class="mt-6 text-center">
                <div class="inline-flex items-center bg-red-600 text-white px-4 py-2 rounded-lg">
                    <span class="font-semibold">24/7 Emergency Service Available</span>
                    <span class="ml-2">•</span>
                    <a href="tel:{{ $phoneHref }}" class="ml-2 underline hover:no-underline">
                        Call {{ $phoneDisplay }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
