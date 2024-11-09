<template>
  <PageHeader sticky :title="$t('craftable-pro', 'Create Course')">
    <Button
      :leftIcon="ArrowDownTrayIcon"
      @click="submit"
      :loading="form.processing"
      v-can="'craftable-pro.course.create'"
    >
      {{ $t("craftable-pro", "Save") }}
    </Button>
  </PageHeader>

  <Form
    :form="form"
    :submit="submit"
    :instructorsOptions="instructorsOptions"
    :testimonialsOptions="testimonialsOptions"
  />
</template>

<script setup lang="ts">
  import { ArrowDownTrayIcon } from "@heroicons/vue/24/outline";
  import { Button, PageHeader } from "craftable-pro/Components";
  import { useForm } from "craftable-pro/hooks/useForm";
  import dayjs from "dayjs";

  import Form from "./Form.vue";
  import type { CourseForm } from "./types";

  interface Props {
    instructorsOptions: { value: number; label: string }[];
    testimonialsOptions: { value: number; label: string }[];
  }

  const props = defineProps<Props>();

  const { form, submit } = useForm<CourseForm>(
    {
      title: "",
      slug: "",
      description: "",
      price: "",
      discount: "",
      duration: "",
      instructors_ids: [],
      testimonials_ids: [],
      content: "",
      baner: [],
    },
    route("craftable-pro.courses.store"),
    "post"
  );
</script>
