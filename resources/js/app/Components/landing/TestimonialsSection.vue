<template>
  <section class="-mx-12 mt-20 flex flex-col items-center justify-center gap-8">
    <h2 class="text-center font-raleway text-4xl font-bold">Testimonials</h2>

    <div class="w-full">
      <Marquee pause-on-hover class="[--duration:20s]">
        <ReviewCard
          v-for="testimonial in firstTestimonialPack"
          :key="testimonial.id"
          :img="testimonial.avatar_url ?? ''"
          :name="testimonial.name"
          :position="testimonial.position"
          :content="testimonial.content"
        />
      </Marquee>

      <Marquee reverse pause-on-hover class="[--duration:20s]">
        <ReviewCard
          v-for="testimonial in secondTestimonialPack"
          :key="testimonial.id"
          :img="testimonial.avatar_url ?? ''"
          :name="testimonial.name"
          :position="testimonial.position"
          :content="testimonial.content"
        />
      </Marquee>
    </div>
  </section>
</template>
<script setup lang="ts">
  import Marquee from "@/app/Components/InspiraComponents/Marquee.vue";
  import ReviewCard from "@/app/Components/InspiraComponents/ReviewCard.vue";

  import { Testimonial } from "@/app/types";

  interface Props {
    testimonials: Testimonial[];
  }
  const props = defineProps<Props>();

  const firstTestimonialPack = props.testimonials.slice(0, 6);
  const secondTestimonialPack = props.testimonials.slice(6, 12);
</script>
