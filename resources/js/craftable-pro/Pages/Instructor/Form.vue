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
                        v-model="form.slug"
                        name="slug"
                        :label="$t('craftable-pro', 'Slug')"
                    />

                    <TextArea
                        v-model="form.description"
                        name="description"
                        :label="$t('craftable-pro', 'Description')"
                    />

                    <TextInput
                        v-model="form.position"
                        name="position"
                        :label="$t('craftable-pro', 'Position')"
                    />

                    <TextInput
                        v-model="form.instagram_link"
                        name="instagram_link"
                        :label="$t('craftable-pro', 'Instagram Link')"
                    />

                    <TextInput
                        v-model="form.telegram_link"
                        name="telegram_link"
                        :label="$t('craftable-pro', 'Telegram Link')"
                    />

                    <TextInput
                        v-model="form.custom_link"
                        name="custom_link"
                        :label="$t('craftable-pro', 'Custom Link')"
                    />

                    <Dropzone
                        v-model="form.profile_picture"
                        name="profile_picture"
                        :maxFileSize="10485760"
                        :label="$t('craftable-pro', 'Profile Picture')"
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
    TextArea,
    PageContent,
    Dropzone,
} from "craftable-pro/Components";
import { InertiaForm } from "craftable-pro/types";
import type { InstructorForm } from "./types";

interface Props {
    form: InertiaForm<InstructorForm>;
    submit: void;
}

const props = defineProps<Props>();
</script>
