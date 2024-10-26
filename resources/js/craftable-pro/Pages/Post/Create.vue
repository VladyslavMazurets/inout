<template>
    <PageHeader sticky :title="$t('craftable-pro', 'Create Post')">
        <Button
            :leftIcon="ArrowDownTrayIcon"
            @click="submit"
            :loading="form.processing"
            v-can="'craftable-pro.post.create'"
        >
            {{ $t("craftable-pro", "Save") }}
        </Button>
    </PageHeader>

    <Form :form="form" :submit="submit" :authorsOptions="authorsOptions" />
</template>

<script setup lang="ts">
import { ArrowDownTrayIcon } from "@heroicons/vue/24/outline";
import { PageHeader, Button } from "craftable-pro/Components";
import { useForm } from "craftable-pro/hooks/useForm";
import Form from "./Form.vue";
import type { PostForm } from "./types";

interface Props {
    authorsOptions: { id: number; label: string }[];
}

const props = defineProps<Props>();

const { form, submit } = useForm<PostForm>(
    {
        title: "",
        slug: "",
        content: "",
        date: "",
        authors_ids: [],
        cover: [],
    },

    route("craftable-pro.posts.store"),
    "post"
);
</script>
