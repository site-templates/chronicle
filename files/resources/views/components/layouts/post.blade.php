@props([
    'title' => '',
    'description' => '',
    'category' => 'Notes',
    'date' => '',
    'readTime' => '',
    'author' => '',
    'authorRole' => '',
    'authorImage' => '',
    'image' => '',
    'imageAlt' => '',
])
<!--
    The shared chrome for a Journal post: breadcrumb, category sticker and
    date, a big display title, the byline, an optional lead image in a
    brutal frame, then your words. Write the body as plain HTML in the
    slot; resources/css/site.css styles it via the .prose class. Leave
    image empty to skip the lead image entirely.
-->
<x-layouts.main :title="$title" :description="$description">

    <article class="pt-16 pb-24 sm:pt-24 sm:pb-32">
        <div class="mx-auto w-full max-w-7xl px-6">

            <div class="mx-auto max-w-2xl">
                <div data-reveal>
                    <a href="/journal" class="group inline-flex items-center gap-1.5 font-mono text-xs font-medium tracking-[0.15em] text-muted uppercase transition-colors duration-150 hover:text-ink">
                        <svg viewBox="0 0 16 16" class="size-3.5 shrink-0 fill-current transition-transform duration-150 group-hover:-translate-x-0.5" aria-hidden="true">
                            <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
                        </svg>
                        Journal
                    </a>
                </div>

                <div class="reveal-1 mt-8 flex flex-wrap items-center gap-3 text-sm" data-reveal>
                    <span class="border border-line bg-accent px-2.5 py-0.5 font-display text-[13px] font-bold text-accent-ink shadow-brutal-sm">{{ $category }}</span>
                    <span class="font-mono text-xs text-muted">{{ $date }}</span>
                    @if ($readTime)
                        <span class="font-mono text-xs text-faint">/</span>
                        <span class="font-mono text-xs text-muted">{{ $readTime }}</span>
                    @endif
                </div>

                <h1 class="reveal-1 mt-6 font-display text-4xl leading-[1.05] font-bold tracking-tight text-balance sm:text-5xl" data-reveal>{{ $title }}</h1>

                <p class="reveal-2 mt-6 text-lg/8 text-pretty text-muted" data-reveal>{{ $description }}</p>

                @if ($author)
                    <div class="reveal-3 mt-8 flex items-center gap-3 border-y border-line-soft py-4" data-reveal>
                        <img src="{{ $authorImage }}" alt="" class="size-10 border border-line object-cover">
                        <div class="text-sm">
                            <p class="font-display font-bold text-ink">{{ $author }}</p>
                            <p class="font-mono text-xs text-muted">{{ $authorRole }}</p>
                        </div>
                    </div>
                @endif
            </div>

            @if ($image)
                <div class="reveal-3 mx-auto mt-12 max-w-4xl sm:mt-16" data-reveal>
                    <img src="{{ $image }}" alt="{{ $imageAlt }}" class="aspect-[16/8] w-full border border-line object-cover shadow-brutal-lg">
                </div>
            @endif

            <div class="prose reveal-4 mx-auto mt-14 max-w-2xl sm:mt-16" data-reveal>
                {{ $slot }}
            </div>

            <!-- The closing card every post shares -->
            <div class="mx-auto mt-16 max-w-2xl border border-line bg-panel p-8 shadow-brutal" data-reveal>
                <p class="text-base/7 text-muted">
                    Enjoyed this? There's more where it came from —
                    <a href="/journal" class="font-semibold text-ink underline decoration-accent decoration-2 underline-offset-4 transition-colors duration-150 hover:text-accent">read the journal</a>
                    or <a href="/contact" class="font-semibold text-ink underline decoration-accent decoration-2 underline-offset-4 transition-colors duration-150 hover:text-accent">start a project</a>.
                </p>
            </div>

        </div>
    </article>

</x-layouts.main>
