<script lang="ts" setup>
import dayjs from "dayjs";
import "dayjs/locale/pt-br";
dayjs.locale("pt-br");

const { $api } = useNuxtApp();
const route = useRoute();

const { data: album } = await $api.v1.album.show(String(route.params.id));

const price = computed(() =>
  formatMoney(album.price && album.price > 0 ? album.price / 100 : 0)
);

const releasedAt = computed(() => {
  if (typeof album.released_at === "undefined") return "-";
  return dayjs(album.released_at).format("D MMMM YYYY");
});

const duration = computed(() => formatDuration(album.duration || 0));
</script>

<template>
  <h3 class="text-lg font-bold tracking-tight text-gray-400">
    {{ album.artist }}
  </h3>
  <h2 class="text-3xl font-bold tracking-tight text-gray-900">
    {{ album.name }}
  </h2>

  <div class="w-full mt-6">
    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 xl:gap-x-8">
      <div>
        <div class="bg-white box-border shadow p-2">
          <img
            v-if="typeof album.cover === 'string'"
            :src="album.cover"
            :alt="`${album.artist} - ${album.name}`"
            class="block"
          />
        </div>

        <div v-if="album.tags && album.tags.length" class="mt-6">
          <span
            v-for="(tag, index) in album.tags"
            :key="index"
            class="text-xs inline-block items-center leading-sm uppercase px-3 py-1 mr-2 bg-gray-300 text-black rounded-md"
            >{{ tag }}</span
          >
        </div>
      </div>

      <div>
        <dl class="grid grid-cols-2 gap-1 text-sm">
          <dt class="font-bold">Estoque</dt>
          <dd>{{ album.stock ? album.stock : "Fora de estoque" }}</dd>

          <template v-if="album.tracks && album.tracks.length">
            <dt class="font-bold">Duração</dt>
            <dd>{{ album.tracks.length }} faixas, {{ duration }}</dd>
          </template>

          <dt class="font-bold">Data de lançamento</dt>
          <dd>{{ releasedAt }}</dd>
        </dl>

        <div v-if="album.tracks && album.tracks.length" class="mt-8">
          <h3 class="font-bold text-lg">Lista de faixas</h3>

          <table class="w-full text-sm">
            <tbody>
              <tr
                v-for="(track, index) in album.tracks"
                :key="index"
                class="flex items-center align-middle px-4 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">{{ track.number }}</td>
                <td class="flex-grow flex-shrink m-2 font-bold">
                  {{ track.title }}
                </td>
                <td class="flex-shrink-0 ml-2 text-gray-400">
                  {{ formatDuration(track.duration) }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <form class="mt-8">
      <h3 class="font-bold text-2xl">Finalize a compra</h3>

      <div class="grid grid-cols-5 gap-8">
        <div class="col-span-3 mt-2">
          <div class="mt-8 space-y-6">
            <div class="grid grid-cols-12 gap-2">
              <label class="block col-span-8">
                <input
                  type="text"
                  class="mt-1 block w-full"
                  placeholder="Nº Cartão de Crédito"
                />
              </label>
              <label class="block col-span-2">
                <input
                  type="text"
                  class="mt-1 block w-full"
                  placeholder="MM / AA"
                />
              </label>
              <label class="block col-span-2">
                <input
                  type="text"
                  class="mt-1 block w-full"
                  placeholder="CVV"
                />
              </label>
            </div>

            <label class="block">
              <input
                type="text"
                class="mt-1 block w-full"
                placeholder="Nome completo"
              />
            </label>

            <div class="grid grid-cols-2 gap-2">
              <label class="block">
                <input
                  type="email"
                  class="mt-1 block w-full"
                  placeholder="E-mail"
                />
              </label>

              <label class="block">
                <input
                  type="text"
                  class="mt-1 block w-full"
                  placeholder="Telefone"
                />
              </label>
            </div>

            <label class="block">
              <input
                type="text"
                class="mt-1 block w-full"
                placeholder="Endereço de cobrança"
              />
            </label>
          </div>
        </div>

        <div class="col-span-2">
          <h4 class="text-lg font-bold mb-4">Detalhes do pedido</h4>

          <dl
            class="grid grid-cols-5 gap-1 border-t border-b border-gray-200 py-4 text-sm"
          >
            <dt class="col-span-4 mb-2">
              <span class="block font-bold truncate"
                >1 Álbum: {{ `${album.name} - ${album.artist}` }}</span
              >
              <small class="text-xs text-gray-500">1x {{ price }}</small>
            </dt>
            <dd class="font-bold text-right">
              {{ price }}
            </dd>

            <dt class="col-span-4 mb-2">
              <span class="block font-bold truncate">Frete</span>
              <small class="text-xs text-gray-500">Gratis p/ todo Brasil</small>
            </dt>
            <dd class="font-bold text-right">R$ 0,00</dd>
          </dl>

          <div class="flex justify-between py-4 font-bold">
            <div>Subtotal</div>
            <div>
              {{ price }}
            </div>
          </div>

          <button
            class="inline-block mt-4 py-2 px-4 rounded bg-red-700 hover:bg-red-800 text-center text-white font-bold"
          >
            Finalizar o Pedido
          </button>
        </div>
      </div>
    </form>
  </div>
</template>
