@props([
    'eyebrow' => 'What I do',
    'heading' => 'Four things, done properly',
    'body' => 'No sprawling service menu. These are the four jobs I take, and the shape each one usually comes in.',
    'items',
])
<!--
    The services board, folk-style: numbered columns separated by ink
    hairlines. Each column comes from an entry in
    resources/data/collections/services.json.
-->
<section id="services" class="border-b border-line py-20 sm:py-28">
    <div class="mx-auto w-full max-w-7xl px-6">

        <div data-reveal>
            <p class="font-mono text-xs font-medium tracking-[0.2em] text-muted uppercase">{{ $eyebrow }}</p>
            <h2 class="mt-4 font-display text-4xl leading-[1.05] font-bold tracking-tight text-balance uppercase sm:text-5xl">{{ $heading }}</h2>
            <p class="mt-5 max-w-[52ch] text-base/7 text-pretty text-muted">{{ $body }}</p>
        </div>

        <!-- The 1px grid gap over an ink background draws every hairline for free, at any breakpoint. -->
        <div class="mt-14 grid gap-px border border-line bg-line-soft shadow-brutal sm:grid-cols-2 lg:grid-cols-4" data-reveal>
            @foreach ($items as $item)
            <div class="group bg-panel p-7 transition-colors duration-200 hover:bg-accent-soft sm:p-8">
                <p class="font-display text-4xl font-bold text-accent transition-transform duration-200 group-hover:-translate-y-1">{{ $item->number }}</p>
                <h3 class="mt-6 font-display text-xl font-bold tracking-tight text-ink">{{ $item->title }}</h3>
                <p class="mt-3 text-[15px]/7 text-muted">{{ $item->description }}</p>
                <p class="mt-6 border-t border-line-soft pt-4 font-mono text-[11px]/5 tracking-wide text-faint uppercase">{{ $item->tags }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>
