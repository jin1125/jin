<script setup lang="ts">
import Header from './Header.vue';
</script>

<template>
  <Header />

  <main class="my-16 mx-20 text-blue">
    <slot />
  </main>
</template>
