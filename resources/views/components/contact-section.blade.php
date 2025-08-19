@props([
    'contactInfo' => [
        [
            'title' => 'Phone',
            'details' => ['(404) 555-1234', 'Emergency: (404) 555-HELP'],
            'action' => 'tel:+14045551234',
            'icon' => '<svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H3a1 1 0 01-1-1V3zM3 4.414V17h14V4.414l-7 7-7-7zM17 3H3v1h14V3z" /></svg>',
        ],
        [
            'title' => 'Email',
            'details' => ['info@dripawaysolutions.com', 'emergency@dripawaysolutions.com'],
            'action' => 'mailto:info@dripawaysolutions.com',
            'icon' => '<svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" /></svg>',
        ],
        [
            'title' => 'Service Area',
            'details' => ['Atlanta & Metro Area', 'All surrounding counties'],
            'action' => '#',
            'icon' => '<svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M10 20S3 10.875 3 7.5A7 7 0 0110 0a7 7 0 017 7.5c0 3.375-7 12.5-7 12.5zM10 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" /></svg>',
        ],
        [
            'title' => 'Business Hours',
            'details' => ['Mon-Fri: 7AM-7PM', '24/7 Emergency Service'],
            'action' => '#',
            'icon' => '<svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20"><path d="M10 20a10 10 0 100-20 10 10 0 000 20zM10 3a7 7 0 110 14 7 7 0 010-14zM10 6a1 1 0 00-1 1v4h-4a1 1 0 000 2h4v4a1 1 0 002 0v-4h4a1 1 0 000-2h-4V7a1 1 0 00-1-1z" /></svg>',
        ],
    ]
])

<section id="contact" class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-text mb-4">
                Get in Touch
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Ready to solve your plumbing problems? Contact us today for fast,
                reliable service and transparent pricing.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-semibold text-text mb-8">Contact Information</h3>

                <div class="space-y-6 mb-10">
                    @foreach ($contactInfo as $info)
                        <div class="flex items-start space-x-4 p-4 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                {!! $info['icon'] !!}
                            </div>
                            <div>
                                <h4 class="font-semibold text-text mb-1">{{ $info['title'] }}</h4>
                                @foreach ($info['details'] as $detail)
                                    <div class="text-gray-600">
                                        @if ($info['action'] !== '#')
                                            <a href="{{ $info['action'] }}"
                                                class="hover:text-primary transition-colors">
                                                {{ $detail }}
                                            </a>
                                        @else
                                            <span>{{ $detail }}</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bg-gray-100 rounded-lg h-64 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 20S3 10.875 3 7.5A7 7 0 0110 0a7 7 0 017 7.5c0 3.375-7 12.5-7 12.5zM10 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                        </svg>
                        <p class="text-gray-600">Service Area Map</p>
                        <p class="text-sm text-gray-500">Atlanta & Surrounding Areas</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold text-text mb-6">Send Us a Message</h3>

                <form x-data="{
                    contactForm: {
                        name: '',
                        email: '',
                        phone: '',
                        subject: '',
                        message: ''
                    },
                    submitForm() {
                        alert('Thank you for your message! We\'ll get back to you within 24 hours.');
                        this.contactForm = {
                            name: '',
                            email: '',
                            phone: '',
                            subject: '',
                            message: ''
                        };
                    }
                }" @submit.prevent="submitForm" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Name *</label>
                            <input x-model="contactForm.name"
                                type="text"
                                required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Phone *</label>
                            <input x-model="contactForm.phone"
                                type="tel"
                                required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-text mb-2">Email</label>
                        <input x-model="contactForm.email"
                            type="email"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-text mb-2">Subject</label>
                        <select x-model="contactForm.subject"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="emergency">Emergency Service</option>
                            <option value="estimate">Request Estimate</option>
                            <option value="complaint">Service Complaint</option>
                            <option value="compliment">Compliment</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-text mb-2">Message *</label>
                        <textarea x-model="contactForm.message"
                                rows="4"
                                required
                                placeholder="Tell us about your plumbing needs..."
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                    </div>

                    <button type="submit" class="w-full inline-flex justify-center items-center bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary/80 transition-colors">
                        Send Message
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-16 bg-gradient-to-r from-red-500 to-red-600 rounded-2xl p-8 text-center text-white">
            <h3 class="text-2xl font-bold mb-2">Plumbing Emergency?</h3>
            <p class="text-lg mb-6 opacity-90">
                Don't wait! Call our 24/7 emergency hotline for immediate assistance.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:+14045551234"
                    class="inline-flex items-center bg-white text-red-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H3a1 1 0 01-1-1V3zM3 4.414V17h14V4.414l-7 7-7-7zM17 3H3v1h14V3z" />
                    </svg>
                    Call Emergency Line
                </a>
                <a href="sms:+14045551234"
                    class="inline-flex items-center bg-red-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-800 transition-colors">
                    Text Us Now
                </a>
            </div>
        </div>
    </div>
</section>