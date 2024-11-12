<template>
  <nav class="sticky top-0 z-50">
    <div
      class="flex items-center justify-between bg-black px-10 py-3 text-white"
    >
      <Link :href="route('landing')" class="flex h-[60px] w-[150px]">
        <img
          src="favicon.png"
          alt="Logo"
          width="100%"
          height="100%"
          class="object-contain"
        />
      </Link>

      <div class="flex w-2/6 items-center justify-around">
        <NavLink
          :href="route('courses')"
          :icon="AcademicCapIcon"
          :text="'Courses'"
        />

        <NavLink :href="route('posts')" :icon="PencilIcon" :text="'Posts'" />

        <NavLink
          :href="route('instructors')"
          :icon="UserIcon"
          :text="'Instructors'"
        />

        <NavLink
          :href="route('prices')"
          :icon="BanknotesIcon"
          :text="'Price'"
        />
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
  import { AcademicCapIcon } from "@heroicons/vue/24/outline";
  import { BanknotesIcon, PencilIcon, UserIcon } from "@heroicons/vue/24/solid";
  import { Link } from "@inertiajs/vue3";

  import NavLink from "@/app/Components/NavLink.vue";

  import FacebookIcon from "@/icons/FacebookIcon.vue";
  import InstagramIcon from "@/icons/InstagramIcon.vue";
  import TiktokIcon from "@/icons/TiktokIcon.vue";
  import YoutubeIcon from "@/icons/YoutubeIcon.vue";
</script>
