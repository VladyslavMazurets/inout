<template>
  <PageHeader :title="$t('craftable-pro', 'Authors')">
    <Button
      :leftIcon="PlusIcon"
      :as="Link"
      :href="route('craftable-pro.authors.create')"
      v-can="'craftable-pro.author.create'"
    >
      {{ $t("craftable-pro", "New Author") }}
    </Button>
    
  </PageHeader>

  <PageContent>
    <Listing
      :baseUrl="route('craftable-pro.authors.index')"
      :data="authors"
      dataKey="authors"
    >
      <template #bulkActions="{ bulkAction }">
        <Modal type="danger">
          <template #trigger="{ setIsOpen }">
            <Button
              @click="() => setIsOpen(true)"
              color="gray"
              variant="outline"
              size="sm"
              :leftIcon="TrashIcon"
              v-can="'craftable-pro.author.destroy'"
            >
              {{ $t("craftable-pro", "Delete") }}
            </Button>
          </template>

          <template #title>
            {{ $t("craftable-pro", "Delete Author") }}
          </template>
          <template #content>
            {{
              $t(
                "craftable-pro",
                "Are you sure you want to delete selected Author? All data will be permanently removed from our servers forever. This action cannot be undone."
              )
            }}
          </template>

          <template #buttons="{ setIsOpen }">
            <Button
              @click.prevent="
                () => {
                  bulkAction('post', route('craftable-pro.authors.bulk-destroy'), {
                    onFinish: () => setIsOpen(false),
                  });
                }
              "
              color="danger"
              v-can="'craftable-pro.author.destroy'"
            >
              {{ $t("craftable-pro", "Delete") }}
            </Button>
            <Button
              @click.prevent="() => setIsOpen()"
              color="gray"
              variant="outline"
            >
              {{ $t("craftable-pro", "Cancel") }}
            </Button>
          </template>
        </Modal>
      </template>
      <template #tableHead>
        
        <ListingHeaderCell>
            {{ $t("craftable-pro", "Id") }}
        </ListingHeaderCell> 
        <ListingHeaderCell>
            {{ $t("craftable-pro", "First Name") }}
        </ListingHeaderCell> 
        <ListingHeaderCell>
            {{ $t("craftable-pro", "Last Name") }}
        </ListingHeaderCell> 
        <ListingHeaderCell>
            {{ $t("craftable-pro", "Link") }}
        </ListingHeaderCell>
        <ListingHeaderCell>
          <span class="sr-only">{{ $t("craftable-pro", "Actions") }}</span>
        </ListingHeaderCell>
      </template>
      <template #tableRow="{ item, action }: any">
        
        <ListingDataCell>
             {{ item.id }}
        </ListingDataCell> 
        <ListingDataCell>
             {{ item.first_name }}
        </ListingDataCell> 
        <ListingDataCell>
             {{ item.last_name }}
        </ListingDataCell> 
        <ListingDataCell>
             {{ item.link?.[currentLocale] }}
        </ListingDataCell>
        <ListingDataCell>
          <div class="flex items-center justify-end gap-3">
            <IconButton
              :as="Link"
              :href="route('craftable-pro.authors.edit', item)"
              variant="ghost"
              color="gray"
              :icon="PencilSquareIcon"
              v-can="'craftable-pro.author.edit'"
            />

            <Modal type="danger">
              <template #trigger="{ setIsOpen }">
                <IconButton
                  @click="() => setIsOpen(true)"
                  color="gray"
                  variant="ghost"
                  :icon="TrashIcon"
                  v-can="'craftable-pro.author.destroy'"
                />
              </template>

              <template #title>
                {{ $t("craftable-pro", "Delete Author") }}
              </template>
              <template #content>
                {{
                  $t(
                    "craftable-pro",
                    "Are you sure you want to delete selected Author? All data will be permanently removed from our servers forever. This action cannot be undone."
                  )
                }}
              </template>

              <template #buttons="{ setIsOpen }">
                <Button
                  @click.prevent="
                    () => {
                      action('delete', route('craftable-pro.authors.destroy', item), {
                        onFinish: () => setIsOpen(false),
                      });
                    }
                  "
                  color="danger"
                  v-can="'craftable-pro.author.destroy'"
                >
                  {{ $t("craftable-pro", "Delete") }}
                </Button>
                <Button
                  @click.prevent="() => setIsOpen()"
                  color="gray"
                  variant="outline"
                >
                  {{ $t("craftable-pro", "Cancel") }}
                </Button>
              </template>
            </Modal>
          </div>
        </ListingDataCell>
      </template>
    </Listing>
  </PageContent>
</template>

<script setup lang="ts">
import { Link, usePage } from "@inertiajs/vue3";
import {
    PlusIcon,
    TrashIcon,
    PencilSquareIcon,
    ArrowDownTrayIcon,
} from "@heroicons/vue/24/outline";
import {
    PageHeader,
    PageContent,
    Button,
    Listing,
    Avatar,
    ListingHeaderCell,
    ListingDataCell,
    Modal,
    Multiselect,
    IconButton,
    FiltersDropdown,
    Publish,
    ListingToggle,
} from "craftable-pro/Components";
import { PaginatedCollection } from "craftable-pro/types/pagination";
import type { Author } from "./types";
import type { PageProps } from "craftable-pro/types/page";
import dayjs from "dayjs";
import customParseFormat from "dayjs/plugin/customParseFormat";

dayjs.extend(customParseFormat)


import { useFormLocale } from "craftable-pro/hooks/useFormLocale"; 


const { availableLocales, defaultLocale, currentLocale, translatableDefaultValue, getLabelWithLocale } = useFormLocale(); 


            

interface Props {
  authors: PaginatedCollection<Author>;
}
defineProps<Props>();

</script>
