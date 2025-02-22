<template>
  <section
    class="-mx-12 mt-10 flex flex-col items-center justify-center gap-8 bg-black/5 py-16"
  >
    <h2 class="text-center font-raleway text-4xl font-bold">
      Frequently Asked Questions
    </h2>

    <div class="grid w-full grid-flow-row grid-cols-2 gap-6 px-12">
      <div
        v-for="(item, index) in 6"
        :key="index"
        class="self-start rounded-xl border border-black/20"
      >
        <Accordion>
          <template #title>
            <h3 class="text-lg font-medium">What is the refund policy?</h3>
          </template>
          <template #content>
            <p class="text-sm">
              We offer a 30-day money-back guarantee if you are not satisfied
              with the course.
            </p>
          </template>
        </Accordion>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
  import Accordion from "../Accordion.vue";
</script>
