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

<section id="booking" class="pb-24 bg-background">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-text mb-4">
                Schedule Your Service
            </h2>
            <p class="text-xl text-gray-700 max-w-2xl mx-auto">
                Book your plumbing service online. Free estimates and flexible scheduling available.
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-8">
                <div class="bg-white rounded-xl p-8 shadow-lg">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-text">Book Your Appointment</h3>
                    </div>

                    <form x-data="bookingForm()" @submit.prevent="submitBooking" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2 flex items-center">
                                Service Needed <span class="text-red-500 ml-1">*</span>
                            </label>
                            <select x-model="selectedService" @change="validateField('service', selectedService)" required
                                :class="{ 'border-red-500': fieldErrors.service }"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                                <option value="">Select a service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service }}">
                                        {{ $service }}
                                    </option>
                                @endforeach
                            </select>
                            <p x-show="fieldErrors.service" class="text-red-500 text-sm mt-1">Please select a service</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-text mb-2 flex items-center">
                                    Preferred Date <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input x-model="selectedDate"
                                       @change="validateField('date', selectedDate)"
                                       :class="{ 'border-red-500': fieldErrors.date }"
                                       type="date"
                                       :min="today"
                                       :max="maxDate"
                                       required
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                                <p x-show="fieldErrors.date" class="text-red-500 text-sm mt-1">Please select a date</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-text mb-2 flex items-center">
                                    Preferred Time <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select x-model="selectedTime" @change="validateField('time', selectedTime)" required
                                    :class="{ 'border-red-500': fieldErrors.time }"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                                    <option value="">Select time</option>
                                    @foreach ($timeSlots as $time)
                                        <option value="{{ $time }}">
                                            {{ $time }}
                                        </option>
                                    @endforeach
                                </select>
                                <p x-show="fieldErrors.time" class="text-red-500 text-sm mt-1">Please select a time</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-text mb-2 flex items-center">
                                    Full Name <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input x-model="customerInfo.name"
                                       @blur="validateField('name', customerInfo.name)"
                                       :class="{ 'border-red-500': fieldErrors.name }"
                                       type="text"
                                       required
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                                <p x-show="fieldErrors.name" class="text-red-500 text-sm mt-1">Please enter your name</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-text mb-2 flex items-center">
                                    Phone Number <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input x-model="customerInfo.phone"
                                       @blur="validateField('phone', customerInfo.phone)"
                                       :class="{ 'border-red-500': fieldErrors.phone }"
                                       type="tel"
                                       required
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                                <p x-show="fieldErrors.phone" class="text-red-500 text-sm mt-1">Please enter your phone number</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Email Address
                            </label>
                            <input x-model="customerInfo.email"
                                   type="email"
                                   class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text mb-2 flex items-center">
                                Service Address <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input x-model="customerInfo.address"
                                   @blur="validateField('address', customerInfo.address)"
                                   :class="{ 'border-red-500': fieldErrors.address }"
                                   type="text"
                                   required
                                   placeholder="Street address, Atlanta, GA"
                                   class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                            <p x-show="fieldErrors.address" class="text-red-500 text-sm mt-1">Please enter your address</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Additional Details
                            </label>
                            <textarea x-model="customerInfo.message"
                                      rows="3"
                                      placeholder="Describe the issue or any special instructions..."
                                      class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all"></textarea>
                        </div>

                        <button type="submit"
                                :disabled="!isFormValid || isSubmitting"
                                :class="{
                                    'bg-blue-600 hover:bg-blue-700 text-white shadow-md': isFormValid && !isSubmitting,
                                    'bg-gray-300 text-gray-500 cursor-not-allowed': !isFormValid,
                                    'bg-blue-400 cursor-wait': isSubmitting
                                }"
                                class="w-full py-4 rounded-lg font-semibold text-lg transition-all duration-200 flex items-center justify-center">
                            <span x-show="!isSubmitting">Book Appointment - Free Estimate</span>
                            <span x-show="isSubmitting" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Processing...
                            </span>
                        </button>
                    </form>

                    <!-- Mensaje de confirmación -->
                    <div x-show="showConfirmation" x-transition class="mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-green-800">Booking Request Submitted!</h3>
                                <div class="mt-2 text-sm text-green-700">
                                    <p>Thank you for your booking request. We'll contact you within 30 minutes to confirm your appointment.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-8 h-8 text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-semibold text-text">Response Time</h4>
                        </div>
                        <p class="text-gray-700">
                            We'll contact you within 30 minutes to confirm your appointment
                            and provide arrival time estimates.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-text mb-4">What to Expect</h4>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-700">Free, accurate estimate before work begins</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-700">Licensed, insured, and background-checked plumbers</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-700">Clean up after job completion</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-gray-700">1-year warranty on all work performed</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-xl p-6 text-white shadow-lg">
                        <h4 class="text-lg font-semibold mb-2">Emergency Service</h4>
                        <p class="mb-4">
                            Need immediate assistance? Call our 24/7 emergency line.
                        </p>
                        <a href="tel:+14045551234"
                            class="inline-flex items-center bg-white text-orange-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors shadow-md">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Call (404) 555-1234
                        </a>
                    </div>

                    <!-- Sección de testimonios añadida -->
                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-text mb-4">Customer Reviews</h4>
                        <div class="space-y-4">
                            <div>
                                <div class="flex items-center mb-1">
                                    <span class="text-yellow-500">★★★★★</span>
                                    <span class="ml-2 text-sm text-gray-600">5.0</span>
                                </div>
                                <p class="text-gray-700 text-sm">"They arrived on time, fixed our leak quickly, and cleaned up everything. Highly recommended!"</p>
                                <p class="text-gray-500 text-xs mt-2">- Sarah J.</p>
                            </div>
                            <div>
                                <div class="flex items-center mb-1">
                                    <span class="text-yellow-500">★★★★★</span>
                                    <span class="ml-2 text-sm text-gray-600">5.0</span>
                                </div>
                                <p class="text-gray-700 text-sm">"Professional service with upfront pricing. No hidden fees like other companies."</p>
                                <p class="text-gray-500 text-xs mt-2">- Michael T.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function bookingForm() {
            return {
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
                isSubmitting: false,
                showConfirmation: false,
                fieldErrors: {
                    name: false,
                    phone: false,
                    address: false,
                    service: false,
                    date: false,
                    time: false
                },

                checkValidity() {
                    // Validar campos obligatorios
                    this.fieldErrors.name = !this.customerInfo.name;
                    this.fieldErrors.phone = !this.customerInfo.phone;
                    this.fieldErrors.address = !this.customerInfo.address;
                    this.fieldErrors.service = !this.selectedService;
                    this.fieldErrors.date = !this.selectedDate;
                    this.fieldErrors.time = !this.selectedTime;

                    // Verificar si todo el formulario es válido
                    this.isFormValid = this.selectedDate && this.selectedTime && this.selectedService &&
                                       this.customerInfo.name && this.customerInfo.phone && this.customerInfo.address;
                },

                validateField(field, value) {
                    this.fieldErrors[field] = !value;
                    this.checkValidity();
                },

                async submitBooking() {
                    if (this.isFormValid && !this.isSubmitting) {
                        this.isSubmitting = true;

                        // Simular envío al servidor
                        await new Promise(resolve => setTimeout(resolve, 1500));

                        // Mostrar confirmación
                        this.showConfirmation = true;

                        // Guardar en localStorage para persistencia
                        localStorage.setItem('lastBooking', JSON.stringify({
                            service: this.selectedService,
                            date: this.selectedDate,
                            time: this.selectedTime,
                            name: this.customerInfo.name
                        }));

                        // Scroll to confirmation message
                        setTimeout(() => {
                            const confirmationElement = document.querySelector('[x-show="showConfirmation"]');
                            if (confirmationElement) {
                                confirmationElement.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }
                        }, 100);

                        // Resetear formulario después de 5 segundos
                        setTimeout(() => {
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
                            this.showConfirmation = false;
                            this.isSubmitting = false;
                        }, 5000);
                    }
                }
            }
        }
    </script>
</section>
