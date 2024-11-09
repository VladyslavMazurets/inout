<template>
  <PageHeader
    sticky
    :title="$t('craftable-pro', 'Edit Testimonial')"
    :subtitle="`Last updated at ${dayjs(
      testimonial.updated_at
    ).format('DD.MM.YYYY')}`"
  >
    <Button
      :leftIcon="ArrowDownTrayIcon"
      @click="submit"
      :loading="form.processing"
      v-can="'craftable-pro.testimonial.edit'"
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
import type { Testimonial, TestimonialForm } from "./types";
import dayjs from "dayjs";
import customParseFormat from "dayjs/plugin/customParseFormat";
import {getMediaCollection} from "craftable-pro/helpers";

dayjs.extend(customParseFormat);



interface Props {
  testimonial: Testimonial;
  
}

const props = defineProps<Props>();

const { form, submit } = useForm<TestimonialForm>(
    {
          name: props.testimonial?.name ?? "", 
position: props.testimonial?.position ?? "", 
rating: props.testimonial?.rating ?? "", 
content: props.testimonial?.content ?? "", 
custom_link: props.testimonial?.custom_link ?? "", 
date: props.testimonial?.date ?? "", 
customer_avatar: getMediaCollection(props.testimonial?.media, 'customer_avatar')
    },
    route("craftable-pro.testimonials.update", [props.testimonial?.id])
);
</script>
