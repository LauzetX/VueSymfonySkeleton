<script setup lang="ts">
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {inject} from "vue";
const user = inject('user');

</script>

<template>
  <li class="end">
    <ul class="header-end">
      <li>
        <font-awesome-icon :icon="['far', 'envelope']"  />

      </li>
      <li class="">
        <Popper>
          <span>  <FontAwesomeIcon icon="user"></FontAwesomeIcon></span>
          <template #content>
            <ul class="user-menu">
              <li class="user-menu-items">
                <a v-if="user" href="/logout"><font-awesome-icon icon="right-from-bracket" /> Log out</a>
              </li>
            </ul>
          </template>
        </Popper>
      </li>

    </ul>
  </li>
</template>