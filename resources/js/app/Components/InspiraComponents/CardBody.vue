<template>
  <div
    :class="cn('flex h-96 w-96 flex-col justify-between', $props.class)"
    style="transform-style: preserve-3d"
  >
    <slot />
  </div>
</template>

<script setup lang="ts">
  import { cn } from "@/app/lib/utils";

  const props = defineProps({
    class: String,
  });
</script>
