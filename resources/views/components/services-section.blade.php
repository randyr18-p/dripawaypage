@props([
    'services' => [
        [
            'title' => 'Drain Unclog',
            'description' => 'Professional drain cleaning for kitchen sinks, bathrooms, and main lines.',
            'price' => 'Starting at $89',
        ],
        [
            'title' => 'P-Trap Replacement',
            'description' => 'Expert P-trap installation and repair for all sink configurations.',
            'price' => 'Starting at $125',
        ],
        [
            'title' => 'Faucet Install',
            'description' => 'Complete faucet installation and upgrade services.',
            'price' => 'Starting at $150',
        ],
        [
            'title' => 'Leak Repair',
            'description' => 'Fast leak detection and repair to prevent water damage.',
            'price' => 'Starting at $95',
        ],
        [
            'title' => 'Toilet Seal Change',
            'description' => 'Professional toilet seal replacement and maintenance.',
            'price' => 'Starting at $110',
        ],
        [
            'title' => 'Garbage Disposal Install',
            'description' => 'Complete garbage disposal installation and setup.',
            'price' => 'Starting at $175',
        ],
    ],
])

<section id="services" class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Professional Plumbing Services
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From routine maintenance to emergency repairs, our licensed plumbers
                provide reliable service across Atlanta with upfront pricing.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
                <div class="bg-gray-50 rounded-lg p-6 group hover:scale-105 transition-transform duration-300 shadow-md">
                    <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-lg mb-6 group-hover:bg-blue-200 transition-colors">
                        <x-heroicon-o-wrench-screwdriver class="w-8 h-8 text-blue-600" />
                    </div>
                    
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 mb-4">{{ $service['description'] }}</p>
                    
                    <div class="flex items-center justify-between mt-auto">
                        <span class="text-lg font-bold text-blue-600">{{ $service['price'] }}</span>
                        <a href="#" class="text-blue-600 hover:text-blue-500 font-medium transition-colors">
                            Learn More &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-16 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-2xl p-8 text-center text-white">
            <x-heroicon-s-exclamation-triangle class="w-16 h-16 mx-auto mb-4 opacity-90" />
            <h3 class="text-2xl font-bold mb-2">Emergency Plumbing Services</h3>
            <p class="text-lg mb-6 opacity-90">
                Available 24/7 for urgent plumbing emergencies in Atlanta
            </p>
            <a href="tel:+14045551234" class="inline-flex items-center bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H3a1 1 0 01-1-1V3zM3 4.414V17h14V4.414l-7 7-7-7zM17 3H3v1h14V3z" />
                </svg>
                Call Emergency Line
            </a>
        </div>
    </div>
</section>