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

                    <div class="grid grid-cols-3 gap-4">
                        <TextInput
                            v-model="form.price"
                            name="price"
                            :label="$t('craftable-pro', 'Price')"
                        />

                        <TextInput
                            v-model="form.discount"
                            name="discount"
                            :label="$t('craftable-pro', 'Discount')"
                        />
                        
                        <TextInput
                            v-model="form.duration"
                            name="duration"
                            :label="$t('craftable-pro', 'Duration')"
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
import type { CourseForm } from "./types";

interface Props {
    form: InertiaForm<CourseForm>;
    submit: void;
}

const props = defineProps<Props>();
</script>
