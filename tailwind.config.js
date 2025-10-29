// tailwind.config.js
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    safelist: [
        "animate-fade",
        "animate-rise",
        "animate-pop",
        "animate-float-slow",
        "animate-cta-glow",
        // kalau perlu varian delay util
        "animate-delay-100",
        "animate-delay-200",
        "animate-delay-300",
        "animate-delay-400",
        "animate-delay-500",
        "animate-delay-600",
        "animate-delay-800",
        "animate-delay-1000",
        "animate-delay-1200",
    ],
    theme: {
        extend: {
            keyframes: {
                fade: { from: { opacity: 0 }, to: { opacity: 1 } },
                rise: {
                    from: { opacity: 0, transform: "translateY(14px)" },
                    to: { opacity: 1, transform: "translateY(0)" },
                },
                pop: {
                    "0%": {
                        opacity: 0,
                        transform: "translateY(12px) scale(.98)",
                    },
                    "100%": { opacity: 1, transform: "translateY(0) scale(1)" },
                },
                float: {
                    from: { transform: "translateY(0)" },
                    to: { transform: "translateY(-8px)" },
                },
                ctaGlow: {
                    "0%,100%": { boxShadow: "0 8px 16px rgba(30,58,138,.20)" },
                    "50%": { boxShadow: "0 10px 22px rgba(30,58,138,.28)" },
                },
            },
            animation: {
                fade: "fade .6s ease-out both",
                rise: "rise .6s cubic-bezier(.22,1,.36,1) both",
                pop: "pop .55s cubic-bezier(.22,1,.36,1) both",
                "float-slow": "float 6s ease-in-out infinite alternate",
                "cta-glow": "ctaGlow 3.5s ease-in-out infinite",
            },
            fontFamily: {
                sans: [
                    "Figtree",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "Segoe UI",
                    "Roboto",
                    "sans-serif",
                ],
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
