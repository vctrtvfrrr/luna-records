<script lang="ts" setup>
import { INavigation } from "types";

const navigation: INavigation[] = [
  {
    icon: "ic:baseline-home",
    name: "Home",
    href: "/",
  },
  {
    icon: "ic:baseline-admin-panel-settings",
    name: "Admin",
    href: "/admin",
  },
];
</script>

<template>
  <div class="container bg-white shadow-2xl max-w-2xl lg:max-w-7xl">
    <TheNavbar :navigation="navigation" />

    <div class="py-8 px-4 sm:py-12 sm:px-6 lg:px-8">
      <NuxtPage />
    </div>
  </div>
</template>
