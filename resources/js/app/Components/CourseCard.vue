<template>
  <CardContainer>
    <CardBody
      class="group/card relative size-auto max-h-[460px] rounded-xl border border-white/15 bg-black p-6"
    >
      <CardItem
        :translate-z="50"
        class="line-clamp-2 h-[56px] font-playfair text-xl font-bold text-white"
      >
        {{ title }}
      </CardItem>

      <CardItem
        as="p"
        translate-z="60"
        class="mt-2 line-clamp-4 h-20 overflow-hidden font-lora text-sm text-white"
      >
        {{ description }}
      </CardItem>

      <CardItem :translate-z="100" class="mt-4 h-[200px] w-full">
        <img
          :src="imageUrl"
          alt="course_image"
          class="h-full w-full object-cover"
        />
      </CardItem>

      <CardItem :translate-z="50" class="ml-auto mt-4">
        <ShimmerButton
          :href="href"
          :shimmer-size="'0'"
          class="flex w-max items-center gap-3 font-raleway"
        >
          <span>Learn more</span>
          <ArrowRightIcon class="h-4 w-4" />
        </ShimmerButton>
      </CardItem>
    </CardBody>
  </CardContainer>
</template>

<script setup lang="ts">
  import { ArrowRightIcon } from "@heroicons/vue/24/solid";

  import CardBody from "@/app/Components/InspiraComponents/CardBody.vue";
  import CardContainer from "@/app/Components/InspiraComponents/CardContainer.vue";
  import CardItem from "@/app/Components/InspiraComponents/CardItem.vue";

  import ShimmerButton from "./InspiraComponents/ShimmerButton.vue";

  interface Props {
    title: string;
    description: string;
    imageUrl: string;
    href: string;
  }

  const props = defineProps<Props>();
</script>
