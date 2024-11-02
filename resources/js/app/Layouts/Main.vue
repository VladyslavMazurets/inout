<template>
    <Header />
    <div id="main" class="mx-12">
        <slot />
    </div>
</template>

<script setup lang="ts">
import Header from "./Components/Header.vue";
</script>
