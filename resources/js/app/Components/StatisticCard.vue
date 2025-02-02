<template>
  <div class="flex flex-col items-center justify-center gap-3 border-black p-8">
    <span class="text-3xl font-bold">{{ value }}</span>
    <span class="truncate text-2xl font-semibold">{{ text }}</span>
  </div>
</template>

<script lang="ts" setup>
  interface Props {
    value: number;
    text: string;
  }

  const props = defineProps<Props>();
</script>
