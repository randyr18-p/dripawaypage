@props([
    'reviews' => [
        [
            'name' => 'Sarah Johnson',
            'location' => 'Buckhead, Atlanta',
            'rating' => 5,
            'date' => '2 weeks ago',
            'text' => 'DripAway Solutions saved my kitchen! They unclogged my drain in 30 minutes and the pricing was exactly what they quoted. Professional and clean work.',
            'service' => 'Drain Unclog'
        ],
        [
            'name' => 'Michael Rodriguez',
            'location' => 'Midtown, Atlanta',
            'rating' => 5,
            'date' => '1 month ago',
            'text' => 'Excellent faucet installation service. The plumber arrived on time, explained everything clearly, and cleaned up perfectly. Will definitely use again.',
            'service' => 'Faucet Install'
        ],
        [
            'name' => 'Jennifer Chen',
            'location' => 'Virginia Highland, Atlanta',
            'rating' => 5,
            'date' => '3 weeks ago',
            'text' => 'Emergency leak repair at 11 PM - they responded immediately and fixed the issue before any major damage. True professionals!',
            'service' => 'Leak Repair'
        ],
        [
            'name' => 'David Thompson',
            'location' => 'Decatur, Atlanta',
            'rating' => 5,
            'date' => '2 months ago',
            'text' => 'P-trap replacement was handled efficiently. Great communication throughout the process and very reasonable pricing. Highly recommend!',
            'service' => 'P-Trap Replacement'
        ],
        [
            'name' => 'Lisa Williams',
            'location' => 'East Atlanta, Atlanta',
            'rating' => 5,
            'date' => '1 month ago',
            'text' => 'Garbage disposal installation went smoothly. The technician was knowledgeable and took time to show me how to maintain it properly.',
            'service' => 'Garbage Disposal Install'
        ]
    ]
])

<section class="pb-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-text mb-4">
                What Our Customers Say
            </h2>
            <div class="flex items-center justify-center space-x-2 mb-4">
                <div class="flex items-center">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.381-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                </div>
                <span class="text-lg font-semibold text-text">4.9/5</span>
                <span class="text-gray-600">(248 reviews)</span>
            </div>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Don't just take our word for it - see what Atlanta homeowners say about our plumbing services.
            </p>
        </div>
        
        <div x-data="reviewsCarousel()" class="relative max-w-4xl mx-auto">
            <div class="bg-gray-50 rounded-2xl p-8 sm:p-12 relative overflow-hidden">
                <div class="absolute inset-0 opacity-5">
                    <div class="absolute top-4 right-4 text-6xl font-bold text-blue-600">"</div>
                </div>
                
                <div class="relative z-10" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                    <div class="flex items-center space-x-1 mb-4">
                        <template x-for="i in 5" :key="i">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" x-show="i <= reviews[currentReview].rating">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.381-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </template>
                    </div>
                    
                    <blockquote class="text-xl sm:text-2xl text-gray-800 mb-6 leading-relaxed" x-text="'\"' + reviews[currentReview].text + '\"'">
                    </blockquote>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="font-semibold text-gray-900 text-lg" x-text="reviews[currentReview].name"></div>
                            <div class="text-gray-600" x-text="reviews[currentReview].location"></div>
                            <div class="text-sm text-blue-600 font-medium mt-1" x-text="reviews[currentReview].service"></div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-gray-500" x-text="reviews[currentReview].date"></div>
                            <div class="flex items-center text-sm text-gray-600 mt-1">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/24px-Google_%22G%22_logo.svg.png"
                                    alt="Google" class="w-4 h-4 mr-1">
                                <span>Google Review</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center justify-between mt-8">
                <button @click="prevReview"
                        class="flex items-center justify-center w-12 h-12 bg-white border-2 border-gray-200 rounded-full hover:border-blue-600 hover:text-blue-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                
                <div class="flex space-x-2">
                    <template x-for="(review, index) in reviews" :key="index">
                        <button @click="goToReview(index)"
                                class="w-3 h-3 rounded-full transition-colors"
                                :class="index === currentReview ? 'bg-blue-600' : 'bg-gray-300'">
                        </button>
                    </template>
                </div>
                
                <button @click="nextReview"
                        class="flex items-center justify-center w-12 h-12 bg-white border-2 border-gray-200 rounded-full hover:border-blue-600 hover:text-blue-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <p class="text-lg text-gray-600 mb-6">
                Ready to experience the DripAway Solutions difference?
            </p>
            <a href="#booking" class="inline-flex justify-center items-center bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                Get Your Free Estimate Today
            </a>
        </div>
    </div>

    <script>
        function reviewsCarousel() {
            return {
                reviews: @json($reviews),
                currentReview: 0,
                isAutoPlaying: true,
                intervalId: null,
                
                init() {
                    // Iniciar el carrusel automático
                    this.startAutoPlay();
                },
                
                startAutoPlay() {
                    this.intervalId = setInterval(() => {
                        if (this.isAutoPlaying) {
                            this.nextReview();
                        }
                    }, 5000);
                },
                
                stopAutoPlay() {
                    if (this.intervalId) {
                        clearInterval(this.intervalId);
                    }
                },
                
                nextReview() {
                    this.currentReview = (this.currentReview + 1) % this.reviews.length;
                },
                
                prevReview() {
                    this.currentReview = this.currentReview === 0 ? this.reviews.length - 1 : this.currentReview - 1;
                },
                
                goToReview(index) {
                    this.currentReview = index;
                }
            }
        }
    </script>
</section>