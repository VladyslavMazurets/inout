<template>
  <PageHeader
    sticky
    :title="$t('craftable-pro', 'Edit Post')"
    :subtitle="`Last updated at ${dayjs(
      post.updated_at
    ).format('DD.MM.YYYY')}`"
  >
    <Button
      :leftIcon="ArrowDownTrayIcon"
      @click="submit"
      :loading="form.processing"
      v-can="'craftable-pro.post.edit'"
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
import type { Post, PostForm } from "./types";
import dayjs from "dayjs";
import customParseFormat from "dayjs/plugin/customParseFormat";
import {getMediaCollection} from "craftable-pro/helpers";

dayjs.extend(customParseFormat);



interface Props {
  post: Post;
  
}

const props = defineProps<Props>();

const { form, submit } = useForm<PostForm>(
    {
          title: props.post?.title ?? "", 
slug: props.post?.slug ?? "", 
content: props.post?.content ?? "", 
date: props.post?.date ?? "", 
Cover: getMediaCollection(props.post?.media, 'Cover')
    },
    route("craftable-pro.posts.update", [props.post?.id])
);
</script>
