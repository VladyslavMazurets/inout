<template>
    <PageHeader :title="$t('craftable-pro', 'Instructors')">
        <Button
            :leftIcon="PlusIcon"
            :as="Link"
            :href="route('craftable-pro.instructors.create')"
            v-can="'craftable-pro.instructor.create'"
        >
            {{ $t("craftable-pro", "New Instructor") }}
        </Button>
    </PageHeader>

    <PageContent>
        <Listing
            :baseUrl="route('craftable-pro.instructors.index')"
            :data="instructors"
            dataKey="instructors"
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
                            v-can="'craftable-pro.instructor.destroy'"
                        >
                            {{ $t("craftable-pro", "Delete") }}
                        </Button>
                    </template>

                    <template #title>
                        {{ $t("craftable-pro", "Delete Instructor") }}
                    </template>
                    <template #content>
                        {{
                            $t(
                                "craftable-pro",
                                "Are you sure you want to delete selected Instructor? All data will be permanently removed from our servers forever. This action cannot be undone."
                            )
                        }}
                    </template>

                    <template #buttons="{ setIsOpen }">
                        <Button
                            @click.prevent="
                                () => {
                                    bulkAction(
                                        'post',
                                        route(
                                            'craftable-pro.instructors.bulk-destroy'
                                        ),
                                        {
                                            onFinish: () => setIsOpen(false),
                                        }
                                    );
                                }
                            "
                            color="danger"
                            v-can="'craftable-pro.instructor.destroy'"
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
                <ListingHeaderCell sortBy="id">
                    {{ $t("craftable-pro", "Id") }}
                </ListingHeaderCell>
                <ListingHeaderCell sortBy="first_name">
                    {{ $t("craftable-pro", "First Name") }}
                </ListingHeaderCell>
                <ListingHeaderCell sortBy="last_name">
                    {{ $t("craftable-pro", "Last Name") }}
                </ListingHeaderCell>
                <ListingHeaderCell sortBy="slug">
                    {{ $t("craftable-pro", "Slug") }}
                </ListingHeaderCell>
                <ListingHeaderCell sortBy="position">
                    {{ $t("craftable-pro", "Position") }}
                </ListingHeaderCell>
                <ListingHeaderCell>
                    <span class="sr-only">{{
                        $t("craftable-pro", "Actions")
                    }}</span>
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
                    {{ item.slug }}
                </ListingDataCell>
                <ListingDataCell>
                    {{ item.position }}
                </ListingDataCell>
                <ListingDataCell>
                    <div class="flex items-center justify-end gap-3">
                        <IconButton
                            :as="Link"
                            :href="
                                route('craftable-pro.instructors.edit', item)
                            "
                            variant="ghost"
                            color="gray"
                            :icon="PencilSquareIcon"
                            v-can="'craftable-pro.instructor.edit'"
                        />

                        <Modal type="danger">
                            <template #trigger="{ setIsOpen }">
                                <IconButton
                                    @click="() => setIsOpen(true)"
                                    color="gray"
                                    variant="ghost"
                                    :icon="TrashIcon"
                                    v-can="'craftable-pro.instructor.destroy'"
                                />
                            </template>

                            <template #title>
                                {{ $t("craftable-pro", "Delete Instructor") }}
                            </template>
                            <template #content>
                                {{
                                    $t(
                                        "craftable-pro",
                                        "Are you sure you want to delete selected Instructor? All data will be permanently removed from our servers forever. This action cannot be undone."
                                    )
                                }}
                            </template>

                            <template #buttons="{ setIsOpen }">
                                <Button
                                    @click.prevent="
                                        () => {
                                            action(
                                                'delete',
                                                route(
                                                    'craftable-pro.instructors.destroy',
                                                    item
                                                ),
                                                {
                                                    onFinish: () =>
                                                        setIsOpen(false),
                                                }
                                            );
                                        }
                                    "
                                    color="danger"
                                    v-can="'craftable-pro.instructor.destroy'"
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
import { Link } from "@inertiajs/vue3";
import {
    PlusIcon,
    TrashIcon,
    PencilSquareIcon,
} from "@heroicons/vue/24/outline";
import {
    PageHeader,
    PageContent,
    Button,
    Listing,
    ListingHeaderCell,
    ListingDataCell,
    Modal,
    IconButton,
} from "craftable-pro/Components";
import { PaginatedCollection } from "craftable-pro/types/pagination";
import type { Instructor } from "./types";
import dayjs from "dayjs";
import customParseFormat from "dayjs/plugin/customParseFormat";

dayjs.extend(customParseFormat);

interface Props {
    instructors: PaginatedCollection<Instructor>;
}
defineProps<Props>();
</script>
