<template>
  <div class="relative w-full">
    <div class="relative mx-auto w-2/5">
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

    <Dropdown
      v-if="!page.url.includes('search')"
      :title="'Order By'"
      class="absolute right-0 top-2 z-30"
    >
      <template #default>
        <div class="px-1 py-1">
          <MenuItem>
            <button
              @click="handleSort('A-Z')"
              :class="[
                sort == 'A-Z' ? 'bg-amber-500 text-white' : 'text-gray-900',
                'group flex w-full items-center rounded-md px-2 py-2 text-sm hover:bg-amber-400',
              ]"
            >
              A-Z
            </button>
          </MenuItem>
        </div>
        <div class="px-1 py-1">
          <MenuItem>
            <button
              @click="handleSort('Z-A')"
              :class="[
                sort == 'Z-A' ? 'bg-amber-500 text-white' : 'text-gray-900',
                'group flex w-full items-center rounded-md px-2 py-2 text-sm hover:bg-amber-400',
              ]"
            >
              Z-A
            </button>
          </MenuItem>
        </div>
      </template>
    </Dropdown>
  </div>
</template>

<script setup lang="ts">
  import { MenuItem } from "@headlessui/vue";
  import { MagnifyingGlassIcon } from "@heroicons/vue/24/outline";
  import { router, usePage } from "@inertiajs/vue3";
  import { ref } from "vue";

  import Dropdown from "./Dropdown.vue";
  import IInput from "./InspiraComponents/IInput.vue";

  const page = usePage();

  const search = ref("");
  const sort = ref(page.url.split("=")[1] || "");

  const handleSearch = () => {
    router.visit(route("courses.search", { search: search.value }));
  };

  const handleSort = (sorting: string) => {
    if (sort.value === sorting) {
      sort.value = "";
    } else {
      sort.value = sorting;
      console.log("🚀 ~ handleSort ~ sort:", sort.value);
    }

    router.visit(route("courses", { sorting: sort.value }), {
      replace: false,
    });
  };
</script>
