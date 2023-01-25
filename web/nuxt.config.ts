// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  css: ['~/assets/css/main.css'],
  devServer: {
    host: process.env.HOST,
    port: Number(process.env.PORT),
  },
  typescript: {
    strict: true,
  },
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
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
