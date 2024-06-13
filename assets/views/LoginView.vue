
<!-- @TODO: WIP -->
<script setup lang="ts">
import {onBeforeMount, ref} from "vue";
import httpClient from "@/API/Client";
import axios from "axios";
const csrfToken = ref(null);

onBeforeMount(async () => {
  const {data} = await axios.get('/api/get-csrf-token');
  console.log(data);
});

async function handleLogin(form$, formData) {
  const response = await axios.post(
      '/api/login',
      formData /* | data | requestData */,
      {cd      }
  )

  console.log(response);
}
</script>

<template>
  <h1>Login</h1>
  <Vueform :endpoint="false" @submit="handleLogin">
    <TextElement input-type="text" name="email" key="login_email" placeholder="email" />
    <TextElement input-type="password" name="password" placeholder="password" key="login_password" />
    <ButtonElement name="submit_login" submits="submits" button-type="submit" button-label="Login"></ButtonElement>
  </Vueform>
</template>
