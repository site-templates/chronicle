<!--
    The work index at /work — every project in the grid, with the numbers
    and the client wall backing it up.
-->
<x-layouts.main title="Work" description="Selected projects from Chronicle Studio — brand identities, websites, and products that refuse to whisper.">

    <x-sections.page-header
        eyebrow="The portfolio"
        heading="Work that ships"
        intro="Six recent projects, told properly — what the brief was, what we made, and what actually happened after launch. No mood boards presented as outcomes." />

    <x-sections.work-grid
        :items="$work"
        eyebrow="2024 — 2026"
        heading="Every project tells on you"
        body="A portfolio is just evidence. Click into any of these for the full story — client, constraints, decisions, and results." />

    <x-sections.stats :items="$stats" />

    <x-sections.clients :items="$clients" />

    <x-sections.cta />

</x-layouts.main>
