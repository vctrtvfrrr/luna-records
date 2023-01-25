// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  css: ["~/assets/css/main.css"],
  devServer: {
    host: process.env.HOST,
    port: Number(process.env.PORT),
  },
  modules: ["nuxt-icon"],
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
  typescript: {
    strict: true,
  },
  // TODO: Nmbiente de desenvolvimento, as chamadas HMR precisam passar pelo proxy reverso do NGINX.
  vite: {
    server: {
      hmr: {
        protocol: "wss",
        clientPort: 443,
        path: "hmr/",
      },
    },
  },
});
