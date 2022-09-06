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

      <nav class="space-x-5 md:space-x-10">
        <Link
          class="space-x-2 hover:opacity-80"
          :href="route('profile')"
        >
          <span class="hidden sm:inline-block">
            Profile
          </span>
          <font-awesome-icon icon="fa-solid fa-address-card" />
        </Link>
        <Link
          class="space-x-2 hover:opacity-80"
         :href="route('study')"
        >
          <span class="hidden sm:inline-block">
            Study
          </span>
          <font-awesome-icon icon="fa-solid fa-book-open" />
        </Link>
        <a
          class="space-x-2 hover:opacity-80"
          href="https://github.com/jin1125"
          target="_blank"
        >
          <span class="hidden sm:inline-block">
            Github
          </span>
          <font-awesome-icon icon="fa-brands fa-github" />
        </a>
      </nav>
    </div>
  </header>
</template>
