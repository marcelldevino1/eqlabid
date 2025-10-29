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
    rise: {
      from: { opacity: 0, transform: "translateY(24px)" },
      to: { opacity: 1, transform: "translateY(0)" },
    },
    pop: {
      "0%": { opacity: 0, transform: "scale(0.96) translateY(16px)" },
      "100%": { opacity: 1, transform: "scale(1) translateY(0)" },
    },
  },
  animation: {
    rise: "rise 1.2s cubic-bezier(0.22, 1, 0.36, 1) both",
    pop: "pop 1.2s cubic-bezier(0.22, 1, 0.36, 1) both",
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
