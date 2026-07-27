@props([
    'emailLabel' => 'Email — the whole funnel',
    'email' => 'hello@chronicle.studio',
    'emailNote' => 'Tell me what you\'re building, roughly when you need it, and your budget bracket if you know it. I reply to everything within two working days.',
    'location' => 'Portland, OR — working worldwide',
    'showAvailability' => '1',
    'availability' => 'Booking for Q3 2026',
    'socials' => [],
])
<!--
    The contact board: the email card on the left, the socials ledger plus
    location and availability on the right. The social links come from the
    social_links key in resources/data/site.json via the bound socials
    attribute.
-->
<section id="contact-details" class="border-b border-line py-20 sm:py-28">
    <div class="mx-auto grid w-full max-w-7xl gap-10 px-6 lg:grid-cols-[1.3fr_1fr] lg:gap-14">

        <div class="flex flex-col border border-line bg-accent p-8 shadow-brutal-lg sm:p-12" data-reveal>
            <p class="font-mono text-xs font-medium tracking-[0.2em] text-accent-ink uppercase">{{ $emailLabel }}</p>
            <a href="mailto:{{ $email }}" class="mt-6 inline-block font-display text-3xl leading-[1.05] font-bold tracking-tight text-accent-ink underline decoration-[3px] underline-offset-8 transition-opacity duration-150 hover:opacity-70 sm:text-5xl">{{ $email }}</a>
            <p class="mt-8 max-w-[46ch] text-base/7 text-pretty text-accent-ink/80">{{ $emailNote }}</p>
            <svg viewBox="0 0 64 64" class="spin-slow mt-10 size-8 fill-accent-ink" aria-hidden="true">
                <path d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
            </svg>
        </div>

        <div class="reveal-1 flex flex-col gap-8" data-reveal>
            <div class="border border-line bg-panel shadow-brutal">
                <p class="border-b border-line px-6 py-4 font-mono text-[11px] font-medium tracking-[0.2em] text-faint uppercase">Elsewhere</p>
                @foreach ($socials as $social)
                <a href="{{ $social->url }}" class="group flex items-center justify-between border-line-soft px-6 py-4 font-display text-lg font-bold text-ink transition-colors duration-150 not-first:border-t hover:bg-accent hover:text-accent-ink">
                    {{ $social->text }}
                    <svg viewBox="0 0 16 16" class="size-4 fill-current transition-transform duration-150 group-hover:-translate-y-0.5 group-hover:translate-x-0.5" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.25 3a.75.75 0 0 0 0 1.5h6.19L3.22 11.72a.75.75 0 1 0 1.06 1.06l7.22-7.22v6.19a.75.75 0 0 0 1.5 0V3.75a.75.75 0 0 0-.75-.75H4.25Z" clip-rule="evenodd"/>
                    </svg>
                </a>
                @endforeach
            </div>

            <div class="border border-line bg-panel p-6 shadow-brutal">
                <p class="font-mono text-[11px] font-medium tracking-[0.2em] text-faint uppercase">Based in</p>
                <p class="mt-2 font-display text-lg font-bold text-ink">{{ $location }}</p>

                @if ($showAvailability)
                <p class="mt-5 inline-flex items-center gap-2 border border-line bg-canvas px-3 py-1.5 font-mono text-xs text-muted">
                    <span class="relative flex size-2">
                        <span class="absolute inline-flex h-full w-full animate-ping bg-accent opacity-60"></span>
                        <span class="relative inline-flex size-2 bg-accent"></span>
                    </span>
                    {{ $availability }}
                </p>
                @endif
            </div>
        </div>

    </div>
</section>
