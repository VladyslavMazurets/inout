<template>
    <Link
        :href="href"
        class="flex items-center gap-1 p-2 transition ease-out duration-100 hover:text-amber-400"
    >
        <component :is="icon" class="w-6 h-6" />
        {{ text }}
    </Link>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";

interface Props {
    href: string;
    icon: Comment;
    text?: string;
}

const props = defineProps<Props>();
</script>
