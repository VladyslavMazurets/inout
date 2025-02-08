<template>
  <nav class="sticky top-0 z-50 w-full p-3">
    <div
      class="mx-auto flex w-max items-center justify-between gap-20 rounded-full border border-black bg-white/20 px-10 py-4 text-black drop-shadow-2xl backdrop-blur-3xl"
    >
      <a
        :href="route('landing')"
        class="w-[150px] text-center text-xl font-bold"
      >
        Inout
      </a>

      <div class="flex items-center gap-4">
        <NavLink :href="route('courses')" :text="'Контак'" />

        <NavLink :href="route('posts')" :text="'Пости'" />

        <NavLink :href="route('instructors')" :text="'Викладачі'" />

        <NavLink :href="route('prices')" :text="'Ціни'" />
      </div>

      <RipleButton
        aria-label="Menu"
        class="text-sm font-medium text-black"
        rippleColor="#FFCA28"
      >
        Контактуйте нас
      </RipleButton>
    </div>
  </nav>
</template>

<script setup lang="ts">
  import RipleButton from "@/app/Components/InspiraComponents/RippleButton.vue";
  import NavLink from "@/app/Components/NavLink.vue";
</script>
