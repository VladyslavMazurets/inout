<template>
  <PageHeader
    sticky
    :title="$t('craftable-pro', 'Edit Instructor')"
    :subtitle="`Last updated at ${dayjs(
      instructor.updated_at
    ).format('DD.MM.YYYY')}`"
  >
    <Button
      :leftIcon="ArrowDownTrayIcon"
      @click="submit"
      :loading="form.processing"
      v-can="'craftable-pro.instructor.edit'"
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
import type { Instructor, InstructorForm } from "./types";
import dayjs from "dayjs";
import customParseFormat from "dayjs/plugin/customParseFormat";
import {getMediaCollection} from "craftable-pro/helpers";

dayjs.extend(customParseFormat);



interface Props {
  instructor: Instructor;
  
}

const props = defineProps<Props>();

const { form, submit } = useForm<InstructorForm>(
    {
          first_name: props.instructor?.first_name ?? "", 
last_name: props.instructor?.last_name ?? "", 
slug: props.instructor?.slug ?? "", 
description: props.instructor?.description ?? "", 
position: props.instructor?.position ?? "", 
instagram_link: props.instructor?.instagram_link ?? "", 
telegram_link: props.instructor?.telegram_link ?? "", 
custom_link: props.instructor?.custom_link ?? "", 
profile_picture: getMediaCollection(props.instructor?.media, 'profile_picture')
    },
    route("craftable-pro.instructors.update", [props.instructor?.id])
);
</script>
