<template>
  <div>
    <AuroraBackground :class="'-mx-12 h-[640px] bg-black'">
      <div
        v-motion
        :initial="{ opacity: 0, y: 40 }"
        :visible="{
          opacity: 1,
          y: 0,
          transition: {
            delay: 0.3,
            duration: 0.8,
            ease: 'easeInOut',
          },
        }"
        class="relative flex flex-col items-center gap-14"
      >
        <HyperText
          text="Inout - your space"
          class="pointer-events-none whitespace-pre-wrap bg-gradient-to-b from-gray-400 to-white bg-clip-text text-center text-7xl font-semibold leading-none text-transparent"
          :duration="800"
        />

        <div class="flex items-center justify-center gap-8">
          <StatisticCard :value="200" :text="'Graduates'" />
          <StatisticCard :value="10" :text="'Types of courses'" />
          <StatisticCard :value="500" :text="'Reviews'" />
          <StatisticCard :value="330" :text="'Graduates'" />
        </div>

        <div class="flex items-center gap-6">
          <ShimmerButton
            :href="route('courses')"
            :shimmer-size="'0'"
            class="px-8 py-4 text-xl"
          >
            Courses
          </ShimmerButton>
          <ShimmerButton
            :href="route('courses')"
            :shimmer-size="'0'"
            class="px-8 py-4 text-xl"
          >
            Instructors
          </ShimmerButton>
        </div>
      </div>
    </AuroraBackground>

    <div class="mb-24 flex flex-col items-center justify-center">
      <div class="grid grid-flow-row grid-cols-2 items-start gap-20">
        <div class="flex flex-col gap-6 text-white">
          <h1 class="text-5xl font-bold">
            Lorem ipsum dolor sit amet consectetur.
          </h1>

          <span class="text-lg leading-8">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur
            iure excepturi eaque quasi voluptate dolorem alias quos?
            <TextHighlight
              :delay="300"
              class="bg-gradient-to-r from-amber-400 to-amber-700"
              >Architecto quam ea eum iure quis,</TextHighlight
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

    <div class="relative flex flex-col items-center gap-12 py-6">
      <FlipWords
        :words="['Explore', 'Learn', 'Grow', 'Achieve', 'Discover', 'Succeed']"
        class="text-5xl font-bold text-white"
      />
      <div class="grid grid-cols-3">
        <div
          v-for="(course, index) in 5"
          class="z-20"
          :class="[index === 3 ? 'col-span-2' : '']"
        >
          <CourseCard
            :key="course"
            :title="'Lorem ipsum dolor sit amet consectetur'"
            :description="'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nam cumque debitis quo accusantium praesentium quia velit inventore doloremque a! Totam expedita quisquam est.'"
            :image-url="'https://picsum.photos/seed/five-stories-falling/1920/1080'"
            :href="route('courses')"
          />
        </div>
      </div>
      <ParticlesBg
        class="absolute inset-0 z-10"
        :quantity="1000"
        :ease="100"
        :color="'#FFF'"
        :staticity="10"
        refresh
      />
    </div>
  </div>
</template>

<script setup lang="ts">
  import CourseCard from "@/app/Components/CourseCard.vue";
  import AuroraBackground from "@/app/Components/InspiraComponents/AuroraBackground.vue";
  import FlipWords from "@/app/Components/InspiraComponents/FlipWords.vue";
  import HyperText from "@/app/Components/InspiraComponents/HyperText.vue";
  import ImagesSlider from "@/app/Components/InspiraComponents/ImagesSlider.vue";
  import ParticlesBg from "@/app/Components/InspiraComponents/ParticlesBg.vue";
  import ShimmerButton from "@/app/Components/InspiraComponents/ShimmerButton.vue";
  import TextHighlight from "@/app/Components/InspiraComponents/TextHighlight.vue";
  import StatisticCard from "@/app/Components/StatisticCard.vue";

  const images = [
    "https://picsum.photos/seed/waiting/1920/1080",
    "https://picsum.photos/seed/full-collapse/1920/1080",
    "https://picsum.photos/seed/five-stories-falling/1920/1080",
  ];
</script>
