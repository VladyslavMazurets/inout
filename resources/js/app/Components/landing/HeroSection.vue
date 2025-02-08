<template>
  <section class="mt-12">
    <div class="-mx-12 grid grid-cols-5 grid-rows-4 border-black">
      <div
        class="col-span-3 row-span-3 flex flex-col justify-center gap-5 border-r border-black p-16"
      >
        <div class="flex flex-col gap-9">
          <h1 class="font-raleway text-4xl font-bold text-black">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </h1>
          <span class="text-medium font-lora text-xl">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum magni
            error rerum in odio, explicabo enim nostrum. Suscipit ratione ad
            officia ducimus nulla laborum tenetur.
          </span>
        </div>

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
        class="col-span-3 row-span-1 row-start-4 grid w-full grid-cols-4 divide-x divide-black border-y border-r border-black"
      >
        <StatisticCard :value="100" text="Courses" />
        <StatisticCard :value="5" text="Instructors" />
        <StatisticCard :value="47" text="Some Text" />
        <StatisticCard :value="100" text="Courses" />
      </div>

      <img
        src="https://inout.com.ua/wp-content/uploads/2023/09/IMG_0889-Edit-copy-2-scaled.jpg"
        alt="Inout"
        class="col-span-2 col-start-4 row-span-4 h-full w-full border-y border-black object-cover"
      />
    </div>
  </section>
</template>

<script setup lang="ts">
  import RippleButton from "@/app/Components/InspiraComponents/RippleButton.vue";
  import StatisticCard from "@/app/Components/StatisticCard.vue";
</script>
