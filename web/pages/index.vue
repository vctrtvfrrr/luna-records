<script lang="ts" setup>
const { $api } = useNuxtApp();
const { data: albums } = await $api.v1.album.index();
</script>

<template>
  <h2 class="text-2xl font-bold tracking-tight text-gray-900">
    Novos lançamentos
  </h2>

  <div
    class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
  >
    <AlbumListItem v-for="album in albums" :key="album.id" :album="album" />
  </div>
</template>
