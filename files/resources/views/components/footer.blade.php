@props([
    'brand' => 'Chronicle',
    'tagline' => 'Independent design & code studio. Brutal on the outside, thoughtful underneath.',
    'email' => 'hello@chronicle.studio',
    'showAvailability' => '1',
    'availability' => 'Booking for Q3 2026',
    'copyright' => '© 2026 Chronicle Studio. All rights reserved.',
    'credit' => 'Set in Space Grotesk',
    'socials' => [],
])
<!--
    The site-wide footer: hairline-divided columns, then the giant outlined
    wordmark, then the small print. The social links come from the
    social_links key in resources/data/site.json (the layout passes them in
    as the bound socials attribute).
-->
<footer class="border-t border-line">

    <div class="grid lg:grid-cols-[1.5fr_1fr_1fr_1.2fr]">

        <div class="border-b border-line p-8 sm:p-10 lg:border-b-0">
            <a href="/" aria-label="Homepage" class="inline-flex items-center gap-2.5 text-ink">
                <svg viewBox="0 0 64 64" class="size-5 shrink-0 fill-accent" aria-hidden="true">
                    <path stroke="currentColor" stroke-width="3" d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
                </svg>
                <span class="font-display text-lg font-bold tracking-tight">{{ $brand }}<span class="align-super text-[10px]">®</span></span>
            </a>
            <p class="mt-4 max-w-[30ch] text-[15px]/7 text-muted">{{ $tagline }}</p>
        </div>

        <nav class="border-b border-line p-8 sm:p-10 lg:border-b-0 lg:border-l" aria-label="Pages">
            <p class="font-mono text-[11px] font-medium tracking-[0.2em] text-faint uppercase">Pages</p>
            <ul role="list" class="mt-5 flex flex-col gap-3 font-display text-[15px] font-medium">
                <li><a href="/work" class="text-ink transition-colors duration-150 hover:text-accent">Work</a></li>
                <li><a href="/about" class="text-ink transition-colors duration-150 hover:text-accent">About</a></li>
                <li><a href="/journal" class="text-ink transition-colors duration-150 hover:text-accent">Journal</a></li>
                <li><a href="/contact" class="text-ink transition-colors duration-150 hover:text-accent">Contact</a></li>
            </ul>
        </nav>

        <nav class="border-b border-line p-8 sm:p-10 lg:border-b-0 lg:border-l" aria-label="Social">
            <p class="font-mono text-[11px] font-medium tracking-[0.2em] text-faint uppercase">Elsewhere</p>
            <ul role="list" class="mt-5 flex flex-col gap-3 font-display text-[15px] font-medium">
                @foreach ($socials as $social)
                <li>
                    <a href="{{ $social->url }}" target="_blank" rel="noopener" class="group inline-flex items-center gap-1.5 text-ink transition-colors duration-150 hover:text-accent">
                        {{ $social->text }}
                        <svg viewBox="0 0 16 16" class="size-3 fill-current opacity-40 transition-all duration-150 group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:opacity-100" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4.25 3a.75.75 0 0 0 0 1.5h6.19L3.22 11.72a.75.75 0 1 0 1.06 1.06l7.22-7.22v6.19a.75.75 0 0 0 1.5 0V3.75a.75.75 0 0 0-.75-.75H4.25Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </li>
                @endforeach
            </ul>
        </nav>

        <div class="p-8 sm:p-10 lg:border-l lg:border-line">
            <p class="font-mono text-[11px] font-medium tracking-[0.2em] text-faint uppercase">Start a project</p>
            <a href="mailto:{{ $email }}" class="mt-5 inline-block font-display text-lg font-bold text-ink underline decoration-accent decoration-[3px] underline-offset-[6px] transition-colors duration-150 hover:text-accent">{{ $email }}</a>
            @if ($showAvailability)
            <p class="mt-4 inline-flex items-center gap-2 border border-line bg-panel px-3 py-1.5 font-mono text-xs text-muted">
                <span class="relative flex size-2">
                    <span class="absolute inline-flex h-full w-full animate-ping bg-accent opacity-60"></span>
                    <span class="relative inline-flex size-2 bg-accent"></span>
                </span>
                {{ $availability }}
            </p>
            @endif
        </div>

    </div>

    <!-- The wordmark, wall to wall -->
    <div class="overflow-hidden border-t border-line px-2">
        <p class="text-outline -mb-[0.24em] text-center font-display text-[21.5vw] leading-none font-bold tracking-[-0.04em] uppercase select-none lg:text-[13rem]" aria-hidden="true">{{ $brand }}</p>
    </div>

    <!-- Small print -->
    <div class="flex flex-wrap items-center justify-between gap-3 border-t border-line px-6 py-5 font-mono text-xs text-muted sm:px-10">
        <p>{{ $copyright }}</p>
        <p class="inline-flex items-center gap-1.5">
            {{ $credit }}
            <svg viewBox="0 0 64 64" class="size-3 fill-accent" aria-hidden="true">
                <path d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
            </svg>
        </p>
    </div>

</footer>
