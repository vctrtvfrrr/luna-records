import HttpFactory from "~/repository/factory";
import { IAlbumIndexResponse, IAlbumShowResponse } from "types";

class AlbumModule extends HttpFactory {
  private RESOURCE = "albums";

  async index(): Promise<IAlbumIndexResponse> {
    return await this.call<IAlbumIndexResponse>("GET", `/v1/${this.RESOURCE}`);
  }

  async show(id: string): Promise<IAlbumShowResponse> {
    return await this.call<IAlbumShowResponse>(
      "GET",
      `/v1/${this.RESOURCE}/${id}`
    );
  }
}

export default AlbumModule;
