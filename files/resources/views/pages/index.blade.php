<!--
    The homepage. It lives at pages/index.blade.php, so it's served at "/".
    The page is a list of sections: each tag pulls a component from
    resources/views/components/sections/ and fills its props with these
    attributes. In Visual mode you can select, reorder, and edit them on
    the canvas.
-->
<x-layouts.main title="Design & code studio" description="Chronicle is the one-person design & code studio of Marlo Vane — brand identity, web design, and development for people with something to say.">

    <x-sections.hero />

    <x-sections.marquee :items="$marquee" />

    <x-sections.work-grid :items="$work" showAllLink="1" />

    <x-sections.services :items="$services" />

    <x-sections.stats :items="$stats" />

    <x-sections.testimonials :items="$testimonials" />

    <x-sections.journal-list :items="$journal" />

    <x-sections.cta />

</x-layouts.main>
