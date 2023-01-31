import HttpFactory from "~/repository/factory";
import { ICustomerIndexResponse } from "types";

class CustomerModule extends HttpFactory {
  private RESOURCE = "customers";

  async index(): Promise<ICustomerIndexResponse> {
    return await this.call<ICustomerIndexResponse>(
      "GET",
      `/admin/${this.RESOURCE}`
    );
  }
}

export default CustomerModule;
