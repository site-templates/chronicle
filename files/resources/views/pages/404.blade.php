<!--
    The not-found page. Served for any URL that doesn't match a page.
-->
<x-layouts.main title="Page not found" description="That page doesn't exist.">

    <section class="relative overflow-hidden border-b border-line">
        <div class="grid-texture pointer-events-none absolute inset-0" aria-hidden="true"></div>

        <div class="relative mx-auto flex w-full max-w-7xl flex-col items-center px-6 py-24 text-center sm:py-32">
            <p class="text-outline font-display text-[7rem] leading-none font-bold sm:text-[12rem]">404</p>

            <p class="mt-2 inline-block -rotate-2 border border-line bg-accent px-4 py-1.5 font-display text-lg font-bold text-accent-ink shadow-brutal">This page doesn't exist</p>

            <p class="mt-8 max-w-[44ch] text-lg/8 text-pretty text-muted">Either the link is old, the URL got mangled, or I moved something and forgot to tell the internet. The homepage knows the way.</p>

            <a href="/" class="lift mt-10 inline-flex items-center gap-2 border border-line bg-ink py-4 pr-7 pl-5 font-display text-sm font-bold tracking-wide text-canvas uppercase shadow-brutal">
                <svg viewBox="0 0 16 16" class="size-4 fill-current" aria-hidden="true">
                    <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
                </svg>
                Back to the homepage
            </a>
        </div>
    </section>

</x-layouts.main>
