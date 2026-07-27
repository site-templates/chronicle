<!--
    The journal index at /journal — every post in the ledger.
-->
<x-layouts.main title="Journal" description="Notes from the Chronicle desk — occasional writing on design, code, pricing, and running a one-person studio.">

    <x-sections.page-header
        eyebrow="The journal"
        heading="Notes from the desk"
        intro="Occasional writing on design, code, and the business of making things alone. No schedule, no growth hacks, no filler." />

    <x-sections.journal-list
        :items="$journal"
        eyebrow="All posts"
        heading="Read in any order"
        body="Everything published so far, newest first. The opinions age at their own pace." />

    <x-sections.cta />

</x-layouts.main>
