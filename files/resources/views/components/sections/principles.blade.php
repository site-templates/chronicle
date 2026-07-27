@props([
    'eyebrow' => 'How I work',
    'heading' => 'The house rules',
    'items',
])
<!--
    The manifesto: big numbered rows from
    resources/data/collections/principles.json — outlined numerals, a bold
    claim, and one honest sentence each.
-->
<section id="principles" class="border-b border-line py-20 sm:py-28">
    <div class="mx-auto w-full max-w-7xl px-6">

        <div class="flex flex-wrap items-end justify-between gap-x-12 gap-y-4" data-reveal>
            <h2 class="font-display text-4xl leading-[1.05] font-bold tracking-tight text-balance uppercase sm:text-5xl">{{ $heading }}</h2>
            <p class="font-mono text-xs font-medium tracking-[0.2em] text-muted uppercase">{{ $eyebrow }}</p>
        </div>

        <div class="mt-12 border-t border-line">
            @foreach ($items as $item)
            <div class="group grid items-baseline gap-x-10 gap-y-2 border-b border-line py-8 sm:grid-cols-[7rem_1fr] sm:py-10" data-reveal>
                <p class="text-outline font-display text-5xl font-bold sm:text-6xl">{{ $item->number }}</p>
                <div>
                    <h3 class="font-display text-2xl font-bold tracking-tight text-ink transition-colors duration-200 group-hover:text-accent sm:text-3xl">{{ $item->title }}</h3>
                    <p class="mt-3 max-w-[64ch] text-base/7 text-pretty text-muted">{{ $item->description }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
