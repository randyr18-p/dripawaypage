{{-- resources/views/partials/footer.blade.php --}}
@php
    // Defaults a prueba de balas
    $services = $services ?? [
        'Drain Unclog',
        'P-Trap Replacement',
        'Faucet Install',
        'Leak Repair',
        'Toilet Seal Change',
        'Garbage Disposal Install',
    ];

    $quickLinks = $quickLinks ?? [
        ['name' => 'About Us', 'href' => '#about'],
        ['name' => 'Services', 'href' => '#services'],
        ['name' => 'Booking', 'href' => '#booking'],
        ['name' => 'Reviews', 'href' => '#reviews'],
        ['name' => 'Contact', 'href' => '#contact'],
        ['name' => 'Emergency Service', 'href' => 'tel:+14045551234'],
    ];

    $serviceAreas = $serviceAreas ?? [
        'Buckhead',
        'Midtown',
        'Virginia Highland',
        'Decatur',
        'East Atlanta',
        'Inman Park',
    ];

    /**
     * Helper inline para normalizar servicios que pueden venir como:
     * - string: "Drain Unclog"
     * - array/obj: ['id'=>'drain-unclog','title'=>'Drain Unclog','href'=>'#services'...]
     */
    $normalizeService = function ($item) {
        // Extrae valor desde array/objeto o usa string directamente
        $get = function($src, $key, $default = null) {
            if (is_array($src)) return $src[$key] ?? $default;
            if (is_object($src)) return data_get($src, $key, $default);
            return $default;
        };

        // Nombre preferente: title > name > label > id > string
        $name = is_string($item) ? $item
            : ($get($item, 'title')
                ?? $get($item, 'name')
                ?? $get($item, 'label')
                ?? $get($item, 'id')
                ?? 'Service');

        // Si el name es un id tipo "drain-unclog", lo humanizamos
        if (is_string($name) && str_contains($name, '-')) {
            $name = ucwords(str_replace('-', ' ', $name));
        }

        // Href preferente: href > url > route > por defecto #services
        $href = is_string($item) ? '#services'
            : ($get($item, 'href')
                ?? $get($item, 'url')
                ?? $get($item, 'route')
                ?? '#services');

        return [$name, $href];
    };
@endphp

<footer class="bg-primary-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <h3 class="text-2xl font-bold text-gradient mb-4">DripAway Solutions</h3>
                <p class="text-gray-300 mb-6">
                    Professional plumbing services in Atlanta with transparent pricing and reliable solutions.
                    Clear flow. Clear price.
                </p>

                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-s-phone class="w-5 h-5 text-primary" />
                        <a href="tel:+14045551234" class="hover:text-primary transition-colors">
                            (404) 555-1234
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

            {{-- Our Services --}}
            <div>
                <h4 class="text-lg font-semibold mb-4">Our Services</h4>
                <ul class="space-y-2">
                    @foreach ($services as $srv)
                        @php
                            [$srvName, $srvHref] = $normalizeService($srv);
                        @endphp
                        <li>
                            <a href="{{ $srvHref }}" class="text-gray-300 hover:text-primary transition-colors">
                                {{ $srvName }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Quick Links --}}
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
                    © 2024 DripAway Solutions. All rights reserved. Licensed Master Plumber.
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
                    <a href="tel:+14045551234" class="ml-2 underline hover:no-underline">
                        Call (404) 555-1234
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
