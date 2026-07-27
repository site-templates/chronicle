@props([
    'eyebrow' => 'Kind words',
    'heading' => 'People say nice things',
    'items',
])
<!--
    Testimonial cards from resources/data/collections/testimonials.json —
    each one leans a degree off square like a taped-up print, and
    straightens out on hover.
-->
<section id="testimonials" class="border-b border-line py-20 sm:py-28">
    <div class="mx-auto w-full max-w-7xl px-6">

        <div class="flex flex-wrap items-end justify-between gap-x-12 gap-y-4" data-reveal>
            <h2 class="font-display text-4xl leading-[1.05] font-bold tracking-tight text-balance uppercase sm:text-5xl">{{ $heading }}</h2>
            <p class="font-mono text-xs font-medium tracking-[0.2em] text-muted uppercase">{{ $eyebrow }}</p>
        </div>

        <div class="mt-14 grid gap-8 sm:gap-10 lg:grid-cols-3">
            @foreach ($items as $item)
            <figure class="flex flex-col border border-line bg-panel p-7 shadow-brutal transition-transform duration-300 odd:-rotate-1 even:rotate-1 hover:rotate-0 sm:p-8" data-reveal>
                <svg viewBox="0 0 64 64" class="size-6 fill-accent" aria-hidden="true">
                    <path d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
                </svg>
                <blockquote class="mt-5 grow font-display text-lg/7 font-medium tracking-tight text-ink">“{{ $item->quote }}”</blockquote>
                <figcaption class="mt-7 flex items-center gap-3 border-t border-line-soft pt-5">
                    <img src="{{ $item->avatar }}" alt="" class="size-10 border border-line object-cover" loading="lazy">
                    <span>
                        <span class="block font-display text-sm font-bold text-ink">{{ $item->name }}</span>
                        <span class="block font-mono text-xs text-muted">{{ $item->role }}</span>
                    </span>
                </figcaption>
            </figure>
            @endforeach
        </div>

    </div>
</section>
