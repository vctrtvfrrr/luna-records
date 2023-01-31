<script lang="ts" setup>
definePageMeta({
  layout: "admin",
});

const { $api } = useNuxtApp();
const { data: customers } = await $api.admin.customer.index();
</script>

<template>
  <div class="shadow-lg bg-white rounded-lg">
    <div class="bg-gray-100 px-6 py-2 border-b border-gray-200 rounded-t-lg">
      <h2 class="text-lg font-bold uppercase tracking-tight text-gray-900">
        Clientes
      </h2>
    </div>

    <div class="px-6 py-4">
      <table class="w-full table-auto">
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th class="px-6 py-3 text-left">Nome</th>
            <th class="px-6 py-3 text-left">E-mail</th>
            <th class="px-6 py-3 text-left">Telefone</th>
            <th class="px-6 py-3 text-left">Endereço</th>
            <th class="px-6 py-3 text-center">Nº Pedidos</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="customer in customers"
            :key="customer.id"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          >
            <td class="px-6 py-4">{{ customer.name }}</td>
            <td class="px-6 py-4">{{ customer.email }}</td>
            <td class="px-6 py-4">{{ customer.phone }}</td>
            <td class="px-6 py-4">{{ customer.address }}</td>
            <td class="px-6 py-4 text-center">{{ customer.orders_count || 0 }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
