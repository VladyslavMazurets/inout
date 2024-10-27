<template>
    <PageHeader sticky :title="$t('craftable-pro', 'Create Course')">
        <Button
            :leftIcon="ArrowDownTrayIcon"
            @click="submit"
            :loading="form.processing"
            v-can="'craftable-pro.course.create'"
        >
            {{ $t("craftable-pro", "Save") }}
        </Button>
    </PageHeader>

    <Form
        :form="form"
        :submit="submit"
        :instructorsOptions="instructorsOptions"
    />
</template>

<script setup lang="ts">
import { ArrowDownTrayIcon } from "@heroicons/vue/24/outline";
import { PageHeader, Button } from "craftable-pro/Components";
import { useForm } from "craftable-pro/hooks/useForm";
import Form from "./Form.vue";
import type { CourseForm } from "./types";
import dayjs from "dayjs";

interface Props {
    instructorsOptions: { value: number; lable: string }[];
}

const props = defineProps<Props>();

const { form, submit } = useForm<CourseForm>(
    {
        title: "",
        slug: "",
        description: "",
        price: "",
        discount: "",
        duration: "",
        instructors_ids: [],
        content: "",
        baner: [],
    },
    route("craftable-pro.courses.store"),
    "post"
);
</script>
