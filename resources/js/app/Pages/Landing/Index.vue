<template>
  <HeroSection />

  <CoursesSection :courses="courses" />

  <TeamSection :instructors="instructors" />

  <TestimonialsSection :testimonials="testimonials" />

  <FAQSection />
</template>

<script setup lang="ts">
  import CoursesSection from "@/app/Components/landing/CoursesSection.vue";
  import FAQSection from "@/app/Components/landing/FAQSection.vue";
  import HeroSection from "@/app/Components/landing/HeroSection.vue";
  import TeamSection from "@/app/Components/landing/TeamSection.vue";
  import TestimonialsSection from "@/app/Components/landing/TestimonialsSection.vue";

  import { Course, Instructor, Testimonial } from "@/app/types";

  interface Props {
    courses: Course[];
    instructors: Instructor[];
    testimonials: Testimonial[];
  }

  const props = defineProps<Props>();
  console.log("🚀 ~ props:", props.testimonials);

  const images = [
    "https://inout.com.ua/wp-content/uploads/2023/10/IMG_9859-scaled.jpg",
    "https://inout.com.ua/wp-content/uploads/2023/10/inout-19-scaled.jpg",
    "https://inout.com.ua/wp-content/uploads/2023/10/IMG_0860-scaled.jpg",
    "https://inout.com.ua/wp-content/uploads/2023/10/inout-19-scaled.jpg",
    "https://inout.com.ua/wp-content/uploads/2023/10/IMG_0860-scaled.jpg",
    "https://inout.com.ua/wp-content/uploads/2023/10/IMG_9859-scaled.jpg",
  ];
</script>
