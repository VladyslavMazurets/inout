<template>
  <FlipCard
    :description="instructor.description"
    :image="instructorAvatar"
    rotate="y"
    :subtitle="instructor.position"
    :title="instructor.first_name + ' ' + instructor.last_name"
    :class="'max-h-full cursor-pointer'"
  />
</template>

<script lang="ts" setup>
  import { computed } from "vue";

  import { Instructor } from "../types";
  import FlipCard from "./InspiraComponents/FlipCard.vue";

  interface Props {
    instructor: Instructor;
  }

  const props = defineProps<Props>();

  const instructorAvatar = computed(() => {
    return props.instructor.media?.find(
      (media) => media.collection_name === "profile_picture"
    )?.original_url;
  });
</script>
