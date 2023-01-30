import { $fetch, FetchOptions } from "ohmyfetch";
import AlbumModule from "~/repository/modules/album";

interface IApiInstance {
  album: AlbumModule;
}

export default defineNuxtPlugin((nuxtApp) => {
  const fetchOptions: FetchOptions = {
    baseURL: process.server
      ? nuxtApp.$config.API_URL
      : nuxtApp.$config.API_BROWSER_URL,
  };

  const apiFetcher = $fetch.create(fetchOptions);

  const modules: IApiInstance = {
    album: new AlbumModule(apiFetcher),
  };

  return {
    provide: {
      api: modules,
    },
  };
});
