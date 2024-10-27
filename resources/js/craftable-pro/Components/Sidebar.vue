<template>
    <div>
        <nav class="mt-5 space-y-1">
            <SidebarGroup :title="$t('craftable-pro', 'Content')">
                <SidebarItem
                    :href="route('craftable-pro.media.index')"
                    :icon="PhotoIcon"
                    v-can="'craftable-pro.media.index'"
                >
                    {{ $t("craftable-pro", "Media") }}
                </SidebarItem>

                <SidebarItem
                    :href="route('craftable-pro.posts.index')"
                    :icon="QueueListIcon"
                    v-can="'craftable-pro.post.index'"
                >
                    {{ $t("craftable-pro", "Posts") }}
                </SidebarItem>
                <SidebarItem
                    :href="route('craftable-pro.courses.index')"
                    :icon="AcademicCapIcon"
                    v-can="'craftable-pro.course.index'"
                >
                    {{ $t("craftable-pro", "Courses") }}
                </SidebarItem>

                <!--AppendGeneratorLink-->
            </SidebarGroup>

            <SidebarGroup :title="$t('craftable-pro', 'Contributors')">
                <SidebarItem
                    :href="route('craftable-pro.authors.index')"
                    :icon="UserGroupIcon"
                    v-can="'craftable-pro.author.index'"
                >
                    {{ $t("craftable-pro", "Authors") }}
                </SidebarItem>
                <SidebarItem
                    :href="route('craftable-pro.instructors.index')"
                    :icon="UserIcon"
                    v-can="'craftable-pro.instructor.index'"
                >
                    {{ $t("craftable-pro", "Instructors") }}
                </SidebarItem>
            </SidebarGroup>

            <SidebarGroup
                :title="$t('craftable-pro', 'System')"
                v-can:any="[
                    'craftable-pro.craftable-pro-user.index',
                    'craftable-pro.role.index',
                    'craftable-pro.translation.index',
                    'craftable-pro.settings.edit',
                ]"
            >
                <SidebarItem
                    :href="route('craftable-pro.craftable-pro-users.index')"
                    :icon="UsersIcon"
                    v-can="'craftable-pro.craftable-pro-user.index'"
                >
                    {{ $t("craftable-pro", "Access") }}
                </SidebarItem>
                <SidebarItem
                    :href="route('craftable-pro.roles.index')"
                    :icon="KeyIcon"
                    v-can="'craftable-pro.role.index'"
                >
                    {{ $t("craftable-pro", "Roles") }}
                </SidebarItem>
                <SidebarItem
                    :href="route('craftable-pro.translations.index')"
                    :icon="LanguageIcon"
                    v-can="'craftable-pro.translation.index'"
                >
                    {{ $t("craftable-pro", "Localization") }}
                </SidebarItem>
                <SidebarItem
                    :href="route('craftable-pro.settings.index')"
                    :icon="Cog8ToothIcon"
                    v-can="'craftable-pro.settings.edit'"
                >
                    {{ $t("craftable-pro", "Settings") }}
                </SidebarItem>
            </SidebarGroup>
        </nav>
    </div>
</template>

<script setup lang="ts">
import {
    KeyIcon,
    LanguageIcon,
    PhotoIcon,
    UsersIcon,
    Cog8ToothIcon,
    UserGroupIcon,
    QueueListIcon,
    AcademicCapIcon,
    UserIcon,
} from "@heroicons/vue/24/outline";
import { SidebarItem, SidebarGroup } from "craftable-pro/Components";
</script>
