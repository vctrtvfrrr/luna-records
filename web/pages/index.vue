<template>
  <div class="container bg-gray-50 shadow-2xl max-w-2xl lg:max-w-7xl">
    <TheNavbar />

    <div class="py-8 px-4 sm:py-12 sm:px-6 lg:px-8">
      <h2 class="text-2xl font-bold tracking-tight text-gray-900">
        Novos lançamentos
      </h2>

      <div
        class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
      >
        <ProductListItem
          v-for="product in products"
          :key="product.id"
          :product="product"
        />
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import Product from "~/types/Product";

const products: Product[] = [];
</script>
