<script lang="ts" setup>
import { getNode, reset } from "@formkit/core";
import { IAlbum } from "types";
const { $api } = useNuxtApp();

definePageMeta({
  layout: "admin",
});

const albumsIndex = ref<HTMLElement | null>(null);
const albumsForm = ref<HTMLElement | null>(null);

const formMode = ref("store");

const { data } = await $api.admin.album.index();
const albums: IAlbum[] = reactive(data);

function submitAlbumForm(fields: Record<string, any>) {
  if (formMode.value === "store") {
    return createAlbum(fields);
  } else {
    return updateAlbum(fields);
  }
}

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
    albumsIndex.value?.scrollIntoView({ behavior: "smooth" });
  } catch (error) {
    // TODO: Tratar os erros da API
    console.error(error);
  }
}

function openForEditing(id?: string) {
  if (typeof id === "undefined") return;

  const index = albums.findIndex((i) => i.id === id);
  if (index < 0) return;

  const album: IAlbum = albums[index];

  getNode("id")?.input(album.id);
  getNode("name")?.input(album.name);
  getNode("artist")?.input(album.artist);
  getNode("released_at")?.input(album.released_at);
  getNode("price")?.input(album.price ? album.price / 100 : 0);
  getNode("stock")?.input(album.stock);

  formMode.value = "update";
  albumsForm.value?.scrollIntoView({ behavior: "smooth" });
}

async function updateAlbum(fields: Record<string, any>) {
  const payload = {
    id: fields.id,
    name: fields.name,
    artist: fields.artist,
    released_at: fields.released_at,
    price: Number(fields.price) * 100,
    stock: Number(fields.stock),
    cover: undefined,
  };
  fields.cover.forEach((fileItem: any) => (payload.cover = fileItem.file));

  try {
    const { data: response } = await $api.admin.album.update(
      fields.id,
      payload
    );

    const index = albums.findIndex((i) => i.id === fields.id);
    if (index >= 0) {
      albums[index] = response;
    } else {
      albums.push(response);
    }

    reset("albumForm");
    formMode.value = "store";
    albumsIndex.value?.scrollIntoView({ behavior: "smooth" });
  } catch (error) {
    // TODO: Tratar os erros da API
    console.error(error);
  }
}

async function removeAlbum(id?: string) {
  if (
    typeof id === "undefined" ||
    !confirm("Tem certeza que deseja remover este álbum?")
  )
    return;

  try {
    await $api.admin.album.destroy(id);
    const index = albums.findIndex((i) => i.id === id);
    if (index >= 0) albums.splice(index, 1);
  } catch (error) {
    // TODO: Tratar os erros da API
    console.error(error);
  }
}
</script>

<template>
  <div ref="albumsIndex" class="shadow-lg bg-white rounded-lg">
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
            <th>&nbsp;</th>
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
            <td>
              <button
                type="button"
                class="inline-flex bg-blue-500 hover:bg-blue-700 text-white mr-1 p-1 rounded"
                title="Remover álbum"
                @click="openForEditing(album.id)"
              >
                <Icon name="ic:baseline-edit" />
              </button>
              <button
                type="button"
                class="inline-flex bg-red-500 hover:bg-red-700 text-white mr-1 p-1 rounded"
                title="Remover álbum"
                @click="removeAlbum(album.id)"
              >
                <Icon name="ic:baseline-delete-forever" />
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div ref="albumsForm" class="shadow-lg bg-white rounded-lg mt-12">
    <div class="bg-gray-100 px-6 py-2 border-b border-gray-200 rounded-t-lg">
      <h2 class="text-lg font-bold uppercase tracking-tight text-gray-900">
        {{ formMode === "store" ? "Cadastrar álbum" : "Editar álbum" }}
      </h2>
    </div>

    <div class="px-6 py-4">
      <FormKit
        type="form"
        id="albumForm"
        @submit="submitAlbumForm"
        :submit-label="formMode === 'store' ? 'Criar álbum' : 'Editar álbum'"
      >
        <FormKit type="hidden" name="id" id="id" />
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
