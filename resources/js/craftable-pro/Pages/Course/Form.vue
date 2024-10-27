<template>
    <PageContent>
        <div class="w-full">
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

                    <TextArea
                        v-model="form.description"
                        name="description"
                        :label="$t('craftable-pro', 'Description')"
                    />

                    <div class="grid grid-cols-2 gap-4">
                        <TextInput
                            v-model="form.price"
                            name="price"
                            type="number"
                            :label="$t('craftable-pro', 'Price')"
                        />

                        <TextInput
                            v-model="form.discount"
                            name="discount"
                            type="number"
                            :label="$t('craftable-pro', 'Discount')"
                        />

                        <TextInput
                            v-model="form.duration"
                            name="duration"
                            type="number"
                            :label="$t('craftable-pro', 'Duration')"
                        />

                        <Multiselect
                            v-model="form.instructors_ids"
                            name="instructors"
                            :can-deselect="true"
                            :label="$t('craftable-pro', 'Instructors')"
                            :options="props.instructorsOptions"
                            :mode="'multiple'"
                            class="flex-1"
                        />
                    </div>

                    <Wysiwyg
                        v-model="form.content"
                        name="content"
                        :label="$t('craftable-pro', 'Content')"
                    />

                    <Dropzone
                        v-model="form.baner"
                        name="baner"
                        :maxFileSize="10485760"
                        :label="$t('craftable-pro', 'Baner')"
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
    TextArea,
    PageContent,
    Dropzone,
    Multiselect,
} from "craftable-pro/Components";
import { InertiaForm } from "craftable-pro/types";
import type { CourseForm } from "./types";

interface Props {
    form: InertiaForm<CourseForm>;
    submit: void;
    instructorsOptions: { value: number; lable: string }[];
}

const props = defineProps<Props>();
</script>
