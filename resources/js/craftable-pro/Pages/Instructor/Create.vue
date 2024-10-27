<template>
  <PageHeader sticky :title="$t('craftable-pro', 'Create Instructor')">
    <Button
      :leftIcon="ArrowDownTrayIcon"
      @click="submit"
      :loading="form.processing"
      v-can="'craftable-pro.instructor.create'"
    >
      {{ $t("craftable-pro", "Save") }}
    </Button>
  </PageHeader>

  <Form :form="form" :submit="submit"  />
</template>

<script setup lang="ts">
import { ArrowDownTrayIcon } from "@heroicons/vue/24/outline";
import { PageHeader, Button } from "craftable-pro/Components";
import { useForm } from "craftable-pro/hooks/useForm";
import Form from "./Form.vue";
import type { InstructorForm } from "./types";
import dayjs from 'dayjs'



interface Props {
  
}

const props = defineProps<Props>();

const { form, submit } = useForm<InstructorForm>(
    {
          first_name: "", 
last_name: "", 
slug: "", 
description: "", 
position: "", 
instagram_link: "", 
telegram_link: "", 
custom_link: "", 
profile_picture: []
    },
    route("craftable-pro.instructors.store"),
    "post"
);
</script>
