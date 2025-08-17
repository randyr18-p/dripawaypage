@props([
    'brand' => 'DripAway Solutions',
    'tagline' => 'Clear Flow. Clear Price.',
    'plumbingServices' => [
        'Drain Unclog',
        'P-Trap Replacement',
        'Faucet Install',
        'Leak Repair',
        'Toilet Seal Change',
        'Garbage Disposal Install',
    ],
])

<nav x-data="{
    isScrolled: false,
    isMobileMenuOpen: false,
    currentLanguage: 'EN',
}" @scroll.window="isScrolled = window.scrollY > 10"
    :class="isScrolled ? 'bg-white shadow-lg' : 'bg-white/95 backdrop-blur-sm'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">
            <!-- Logo / Branding -->
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500">
                    {{ $brand }}
                </h1>
                <span class="hidden sm:block ml-2 text-sm text-gray-600">{{ $tagline }}</span>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="#home" class="nav-link">Home</a>

                <!-- Plumbing Dropdown (desktop) -->
                <div class="relative" x-data="{ open: false }" @keydown.escape.stop="open=false">
                    <button @click="open = !open" @click.away="open = false"
                        class="nav-link flex items-center space-x-1" aria-haspopup="menu"
                        :aria-expanded="open.toString()" aria-controls="plumbing-menu">
                        <span>Plumbing</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200 transform"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        id="plumbing-menu" role="menu"
                        class="absolute top-full left-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-gray-100 py-2">
                        @foreach ($plumbingServices as $service)
                            <a href="#services" role="menuitem" class="dropdown-item">
                                {{ $service }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="#booking" class="nav-link">Booking</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#blog" class="nav-link">Blog</a>
                <a href="#faqs" class="nav-link">FAQs</a>
                <a href="#contact" class="nav-link">Contact</a>

                <!-- Language Dropdown (desktop) -->
                <div class="relative" x-data="{ open: false }" @keydown.escape.stop="open=false">
                    <button @click="open = !open" @click.away="open = false"
                        class="nav-link flex items-center space-x-1" aria-haspopup="menu"
                        :aria-expanded="open.toString()" aria-controls="lang-menu">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M9 2.25a.75.75 0 0 1 .75.75v1.506a49.384 49.384 0 0 1 5.343.371.75.75 0 1 1-.186 1.489c-.66-.083-1.323-.151-1.99-.206a18.67 18.67 0 0 1-2.97 6.323c.318.384.65.753 1 1.107a.75.75 0 0 1-1.07 1.052A18.902 18.902 0 0 1 9 13.687a18.823 18.823 0 0 1-5.656 4.482.75.75 0 0 1-.688-1.333 17.323 17.323 0 0 0 5.396-4.353A18.72 18.72 0 0 1 5.89 8.598a.75.75 0 0 1 1.388-.568A17.21 17.21 0 0 0 9 11.224a17.168 17.168 0 0 0 2.391-5.165 48.04 48.04 0 0 0-8.298.307.75.75 0 0 1-.186-1.489 49.159 49.159 0 0 1 5.343-.371V3A.75.75 0 0 1 9 2.25ZM15.75 9a.75.75 0 0 1 .68.433l5.25 11.25a.75.75 0 1 1-1.36.634l-1.198-2.567h-6.744l-1.198 2.567a.75.75 0 0 1-1.36-.634l5.25-11.25A.75.75 0 0 1 15.75 9Zm-2.672 8.25h5.344l-2.672-5.726-2.672 5.726Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span x-text="currentLanguage"></span>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200 transform"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        id="lang-menu" role="menu"
                        class="absolute top-full right-0 mt-2 w-20 bg-white rounded-lg shadow-xl border border-gray-100 py-2">
                        <button @click="currentLanguage = currentLanguage === 'EN' ? 'ES' : 'EN'; open = false"
                            class="dropdown-item w-full text-left" role="menuitem">
                            <span x-text="currentLanguage === 'EN' ? 'ES' : 'EN'"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="isMobileMenuOpen = !isMobileMenuOpen"
                class="lg:hidden p-2 rounded-md hover:bg-gray-100 transition-colors" aria-label="Toggle mobile menu"
                aria-controls="mobile-menu" :aria-expanded="isMobileMenuOpen.toString()">
                <svg x-show="!isMobileMenuOpen" class="w-6 h-6 text-amber-300" fill="currentColor" viewBox="0 0 20 20"
                    aria-hidden="true">
                    <path d="M3 5h14M3 10h14M3 15h14" />
                </svg>
                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M9 2.25a.75.75 0 0 1 .75.75v1.506a49.384 49.384 0 0 1 5.343.371.75.75 0 1 1-.186 1.489c-.66-.083-1.323-.151-1.99-.206a18.67 18.67 0 0 1-2.97 6.323c.318.384.65.753 1 1.107a.75.75 0 0 1-1.07 1.052A18.902 18.902 0 0 1 9 13.687a18.823 18.823 0 0 1-5.656 4.482.75.75 0 0 1-.688-1.333 17.323 17.323 0 0 0 5.396-4.353A18.72 18.72 0 0 1 5.89 8.598a.75.75 0 0 1 1.388-.568A17.21 17.21 0 0 0 9 11.224a17.168 17.168 0 0 0 2.391-5.165 48.04 48.04 0 0 0-8.298.307.75.75 0 0 1-.186-1.489 49.159 49.159 0 0 1 5.343-.371V3A.75.75 0 0 1 9 2.25ZM15.75 9a.75.75 0 0 1 .68.433l5.25 11.25a.75.75 0 1 1-1.36.634l-1.198-2.567h-6.744l-1.198 2.567a.75.75 0 0 1-1.36-.634l5.25-11.25A.75.75 0 0 1 15.75 9Zm-2.672 8.25h5.344l-2.672-5.726-2.672 5.726Z"
                        clip-rule="evenodd" />
                </svg>

                <svg x-show="isMobileMenuOpen" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    aria-hidden="true">
                    <path
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isMobileMenuOpen" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300 transform"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
            id="mobile-menu" class="lg:hidden border-t border-gray-200 py-4">
            <div class="flex flex-col space-y-4">
                <a href="#home" class="nav-link">Home</a>

                <div>
                    <span class="nav-link font-semibold">Plumbing Services</span>
                    <div class="ml-4 mt-2 space-y-2">
                        @foreach ($plumbingServices as $service)
                            <a href="#services" class="block text-sm text-gray-600 hover:text-primary">
                                {{ $service }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="#booking" class="nav-link">Booking</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#blog" class="nav-link">Blog</a>
                <a href="#faqs" class="nav-link">FAQs</a>
                <a href="#contact" class="nav-link">Contact</a>

                <button @click="currentLanguage = currentLanguage === 'EN' ? 'ES' : 'EN'; isMobileMenuOpen = false"
                    class="nav-link text-left flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path
                            d="M10 2a8 8 0 100 16 8 8 0 000-16zM10 3a7 7 0 110 14 7 7 0 010-14zM11 5a1 1 0 00-2 0v2.7a1 1 0 01.3 1.25l-.2-.35a1 1 0 011.5-.7l1.1 1.95a1 1 0 01-1.35 1.75l-.9-1.55a1 1 0 01-1.2.55l-1 1.7a1 1 0 01-1.2-1.6l1.3-2.3a1 1 0 01-1.55-.45l-.95-1.65z" />
                    </svg>
                    <span>Switch to <span x-text="currentLanguage === 'EN' ? 'Spanish' : 'English'"></span></span>
                </button>
            </div>
        </div>
    </div>
</nav>
