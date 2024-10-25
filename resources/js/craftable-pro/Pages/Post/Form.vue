<template>
    <PageContent>
        <div class="max-w-full">
            <Card>
                <div class="space-y-4">
                    <TextInput
                        v-model="form.title"
                        name="title"
                        :label="$t('craftable-pro', 'Title')"
                    />

                    <TextInput
                        v-model="form.slug"
                        name="slug"
                        :label="$t('craftable-pro', 'Slug')"
                    />

                    <Wysiwyg
                        v-model="form.content"
                        name="content"
                        :label="$t('craftable-pro', 'Content')"
                    />

                    <DatePicker
                        v-model="form.date"
                        name="date"
                        mode="dateTime"
                        :label="$t('craftable-pro', 'Date')"
                    />

                    <Dropzone
                        v-model="form.Cover"
                        name="Cover"
                        :maxFileSize="10485760"
                        :label="$t('craftable-pro', 'Cover')"
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
    Wysiwyg,
    TextArea,
    PageContent,
    DatePicker,
    Checkbox,
    Dropzone,
    ImageUpload,
    Multiselect,
    CardLocaleSwitcher,
} from "craftable-pro/Components";
import { InertiaForm } from "craftable-pro/types";
import type { PostForm } from "./types";

interface Props {
    form: InertiaForm<PostForm>;
    submit: void;
}

const props = defineProps<Props>();
</script>
