<script setup lang="ts">
</script>

<template>
  <h1></h1>
  <suspense>
    <div>
      <div v-if="loading">
        <h1>Loading</h1>
      </div>
      <div v-if="!loading">
        <article>
          <h1>
            Index
          </h1>
        </article>
      </div>
    </div>
  </suspense>
</template>
