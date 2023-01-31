<script lang="ts" setup>
import { type PropType } from "vue";
import { INavigation } from "types";
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";

const route = useRoute();

defineProps({
  navigation: {
    type: Array as PropType<INavigation[]>,
    required: true,
  },
});
</script>

<template>
  <Disclosure as="nav" v-slot="{ open }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <DisclosureButton
            class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
          >
            <span class="sr-only">Abrir menu principal</span>
            <Icon
              v-if="!open"
              name="ic:baseline-menu"
              class="block h-6 w-6"
              aria-hidden="true"
            />
            <Icon
              v-else
              name="ic:baseline-close"
              class="block h-6 w-6"
              aria-hidden="true"
            />
          </DisclosureButton>
        </div>

        <div class="flex flex-1 items-center justify-center sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <NuxtLink to="/">
              <img
                class="block h-16 w-auto -scale-y-100"
                src="~/assets/logo.svg"
                alt="Luna Records"
                title="Luna Records"
              />
            </NuxtLink>
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <NuxtLink
                v-for="item in navigation"
                :key="item.name"
                :to="item.href"
                :class="[
                  route.path === item.href
                    ? 'bg-red-800 text-white'
                    : 'text-red-700 hover:bg-red-700 hover:text-white',
                  'flex items-center px-3 rounded py-2 text-sm font-medium',
                ]"
                :aria-current="route.path === item.href ? 'page' : undefined"
                ><span v-if="item.icon" class="flex"
                  ><Icon :name="item.icon" size="18px"
                /></span>
                {{ item.name }}</NuxtLink
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <DisclosurePanel class="sm:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3">
        <DisclosureButton
          v-for="item in navigation"
          :key="item.name"
          as="NuxtLink"
          :to="item.href"
          :class="[
            route.path === item.href
              ? 'bg-red-800 text-white'
              : 'text-red-700 hover:bg-red-700 hover:text-white',
            'flex items-center px-3 py-2 rounded-md text-base font-medium',
          ]"
          :aria-current="route.path === item.href ? 'page' : undefined"
          ><span v-if="item.icon" class="flex"
            ><Icon :name="item.icon" size="18px"
          /></span>
          {{ item.name }}</DisclosureButton
        >
      </div>
    </DisclosurePanel>
  </Disclosure>
</template>
