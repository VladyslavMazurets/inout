<template>
  <div
    class="-mx-12 my-12 grid grid-cols-5 items-center border-y-2 border-black"
  >
    <div class="col-span-3 h-full items-center gap-5 border-r-2 border-black">
      <div class="p-16">
        <h1 class="text-4xl font-bold text-black">
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
        </h1>
        <span class="text-medium text-xl">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum magni
          error rerum in odio, explicabo enim nostrum. Suscipit ratione ad
          officia ducimus nulla laborum tenetur.
        </span>

        <div class="mt-8 flex items-center gap-5">
          <RippleButton
            aria-label="Menu"
            class="text-lg font-medium text-black"
            rippleColor="#FFCA28"
          >
            Courses
          </RippleButton>

          <RippleButton
            aria-label="Menu"
            class="text-lg font-medium text-black"
            rippleColor="#FFCA28"
          >
            Instructors
          </RippleButton>
        </div>
      </div>

      <div
        class="grid h-max w-full grid-cols-4 divide-x-2 divide-black border-t-2 border-black"
      >
        <StatisticCard :value="100" text="Courses" />
        <StatisticCard :value="5" text="Instructors" />
        <StatisticCard :value="47" text="Some Text" />
        <StatisticCard :value="100" text="Courses" />
      </div>
    </div>

    <img
      src="https://inout.com.ua/wp-content/uploads/2023/09/IMG_0889-Edit-copy-2-scaled.jpg"
      alt="Inout"
      class="col-span-2 h-[520px] w-full object-cover"
    />
  </div>
</template>

<script setup lang="ts">
  import RippleButton from "@/app/Components/InspiraComponents/RippleButton.vue";
  import StatisticCard from "@/app/Components/StatisticCard.vue";

  import { Course, Instructor, Testimonial } from "@/app/types";

  interface Props {
    courses: Course[];
    instructors: Instructor[];
    testimonials: Testimonial[];
  }

  const props = defineProps<Props>();

  const images = [
    "https://inout.com.ua/wp-content/uploads/2023/10/IMG_9859-scaled.jpg",
    "https://inout.com.ua/wp-content/uploads/2023/10/inout-19-scaled.jpg",
    "https://inout.com.ua/wp-content/uploads/2023/10/IMG_0860-scaled.jpg",
  ];

  const firstTestimonialPack = props.testimonials.slice(0, 6);
  const secondTestimonialPack = props.testimonials.slice(6, 12);
</script>
