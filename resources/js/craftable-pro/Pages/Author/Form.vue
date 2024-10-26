<template>
    <PageContent>
        <div class="mx-auto max-w-3xl 2xl:max-w-4xl">
            <Card>
                <div class="space-y-4">
                    <TextInput
                        v-model="form.first_name"
                        name="first_name"
                        :label="$t('craftable-pro', 'First Name')"
                    />

                    <TextInput
                        v-model="form.last_name"
                        name="last_name"
                        :label="$t('craftable-pro', 'Last Name')"
                    />

                    <TextInput
                        v-model="form.link"
                        name="link"
                        :label="$t('craftable-pro', 'Link')"
                    />

                    <Dropzone
                        v-model="form.avatar"
                        name="avatar"
                        :maxFileSize="10485760"
                        :label="$t('craftable-pro', 'Avatar')"
                    />
                </div>
            </Card>
        </div>
    </PageContent>
</template>

<script setup lang="ts">
import { ref } from "vue";
import {
    Card,
    TextInput,
    PageContent,
    Dropzone,
} from "craftable-pro/Components";
import { InertiaForm } from "craftable-pro/types";
import type { AuthorForm } from "./types";

import { useFormLocale } from "craftable-pro/hooks/useFormLocale";

const {
    availableLocales,
    defaultLocale,
    currentLocale,
    translatableDefaultValue,
    getLabelWithLocale,
} = useFormLocale();

interface Props {
    form: InertiaForm<AuthorForm>;
    submit: void;
}

const props = defineProps<Props>();

const selectedLocale = ref(defaultLocale);
</script>
