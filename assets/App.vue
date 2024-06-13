<script setup lang="ts">
import MainMenu from "@/components/MainMenu/MainMenu.vue";
import {useUserStore} from "@/stores/UserStore";
import {onBeforeMount, provide} from "vue";
import {storeToRefs} from "pinia";
import router from "@/router";
const { fetchUser } = useUserStore();
const { user, users, loading, error, initialized } = storeToRefs(useUserStore());

onBeforeMount( () => {
  fetchUser()
})

provide('user', user.value);

</script>

<template>
  <suspense>
    <transition name="fade" mode="out-in">
      <div class="app-wrapper" v-if="!loading">
          <MainMenu v-if="initialized"/>
          <RouterView />
      </div>
    </transition>
  </suspense>

</template>

<style src="@/styles/reset.scss"></style>
<style src="@/styles/index.scss"></style>
