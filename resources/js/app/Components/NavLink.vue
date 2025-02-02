<template>
  <Link
    :href="href"
    class="flex items-center gap-1 p-2 transition duration-100 ease-out hover:text-amber-400"
  >
    <component v-if="icon" :is="icon" class="h-6 w-6" />
    <span class="text-playfair font-raleway text-lg font-medium">{{
      text
    }}</span>
  </Link>
</template>

<script setup lang="ts">
  import { Link } from "@inertiajs/vue3";

  interface Props {
    href: string;
    icon?: Comment;
    text?: string;
  }

  const props = defineProps<Props>();
</script>
