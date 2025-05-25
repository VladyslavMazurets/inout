<template>
  <div class="mt-12 flex flex-col items-center justify-center gap-6">
    <div
      class="mx-auto flex w-1/2 flex-col items-center justify-center gap-6 text-center"
    >
      <h1 class="text-center font-raleway text-6xl font-bold">Ціни</h1>
      <h2 class="font-lora text-lg">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, id in
        reiciendis quidem ut praesentium, assumenda illo excepturi ex nam
        aspernatur optio eaque voluptate.
      </h2>
    </div>

    <div class="flex items-start justify-center gap-12">
      <div
        v-for="course in recommendedCourses"
        :key="course.id"
        class="flex h-[420px] w-[380px] flex-col gap-2 overflow-hidden rounded-xl border border-black/15"
      >
        <span
          class="w-full bg-black py-3 text-center font-raleway text-2xl font-semibold text-amber-400"
        >
          Recommended
        </span>

        <div class="flex h-[calc(100%-67px)] flex-col gap-6 px-5 py-8">
          <div class="flex w-full flex-grow flex-col">
            <Link
              :href="`/courses/${course.slug}`"
              class="flex-1 transform text-balance font-playfair text-3xl font-bold uppercase duration-200 ease-in hover:text-amber-400"
            >
              {{ course.title }}
            </Link>

            <div class="flex items-end gap-2">
              <span class="text-lg/5 font-semibold text-black/50 line-through">
                {{ course.price }} ₴
              </span>
              <span class="text-3xl leading-[1]">
                {{ course.final_price }} ₴ / month
              </span>
            </div>
          </div>

          <Wysiwyg :content="course.content" class="line-clamp-[6]" />
        </div>
      </div>
    </div>

    <div class="my-12 flex w-full flex-col rounded-xl border-2 py-8">
      <div
        v-for="course in courses"
        :key="course.id"
        v-element-visibility="
          (isVisible) => onVisibilityChange(course.id, isVisible)
        "
        :class="[
          'course-item flex w-full items-center justify-between border-b-2 px-12 py-5 first:pt-0 last:border-b-0 last:pb-0',
          { visible: visibleItems.includes(course.id) },
        ]"
      >
        <Link
          :href="`/courses/${course.slug}`"
          class="w-[330px] text-2xl font-bold duration-200 ease-in hover:text-amber-400"
        >
          {{ course.title }}
        </Link>

        <div class="w-1/2">
          <Wysiwyg :content="course.content" class="line-clamp-2" />
        </div>

        <div class="flex items-center gap-1">
          <span
            :class="{
              'mt-1 text-[12px] font-semibold text-black/50 line-through':
                course.discount !== 0,
              'text-xl leading-[1]': course.discount === 0,
            }"
          >
            {{ course.price }} ₴
          </span>
          <span v-if="course.discount !== 0" class="text-xl leading-[1]">
            {{ course.final_price }} ₴
          </span>
          <span>/ month</span>
        </div>
      </div>
    </div>

    <Link v-if="isNextPage" href="#" @click.prevent="handleLoadMore">
      Load More
    </Link>
  </div>
</template>

<script setup lang="ts">
  import { Link, router } from "@inertiajs/vue3";
  import { ref } from "vue";

  import Wysiwyg from "@/app/Components/Wysiwyg.vue";

  import { Course } from "@/app/types";

  interface Props {
    recommendedCourses: Course[];
    allCourses: any;
  }

  const props = defineProps<Props>();
  const isNextPage = ref(true);
  const courses = ref<Course[]>(props.allCourses.data);
  const visibleItems = ref<number[]>([]);

  function onVisibilityChange(id: number, isVisible: boolean) {
    if (isVisible && !visibleItems.value.includes(id)) {
      visibleItems.value.push(id);
    }
  }

  const handleLoadMore = () => {
    router.get(
      "prices",
      {
        page: props.allCourses.current_page + 1,
      },

      {
        preserveState: true,
        preserveScroll: true,
        replace: false,
        only: ["allCourses"],
        onSuccess: (response) => {
          courses.value = [...courses.value, ...response.props.allCourses.data];
          isNextPage.value = response.props.allCourses.next_page_url !== null;
        },
      }
    );
  };
</script>

<style scoped>
  /* Анімація появи курсу */
  .course-item {
    opacity: 0;
    transform: translateY(20px);
    transition:
      opacity 2s ease-out,
      transform 2s ease-out;
  }

  .course-item.visible {
    opacity: 1;
    transform: translateY(0);
  }
</style>
