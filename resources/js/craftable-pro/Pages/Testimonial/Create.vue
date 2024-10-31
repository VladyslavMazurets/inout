<template>
  <PageHeader sticky :title="$t('craftable-pro', 'Create Testimonial')">
    <Button
      :leftIcon="ArrowDownTrayIcon"
      @click="submit"
      :loading="form.processing"
      v-can="'craftable-pro.testimonial.create'"
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
import type { TestimonialForm } from "./types";
import dayjs from 'dayjs'



interface Props {
  
}

const props = defineProps<Props>();

const { form, submit } = useForm<TestimonialForm>(
    {
          name: "", 
position: "", 
rating: "", 
content: "", 
custom_link: "", 
date: "", 
customer_avatar: []
    },
    route("craftable-pro.testimonials.store"),
    "post"
);
</script>
