<template>
  <Header />
  <div id="main" class="px-12">
    <slot />
  </div>
  <Footer />
</template>

<script setup lang="ts">
  import Footer from "./Components/Footer.vue";
  import Header from "./Components/Header.vue";
</script>
