<script setup lang="ts">
import MainMenuItem from "@/components/MainMenu/MainMenuItem.vue";
import UserMenuSection from "@/components/MainMenu/UserMenuSection.vue";

const mainMenuLinksArray = [{
  title: "Index",
      to: {
      name: "index"
    }
}];
</script>

<template>
  <ul class="mainmenu">
    <MainMenuItem
      v-for="menuItem in mainMenuLinksArray"
      :menu-to="menuItem.to"
      :menu-title="menuItem.title"
    ></MainMenuItem>
    <li><a href="/admin">Admin</a></li>

    <UserMenuSection />
  </ul>
</template>
