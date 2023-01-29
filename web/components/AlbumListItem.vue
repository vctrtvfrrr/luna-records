<template>
  <div class="group relative">
    <div
      class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80"
    >
      <img
        :src="album.cover"
        :alt="`${album.artist} - ${album.album}`"
        class="h-full w-full object-cover object-center lg:h-full lg:w-full"
      />
    </div>

    <div class="mt-4 flex justify-between">
      <div class="flex-1 overflow-hidden">
        <h3
          class="text-sm font-bold text-gray-700 whitespace-nowrap truncate"
          :title="album.album"
        >
          {{ album.album }}
        </h3>
        <p class="mt-1 text-sm text-gray-500">{{ album.artist }}</p>
      </div>
      <p
        class="ml-2 text-xl font-bold tracking-tighter text-gray-900 whitespace-nowrap"
      >
        {{ album.price }}
      </p>
    </div>

    <NuxtLink
      :to="`albums/${album.id}`"
      class="block w-full mt-4 py-2 px-4 rounded bg-red-700 hover:bg-red-800 text-center text-white font-bold"
    >
      Comprar
    </NuxtLink>
  </div>
</template>

<script lang="ts" setup>
import { type PropType } from "vue";
import Album from "~/types/Album";

const props = defineProps({
  album: {
    type: Object as PropType<Album>,
    required: true,
  },
});
</script>
