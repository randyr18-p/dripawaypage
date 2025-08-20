@props([
    'services' => [
        'Drain Unclog',
        'P-Trap Replacement',
        'Faucet Install',
        'Leak Repair',
        'Toilet Seal Change',
        'Garbage Disposal Install'
    ],
    'quickLinks' => [
        ['name' => 'About Us', 'href' => '#about'],
        ['name' => 'Services', 'href' => '#services'],
        ['name' => 'Booking', 'href' => '#booking'],
        ['name' => 'Reviews', 'href' => '#reviews'],
        ['name' => 'Contact', 'href' => '#contact'],
        ['name' => 'Emergency Service', 'href' => 'tel:+14045551234']
    ],
    'serviceAreas' => [
        'Buckhead',
        'Midtown',
        'Virginia Highland',
        'Decatur',
        'East Atlanta',
        'Inman Park'
    ]
])

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
                            Serving Atlanta & Metro Area
                        </span>
                    </div>
                </div>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4">Our Services</h4>
                <ul class="space-y-2">
                    @foreach ($services as $service)
                        <li>
                            <a href="#services" class="text-gray-300 hover:text-primary transition-colors">
                                {{ $service }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    @foreach ($quickLinks as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="text-gray-300 hover:text-primary transition-colors">
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4">Service Areas</h4>
                <ul class="space-y-2">
                    @foreach ($serviceAreas as $area)
                        <li>
                            <span class="text-gray-300">{{ $area }}, Atlanta</span>
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