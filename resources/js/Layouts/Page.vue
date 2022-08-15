<script setup lang="ts">
import Header from './Header.vue';
</script>

<template>
  <Header />

  <main class="m-12 text-blue">
    <slot />
  </main>
</template>
