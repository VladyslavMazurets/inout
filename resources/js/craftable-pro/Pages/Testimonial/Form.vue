<template>
  <PageContent>
    <div class="mx-auto max-w-3xl 2xl:max-w-4xl">
      

      <Card>
        <div class="space-y-4">
            <TextInput
                v-model="form.name"
                name="name"
                :label="$t('craftable-pro', 'Name')"
                
            /> 

            <TextInput
                v-model="form.position"
                name="position"
                :label="$t('craftable-pro', 'Position')"
                
            /> 

            <TextInput
                v-model="form.rating"
                name="rating"
                :label="$t('craftable-pro', 'Rating')"
                
            /> 

            <Wysiwyg
                v-model="form.content"
                name="content"
                :label="$t('craftable-pro', 'Content')"
            /> 

            <TextInput
                v-model="form.custom_link"
                name="custom_link"
                :label="$t('craftable-pro', 'Custom Link')"
                
            /> 

            <DatePicker
                v-model="form.date"
                name="date"
                mode="date"
                :label="$t('craftable-pro', 'Date')"
                
            /> 

            <Dropzone
                v-model="form.customer_avatar"
                name="customer_avatar"
                :maxFileSize="10485760"
                :label="$t('craftable-pro', 'Customer Avatar')"
            /></div>
      </Card>
    </div>
  </PageContent>
</template>

<script setup lang="ts">
import { ref } from "vue"
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
    CardLocaleSwitcher
} from "craftable-pro/Components";
import { InertiaForm } from "craftable-pro/types";
import type { TestimonialForm } from "./types";



interface Props {
  form: InertiaForm<TestimonialForm>;
  submit: void;
  
}

const props = defineProps<Props>();

</script>
