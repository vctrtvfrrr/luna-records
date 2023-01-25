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
              class="block h-6 w-6"
              icon="ic:baseline-menu"
              aria-hidden="true"
            />
            <Icon
              v-else
              class="block h-6 w-6"
              icon="ic:baseline-close"
              aria-hidden="true"
            />
          </DisclosureButton>
        </div>

        <div
          class="flex flex-1 items-center justify-center sm:justify-start"
        >
          <div class="flex flex-shrink-0 items-center">
            <img
              class="block h-16 w-auto -scale-y-100"
              src="~/assets/logo.svg"
              alt="Luna Records"
              title="Luna Records"
            />
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <a
                v-for="item in navigation"
                :key="item.name"
                :href="item.href"
                :class="[
                  item.current
                    ? 'bg-red-800 text-white'
                    : 'text-red-700 hover:bg-red-700 hover:text-white',
                  'px-3 rounded py-2 text-sm font-medium',
                ]"
                :aria-current="item.current ? 'page' : undefined"
                >{{ item.name }}</a
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
          as="a"
          :href="item.href"
          :class="[
            item.current
              ? 'bg-red-800 text-white'
              : 'text-red-700 hover:bg-red-700 hover:text-white',
            'block px-3 py-2 rounded-md text-base font-medium',
          ]"
          :aria-current="item.current ? 'page' : undefined"
          >{{ item.name }}</DisclosureButton
        >
      </div>
    </DisclosurePanel>
  </Disclosure>
</template>

<script setup>
import { Icon } from "@iconify/vue";
import { Disclosure, DisclosureButton, DisclosurePanel } from "@headlessui/vue";

const navigation = [
  { name: "Lançamentos", href: "#", current: true },
  { name: "Mais vendidos", href: "#", current: false },
  { name: "Oldies", href: "#", current: false },
  { name: "Fundo do baú", href: "#", current: false },
];
</script>
