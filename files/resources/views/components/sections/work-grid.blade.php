@props([
    'eyebrow' => 'Selected work',
    'heading' => 'Things I\'m proud of',
    'body' => 'A few recent projects — brands, websites, and products. Every one of them shipped, and every one of them is still alive.',
    'showAllLink' => '0',
    'allText' => 'All projects',
    'allLink' => '/work',
    'items',
])
<!--
    The project grid. Each card comes from an entry in
    resources/data/collections/work.json and links to its case study at
    /work/{slug}. Turn on the corner link when the section sits on a page
    that only shows a taste of the work.
-->
<section id="work" class="border-b border-line py-20 sm:py-28">
    <div class="mx-auto w-full max-w-7xl px-6">

        <div class="flex flex-wrap items-end justify-between gap-x-12 gap-y-6" data-reveal>
            <div>
                <p class="font-mono text-xs font-medium tracking-[0.2em] text-muted uppercase">{{ $eyebrow }}</p>
                <h2 class="mt-4 font-display text-4xl leading-[1.05] font-bold tracking-tight text-balance uppercase sm:text-5xl">{{ $heading }}</h2>
                <p class="mt-5 max-w-[52ch] text-base/7 text-pretty text-muted">{{ $body }}</p>
            </div>

            @if ($showAllLink)
            <a href="{{ $allLink }}" class="lift inline-flex shrink-0 items-center gap-2 border border-line bg-panel px-6 py-3.5 font-display text-sm font-bold tracking-wide text-ink uppercase shadow-brutal">
                {{ $allText }}
                <svg viewBox="0 0 16 16" class="size-4 fill-current" aria-hidden="true">
                    <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                </svg>
            </a>
            @endif
        </div>

        <div class="mt-14 grid gap-10 sm:grid-cols-2 sm:gap-x-8 sm:gap-y-14">
            @foreach ($items as $item)
            <a href="{{ $item->link }}" class="group block" data-reveal>
                <span class="lift lift-lg block border border-line bg-panel p-3 shadow-brutal">
                    <img src="{{ $item->image }}" alt="{{ $item->imageAlt }}" class="aspect-[4/3] w-full border border-line object-cover" loading="lazy">
                </span>
                <span class="mt-5 flex flex-wrap items-center gap-x-4 gap-y-2">
                    <span class="font-display text-2xl font-bold tracking-tight text-ink transition-colors duration-150 group-hover:text-accent">{{ $item->title }}</span>
                    <svg viewBox="0 0 16 16" class="size-4 fill-ink opacity-0 transition-all duration-150 group-hover:translate-x-1 group-hover:opacity-100" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="ml-auto flex items-center gap-2">
                        <span class="border border-line bg-canvas px-2 py-0.5 font-mono text-[11px] tracking-wide text-muted uppercase">{{ $item->category }}</span>
                        <span class="border border-line bg-canvas px-2 py-0.5 font-mono text-[11px] tracking-wide text-muted uppercase">{{ $item->year }}</span>
                    </span>
                </span>
                <span class="mt-2.5 block max-w-[56ch] text-[15px]/7 text-muted">{{ $item->summary }}</span>
            </a>
            @endforeach
        </div>

    </div>
</section>
