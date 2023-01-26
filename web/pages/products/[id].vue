<template>
  <h2 class="text-lg font-bold tracking-tight text-gray-400">Pink Floyd</h2>
  <h2 class="text-3xl font-bold tracking-tight text-gray-900">
    The Dark Side of the Moon
  </h2>

  <div class="w-full mt-6">
    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 xl:gap-x-8">
      <div>
        <div class="bg-white box-border shadow p-2">
          <img src="/PinkFloyd-DarkSideoftheMoon.webp" alt="" class="block" />
        </div>
      </div>

      <div>
        <dl class="grid grid-cols-2 gap-1 text-sm">
          <dt class="font-bold">Estoque</dt>
          <dd>123</dd>

          <dt class="font-bold">Duração</dt>
          <dd>10 faixas, 45:49</dd>

          <dt class="font-bold">Data de lançamento</dt>
          <dd>1 Março 1973</dd>
        </dl>

        <div class="mt-8">
          <h3 class="font-bold text-lg">Lista de faixas</h3>

          <table class="w-full text-sm">
            <tbody>
              <tr
                class="flex items-center align-middle px-4 py-2 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">1</td>
                <td class="flex-grow flex-shrink m-2 font-bold">Speak to Me</td>
                <td class="flex-shrink-0 ml-2 text-gray-400">1:10</td>
              </tr>
              <tr
                class="flex items-center align-middle px-4 py-2 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">2</td>
                <td class="flex-grow flex-shrink m-2 font-bold">
                  Breathe (In the Air)
                </td>
                <td class="flex-shrink-0 ml-2 text-gray-400">2:39</td>
              </tr>
              <tr
                class="flex items-center align-middle px-4 py-2 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">3</td>
                <td class="flex-grow flex-shrink m-2 font-bold">On the Run</td>
                <td class="flex-shrink-0 ml-2 text-gray-400">3:42</td>
              </tr>
              <tr
                class="flex items-center align-middle px-4 py-2 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">4</td>
                <td class="flex-grow flex-shrink m-2 font-bold">Time</td>
                <td class="flex-shrink-0 ml-2 text-gray-400">7:37</td>
              </tr>
              <tr
                class="flex items-center align-middle px-4 py-2 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">5</td>
                <td class="flex-grow flex-shrink m-2 font-bold">
                  The Great Gig in the Sky
                </td>
                <td class="flex-shrink-0 ml-2 text-gray-400">5:18</td>
              </tr>
              <tr
                class="flex items-center align-middle px-4 py-2 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">6</td>
                <td class="flex-grow flex-shrink m-2 font-bold">Money</td>
                <td class="flex-shrink-0 ml-2 text-gray-400">7:43</td>
              </tr>
              <tr
                class="flex items-center align-middle px-4 py-2 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">7</td>
                <td class="flex-grow flex-shrink m-2 font-bold">Us and Them</td>
                <td class="flex-shrink-0 ml-2 text-gray-400">6:54</td>
              </tr>
              <tr
                class="flex items-center align-middle px-4 py-2 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">8</td>
                <td class="flex-grow flex-shrink m-2 font-bold">
                  Any Colour You Like
                </td>
                <td class="flex-shrink-0 ml-2 text-gray-400">3:59</td>
              </tr>
              <tr
                class="flex items-center align-middle px-4 py-2 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">9</td>
                <td class="flex-grow flex-shrink m-2 font-bold">
                  Brain Damage
                </td>
                <td class="flex-shrink-0 ml-2 text-gray-400">3:53</td>
              </tr>
              <tr
                class="flex items-center align-middle px-4 py-2 border-b border-gray-200 hover:bg-gray-100"
              >
                <td class="flex-shrink-0 mr-2">10</td>
                <td class="flex-grow flex-shrink m-2 font-bold">Eclipse</td>
                <td class="flex-shrink-0 ml-2 text-gray-400">2:54</td>
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
                >1 Álbum: The Dark Side of the Moon - Pink Floyd</span
              >
              <small class="text-xs text-gray-500">1x R$ 29,90</small>
            </dt>
            <dd class="font-bold text-right">R$ 29,90</dd>

            <dt class="col-span-4 mb-2">
              <span class="block font-bold truncate">Frete</span>
              <small class="text-xs text-gray-500">Gratis p/ todo Brasil</small>
            </dt>
            <dd class="font-bold text-right">R$ 0,00</dd>
          </dl>

          <div class="flex justify-between py-4 font-bold">
            <div>Subtotal</div>
            <div>R$ 29,90</div>
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
