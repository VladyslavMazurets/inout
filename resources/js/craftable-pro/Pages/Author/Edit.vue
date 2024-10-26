<template>
    <PageHeader
        sticky
        :title="$t('craftable-pro', 'Edit Author')"
        :subtitle="`Last updated at ${dayjs(author.updated_at).format(
            'DD.MM.YYYY'
        )}`"
    >
        <Button
            :leftIcon="ArrowDownTrayIcon"
            @click="submit"
            :loading="form.processing"
            v-can="'craftable-pro.author.edit'"
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
import type { Author, AuthorForm } from "./types";
import dayjs from "dayjs";
import customParseFormat from "dayjs/plugin/customParseFormat";
import { getMediaCollection } from "craftable-pro/helpers";

dayjs.extend(customParseFormat);

import { useFormLocale } from "craftable-pro/hooks/useFormLocale";

const {
    availableLocales,
    defaultLocale,
    currentLocale,
    translatableDefaultValue,
    getLabelWithLocale,
} = useFormLocale();

interface Props {
    author: Author;
}

const props = defineProps<Props>();

const { form, submit } = useForm<AuthorForm>(
    {
        first_name: props.author?.first_name ?? "",
        last_name: props.author?.last_name ?? "",
        link: props.author?.link ?? "",
        avatar: getMediaCollection(props.author?.media, "avatar"),
    },
    route("craftable-pro.authors.update", [props.author?.id])
);
</script>
