<template>
  <CardSpotlight
    class="cursor-pointe select-none items-center justify-center whitespace-nowrap p-10 text-4xl shadow-2xl"
    :slot-class="'flex flex-col items-center justify-center gap-4'"
    :gradient-color="'#363636'"
  >
    <NumberTicker
      :value="value"
      :decimalPlaces="0"
      :class="'text-5xl font-bold text-white'"
    />
    <span class="font-playfair text-2xl font-semibold">
      {{ text }}
    </span>
  </CardSpotlight>
</template>

<script lang="ts" setup>
  import CardSpotlight from "@/app/Components/InspiraComponents/CardSpotlight.vue";
  import NumberTicker from "@/app/Components/InspiraComponents/NumberTicker.vue";

  interface Props {
    value: number;
    text: string;
  }

  const props = defineProps<Props>();
</script>
