@props([
    'eyebrow' => 'Got a project?',
    'heading' => 'Let\'s make something loud',
    'body' => 'One email, no forms, no discovery-call maze. Tell me what you\'re building and I\'ll reply within two working days.',
    'buttonText' => 'hello@chronicle.studio',
    'buttonLink' => 'mailto:hello@chronicle.studio',
    'note' => 'Currently booking for Q3 2026',
])
<!--
    The closing move: a giant statement on the engineering grid with a
    spinning spark, one oversized email button, and the availability note.
-->
<section id="cta" class="relative overflow-hidden border-b border-line">
    <div class="grid-texture pointer-events-none absolute inset-0" aria-hidden="true"></div>

    <div class="relative mx-auto flex w-full max-w-7xl flex-col items-center px-6 py-24 text-center sm:py-32">

        <p class="inline-flex items-center gap-2.5 font-mono text-xs font-medium tracking-[0.2em] uppercase" data-reveal>
            <svg viewBox="0 0 64 64" class="spin-slow size-4 fill-accent" aria-hidden="true">
                <path stroke="currentColor" stroke-width="3" class="text-ink" d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
            </svg>
            {{ $eyebrow }}
        </p>

        <h2 class="reveal-1 mt-7 max-w-[16ch] font-display text-5xl leading-[1.02] font-bold tracking-tight text-balance uppercase sm:text-7xl" data-reveal>{{ $heading }}</h2>

        <p class="reveal-2 mt-7 max-w-[48ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $body }}</p>

        <a href="{{ $buttonLink }}" class="lift reveal-3 mt-11 inline-flex items-center gap-3 border border-line bg-accent px-8 py-5 font-display text-lg font-bold tracking-tight text-accent-ink shadow-brutal-lg sm:px-12 sm:text-2xl" data-reveal>
            {{ $buttonText }}
            <svg viewBox="0 0 16 16" class="size-5 fill-current sm:size-6" aria-hidden="true">
                <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
            </svg>
        </a>

        <p class="reveal-4 mt-8 font-mono text-xs tracking-[0.15em] text-muted uppercase" data-reveal>{{ $note }}</p>

    </div>
</section>
