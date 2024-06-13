import { defineStore } from "pinia";
import httpClient from "@/API/Client";
export const useUserStore = defineStore("user", {
  state: () => ({
    user: {
      id: null,
      name: null,
      email: null,
    },
    users: [],
    loading: true,
    error: null,
    initialized: false,
  }),
  getters: {
    getId: (state) => state.user.id,
    getName: (state) => state.user.name,
    getEmail: (state) => state.user.email,
  },
  actions: {
    async fetchUser(userId = null) {
      this.loading = true;

      if (this.initialized) {
        return;
      }

      this.user = {
        id: null,
        name: null,
        email: null,
      };

      try {
        const { data, status, headers } = await httpClient.get("User", {
          id: userId,
        });

        if (data === null) {
          this.user = {
            id: null,
            name: null,
            email: null,
          };

         // throw new Error("Not logged in user found");
        }

        const { id: id, email: email, name: name } = data;
        this.user = { ...{ id: id, email: email, name: name } };
        this.initialized = true;
      } catch (error) {
        console.error(error);
        this.error = error;
      } finally {
        this.loading = false;
      }
    },
    async createUser(newUserData) {
      this.loading = true;

      try {
        const { data, status, headers } = await httpClient.post("User", newUserData);
        console.log(data);
        console.log(status);
      } catch (error) {
        console.error(error);
        this.error = error;
      } finally {
        this.loading = false;
      }
    },
    async loginUser() {

    }
  },
});
