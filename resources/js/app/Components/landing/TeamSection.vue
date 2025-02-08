<template>
  <section class="mt-20 flex flex-col items-center justify-center gap-8">
    <h2 class="text-center font-raleway text-4xl font-bold">Dream Team</h2>

    <div class="relative flex items-center justify-center gap-4">
      <Link v-for="instructor in instructors" :key="instructor.id" href="/">
        <FlipCard
          :description="instructor.description"
          :image="instructor.media?.[0]?.original_url ?? ''"
          rotate="y"
          :subtitle="instructor.position"
          :title="instructor.first_name + ' ' + instructor.last_name"
        />
      </Link>
    </div>
  </section>
</template>

<script lang="ts" setup>
  import { Link } from "@inertiajs/vue3";

  import FlipCard from "@/app/Components/InspiraComponents/FlipCard.vue";

  import { Instructor } from "@/app/types";

  interface Props {
    instructors: Instructor[];
  }

  const props = defineProps<Props>();
</script>
