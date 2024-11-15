<template>
  <div class="my-16">
    <div class="mb-12 flex flex-col items-center justify-center">
      <HyperText
        text="Inout - your space"
        class="mb-20 text-7xl font-bold"
        :duration="800"
      />

      <div class="grid grid-flow-row grid-cols-2 items-start gap-20">
        <div class="flex flex-col gap-6">
          <h1 class="text-5xl font-bold">
            Lorem ipsum dolor sit amet consectetur.
          </h1>

          <span class="text-lg leading-8">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur
            iure excepturi eaque quasi voluptate dolorem alias quos?
            <TextHighligh
              :delay="300"
              class="bg-gradient-to-r from-green-300 to-blue-300"
              >Architecto quam ea eum iure quis,</TextHighligh
            >
            nam soluta blanditiis vitae minus corporis, totam perspiciatis!
            Magnam, aut corrupti ducimus voluptate aperiam, unde voluptatibus
            magni voluptatum fugiat quae harum architecto quibusdam libero
            commodi quia amet. Architecto hic quisquam excepturi libero
            inventore mollitia quasi qui officia?
          </span>
        </div>

        <div>
          <ImagesSlider
            :images="images"
            autoplay
            :overlay-class="'min-h-[1080px]'"
            :image-class="'rounded-3xl object-cover object-center'"
          />
        </div>
      </div>
    </div>

    <div class="h-[1200px] bg-black"></div>
  </div>
</template>

<script setup lang="ts">
  import { Link } from "@inertiajs/vue3";

  import AuroraBackground from "@/app/Components/InspiraComponents/AuroraBackground.vue";
  import HyperText from "@/app/Components/InspiraComponents/HyperText.vue";
  import ImagesSlider from "@/app/Components/InspiraComponents/ImagesSlider.vue";
  import ShimmerButton from "@/app/Components/InspiraComponents/ShimmerButton.vue";
  import TextHighlight from "@/app/Components/InspiraComponents/TextHighlight.vue";

  const images = [
    "https://picsum.photos/seed/waiting/1920/1080",
    "https://picsum.photos/seed/full-collapse/1920/1080",
    "https://picsum.photos/seed/five-stories-falling/1920/1080",
  ];
</script>
