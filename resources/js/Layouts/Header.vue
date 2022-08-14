<script setup lang="ts">
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <header class="sticky top-0 z-50">
    <div
      class="bg-blue flex font-bold h-14 items-center
        justify-between px-10 text-white"
    >
      <h1 class="text-2xl">
        Shogo Jinta
      </h1>

      <nav class="space-x-10">
        <Link href="">
          Profile
        </Link>
        <Link href="">
          Study
        </Link>
        <a href="https://github.com/jin1125">
          Github
        </a>
      </nav>
    </div>
  </header>
</template>
