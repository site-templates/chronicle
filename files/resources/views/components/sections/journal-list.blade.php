@props([
    'eyebrow' => 'Journal',
    'heading' => 'Notes from the desk',
    'body' => 'Occasional writing on design, code, and running a one-person studio. No schedule, no filler.',
    'items',
])
<!--
    The post index: brutalist ledger rows from
    resources/data/collections/journal.json — date, title, category, and an
    arrow, each row lighting up pink on hover and linking to its post at
    /journal/{slug}.
-->
<section id="journal" class="border-b border-line py-20 sm:py-28">
    <div class="mx-auto w-full max-w-7xl px-6">

        <div data-reveal>
            <p class="font-mono text-xs font-medium tracking-[0.2em] text-muted uppercase">{{ $eyebrow }}</p>
            <h2 class="mt-4 font-display text-4xl leading-[1.05] font-bold tracking-tight text-balance uppercase sm:text-5xl">{{ $heading }}</h2>
            <p class="mt-5 max-w-[52ch] text-base/7 text-pretty text-muted">{{ $body }}</p>
        </div>

        <div class="mt-12 border border-line bg-panel shadow-brutal" data-reveal>
            @foreach ($items as $item)
            <a href="{{ $item->link }}" class="group grid items-center gap-x-6 gap-y-2 border-line-soft px-6 py-6 transition-colors duration-150 not-first:border-t hover:bg-accent sm:grid-cols-[8.5rem_1fr_auto_auto] sm:px-8">
                <span class="font-mono text-xs text-muted transition-colors duration-150 group-hover:text-accent-ink">{{ $item->date }}</span>
                <span class="font-display text-xl font-bold tracking-tight text-ink transition-colors duration-150 group-hover:text-accent-ink sm:text-2xl">{{ $item->title }}</span>
                <span class="border border-line bg-canvas px-2 py-0.5 font-mono text-[11px] tracking-wide text-muted uppercase transition-colors duration-150 group-hover:text-ink max-sm:justify-self-start">{{ $item->category }}</span>
                <svg viewBox="0 0 16 16" class="size-5 fill-ink transition-all duration-150 group-hover:translate-x-1 group-hover:fill-accent-ink max-sm:hidden" aria-hidden="true">
                    <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                </svg>
            </a>
            @endforeach
        </div>

    </div>
</section>
