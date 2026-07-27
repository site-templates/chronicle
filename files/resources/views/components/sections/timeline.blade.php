@props([
    'eyebrow' => 'The long version',
    'heading' => 'Where I\'ve been',
    'items',
])
<!--
    The experience ledger: one hairlined row per chapter, from
    resources/data/collections/experience.json.
-->
<section id="timeline" class="border-b border-line py-20 sm:py-28">
    <div class="mx-auto w-full max-w-7xl px-6">

        <div class="flex flex-wrap items-end justify-between gap-x-12 gap-y-4" data-reveal>
            <h2 class="font-display text-4xl leading-[1.05] font-bold tracking-tight text-balance uppercase sm:text-5xl">{{ $heading }}</h2>
            <p class="font-mono text-xs font-medium tracking-[0.2em] text-muted uppercase">{{ $eyebrow }}</p>
        </div>

        <div class="mt-12 border-t border-line" data-reveal>
            @foreach ($items as $item)
            <div class="group grid gap-x-8 gap-y-1 border-b border-line py-7 transition-colors duration-200 hover:bg-accent-soft sm:px-4 lg:grid-cols-[10rem_1.2fr_1fr]">
                <p class="font-mono text-sm text-muted">{{ $item->years }}</p>
                <div>
                    <h3 class="font-display text-xl font-bold tracking-tight text-ink">{{ $item->role }}</h3>
                    <p class="mt-1 font-mono text-xs tracking-wide text-muted uppercase">{{ $item->place }}</p>
                </div>
                <p class="text-[15px]/7 text-muted max-lg:mt-2">{{ $item->description }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>
