@props([
    'brand' => 'Chronicle',
    'links' => [],
    'ctaText' => 'Let\'s talk',
    'ctaLink' => '/contact',
])
<!--
    The site-wide top bar, drawn Gumroad-style: a full-bleed sticky strip of
    cells separated by ink hairlines, with the call to action filling the
    right cell in accent pink. The primary links come from the nav_links key
    in resources/data/site.json (the layout passes them in as the bound
    links attribute).
-->
<header id="header" class="sticky top-0 z-50 border-b border-line bg-canvas">
    <div class="flex h-16 items-stretch">

        <!-- href="/" always points to your site's root, in preview and when published -->
        <a href="/" aria-label="Homepage" class="flex shrink-0 items-center gap-2.5 border-r border-line px-5 text-ink sm:px-7">
            <svg viewBox="0 0 64 64" class="size-5 shrink-0 fill-accent" aria-hidden="true">
                <path stroke="currentColor" stroke-width="3" d="M32 6 C34.8 20.4 43.6 29.2 58 32 C43.6 34.8 34.8 43.6 32 58 C29.2 43.6 20.4 34.8 6 32 C20.4 29.2 29.2 20.4 32 6 Z"/>
            </svg>
            <span class="font-display text-lg font-bold tracking-tight">{{ $brand }}<span class="align-super text-[10px]">®</span></span>
        </a>

        <!-- Primary links -->
        <nav class="flex flex-1 items-center justify-end px-4 max-lg:hidden" aria-label="Main">
            <ul role="list" class="flex items-center gap-1 font-display text-[15px] font-medium">
                @foreach ($links as $link)
                <li>
                    <a href="{{ $link->url }}" class="block px-3.5 py-2 transition-colors duration-150 hover:bg-accent hover:text-accent-ink aria-[current]:underline aria-[current]:decoration-accent aria-[current]:decoration-[3px] aria-[current]:underline-offset-[6px]">{{ $link->text }}</a>
                </li>
                @endforeach
            </ul>
        </nav>

        <!-- The call to action fills its cell, corner to corner -->
        <a href="{{ $ctaLink }}" class="flex shrink-0 items-center gap-2 border-l border-line bg-accent px-6 font-display text-[15px] font-bold text-accent-ink transition-colors duration-150 hover:bg-ink hover:text-canvas max-lg:hidden sm:px-8">
            {{ $ctaText }}
            <svg viewBox="0 0 16 16" class="size-4 fill-current" aria-hidden="true">
                <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
            </svg>
        </a>

        <!-- Mobile: hamburger -->
        <button
            type="button"
            data-mobile-toggle
            aria-expanded="false"
            aria-label="Toggle menu"
            class="ml-auto flex w-16 cursor-pointer items-center justify-center border-l border-line text-ink transition-colors duration-150 hover:bg-accent hover:text-accent-ink lg:hidden">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" class="size-6 stroke-current [.menu-open_&]:hidden" aria-hidden="true">
                <path stroke-linecap="square" d="M3.75 7h16.5M3.75 12h16.5M3.75 17h16.5"/>
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" class="hidden size-6 stroke-current [.menu-open_&]:block" aria-hidden="true">
                <path stroke-linecap="square" d="M6 18 18 6M6 6l12 12"/>
            </svg>
        </button>

    </div>

    <!-- The mobile sheet -->
    <div data-mobile-panel class="absolute inset-x-0 top-full border-b border-line bg-canvas lg:hidden">
        <nav class="px-6 py-5" aria-label="Mobile">
            <ul role="list" class="flex flex-col font-display text-xl font-medium">
                @foreach ($links as $link)
                <li><a href="{{ $link->url }}" class="flex border-b border-line-soft py-3.5 transition-colors duration-150 hover:text-accent">{{ $link->text }}</a></li>
                @endforeach
            </ul>
            <a href="{{ $ctaLink }}" class="lift mt-6 flex items-center justify-center gap-2 border border-line bg-accent px-6 py-3.5 font-display text-base font-bold text-accent-ink shadow-brutal">
                {{ $ctaText }}
                <svg viewBox="0 0 16 16" class="size-4 fill-current" aria-hidden="true">
                    <path fill-rule="evenodd" d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z" clip-rule="evenodd"/>
                </svg>
            </a>
        </nav>
    </div>
</header>
