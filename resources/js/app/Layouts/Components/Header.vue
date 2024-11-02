<template>
    <nav class="sticky top-0">
        <div
            class="flex items-center justify-between px-10 py-3 bg-black text-white"
        >
            <div class="flex w-[150px] h-[60px]">
                <img
                    src="favicon.png"
                    alt="Logo"
                    width="100%"
                    height="100%"
                    class="object-cover"
                />
            </div>

            <div class="w-2/6 flex items-center justify-around">
                <NavLink
                    :href="'/'"
                    :icon="AcademicCapIcon"
                    :text="'Courses'"
                />
                <NavLink :href="'/'" :icon="PencilIcon" :text="'Posts'" />
                <NavLink :href="'/'" :icon="UserIcon" :text="'Instructors'" />
                <NavLink :href="'/'" :icon="BanknotesIcon" :text="'Price'" />
            </div>

            <div class="flex items-center text-white">
                <NavLink :href="'/'" :icon="InstagramIcon" />
                <NavLink :href="'/'" :icon="YoutubeIcon" />
                <NavLink :href="'/'" :icon="FacebookIcon" />
                <NavLink :href="'/'" :icon="TiktokIcon" />
            </div>
        </div>
    </nav>
</template>

<script setup lang="ts">
import NavLink from "@/app/Components/NavLink.vue";

import FacebookIcon from "@/icons/FacebookIcon.vue";
import InstagramIcon from "@/icons/InstagramIcon.vue";
import TiktokIcon from "@/icons/TiktokIcon.vue";
import YoutubeIcon from "@/icons/YoutubeIcon.vue";
import { AcademicCapIcon } from "@heroicons/vue/24/outline";
import { BanknotesIcon, PencilIcon, UserIcon } from "@heroicons/vue/24/solid";
</script>
