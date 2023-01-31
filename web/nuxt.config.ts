// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devServer: {
    host: process.env.HOST,
    port: Number(process.env.PORT),
  },
  modules: ["@nuxtjs/tailwindcss", "nuxt-icon", "@formkit/nuxt"],
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
  runtimeConfig: {
    public: {
      API_URL: process.env.API_URL,
      API_BROWSER_URL: process.env.API_BROWSER_URL,
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
