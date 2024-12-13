<template>
  <div>
    <div
      class="relative flex flex-col items-center justify-center gap-10 py-12"
    >
      <ShimmerButton
        :shimmer-size="'0'"
        :class="'absolute left-6 top-2 w-24 !border-white text-5xl'"
        @click="router.visit(route('courses'))"
      >
        <ArrowLeftIcon class="h-5 w-5 text-white" />
      </ShimmerButton>

      <div class="flex flex-col gap-4 text-center font-playfair text-white">
        <h1 class="text-5xl">Our Courses</h1>
        <p class="text-2xl">Choose from our wide range of courses</p>
      </div>

      <SearchInput />

      <div
        v-if="searchedCourses?.data.length > 0"
        class="grid grid-cols-3 gap-3"
      >
        <CourseCard
          v-for="course in searchedCourses.data"
          :key="course.id"
          :title="course.title"
          :description="course.description"
          :imageUrl="course.media[0]?.original_url"
        />
      </div>

      <NoDataFound v-else class="mt-12" />
    </div>
  </div>
</template>

<script lang="ts" setup>
  import { ArrowLeftIcon } from "@heroicons/vue/24/solid";
  import { router } from "@inertiajs/vue3";

  import CourseCard from "@/app/Components/CourseCard.vue";
  import ShimmerButton from "@/app/Components/InspiraComponents/ShimmerButton.vue";
  import NoDataFound from "@/app/Components/NoDataFound.vue";
  import SearchInput from "@/app/Components/SearchInput.vue";

  import { Course } from "@/app/types";

  interface Props {
    searchedCourses: Course[];
  }

  const props = defineProps<Props>();
</script>
