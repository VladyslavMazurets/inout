<template>
  <PageHeader
    sticky
    :title="$t('craftable-pro', 'Edit Course')"
    :subtitle="`Last updated at ${dayjs(course.updated_at).format(
      'DD.MM.YYYY'
    )}`"
  >
    <Button
      :leftIcon="ArrowDownTrayIcon"
      @click="submit"
      :loading="form.processing"
      v-can="'craftable-pro.course.edit'"
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
  import { getMediaCollection } from "craftable-pro/helpers";
  import { useForm } from "craftable-pro/hooks/useForm";
  import dayjs from "dayjs";
  import customParseFormat from "dayjs/plugin/customParseFormat";

  import Form from "./Form.vue";
  import type { Course, CourseForm } from "./types";

  dayjs.extend(customParseFormat);

  interface Props {
    course: Course;
    instructorsOptions: { value: number; label: string }[];
    testimonialsOptions: { value: number; label: string }[];
  }

  const props = defineProps<Props>();

  const { form, submit } = useForm<CourseForm>(
    {
      title: props.course?.title ?? "",
      slug: props.course?.slug ?? "",
      description: props.course?.description ?? "",
      price: props.course?.price ?? "",
      discount: props.course?.discount ?? "",
      duration: props.course?.duration ?? "",
      instructors_ids:
        props.course?.instructors.map((instructor) => instructor.id) ?? [],
      testimonials_ids:
        props.course?.testimonials.map((testimonial) => testimonial.id) ?? [],
      content: props.course?.content ?? "",
      baner: getMediaCollection(props.course?.media, "baner"),
    },
    route("craftable-pro.courses.update", [props.course?.id])
  );
</script>
