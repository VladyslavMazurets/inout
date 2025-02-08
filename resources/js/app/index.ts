import { autoAnimatePlugin } from "@formkit/auto-animate/vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { MotionPlugin } from "@vueuse/motion";
import {
  i18nVue,
  loadTranslations,
} from "craftable-pro/plugins/laravel-vue-i18n";
import * as dayjs from "dayjs";
import "dayjs/locale/en";
import "dayjs/locale/sk";
import { createApp, h } from "vue";
import { ZiggyVue } from "ziggy/src/js/vue";

import MainLayout from "../app/Layouts/Main.vue";

const isServer = typeof window === "undefined";

const appLang =
  !isServer && document.documentElement.lang
    ? document.documentElement.lang.replace("-", "_")
    : "sk";
createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob("./Pages/**/*.vue");
    const page = (await pages[`./Pages/${name}.vue`]()).default;

    if (page.layout === undefined) {
      page.layout = MainLayout;
    }

    return page;
  },
  setup({ el, App, props, plugin }) {
    loadTranslations(`/lang/${appLang}/web.json`, (translations: JSON) => {
      createApp({ render: () => h(App, props) })
        .use(plugin)
        .use(autoAnimatePlugin)
        .use(ZiggyVue)
        .use(i18nVue, {
          resolve: (lang: string) => {
            dayjs.locale(lang);
            return translations;
          },
        })
        .use(MotionPlugin)
        .mount(el);
    });
  },
});
