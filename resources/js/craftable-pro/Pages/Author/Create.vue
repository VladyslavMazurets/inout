<template>
    <PageHeader sticky :title="$t('craftable-pro', 'Create Author')">
        <Button
            :leftIcon="ArrowDownTrayIcon"
            @click="submit"
            :loading="form.processing"
            v-can="'craftable-pro.author.create'"
        >
            {{ $t("craftable-pro", "Save") }}
        </Button>
    </PageHeader>

    <Form :form="form" :submit="submit" />
</template>

<script setup lang="ts">
import { ArrowDownTrayIcon } from "@heroicons/vue/24/outline";
import { PageHeader, Button } from "craftable-pro/Components";
import { useForm } from "craftable-pro/hooks/useForm";
import Form from "./Form.vue";
import type { AuthorForm } from "./types";
import dayjs from "dayjs";

import { useFormLocale } from "craftable-pro/hooks/useFormLocale";

const {
    availableLocales,
    defaultLocale,
    currentLocale,
    translatableDefaultValue,
    getLabelWithLocale,
} = useFormLocale();

interface Props {}

const props = defineProps<Props>();

const { form, submit } = useForm<AuthorForm>(
    {
        first_name: "",
        last_name: "",
        link: "",
        avatar: [],
    },
    route("craftable-pro.authors.store"),
    "post"
);
</script>
