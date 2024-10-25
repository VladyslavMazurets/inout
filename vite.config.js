import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { resolve } from "path";
import tailwindcss from "tailwindcss";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app/index.ts",
                "resources/js/craftable-pro/index.ts",
                "resources/css/craftable-pro.css",
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    css: {
        postcss: {
            plugins: [
                tailwindcss({
                    config: "./tailwind.config.js",
                }),
                tailwindcss({
                    config: "./craftable-pro.tailwind.config.js",
                }),
            ],
        },
    },
    resolve: {
        alias: {
            "@": resolve(__dirname, "./resources/js"),
            "craftable-pro": resolve(
                __dirname,
                "./vendor/brackets/craftable-pro/resources/js"
            ),
            ziggy: resolve(__dirname, "./vendor/tightenco/ziggy"),
        },
    },
    server: {
        hmr: {
            host: "localhost",
        },
    },
});
