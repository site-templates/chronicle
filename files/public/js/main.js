/*
    Chronicle — the interaction layer.

    Everything here is a progressive enhancement: with JavaScript off, the
    nav links still work, nothing stays hidden, and the site is fully
    usable. The matching transitions live in resources/css/site.css.
*/

// Flag the document early so CSS only hides reveal targets when JS will
// actually reveal them. This file loads with defer, before first paint.
document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', function () {
    mobileMenu();
    revealOnScroll();
    markCurrentMenuItem();
    countUpStats();
    stickerTilt();
});

/*
    The mobile menu: the hamburger toggles .menu-open on the html element,
    which drops the sheet down and locks scrolling. Closing on navigation
    keeps same-page anchors from leaving the sheet hanging open.
*/
function mobileMenu() {
    const button = document.querySelector('[data-mobile-toggle]');
    const panel = document.querySelector('[data-mobile-panel]');

    if (!button || !panel) {
        return;
    }

    button.addEventListener('click', function () {
        const open = document.documentElement.classList.toggle('menu-open');
        button.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    panel.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            document.documentElement.classList.remove('menu-open');
            button.setAttribute('aria-expanded', 'false');
        });
    });
}

/*
    Scroll reveals. Elements tagged data-reveal start softened (see
    site.css) and settle into place as they enter the viewport. Each
    element animates once; --reveal-delay staggers siblings.
*/
function revealOnScroll() {
    const targets = document.querySelectorAll('[data-reveal]');

    if (!('IntersectionObserver' in window)) {
        targets.forEach(function (el) {
            el.classList.add('is-visible');
        });
        return;
    }

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -10% 0px', threshold: 0.05 });

    targets.forEach(function (el) {
        // Anything already above the fold reveals immediately.
        if (el.getBoundingClientRect().top < window.innerHeight * 0.9) {
            el.classList.add('is-visible');
        } else {
            observer.observe(el);
        }
    });
}

/*
    aria-current tells screen readers which page you're on and lights up
    the active nav link. Section pages count for their parents, so a
    /journal/some-post URL keeps Journal lit.
*/
function markCurrentMenuItem() {
    document.querySelectorAll('#header a[href], [data-mobile-panel] a[href]').forEach(function (link) {
        const path = window.location.pathname;

        if (link.pathname !== '/' && (path === link.pathname || path.startsWith(link.pathname + '/'))) {
            link.setAttribute('aria-current', 'page');
        } else if (link.pathname === '/' && path === '/') {
            link.setAttribute('aria-current', 'page');
        }
    });
}

/*
    Count-up numbers. An element tagged data-count holds its final text
    ("120+", "$4.2M", "12"); when it scrolls into view the numeric part
    counts up from zero over ~1s while prefix and suffix stay put.
*/
function countUpStats() {
    const targets = document.querySelectorAll('[data-count]');

    if (!targets.length || !('IntersectionObserver' in window)) {
        return;
    }

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) {
                return;
            }
            observer.unobserve(entry.target);
            animate(entry.target);
        });
    }, { threshold: 0.4 });

    targets.forEach(function (el) {
        observer.observe(el);
    });

    function animate(el) {
        const finalText = el.textContent;
        const match = finalText.match(/([\d.,]+)/);

        if (!match || reduced) {
            return;
        }

        const number = parseFloat(match[1].replace(/,/g, ''));
        const decimals = (match[1].split('.')[1] || '').length;
        const start = performance.now();
        const duration = 1100;

        function frame(now) {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 4);
            const value = (number * eased).toFixed(decimals);
            el.textContent = finalText.replace(match[1], Number(value).toLocaleString('en-US', {
                minimumFractionDigits: decimals,
                maximumFractionDigits: decimals,
            }));

            if (progress < 1) {
                requestAnimationFrame(frame);
            } else {
                el.textContent = finalText;
            }
        }

        requestAnimationFrame(frame);
    }
}

/*
    Sticker tilt: elements tagged data-tilt lean gently toward the pointer
    as it moves across their parent section — a light, playful parallax.
*/
function stickerTilt() {
    const stickers = document.querySelectorAll('[data-tilt]');

    if (!stickers.length || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    stickers.forEach(function (el) {
        const zone = el.closest('section') || el.parentElement;

        zone.addEventListener('pointermove', function (event) {
            if (event.pointerType !== 'mouse') {
                return;
            }
            const rect = zone.getBoundingClientRect();
            const x = (event.clientX - rect.left) / rect.width - 0.5;
            const y = (event.clientY - rect.top) / rect.height - 0.5;
            el.style.translate = (x * 10) + 'px ' + (y * 10) + 'px';
        });

        zone.addEventListener('pointerleave', function () {
            el.style.translate = '0px 0px';
        });
    });
}
