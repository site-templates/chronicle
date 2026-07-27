<!--
    The contact page at /contact — one email, the socials, and the answers
    to the questions everyone asks first.
-->
<x-layouts.main title="Contact" description="Start a project with Chronicle Studio — one email, no forms, a reply within two working days.">

    <x-sections.page-header
        eyebrow="Say hello"
        heading="Let's talk"
        intro="No contact forms, no calendars, no qualification quiz. One email address, read by the person who'll do the work." />

    <x-sections.contact-details :socials="$site->social_links" />

    <x-sections.faq :items="$faq" />

    <x-sections.testimonials :items="$testimonials" />

</x-layouts.main>
