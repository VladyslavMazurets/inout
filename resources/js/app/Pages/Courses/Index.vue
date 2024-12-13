<template>
  <div>
    <div class="flex flex-col items-center justify-center gap-10 py-12">
      <div class="flex flex-col gap-4 text-center font-playfair text-white">
        <h1 class="text-5xl">Our Courses</h1>
        <p class="text-2xl">Choose from our wide range of courses</p>
      </div>

      <SearchInput />

      <div class="flex flex-col items-center justify-center gap-10">
        <div class="grid grid-cols-3 gap-3">
          <CourseCard
            v-for="course in actualCourses"
            :key="course.id"
            :title="course.title"
            :description="course.description"
            :imageUrl="course.media[0]?.original_url"
          />
        </div>

        <ShimmerButton
          v-if="nextPage"
          :shimmer-size="'0'"
          class="'border-red-500'"
          @click="handleLoadMore"
        >
          <span class="font-raleway text-lg text-white">Load More</span>
        </ShimmerButton>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
  import axios from "axios";
  import { ref } from "vue";

  import CourseCard from "@/app/Components/CourseCard.vue";
  import IInput from "@/app/Components/InspiraComponents/IInput.vue";
  import ShimmerButton from "@/app/Components/InspiraComponents/ShimmerButton.vue";
  import SearchInput from "@/app/Components/SearchInput.vue";

  import { Course } from "@/app/types";

  interface Props {
    courses: Course[];
  }

  const props = defineProps<Props>();

  const actualCourses = ref([...props.courses.data]);
  const nextPage = ref(props.courses?.next_page_url.split("=")[1]);

  const handleLoadMore = () => {
    axios
      .get(route("courses.load-more"), {
        params: {
          page: nextPage.value,
        },
      })
      .then((response) => {
        actualCourses.value = [
          ...actualCourses.value,
          ...response.data.courses.data,
        ];
        nextPage.value = response.data.next_page_url?.split("=")[1];
      });
  };
</script>
