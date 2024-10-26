<template>
    <PageContent>
        <div class="max-w-full">
            <Card>
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
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
                    </div>

                    <Wysiwyg
                        v-model="form.content"
                        name="content"
                        :label="$t('craftable-pro', 'Content')"
                    />

                    <div class="grid grid-cols-2 gap-4">
                        <Multiselect
                            v-model="form.authors_ids"
                            :can-deselect="true"
                            name="authors"
                            :label="$t('craftable-pro', 'Authors')"
                            :options="authorsOptions"
                            mode="multiple"
                            class="flex-1"
                        />

                        <DatePicker
                            v-model="form.date"
                            name="date"
                            mode="dateTime"
                            :label="$t('craftable-pro', 'Date')"
                        />
                    </div>

                    <Dropzone
                        v-model="form.cover"
                        name="cover"
                        :maxFileSize="10485760"
                        :label="$t('craftable-pro', 'Cover')"
                    />
                </div>
            </Card>
        </div>
    </PageContent>
</template>

<script setup lang="ts">
import {
    Card,
    TextInput,
    Wysiwyg,
    PageContent,
    DatePicker,
    Dropzone,
    Multiselect,
} from "craftable-pro/Components";
import { InertiaForm } from "craftable-pro/types";
import type { PostForm } from "./types";

interface Props {
    form: InertiaForm<PostForm>;
    submit: void;
    authorsOptions: { id: number; label: string }[];
}

const props = defineProps<Props>();
</script>
