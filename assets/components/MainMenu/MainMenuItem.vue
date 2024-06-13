<script setup lang="ts">
import { defineProps } from "vue";
defineProps<{ menuTitle: string; menuTo: object }>();
</script>

<template>
  <li class="main-menu-item">
    <RouterLink :to="menuTo">
      {{ menuTitle }}
    </RouterLink>
  </li>
</template>
