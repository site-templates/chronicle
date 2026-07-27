@props([
    'eyebrow' => 'Good company',
    'heading' => 'Clients who came back',
    'items',
])
<!--
    The client wall: text logotypes in bordered cells, from
    resources/data/collections/clients.json. Type is the logo — swap the
    names and the wall restyles itself.
-->
<section id="clients" class="border-b border-line py-20 sm:py-28">
    <div class="mx-auto w-full max-w-7xl px-6">

        <div class="flex flex-wrap items-end justify-between gap-x-12 gap-y-4" data-reveal>
            <h2 class="font-display text-4xl leading-[1.05] font-bold tracking-tight text-balance uppercase sm:text-5xl">{{ $heading }}</h2>
            <p class="font-mono text-xs font-medium tracking-[0.2em] text-muted uppercase">{{ $eyebrow }}</p>
        </div>

        <div class="mt-12 grid grid-cols-2 gap-px border border-line bg-line-soft shadow-brutal sm:grid-cols-4" data-reveal>
            @foreach ($items as $item)
            <div class="group flex items-center justify-center bg-panel px-4 py-9 transition-colors duration-200 hover:bg-accent">
                <span class="font-display text-lg font-bold tracking-tight text-muted transition-colors duration-200 group-hover:text-accent-ink sm:text-xl">{{ $item->name }}</span>
            </div>
            @endforeach
        </div>

    </div>
</section>
