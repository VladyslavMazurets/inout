<template>
    <Header />
    <div id="main" class="mx-12">
        <slot />
    </div>
    <Footer />
</template>

<script setup lang="ts">
import Header from "./Components/Header.vue";
import Footer from "./Components/Footer.vue";
</script>
