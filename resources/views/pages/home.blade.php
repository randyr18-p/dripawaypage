@include('partials.hero')
 <x-services-section  :services="$services" />
 <x-booking-section />
 <x-review-section />
 <x-about-section/>
 <x-faqs :faqs="$faqsHome" :showCta="true" />
 <x-contact-section />
