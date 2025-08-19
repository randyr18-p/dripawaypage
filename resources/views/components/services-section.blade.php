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

 <section id="services" class="pt-0 pb-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  ">
        <div class="text-center mb-12">
            <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-6">
                <span class="bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
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
                <div
                    class="bg-white rounded-xl p-6 group hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl border border-gray-100 flex flex-col">
                    <div
                        class="flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl mb-6 mx-auto">
                        <x-heroicon-o-wrench-screwdriver class="w-10 h-10 text-blue-600" />
                    </div>

                    <h3 class="text-2xl font-bold text-gray-900 mb-3 text-center">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 mb-6 text-center min-h-[72px]">{{ $service['description'] }}</p>

                    <div class="mt-auto">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-lg font-bold text-blue-600">{{ $service['price'] }}</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                Learn More &rarr;
                            </a>
                        </div>
                        <a href="#"
                            class="block w-full text-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg font-bold hover:from-blue-600 hover:to-blue-800 transition-all">
                            Schedule Now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

         <div
            class="mt-16 bg-gradient-to-br from-orange-400 to-red-400 rounded-2xl p-8 text-center text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
            <x-heroicon-s-exclamation-triangle class="w-16 h-16 mx-auto mb-4 text-orange-100" />
            <h3 class="text-3xl font-bold mb-3 text-white drop-shadow">Emergency Plumbing Services</h3>
            <p class="text-xl mb-6 text-orange-50 font-medium">
                Available 24/7 for urgent plumbing emergencies in Atlanta
            </p>
            <a href="tel:+14045551234"
                class="inline-flex items-center bg-white text-orange-600 px-10 py-3 rounded-lg font-bold hover:bg-gray-50 transition-all duration-200 shadow-md hover:scale-[1.02]">
                <x-heroicon-o-phone class="w-6 h-6 mr-3" />
                CALL NOW: (404) 555-1234
            </a>
        </div>
    </div>
</section>
