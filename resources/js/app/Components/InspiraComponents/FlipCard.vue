<template>
  <div :class="cn('group h-72 w-56 [perspective:1000px]', props.class)">
    <div
      :class="
        cn(
          'relative h-full rounded-2xl transition-all duration-500 [transform-style:preserve-3d]',
          rotation[0]
        )
      "
    >
      <!-- Front -->
      <div class="absolute size-full [backface-visibility:hidden]">
        <img
          :src="props.image"
          alt="image"
          class="size-full rounded-2xl object-cover shadow-2xl shadow-black/40"
        />
        <div class="absolute bottom-4 left-4 text-xl font-bold text-white">
          {{ props.title }}
        </div>
      </div>

      <!-- Back -->
      <div
        :class="
          cn(
            'absolute h-full rounded-2xl border border-black/30 bg-transparent p-4 [backface-visibility:hidden]',
            rotation[1]
          )
        "
      >
        <div class="line-clamp-5 flex min-h-full flex-col gap-2">
          <h1 class="font-raleway text-xl font-bold">
            {{ props.subtitle }}
          </h1>
          <p
            class="mb-4 line-clamp-[7] border-t border-t-black pt-4 font-lora text-base font-medium"
          >
            {{ props.description }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
  import { computed } from "vue";

  import { cn } from "@/app/lib/utils";

  interface FlipCardProps {
    image: string;
    title: string;
    subtitle?: string;
    description: string;
    rotate?: "x" | "y";
    class?: string;
  }

  const props = withDefaults(defineProps<FlipCardProps>(), {
    rotate: "y",
  });
  const rotationClass = {
    x: [
      "group-hover:[transform:rotateX(180deg)]",
      "[transform:rotateX(180deg)]",
    ],
    y: [
      "group-hover:[transform:rotateY(180deg)]",
      "[transform:rotateY(180deg)]",
    ],
  };

  const rotation = computed(() => rotationClass[props.rotate]);
</script>
