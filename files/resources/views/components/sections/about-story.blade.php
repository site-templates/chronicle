@props([
    'eyebrow' => 'The short version',
    'heading' => 'Designer, developer, occasional troublemaker',
    'bodyOne' => 'I\'ve spent twelve years designing and building for the web — first inside product teams at startups you\'ve probably used, now independently as Chronicle. The through line: work that has a point of view. Safe design is invisible design, and invisible is expensive.',
    'bodyTwo' => 'We work end to end — strategy, identity, design, and the code that ships it. One tight team, no handoffs, no telephone game. You talk to the people making the thing, every time.',
    'image' => '/assets/images/about-studio.jpg',
    'imageAlt' => 'The Chronicle studio at work',
    'caption' => 'Fig. 02 — The studio',
    'name' => 'Marlo Vane',
    'role' => 'Founder & everything else, Chronicle',
])
<!--
    The bio split: the studio photo in a brutal frame beside two paragraphs
    of the story and a signature block.
-->
<section id="about-story" class="border-b border-line py-20 sm:py-28">
    <div class="mx-auto grid w-full max-w-7xl items-center gap-14 px-6 lg:grid-cols-[1fr_1.15fr] lg:gap-20">

        <div class="relative mx-auto w-full max-w-md lg:max-w-none" data-reveal>
            <div class="border border-line bg-panel p-3 shadow-brutal-lg sm:p-4">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" class="aspect-[4/3] w-full border border-line object-cover">
                <div class="flex items-center justify-between pt-3 font-mono text-[11px] tracking-[0.15em] text-muted uppercase">
                    <span>{{ $caption }}</span>
                    <svg viewBox="0 0 64 64" class="size-3.5 fill-accent" aria-hidden="true">
                        <path d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="reveal-1" data-reveal>
            <p class="font-mono text-xs font-medium tracking-[0.2em] text-muted uppercase">{{ $eyebrow }}</p>
            <h2 class="mt-4 font-display text-4xl leading-[1.05] font-bold tracking-tight text-balance uppercase sm:text-5xl">{{ $heading }}</h2>
            <p class="mt-7 text-base/8 text-pretty text-muted">{{ $bodyOne }}</p>
            <p class="mt-5 text-base/8 text-pretty text-muted">{{ $bodyTwo }}</p>

            <div class="mt-9 flex items-center gap-4 border-t border-line pt-7">
                <svg viewBox="0 0 64 64" class="size-8 fill-accent" aria-hidden="true">
                    <path stroke="currentColor" stroke-width="3" class="text-ink" d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
                </svg>
                <div>
                    <p class="font-display text-base font-bold text-ink">{{ $name }}</p>
                    <p class="font-mono text-xs text-muted">{{ $role }}</p>
                </div>
            </div>
        </div>

    </div>
</section>
