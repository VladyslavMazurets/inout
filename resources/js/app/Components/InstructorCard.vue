<template>
  <FlipCard
    :description="instructor.description"
    :image="'.png'"
    rotate="y"
    :subtitle="instructor.position"
    :title="instructor.first_name + ' ' + instructor.last_name"
  />
</template>

<script lang="ts" setup>
  import { Instructor } from "../types";
  import FlipCard from "./InspiraComponents/FlipCard.vue";

  interface Props {
    instructor: Instructor;
  }

  const props = defineProps<Props>();
</script>
