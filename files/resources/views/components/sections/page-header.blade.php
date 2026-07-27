@props([
    'eyebrow' => 'Section',
    'heading' => 'Page title',
    'intro' => '',
])
<!--
    The standard inner-page opener: a mono eyebrow with the spark, a huge
    uppercase title, and an optional intro line. Leave intro empty to skip
    it.
-->
<section id="page-header" class="relative border-b border-line">
    <div class="grid-texture pointer-events-none absolute inset-0" aria-hidden="true"></div>

    <div class="relative mx-auto w-full max-w-7xl px-6 pt-16 pb-14 sm:pt-24 sm:pb-20">
        <p class="inline-flex items-center gap-2.5 font-mono text-xs font-medium tracking-[0.2em] uppercase" data-reveal>
            <svg viewBox="0 0 64 64" class="spin-slow size-4 fill-accent" aria-hidden="true">
                <path stroke="currentColor" stroke-width="3" class="text-ink" d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
            </svg>
            {{ $eyebrow }}
        </p>

        <h1 class="reveal-1 mt-6 font-display text-5xl leading-[0.98] font-bold tracking-tight text-balance uppercase sm:text-7xl lg:text-8xl" data-reveal>{{ $heading }}</h1>

        @if ($intro)
        <p class="reveal-2 mt-7 max-w-[56ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $intro }}</p>
        @endif
    </div>
</section>
