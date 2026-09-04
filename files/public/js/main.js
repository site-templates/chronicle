/*
    Chronicle — the interaction layer.

    Everything here is a progressive enhancement: with JavaScript off, the
    nav links still work, nothing stays hidden, and the site is fully
    usable. The matching transitions live in resources/css/site.css.

    Pages change in place: instant navigation swaps <main> and keeps the
    header and footer, so the menu binds once below. Everything that lives
    inside <main> goes through setUp(root) — once on load, and again for
    each new <main> after `instant:navigated`, tearing the previous page's
    observers and count-ups down first.
*/

// Flag the document early so CSS only hides reveal targets when JS will
// actually reveal them. This file loads with defer, before first paint.
document.documentElement.classList.add('js');

// What the current <main> owns, released before the next one is set up.
const observers = [];
const counters = [];

// The header persists for the whole visit: bind it once.
const menu = mobileMenu();
markCurrentMenuItem();

setUp(document);

document.addEventListener('instant:navigated', function (event) {
    if (menu) {
        menu.close();
    }
    markCurrentMenuItem();
    setUp(event.detail.main);
});

/*
    Everything that touches the page's own content. `root` is the document
    on first load and the freshly swapped <main> after a navigation.
*/
function setUp(root) {
    tearDown();
    revealOnScroll(root);
    countUpStats(root);
    stickerTilt(root);
}

function tearDown() {
    observers.splice(0).forEach(function (observer) {
        observer.disconnect();
    });
    counters.splice(0).forEach(function (counter) {
        cancelAnimationFrame(counter.frame);
    });
}

/*
    The mobile menu: the hamburger toggles .menu-open on the html element,
    which drops the sheet down and locks scrolling. Closing on navigation
    keeps same-page anchors from leaving the sheet hanging open. Returns a
    handle so a page change can close it too.
*/
function mobileMenu() {
    const button = document.querySelector('[data-mobile-toggle]');
    const panel = document.querySelector('[data-mobile-panel]');

    if (!button || !panel) {
        return null;
    }

    function close() {
        document.documentElement.classList.remove('menu-open');
        button.setAttribute('aria-expanded', 'false');
    }

    button.addEventListener('click', function () {
        const open = document.documentElement.classList.toggle('menu-open');
        button.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    panel.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', close);
    });

    return { close: close };
}

/*
    Scroll reveals. Elements tagged data-reveal start softened (see
    site.css) and settle into place as they enter the viewport. Each
    element animates once; --reveal-delay staggers siblings.
*/
function revealOnScroll(root) {
    const targets = root.querySelectorAll('[data-reveal]');

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

    observers.push(observer);

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
    /journal/some-post URL keeps Journal lit. Recomputed after every page
    change, so the previous page's mark is cleared first.
*/
function markCurrentMenuItem() {
    document.querySelectorAll('#header a[href], [data-mobile-panel] a[href]').forEach(function (link) {
        const path = window.location.pathname;

        if (link.pathname !== '/' && (path === link.pathname || path.startsWith(link.pathname + '/'))) {
            link.setAttribute('aria-current', 'page');
        } else if (link.pathname === '/' && path === '/') {
            link.setAttribute('aria-current', 'page');
        } else {
            link.removeAttribute('aria-current');
        }
    });
}

/*
    Count-up numbers. An element tagged data-count holds its final text
    ("120+", "$4.2M", "12"); when it scrolls into view the numeric part
    counts up from zero over ~1s while prefix and suffix stay put.
*/
function countUpStats(root) {
    const targets = root.querySelectorAll('[data-count]');

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

    observers.push(observer);

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
        const counter = { frame: 0 };

        counters.push(counter);

        function frame(now) {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 4);
            const value = (number * eased).toFixed(decimals);
            el.textContent = finalText.replace(match[1], Number(value).toLocaleString('en-US', {
                minimumFractionDigits: decimals,
                maximumFractionDigits: decimals,
            }));

            if (progress < 1) {
                counter.frame = requestAnimationFrame(frame);
            } else {
                el.textContent = finalText;
            }
        }

        counter.frame = requestAnimationFrame(frame);
    }
}

/*
    Sticker tilt: elements tagged data-tilt lean gently toward the pointer
    as it moves across their parent section — a light, playful parallax.
    When the pointer leaves the section the chips simply keep their last
    lean instead of snapping back to their resting spot.
*/
function stickerTilt(root) {
    const stickers = root.querySelectorAll('[data-tilt]');

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
    });
}
