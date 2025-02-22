<template>
  <figure
    class="relative w-64 cursor-pointer overflow-hidden rounded-xl border bg-gray-50/[.10] p-4 hover:bg-gray-50/[.15]"
  >
    <div class="flex flex-row items-center gap-2">
      <img :src="img" class="rounded-full" width="46" height="46" alt="" />
      <div class="flex flex-col">
        <span class="text-sm font-medium">
          {{ name }}
        </span>
        <p class="text-xs font-medium">
          {{ position }}
        </p>
      </div>
    </div>
    <blockquote class="mt-2 text-sm text-black">{{ content }}</blockquote>
  </figure>
</template>

<script lang="ts" setup>
  interface Props {
    img: string;
    name: string;
    position: string;
    content: string;
  }

  defineProps<Props>();
</script>
