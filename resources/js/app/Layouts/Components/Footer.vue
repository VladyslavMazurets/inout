<template>
  <footer
    class="flex h-[300px] w-full items-center justify-between bg-black px-12"
  >
    <div class="flex h-[80px] w-[200px]">
      <img
        src="favicon.png"
        alt="Logo"
        width="100%"
        height="100%"
        class="object-cover"
      />
    </div>

    <div class="flex h-32 w-9/12 items-center justify-start gap-24">
      <div class="flex h-full flex-col gap-6 text-white">
        <span class="border-b-2 border-white pb-4 text-lg font-bold">
          Contacts
        </span>

        <div class="flex flex-col gap-2">
          <span><strong>Tel:</strong> +421 952 124 234</span>
          <span
            ><strong>Address:</strong> м.Київ, вул.Басейна 7B, 4 поверх</span
          >
        </div>
      </div>

      <div class="flex h-full flex-col gap-6 text-white">
        <span class="border-b-2 border-white pb-4 text-lg font-bold"
          >Social Media</span
        >

        <div class="flex">
          <NavLink :href="'/'" :icon="InstagramIcon" />
          <NavLink :href="'/'" :icon="YoutubeIcon" />
          <NavLink :href="'/'" :icon="FacebookIcon" />
          <NavLink :href="'/'" :icon="TiktokIcon" />
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
  import NavLink from "@/app/Components/NavLink.vue";

  import FacebookIcon from "@/icons/FacebookIcon.vue";
  import InstagramIcon from "@/icons/InstagramIcon.vue";
  import TiktokIcon from "@/icons/TiktokIcon.vue";
  import YoutubeIcon from "@/icons/YoutubeIcon.vue";
</script>
