@include('partials.hero')
 <x-services-section />
 <x-booking-section />
 <x-review-section />
 <x-about-section/>
 <x-faqs :faqs="$faqsHome" :showCta="true" />
 <x-contact-section />
