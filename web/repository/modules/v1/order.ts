import HttpFactory from "~/repository/factory";
import { IOrderStoreRequest, IOrderStoreResponse } from "types";

class OrderModule extends HttpFactory {
  private RESOURCE = "orders";

  async store(payload: IOrderStoreRequest): Promise<IOrderStoreResponse> {
    return await this.call<IOrderStoreResponse>(
      "POST",
      `/v1/${this.RESOURCE}`,
      payload
    );
  }
}

export default OrderModule;
