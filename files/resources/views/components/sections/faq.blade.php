@props([
    'eyebrow' => 'FAQ',
    'heading' => 'Before you ask',
    'body' => 'The questions almost every project starts with. Anything else — just email.',
    'items',
])
<!--
    Question-and-answer list from resources/data/collections/faq.json. Each
    item is a native details element; site.css animates the opening
    smoothly in browsers that support it, and it degrades to an instant
    toggle everywhere else.
-->
<section id="faq" class="border-b border-line py-20 sm:py-28">
    <div class="mx-auto w-full max-w-7xl px-6">
        <div class="grid gap-12 lg:grid-cols-[1fr_1.6fr] lg:gap-20">

            <div data-reveal>
                <p class="font-mono text-xs font-medium tracking-[0.2em] text-muted uppercase">{{ $eyebrow }}</p>
                <h2 class="mt-4 font-display text-4xl leading-[1.05] font-bold tracking-tight text-balance uppercase sm:text-5xl">{{ $heading }}</h2>
                <p class="mt-5 text-base/7 text-pretty text-muted">{{ $body }}</p>
            </div>

            <div class="border border-line bg-panel shadow-brutal" data-reveal>
                @foreach ($items as $item)
                    <details class="faq-item group border-line-soft not-first:border-t">
                        <summary class="flex cursor-pointer list-none items-center justify-between gap-6 px-6 py-5 text-left font-display text-lg font-bold tracking-tight text-ink transition-colors duration-150 hover:bg-accent-soft sm:px-8">
                            {{ $item->question }}
                            <svg viewBox="0 0 20 20" class="size-5 shrink-0 fill-accent transition-transform duration-300 group-open:rotate-45" aria-hidden="true">
                                <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z"/>
                            </svg>
                        </summary>
                        <p class="px-6 pb-6 text-[15px]/7 text-pretty text-muted sm:px-8">{{ $item->answer }}</p>
                    </details>
                @endforeach
            </div>

        </div>
    </div>
</section>
