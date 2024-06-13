import axiosInstance from "@/API/AxiosConfig";

const httpClient = {
  async get(module, params = {}) {
    const { data, status, headers } = await axiosInstance.get("/get", {
      params: params,
      headers: {
        "X-Requested-Module": module,
      },
    });

    return { data, status, headers };
  },
  // TODO
  async post(
    module,
    requestData,
    requestHeaders = { "content-type": "application/json" },
  ) {
    const { data, status, headers } = await axiosInstance.post(
      '/post',
      requestData,
        {
          headers: {
            "X-Requested-Module": module,
            "content-type": "application/json",
          }
        }
    );

    console.log({ data, status, headers });

    return { data, status, headers };
  },

  // TODO
  async put(
    url,
    requestData,
    requestHeaders = { "content-type": "application/json" },
  ) {
    const { data, status, headers } = await axiosInstance.post(
      url,
      requestData,
      {
        headers: requestHeaders,
      },
    );

    console.log({ data, status, headers });

    return { data, status, headers };
  },

  // TODO
  async delete(
    url,
    requestData,
    requestHeaders = { "content-type": "application/json" },
  ) {
    const { data, status, headers } = await axiosInstance.post(
      url,
      requestData,
      {
        headers: requestHeaders,
      },
    );

    console.log({ data, status, headers });

    return { data, status, headers };
  },
};

export default httpClient;
