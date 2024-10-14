<template>
  <PageContent>
    <div class="mx-auto max-w-3xl 2xl:max-w-4xl">
      <CardLocaleSwitcher v-model="selectedLocale" class="mb-6" />

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
                v-model="form.links[selectedLocale]"
                :name="`links.${selectedLocale}`"
                :label="getLabelWithLocale($t('craftable-pro', 'Links'), selectedLocale)"
                
            /> 

            <Dropzone
                v-model="form.avatar"
                name="avatar"
                :maxFileSize="10485760"
                :label="$t('craftable-pro', 'Avatar')"
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
import type { AuthorForm } from "./types";


import { useFormLocale } from "craftable-pro/hooks/useFormLocale"; 


const { availableLocales, defaultLocale, currentLocale, translatableDefaultValue, getLabelWithLocale } = useFormLocale(); 


            

interface Props {
  form: InertiaForm<AuthorForm>;
  submit: void;
  
}

const props = defineProps<Props>();

const selectedLocale = ref(defaultLocale);
            
</script>
