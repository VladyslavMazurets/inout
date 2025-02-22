<template>
  <section class="mt-20 flex flex-col items-center justify-center gap-8">
    <h2 class="text-center font-raleway text-4xl font-bold">Dream Team</h2>

    <div class="relative flex w-full items-center justify-center">
      <swiper-container
        :slides-per-view="3"
        navigation
        space-between="30"
        class="w-full"
      >
        <swiper-slide
          v-for="instructor in instructors"
          :key="instructor.id"
          class="w-full !max-w-56 py-10"
        >
          <Link href="/">
            <FlipCard
              :description="instructor.description"
              :image="instructor.profile_picture_url"
              rotate="y"
              :subtitle="instructor.position"
              :title="instructor.first_name + ' ' + instructor.last_name"
            />
          </Link>
        </swiper-slide>
      </swiper-container>
    </div>
  </section>
</template>

<script lang="ts" setup>
  import { Link } from "@inertiajs/vue3";
  import { register } from "swiper/element/bundle";
  import "swiper/swiper-bundle.css";
  import { onMounted } from "vue";

  import FlipCard from "@/app/Components/InspiraComponents/FlipCard.vue";

  import { Instructor } from "@/app/types";

  onMounted(() => {
    register();

    setTimeout(() => {
      const swiper = document.querySelector("swiper-container");

      if (!swiper || !swiper.shadowRoot) return;

      const prevBtn = swiper.shadowRoot.querySelector(".swiper-button-prev");
      const nextBtn = swiper.shadowRoot.querySelector(".swiper-button-next");

      if (prevBtn && nextBtn) {
        const observer = new MutationObserver(() => {
          prevBtn.style.display = prevBtn.classList.contains(
            "swiper-button-disabled"
          )
            ? "none"
            : "block";
          nextBtn.style.display = nextBtn.classList.contains(
            "swiper-button-disabled"
          )
            ? "none"
            : "block";
        });

        observer.observe(prevBtn, {
          attributes: true,
          attributeFilter: ["class"],
        });
        observer.observe(nextBtn, {
          attributes: true,
          attributeFilter: ["class"],
        });
      }
    }, 500);
  });

  interface Props {
    instructors: Instructor[];
  }
  const props = defineProps<Props>();

  const instructors = props.instructors;
</script>

<style scoped>
  swiper-container::part(button-prev),
  swiper-container::part(button-next) {
    color: #ffca28 !important;
  }

  swiper-container::part(button-prev).swiper-button-disabled,
  swiper-container::part(button-next).swiper-button-disabled {
    display: none !important;
  }
</style>
