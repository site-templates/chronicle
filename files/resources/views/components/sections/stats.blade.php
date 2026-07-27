@props([
    'items',
])
<!--
    The numbers strip: big display figures in hairline-divided cells, from
    resources/data/collections/stats.json. Each figure counts up from zero
    as it scrolls into view (see countUpStats in public/js/main.js).
-->
<section id="stats" class="border-b border-line">
    <div class="mx-auto w-full max-w-7xl px-6">
        <div class="grid gap-px bg-line-soft sm:grid-cols-2 lg:grid-cols-4" data-reveal>
            @foreach ($items as $item)
            <div class="bg-canvas px-2 py-10 text-center sm:py-12">
                <p class="font-display text-5xl font-bold tracking-tight text-ink sm:text-6xl" data-count>{{ $item->value }}</p>
                <p class="mt-3 font-mono text-[11px] font-medium tracking-[0.2em] text-muted uppercase">{{ $item->label }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
