<template>
  <div class="mt-12 flex flex-col items-center justify-center gap-6">
    <div
      class="mx-auto flex w-1/2 flex-col items-center justify-center gap-6 text-center"
    >
      <h1 class="text-center font-raleway text-6xl font-bold">Prices</h1>
      <h2 class="font-lora text-lg">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, id in
        reiciendis quidem ut praesentium, assumenda illo excepturi ex nam
        aspernatur optio eaque voluptate.
      </h2>
    </div>

    <div class="flex items-start justify-center gap-12">
      <div
        v-for="course in topCourses"
        :key="course.id"
        class="flex h-full w-[360px] max-w-[360px] flex-col gap-2 overflow-hidden rounded-xl border border-black/15"
      >
        <span
          class="w-full bg-black py-3 text-center font-raleway text-2xl font-semibold text-white"
        >
          Recommended
        </span>

        <div class="flex flex-col gap-6 px-8 py-8">
          <div class="flex w-full flex-col gap-4">
            <h2 class="text-balance font-playfair text-3xl font-bold">
              {{ course.title }}
            </h2>

            <div class="flex items-end gap-2">
              <span class="text-lg/5 font-semibold text-black/50 line-through">
                {{ course.price }} ₴
              </span>
              <span class="text-3xl leading-[1]">
                {{ course.final_price }} ₴ / month
              </span>
            </div>
          </div>

          <div v-html="course.content" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
  import { ref } from "vue";

  import { Course } from "@/app/types";

  interface Props {
    courses: Course[];
  }

  const props = defineProps<Props>();

  const topCourses = ref(props.courses.slice(0, 3));
</script>
