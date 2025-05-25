<template>
  <footer
    class="flex h-[300px] w-full items-center justify-between border-t-2 px-12"
  >
    <div class="flex h-[80px] w-[240px]">
      <span class="font-raleway text-3xl font-bold">Inout</span>
    </div>

    <div class="flex h-32 w-9/12 items-center justify-start gap-24">
      <div class="flex h-full flex-col gap-4">
        <span class="border-b-2 pb-4 font-playfair text-lg font-bold">
          Contacts
        </span>

        <div class="flex flex-col gap-2">
          <span class="font-lora">
            <strong class="font-playfair">Tel:</strong>
            +421 952 124 234
          </span>
          <span class="font-lora">
            <strong class="font-playfair">Address:</strong>
            м.Київ, вул.Басейна 7B, 4 поверх
          </span>
        </div>
      </div>

      <div class="flex h-full flex-col gap-4">
        <span class="border-b-2 pb-4 font-playfair text-lg font-bold"
          >Social Media</span
        >

        <div class="flex">
          <NavLink :href="'/'" :icon="InstagramIcon" />
          <NavLink :href="'/'" :icon="YoutubeIcon" />
          <NavLink :href="'/'" :icon="FacebookIcon" />
          <NavLink :href="'/'" :icon="TiktokIcon" />
        </div>
      </div>

      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d304.459633468315!2d30.523666984369548!3d50.44118266328215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ceff9024bb47%3A0x57e0dc2dbefd2adf!2z0LwsIEJhc2VpbmEgU3QsIDcg0JIsINC-0YTRltGBIDEwNywgS3lpdiwgVWtyYWppbmEsIDAxMDA0!5e0!3m2!1sua!2sua&hl=ua&z=10"
        width="300"
        height="200"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="border border-black/20"
      />
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
