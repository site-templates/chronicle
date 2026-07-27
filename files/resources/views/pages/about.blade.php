<!--
    The about page at /about — the story, the résumé ledger, and the house
    rules.
-->
<x-layouts.main title="About" description="Marlo Vane — the designer, developer, and entire staff of Chronicle Studio. Twelve years of loud, careful work for the web.">

    <x-sections.page-header
        eyebrow="The human"
        heading="One person, whole studio"
        intro="Chronicle is Marlo Vane — designer, developer, and the only person reading this inbox. Here's the story, the receipts, and the rules the work lives by." />

    <x-sections.about-story />

    <x-sections.timeline :items="$experience" />

    <x-sections.principles :items="$principles" />

    <x-sections.marquee :items="$marquee" reversed="1" />

    <x-sections.cta />

</x-layouts.main>
