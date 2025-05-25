<template>
  <component
    is="span"
    v-html="content"
    :class="`[&_img]:bg-avu-gray relative z-40 overflow-hidden text-ellipsis text-pretty text-base/[22px] [&_a]:underline [&_a]:decoration-1 [&_a]:underline-offset-[5px] [&_blockquote]:text-xs/[16px] [&_figure:first-of-type_img]:lg:mt-20 [&_figure:first-of-type_img]:lg:pt-0 [&_h1]:text-[30px]/[34px] [&_img]:max-w-none [&_img]:pt-10 [&_img]:[width:calc(60vw-66px-var(--scrollbar-width))] [&_img]:lg:pt-20 [&_img]:2xl:mr-[20vw] [&_ol]:list-decimal [&_ol]:space-y-2 [&_ol]:pl-8 [&_ul]:list-disc [&_ul]:space-y-1 [&_ul]:pl-8`"
  />
</template>

<script setup lang="ts">
  interface Props {
    content: string;
  }

  const props = defineProps<Props>();
</script>
