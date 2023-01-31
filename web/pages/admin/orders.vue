<script lang="ts" setup>
definePageMeta({
  layout: "admin",
});

const { $api } = useNuxtApp();
const { data: orders } = await $api.admin.order.index();
</script>

<template>
  <div class="shadow-lg bg-white rounded-lg">
    <div class="bg-gray-100 px-6 py-2 border-b border-gray-200 rounded-t-lg">
      <h2 class="text-lg font-bold uppercase tracking-tight text-gray-900">
        Pedidos
      </h2>
    </div>

    <div class="px-6 py-4">
      <table class="w-full table-auto">
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th class="px-6 py-3 text-left">Cliente</th>
            <th class="px-6 py-3 text-left">Álbum</th>
            <th class="px-6 py-3 text-center">Qnt.</th>
            <th class="px-6 py-3 text-right">Frete</th>
            <th class="px-6 py-3 text-right">Total</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="order in orders"
            :key="order.id"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          >
            <td class="px-6 py-4 text-left">{{ order.customer?.name }}</td>
            <td class="px-6 py-4 text-left">{{ order.album?.name }}</td>
            <td class="px-6 py-4 text-center">{{ order.quantity }}</td>
            <td class="px-6 py-4 text-right">
              {{ formatMoney(order.delivery_fee / 100) }}
            </td>
            <td class="px-6 py-4 text-right">
              {{ formatMoney(order.total_cost / 100) }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
