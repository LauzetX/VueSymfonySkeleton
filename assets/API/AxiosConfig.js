import axios from "axios";
import { _log } from "@/utils/DebugHelper";

const axiosInstance = axios.create({
  baseURL: '/api',
  headers: {
    'X-Requested-Module': 'User',
    'Content-Type': 'application/json'
  },
});

axiosInstance.interceptors.response.use(
  (res) => {
    _log("Response inteceptor", res);
    return res;
  },
  (error) => {
    if (error?.response?.status === 403) {
      // Handle forbidden error
    }
    if (error?.response?.status === 401) {
      // Handle unauthorized error (e.g., log out the user)
    }
    throw error; // Propagate the error
  },
);

axiosInstance.interceptors.request.use(
  async function (config) {
    _log("Request inteceptor", config);
    return config;
  },
  function (error) {
    return Promise.reject(error);
  },
);

export default axiosInstance;
