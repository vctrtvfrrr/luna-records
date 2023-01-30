import { serialize } from "object-to-formdata";
import HttpFactory from "~/repository/factory";
import {
  IAlbumIndexResponse,
  IAlbumShowResponse,
  IAlbumStoreRequest,
  IAlbumStoreResponse,
} from "types";

class AlbumModule extends HttpFactory {
  private RESOURCE = "albums";

  async index(): Promise<IAlbumIndexResponse> {
    return await this.call<IAlbumIndexResponse>(
      "GET",
      `/admin/${this.RESOURCE}`
    );
  }

  async store(payload: IAlbumStoreRequest): Promise<IAlbumStoreResponse> {
    if (!(payload.cover instanceof File)) delete payload.cover;
    const formData = serialize(payload);

    return await this.call<IAlbumShowResponse>(
      "POST",
      `/admin/${this.RESOURCE}`,
      formData
    );
  }

  async show(id: string): Promise<IAlbumShowResponse> {
    return await this.call<IAlbumShowResponse>(
      "GET",
      `/admin/${this.RESOURCE}/${id}`
    );
  }

  async update(
    id: string,
    payload: IAlbumStoreRequest
  ): Promise<IAlbumStoreResponse> {
    if (!(payload.cover instanceof File)) delete payload.cover;
    const formData = serialize(payload);

    // Required for file upload to work with the PATCH method.
    // https://stackoverflow.com/q/50691938/2095774
    formData.append("_method", "patch");

    return await this.call<IAlbumStoreResponse>(
      "POST",
      `/admin/${this.RESOURCE}/${id}`,
      formData
    );
  }

  async destroy(id: string): Promise<string> {
    return await this.call<string>("DELETE", `/admin/${this.RESOURCE}/${id}`);
  }
}

export default AlbumModule;
