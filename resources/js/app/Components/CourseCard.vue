<template>
  <CardContainer>
    <CardBody
      class="group/card relative h-full w-full rounded-xl border border-black bg-transparent p-6"
    >
      <div>
        <CardItem
          :translate-z="50"
          class="line-clamp-2 font-playfair text-xl font-bold"
        >
          {{ title }}
        </CardItem>

        <CardItem
          as="p"
          translate-z="60"
          class="mt-2 line-clamp-5 overflow-hidden font-lora text-sm"
        >
          {{ description }}
        </CardItem>
      </div>

      <div>
        <!-- <CardItem
          :translate-z="100"
          class="mt-4 h-full max-h-[300px] w-full overflow-hidden"
        >
          <img
            :src="imageUrl"
            alt="course_image"
            class="h-fit w-full flex-1 object-cover"
          />
        </CardItem> -->

        <CardItem :translate-z="50" class="ml-auto mt-4">
          <RippleButton
            aria-label="Menu"
            class="text-sm font-medium text-black"
            rippleColor="#FFCA28"
          >
            <span>Lear More</span>
            <ArrowRightIcon class="h-4 w-4" />
          </RippleButton>
        </CardItem>
      </div>
    </CardBody>
  </CardContainer>
</template>

<script setup lang="ts">
  import { ArrowRightIcon } from "@heroicons/vue/24/solid";

  import CardBody from "@/app/Components/InspiraComponents/CardBody.vue";
  import CardContainer from "@/app/Components/InspiraComponents/CardContainer.vue";
  import CardItem from "@/app/Components/InspiraComponents/CardItem.vue";

  import RippleButton from "./InspiraComponents/RippleButton.vue";

  interface Props {
    title: string;
    description: string;
    imageUrl: string;
    href: string;
  }

  const props = defineProps<Props>();
</script>
