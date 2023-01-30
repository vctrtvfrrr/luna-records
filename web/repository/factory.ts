import { $Fetch } from "ohmyfetch";

class HttpFactory {
  private $fetch: $Fetch;

  constructor(fetcher: $Fetch) {
    this.$fetch = fetcher;
  }

  async call<T>(
    method: string,
    url: string,
    data?: object,
    extras = {}
  ): Promise<T> {
    const $res: T = await this.$fetch(url, {
      method,
      body: data,
      ...Object.assign({ headers: { Accept: "application/json" } }, extras),
    });
    return $res;
  }
}

export default HttpFactory;
