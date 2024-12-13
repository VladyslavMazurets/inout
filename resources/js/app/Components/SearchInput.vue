<template>
  <div class="relative w-2/5">
    <IInput
      v-model="search"
      placeholder="Search for a course"
      class="w-full"
      @keydown.enter="search.length > 0 ? handleSearch() : null"
    />

    <button
      class="absolute right-3 top-2 disabled:cursor-not-allowed disabled:opacity-50"
      :disabled="search.length <= 0"
      @click.prevent="handleSearch"
    >
      <MagnifyingGlassIcon class="h-6 w-6 text-white" />
    </button>
  </div>
</template>

<script setup lang="ts">
  import { MagnifyingGlassIcon } from "@heroicons/vue/24/outline";
  import { router } from "@inertiajs/vue3";
  import { ref } from "vue";

  import IInput from "./InspiraComponents/IInput.vue";

  const search = ref("");

  const handleSearch = () => {
    router.visit(route("courses.search", { search: search.value }));
  };
</script>
