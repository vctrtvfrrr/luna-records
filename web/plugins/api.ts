import { $fetch, FetchOptions } from "ohmyfetch";
import AdminAlbumModule from "~/repository/modules/admin/album";
import V1AlbumModule from "~/repository/modules/v1/album";

interface IApiInstance {
  admin: {
    album: AdminAlbumModule;
  };
  v1: {
    album: V1AlbumModule;
  };
}

export default defineNuxtPlugin((nuxtApp) => {
  const fetchOptions: FetchOptions = {
    baseURL: process.server
      ? nuxtApp.$config.API_URL
      : nuxtApp.$config.API_BROWSER_URL,
  };

  const apiFetcher = $fetch.create(fetchOptions);

  const modules: IApiInstance = {
    admin: { album: new AdminAlbumModule(apiFetcher) },
    v1: { album: new V1AlbumModule(apiFetcher) },
  };

  return {
    provide: {
      api: modules,
    },
  };
});
