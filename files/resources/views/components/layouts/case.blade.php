@props([
    'title' => '',
    'description' => '',
    'category' => 'Case study',
    'client' => '',
    'role' => '',
    'services' => '',
    'year' => '',
    'liveUrl' => '',
    'liveText' => 'View it live',
    'image' => '',
    'imageAlt' => '',
])
<!--
    The shared chrome for a Work case study: breadcrumb, a big display
    title, the folk-style spec table (client, role, services, year), the
    cover image in a brutal frame, then the story in the slot as plain
    HTML styled by .prose. Leave liveUrl empty to hide the live button.
-->
<x-layouts.main :title="$title" :description="$description">

    <article class="pt-16 pb-24 sm:pt-24 sm:pb-32">
        <div class="mx-auto w-full max-w-7xl px-6">

            <div data-reveal>
                <a href="/work" class="group inline-flex items-center gap-1.5 font-mono text-xs font-medium tracking-[0.15em] text-muted uppercase transition-colors duration-150 hover:text-ink">
                    <svg viewBox="0 0 16 16" class="size-3.5 shrink-0 fill-current transition-transform duration-150 group-hover:-translate-x-0.5" aria-hidden="true">
                        <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
                    </svg>
                    All work
                </a>
            </div>

            <div class="reveal-1 mt-8 flex flex-wrap items-end justify-between gap-x-12 gap-y-6" data-reveal>
                <div class="max-w-3xl">
                    <span class="border border-line bg-accent px-2.5 py-0.5 font-display text-[13px] font-bold text-accent-ink shadow-brutal-sm">{{ $category }}</span>
                    <h1 class="mt-6 font-display text-4xl leading-[1.02] font-bold tracking-tight text-balance uppercase sm:text-6xl">{{ $title }}</h1>
                    <p class="mt-6 max-w-[52ch] text-lg/8 text-pretty text-muted">{{ $description }}</p>
                </div>

                @if ($liveUrl)
                <a href="{{ $liveUrl }}" class="lift inline-flex shrink-0 items-center gap-2 border border-line bg-ink px-6 py-3.5 font-display text-sm font-bold tracking-wide text-canvas uppercase shadow-brutal">
                    {{ $liveText }}
                    <svg viewBox="0 0 16 16" class="size-4 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.25 3a.75.75 0 0 0 0 1.5h6.19L3.22 11.72a.75.75 0 1 0 1.06 1.06l7.22-7.22v6.19a.75.75 0 0 0 1.5 0V3.75a.75.75 0 0 0-.75-.75H4.25Z" clip-rule="evenodd"/>
                    </svg>
                </a>
                @endif
            </div>

            <!-- The spec table — hairline cells, folk-style -->
            <div class="reveal-2 mt-12 grid border border-line bg-panel sm:grid-cols-2 lg:grid-cols-4" data-reveal>
                <div class="border-b border-line-soft p-5 sm:border-r lg:border-b-0">
                    <p class="font-mono text-[11px] font-medium tracking-[0.2em] text-faint uppercase">Client</p>
                    <p class="mt-1.5 font-display text-base font-bold text-ink">{{ $client }}</p>
                </div>
                <div class="border-b border-line-soft p-5 lg:border-r lg:border-b-0">
                    <p class="font-mono text-[11px] font-medium tracking-[0.2em] text-faint uppercase">Role</p>
                    <p class="mt-1.5 font-display text-base font-bold text-ink">{{ $role }}</p>
                </div>
                <div class="border-b border-line-soft p-5 sm:border-r sm:border-b-0">
                    <p class="font-mono text-[11px] font-medium tracking-[0.2em] text-faint uppercase">Services</p>
                    <p class="mt-1.5 font-display text-base font-bold text-ink">{{ $services }}</p>
                </div>
                <div class="p-5">
                    <p class="font-mono text-[11px] font-medium tracking-[0.2em] text-faint uppercase">Year</p>
                    <p class="mt-1.5 font-display text-base font-bold text-ink">{{ $year }}</p>
                </div>
            </div>

            @if ($image)
                <div class="reveal-3 mt-12 sm:mt-16" data-reveal>
                    <img src="{{ $image }}" alt="{{ $imageAlt }}" class="aspect-[16/9] w-full border border-line object-cover shadow-brutal-lg">
                </div>
            @endif

            <div class="prose reveal-4 mx-auto mt-14 max-w-2xl sm:mt-20" data-reveal>
                {{ $slot }}
            </div>

            <!-- The closing band every case study shares -->
            <div class="mt-20 flex flex-col items-center gap-6 border border-line bg-accent p-10 text-center shadow-brutal-lg sm:p-14" data-reveal>
                <p class="max-w-[24ch] font-display text-3xl leading-[1.1] font-bold tracking-tight text-accent-ink sm:text-4xl">Want results like these?</p>
                <a href="/contact" class="lift inline-flex items-center gap-2 border border-line bg-ink px-7 py-4 font-display text-sm font-bold tracking-wide text-canvas uppercase shadow-brutal">
                    Start a project
                    <svg viewBox="0 0 16 16" class="size-4 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>

        </div>
    </article>

</x-layouts.main>
