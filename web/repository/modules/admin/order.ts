import HttpFactory from "~/repository/factory";
import { IOrderIndexResponse } from "types";

class OrderModule extends HttpFactory {
  private RESOURCE = "orders";

  async index(): Promise<IOrderIndexResponse> {
    return await this.call<IOrderIndexResponse>(
      "GET",
      `/admin/${this.RESOURCE}`
    );
  }
}

export default OrderModule;
