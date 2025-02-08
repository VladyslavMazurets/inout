<template>
  <section class="mt-20 flex flex-col items-center justify-center gap-8">
    <h2 class="text-center font-raleway text-4xl font-bold">
      Explore Our Courses
    </h2>

    <div class="grid w-full auto-rows-auto grid-cols-4">
      <div
        v-for="(course, index) in courses"
        :key="course.id"
        :class="{
          'col-span-2 row-span-2': index === 0,
          'col-span-2 row-span-1': index === 1,
          'col-span-2': index === 2,
          'col-span-4 row-span-1': index === 3,
        }"
        class="h-full w-full"
      >
        <CourseCard
          :title="course.title"
          :description="course.description"
          :imageUrl="course.media?.[0].original_url ?? ''"
          :href="`/courses/${course.id}`"
          class="h-full w-full"
        />
      </div>
    </div>
  </section>
</template>

<script lang="ts" setup>
  import CourseCard from "@/app/Components/CourseCard.vue";

  import { Course } from "@/app/types";

  interface Props {
    courses: Course[];
  }

  const props = defineProps<Props>();
</script>
