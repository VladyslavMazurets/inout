module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/app/**/*.vue",
        "./resources/js/app/**/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [require("@tailwindcss/typography")],
};
