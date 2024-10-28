const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/craftable-pro.blade.php",
        "./resources/js/craftable-pro/**/*.vue",
        "./vendor/brackets/craftable-pro/resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    50: "#fff7e0",
                    100: "#ffe9b3",
                    200: "#ffda80",
                    300: "#ffc94d",
                    400: "#ffb824",
                    500: "#ffaa00",
                    600: "#e69900",
                    700: "#cc8800",
                    800: "#b37700",
                    900: "#8c5c00",
                },
                secondary: colors.fuchsia,
                gray: colors.slate,
                warning: colors.amber,
                danger: colors.red,
                success: colors.green,
                info: colors.sky,
            },
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            screens: {
                "3xl": "1800px",
            },
        },
    },

    plugins: [
        require("@tailwindcss/typography"),
        require("@tailwindcss/forms"),
    ],
};
