@props([
    'items',
    'reversed' => '0',
])
<!--
    The scrolling pink strip. Its phrases come from
    resources/data/collections/marquee.json; the run is drawn twice so the
    loop is seamless (see .marquee in site.css). Hover pauses it; flip the
    direction from the inspector.
-->
@if ($reversed)
<section id="marquee" class="marquee border-b border-line bg-accent py-4" data-reverse>
@else
<section id="marquee" class="marquee border-b border-line bg-accent py-4">
@endif
    <div class="marquee-track items-center gap-8 pr-8">
        @foreach ($items as $item)
        <span class="flex shrink-0 items-center gap-8 font-display text-xl font-bold tracking-tight text-accent-ink uppercase sm:text-2xl">
            {{ $item->text }}
            <svg viewBox="0 0 64 64" class="size-5 fill-current" aria-hidden="true">
                <path d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
            </svg>
        </span>
        @endforeach
        @foreach ($items as $item)
        <span aria-hidden="true" class="flex shrink-0 items-center gap-8 font-display text-xl font-bold tracking-tight text-accent-ink uppercase sm:text-2xl">
            {{ $item->text }}
            <svg viewBox="0 0 64 64" class="size-5 fill-current" aria-hidden="true">
                <path d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
            </svg>
        </span>
        @endforeach
    </div>
</section>
