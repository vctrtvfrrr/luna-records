// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    ssr: true,
    devServer: {
        host: "0.0.0.0",
        port: 8000,
    },
    vite: {
        server: {
            hmr: {
                protocol: 'wss',
                clientPort: 443,
                path: "hmr/",
            },
        },
    },
});
