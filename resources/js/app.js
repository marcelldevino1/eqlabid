import "./bootstrap";
// resources/js/app.js
document.addEventListener("DOMContentLoaded", () => {
    const els = document.querySelectorAll("[data-anim]");

    if (!("IntersectionObserver" in window) || !els.length) return;

    const io = new IntersectionObserver(
        (entries) => {
            for (const e of entries) {
                if (!e.isIntersecting) continue;
                const el = e.target;
                const tokens = (el.dataset.anim || "")
                    .split(/\s+/)
                    .filter(Boolean);
                const delayMs = parseInt(el.dataset.delay || "0", 10);

                // set delay jika ada
                if (delayMs) el.style.animationDelay = `${delayMs}ms`;

                // pasang semua kelas animate-*
                tokens.forEach((t) => el.classList.add(`animate-${t}`));

                // hilangkan opacity-0 kalau dipakai sebagai pre-state
                el.classList.remove("opacity-0");

                io.unobserve(el);
            }
        },
        { rootMargin: "0px 0px -10% 0px", threshold: 0.15 }
    );

    els.forEach((el) => {
        // optional: mulai tersembunyi biar nggak kedip
        el.classList.add("opacity-0", "will-change-transform");
        io.observe(el);
    });
});

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
