@props([
    'features' => [
        [
            'title' => 'Licensed & Insured',
            'description' => 'Fully licensed master plumbers with comprehensive insurance coverage for your peace of mind.',
            'icon' => 'o-shield-check',
        ],
        [
            'title' => 'Local Atlanta Team',
            'description' => 'Born and raised in Atlanta, we understand local plumbing challenges and building codes.',
            'icon' => 'o-user-group',
        ],
        [
            'title' => '24/7 Emergency Service',
            'description' => 'Plumbing emergencies don\'t wait. Neither do we. Available around the clock.',
            'icon' => 'o-clock',
        ],
        [
            'title' => 'Transparent Pricing',
            'description' => 'No hidden fees or surprise charges. You know the cost before we start the work.',
            'icon' => 'o-currency-dollar',
        ],
    ],
    'stats' => [
        ['number' => '500+', 'label' => 'Happy Customers'],
        ['number' => '15+', 'label' => 'Years Experience'],
        ['number' => '4.9', 'label' => 'Average Rating'],
        ['number' => '24/7', 'label' => 'Availability'],
    ],
])

<section id="about" class="pb-24 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl sm:text-4xl font-bold text-text mb-6">
                    Atlanta's Trusted Plumbing Professionals
                </h2>

                <p class="text-lg text-gray-600 mb-6">
                    At DripAway Solutions, we've been serving the Atlanta community for over 15 years
                    with reliable, professional plumbing services. Our mission is simple: deliver
                    exceptional service with transparent pricing and honest communication.
                </p>

                <p class="text-lg text-gray-600 mb-8">
                    From routine maintenance to complex installations, our team of licensed master
                    plumbers brings expertise and integrity to every job. We believe in doing the
                    job right the first time and building lasting relationships with our customers.
                </p>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 mb-8">
                    @foreach ($stats as $stat)
                        <div class="text-center">
                            <div class="text-2xl sm:text-3xl font-bold text-primary mb-1">{{ $stat['number'] }}</div>
                            <div class="text-sm text-gray-600">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="w-full sm:w-auto inline-flex justify-center items-center bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                        Learn More About Us
                    </a>
                    <a href="#contact" class="w-full sm:w-auto inline-flex justify-center items-center bg-white text-primary border-2 border-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        View Our Certifications
                    </a>
                </div>
            </div>

            <div class="relative">
                <img src="https://images.pexels.com/photos/8447817/pexels-photo-8447817.jpeg?auto=compress&cs=tinysrgb&w=800"
                    alt="DripAway Solutions team of professional plumbers in Atlanta"
                    class="rounded-2xl shadow-xl w-full h-96 object-cover">

                <div class="absolute bottom-6 left-6 bg-white rounded-xl p-4 shadow-lg">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                            <x-heroicon-o-shield-check class="w-6 h-6 text-primary" />
                        </div>
                        <div>
                            <div class="font-semibold text-text">Fully Licensed</div>
                            <div class="text-sm text-gray-600">Georgia Master Plumber</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-20">
            <h3 class="text-3xl font-bold text-text text-center mb-12">
                Why Choose DripAway Solutions?
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($features as $feature)
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-primary/10 rounded-lg flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/20 transition-colors">
                            @php
                                $componentName = 'heroicon-' . $feature['icon'];
                            @endphp
                            <x-dynamic-component :component="$componentName" class="w-8 h-8 text-primary-500" />
                        </div>
                        <h4 class="text-lg font-semibold text-text mb-3">{{ $feature['title'] }}</h4>
                        <p class="text-gray-600">{{ $feature['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
