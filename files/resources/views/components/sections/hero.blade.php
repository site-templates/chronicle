@props([
    'eyebrow' => 'Hi — I\'m Marlo Vane',
    'headingStart' => 'I make brands',
    'headingPill' => 'too bold',
    'headingEnd' => 'to scroll past.',
    'body' => 'Chronicle is my small design & code studio. Strategy, identity, and websites for people with something to say — built loud, shipped fast, and maintained like I mean it.',
    'primaryText' => 'View the work',
    'primaryLink' => '/work',
    'secondaryText' => 'More about me',
    'secondaryLink' => '/about',
    'image' => '/assets/images/hero-portrait.jpg',
    'imageAlt' => 'Torn-paper collage portrait of Marlo Vane',
    'caption' => 'Fig. 01 — The human',
    'showStickers' => '1',
    'stickerOne' => 'Pixel perfectish',
    'stickerTwo' => 'Less, but louder',
])
<!--
    The opening statement: a huge display headline with one phrase set on a
    pink sticker pill, subcopy and two buttons on the left, and the studio
    portrait in a brutal frame on the right — sticker chips lean toward the
    pointer as it moves. Turn the stickers off from the inspector if you
    want the portrait plain.
-->
<!--
    On desktop the hero fills the viewport minus the sticky nav (65px) and the
    marquee strip (65px), so the pink marquee always lands above the fold. The
    portrait's width is capped by viewport height for the same reason.
-->
<section id="hero" class="relative border-b border-line lg:flex lg:min-h-[calc(100dvh-130px)] lg:items-center">
    <div class="grid-texture pointer-events-none absolute inset-0" aria-hidden="true"></div>

    <div class="relative mx-auto grid w-full max-w-7xl items-center gap-14 px-6 pt-16 pb-20 sm:pt-20 sm:pb-24 lg:grid-cols-[1.15fr_1fr] lg:gap-20 lg:py-10">

        <div>
            <p class="inline-flex items-center gap-2.5 font-mono text-xs font-medium tracking-[0.2em] uppercase" data-reveal>
                <svg viewBox="0 0 64 64" class="spin-slow size-4 fill-accent" aria-hidden="true">
                    <path stroke="currentColor" stroke-width="3" class="text-ink" d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
                </svg>
                {{ $eyebrow }}
            </p>

            <h1 class="reveal-1 mt-7 font-display text-5xl leading-[1.02] font-bold tracking-tight text-balance sm:text-6xl lg:text-7xl" data-reveal>
                {{ $headingStart }}
                <span class="relative inline-block -rotate-1 border border-line bg-accent px-3 py-0.5 text-accent-ink shadow-brutal">{{ $headingPill }}</span>
                {{ $headingEnd }}
            </h1>

            <p class="reveal-2 mt-8 max-w-[52ch] text-lg/8 text-pretty text-muted" data-reveal>{{ $body }}</p>

            <div class="reveal-3 mt-10 flex flex-wrap items-center gap-4" data-reveal>
                <a href="{{ $primaryLink }}" class="lift inline-flex items-center gap-2 border border-line bg-ink py-4 pr-5 pl-7 font-display text-sm font-bold tracking-wide text-canvas uppercase shadow-brutal">
                    {{ $primaryText }}
                    <svg viewBox="0 0 16 16" class="size-4 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="{{ $secondaryLink }}" class="lift inline-flex items-center gap-2 border border-line bg-panel px-7 py-4 font-display text-sm font-bold tracking-wide text-ink uppercase shadow-brutal">
                    {{ $secondaryText }}
                </a>
            </div>
        </div>

        <!-- The portrait, framed like a print -->
        <div class="reveal-2 relative mx-auto w-full max-w-md lg:max-w-[min(100%,calc((100dvh-17.5rem)*0.8))]" data-reveal>
            <div class="border border-line bg-panel p-3 shadow-brutal-lg sm:p-4">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" class="aspect-[4/5] w-full border border-line object-cover">
                <div class="flex items-center justify-between pt-3 font-mono text-[11px] tracking-[0.15em] text-muted uppercase">
                    <span>{{ $caption }}</span>
                    <svg viewBox="0 0 64 64" class="size-3.5 fill-accent" aria-hidden="true">
                        <path d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
                    </svg>
                </div>
            </div>

            @if ($showStickers)
            <span data-tilt class="absolute -top-4 -left-4 inline-block -rotate-6 rounded-full border border-line bg-accent px-4 py-2 font-display text-sm font-bold text-accent-ink shadow-brutal-sm sm:-left-8">{{ $stickerOne }}</span>
            <span data-tilt class="absolute -right-3 bottom-16 inline-block rotate-3 rounded-full border border-line bg-canvas px-4 py-2 font-display text-sm font-bold text-ink shadow-brutal-sm sm:-right-6">{{ $stickerTwo }}</span>
            @endif
        </div>

    </div>
</section>
