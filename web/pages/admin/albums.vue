<script lang="ts" setup>
import { reset } from "@formkit/core";
const { $api } = useNuxtApp();

definePageMeta({
  layout: "admin",
});

const { data } = await $api.admin.album.index();
const albums = reactive(data);

async function createAlbum(fields: Record<string, any>) {
  const payload = {
    name: fields.name,
    artist: fields.artist,
    released_at: fields.released_at,
    price: Number(fields.price) * 100,
    stock: Number(fields.stock),
    cover: undefined,
  };
  fields.cover.forEach((fileItem: any) => (payload.cover = fileItem.file));

  try {
    const { data: response } = await $api.admin.album.store(payload);
    albums.push(response);
    reset("albumForm");
  } catch (error) {
    console.error(error);
  }
}
</script>

<template>
  <div class="shadow-lg bg-white rounded-lg">
    <div class="bg-gray-100 px-6 py-2 border-b border-gray-200 rounded-t-lg">
      <h2 class="text-lg font-bold uppercase tracking-tight text-gray-900">
        Álbuns
      </h2>
    </div>

    <div class="px-6 py-4">
      <table class="w-full table-auto">
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th class="px-6 py-3 text-left">Nome</th>
            <th class="px-6 py-3 text-left">Artista</th>
            <th class="px-6 py-3 text-right">Preço</th>
            <th class="px-6 py-3 text-center">Estoque</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="album in albums"
            :key="album.id"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          >
            <td class="px-6 py-4">{{ album.name }}</td>
            <td class="px-6 py-4">{{ album.artist }}</td>
            <td class="px-6 py-4 text-right">
              {{ formatMoney(album.price ? album.price / 100 : 0) }}
            </td>
            <td class="px-6 py-4 text-center">{{ album.stock }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="shadow-lg bg-white rounded-lg mt-12">
    <div class="bg-gray-100 px-6 py-2 border-b border-gray-200 rounded-t-lg">
      <h2 class="text-lg font-bold uppercase tracking-tight text-gray-900">
        Cadastrar álbum
      </h2>
    </div>

    <div class="px-6 py-4">
      <FormKit
        type="form"
        id="albumForm"
        @submit="createAlbum"
        submit-label="Criar álbum"
      >
        <FormKit
          type="text"
          name="name"
          id="name"
          label="Nome"
          help="Nome do álbum"
          placeholder="Abbey Road"
          validation="required|length:1,120"
        />
        <FormKit
          type="text"
          name="artist"
          id="artist"
          label="Artista"
          help="Nome da banda ou artista"
          placeholder="The Beatles"
          validation="required|length:1,80"
        />
        <FormKit
          type="file"
          name="cover"
          id="cover"
          label="Capa"
          help="Capa do álbum"
          accept="image/jpeg,image/png,image/bmp,image/gif,image/svg,image/webp"
        />
        <FormKit
          type="date"
          name="released_at"
          id="released_at"
          label="Lançamento"
          help="Data de lançamento do álbum"
          placeholder="26 Setembro 1969"
        />
        <FormKit
          type="number"
          name="price"
          id="price"
          label="Preço"
          help="Preço do álbum"
          placeholder="49.90"
          step="0.01"
          prefixIcon="dollar"
          validation="number|min:0"
        />
        <FormKit
          type="number"
          name="stock"
          id="stock"
          label="Estoque"
          help="Quantidade de itens em estoque"
          placeholder="123"
          validation="number|min:0"
        />
      </FormKit>
    </div>
  </div>
</template>
