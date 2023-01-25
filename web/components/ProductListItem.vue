<template>
  <div class="group relative">
    <div
      class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80"
    >
      <img
        :src="product.imageSrc"
        :alt="`${product.artist} - ${product.album}`"
        class="h-full w-full object-cover object-center lg:h-full lg:w-full"
      />
    </div>

    <div class="mt-4 flex justify-between">
      <div class="flex-1 overflow-hidden">
        <h3 class="text-sm font-bold text-gray-700 whitespace-nowrap truncate">
          <a :href="product.href" :title="product.album">{{ product.album }}</a>
        </h3>
        <p class="mt-1 text-sm text-gray-500">{{ product.artist }}</p>
      </div>
      <p
        class="ml-2 text-xl font-bold tracking-tighter text-gray-900 whitespace-nowrap"
      >
        {{ product.price }}
      </p>
    </div>

    <button
      class="w-full mt-4 bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
    >
      Comprar
    </button>
  </div>
</template>

<script lang="ts" setup>
import { type PropType } from "vue";
import Product from "~/types/Product";

const props = defineProps({
  product: {
    type: Object as PropType<Product>,
    required: true,
  },
});
</script>
