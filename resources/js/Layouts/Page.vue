<script setup lang="ts">
import Header from './Header.vue';
</script>

<template>
  <Header />

  <main class="m-6 text-blue md:m-12">
    <slot />
  </main>
</template>
