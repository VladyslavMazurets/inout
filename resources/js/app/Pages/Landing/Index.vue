<template>
  <HeroSection />

  <section class="mt-20 flex flex-col items-center justify-center gap-8">
    <h2 class="text-center font-raleway text-4xl font-bold">
      Explore Our Courses
    </h2>

    <CoursesSection :courses="courses" />
  </section>
</template>

<script setup lang="ts">
  import CoursesSection from "@/app/Components/landing/CoursesSection.vue";
  import HeroSection from "@/app/Components/landing/HeroSection.vue";

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
