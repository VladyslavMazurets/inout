module.exports = {
    content: [
        "./resources/views/app.blade.php",
        "./resourcer/js/app/**/*.vue",
        "./resources/js/app/**/*/*.vue",
    ],
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [require("@tailwindcss/typography")],
};
