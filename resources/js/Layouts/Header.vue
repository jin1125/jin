<script setup lang="ts">
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <header class="sticky top-0 z-10">
    <div
      class="bg-blue flex font-bold h-14 items-center
        justify-between px-10 text-white"
    >
      <h1 class="text-2xl">
        Shogo Jinta
      </h1>

      <nav class="space-x-10">
        <Link
          class="hover:opacity-80"
          :href="route('profile')"
        >
          Profile
          <font-awesome-icon icon="fa-solid fa-address-card" />
        </Link>
        <Link
          class="hover:opacity-80"
         :href="route('study')"
        >
          Study
          <font-awesome-icon icon="fa-solid fa-book-open" />
        </Link>
        <a
          class="hover:opacity-80"
          href="https://github.com/jin1125"
        >
          Github
          <font-awesome-icon icon="fa-brands fa-github" />
        </a>
      </nav>
    </div>
  </header>
</template>
