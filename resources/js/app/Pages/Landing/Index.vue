<template>
  <div
    class="z-10 -mx-12 h-[640px] min-w-full flex-col items-center justify-between overflow-hidden bg-black"
  >
    <div class="mx-auto h-full w-[760px] flex-col items-center">
      <img
        src="favicon.png"
        alt="Logo"
        class="h-[600px] w-full object-contain opacity-75"
      />

      <div class="mx-auto flex w-max gap-14">
        <Link href="/" class="text-white">Courses</Link>
        <Link href="/" class="text-white">Instructors</Link>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
  import { Link } from "@inertiajs/vue3";
</script>
