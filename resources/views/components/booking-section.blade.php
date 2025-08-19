@props([
    'services' => [
        'Drain Unclog',
        'P-Trap Replacement',
        'Faucet Install',
        'Leak Repair',
        'Toilet Seal Change',
        'Garbage Disposal Install',
        'Other'
    ],
    'timeSlots' => [
        '8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM',
        '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM'
    ],
])

<section id="booking" class="pb-24 bg-background  border-2 border-red-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-text mb-4">
                Schedule Your Service
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Book your plumbing service online. Free estimates and flexible scheduling available.
            </p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12">
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <div class="flex items-center space-x-3 mb-6">
                        <x-heroicon-o-calendar-days class="w-8 h-8 text-blue-600" />
                        <h3 class="text-2xl font-semibold text-text">Book Your Appointment</h3>
                    </div>
                    
                    <form x-data="{
                        selectedDate: '',
                        selectedTime: '',
                        selectedService: '',
                        customerInfo: {
                            name: '',
                            phone: '',
                            email: '',
                            address: '',
                            message: ''
                        },
                        today: new Date().toISOString().split('T')[0],
                        maxDate: new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toISOString().split('T')[0],
                        isFormValid: false,

                        checkValidity() {
                            this.isFormValid = this.selectedDate && this.selectedTime && this.selectedService &&
                                               this.customerInfo.name && this.customerInfo.phone && this.customerInfo.address;
                        },

                        submitBooking() {
                            if (this.isFormValid) {
                                alert('Booking request submitted! We\'ll contact you within 30 minutes to confirm.');
                                // Reset form
                                this.selectedDate = '';
                                this.selectedTime = '';
                                this.selectedService = '';
                                this.customerInfo = {
                                    name: '',
                                    phone: '',
                                    email: '',
                                    address: '',
                                    message: ''
                                };
                            }
                        }
                    }" @submit.prevent="submitBooking" @input="checkValidity" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Service Needed</label>
                            <select x-model="selectedService" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option value="">Select a service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service }}">
                                        {{ $service }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">Preferred Date</label>
                                <input x-model="selectedDate"
                                       type="date"
                                       :min="today"
                                       :max="maxDate"
                                       required
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">Preferred Time</label>
                                <select x-model="selectedTime" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option value="">Select time</option>
                                    @foreach ($timeSlots as $time)
                                        <option value="{{ $time }}">
                                            {{ $time }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">Full Name *</label>
                                <input x-model="customerInfo.name"
                                       type="text"
                                       required
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">Phone Number *</label>
                                <input x-model="customerInfo.phone"
                                       type="tel"
                                       required
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Email Address</label>
                            <input x-model="customerInfo.email"
                                   type="email"
                                   class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Service Address *</label>
                            <input x-model="customerInfo.address"
                                   type="text"
                                   required
                                   placeholder="Street address, Atlanta, GA"
                                   class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Additional Details</label>
                            <textarea x-model="customerInfo.message"
                                      rows="3"
                                      placeholder="Describe the issue or any special instructions..."
                                      class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                        </div>
                        
                        <button type="submit"
                                :disabled="!isFormValid"
                                :class="{ 'bg-primary hover:bg-primary/80 text-white': isFormValid, 'bg-gray-300 text-gray-500 cursor-not-allowed': !isFormValid }"
                                class="w-full py-4 rounded-lg font-semibold text-lg transition-all duration-200">
                            Book Appointment - Free Estimate
                        </button>
                    </form>
                </div>
                
                <div class="space-y-6">
                    <div class="bg-white rounded-lg p-6 shadow-lg">
                        <div class="flex items-center space-x-3 mb-4">
                            <x-heroicon-o-clock class="w-8 h-8 text-blue-600" />
                            <h4 class="text-lg font-semibold text-text">Response Time</h4>
                        </div>
                        <p class="text-gray-600">
                            We'll contact you within 30 minutes to confirm your appointment
                            and provide arrival time estimates.
                        </p>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-text mb-4">What to Expect</h4>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-600">Free, accurate estimate before work begins</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-600">Licensed, insured, and background-checked plumbers</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-600">Clean up after job completion</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-600">1-year warranty on all work performed</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-orange-400 to-red-400 rounded-lg p-6 text-white">
                        <h4 class="text-lg font-semibold mb-2">Emergency Service</h4>
                        <p class="mb-4">
                            Need immediate assistance? Call our 24/7 emergency line.
                        </p>
                        <a href="tel:+14045551234"
                            class="inline-flex items-center bg-white text-accent px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                            Call (404) 555-1234
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



