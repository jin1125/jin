<script setup lang="ts">
import { inject } from 'vue';
import { InertiaForm } from '@inertiajs/inertia-vue3';

const loginForm = inject<InertiaForm<LoginForm>>('loginForm');
const onLoginClick = inject<() => void>('onLoginClick');
const onCloseModalClick = inject<() => boolean>('onCloseModalClick');
</script>

<template>
  <div class="mb-12 space-y-5">
    <div class="gap-x-5 grid grid-cols-4 items-center text-start">
      <label
        class="col-span-1 font-bold"
        for="email"
      >
        Email
      </label>
      <div class="border-b border-blue col-span-3">
        <input
          class="appearance-none border-none py-1
            w-full focus:outline-none"
          id="email"
          type="email"
          v-model="loginForm!.email"
          autocomplete="on"
        >
      </div>
      <p
        v-if="loginForm!.errors.email"
        class="col-span-4 mt-1 text-center text-sm text-red-600"
      >
        {{ loginForm!.errors.email }}
      </p>
    </div>

    <div class="gap-x-5 grid grid-cols-4 items-center text-start">
      <label
        class="col-span-1 font-bold"
        for="password"
      >
        Password
      </label>
      <div class="border-b border-blue col-span-3">
        <input
          class="appearance-none border-none py-1
            w-full focus:outline-none"
          id="password"
          type="password"
          v-model="loginForm!.password"
          autocomplete="on"
        >
      </div>
      <p
        v-if="loginForm!.errors.password"
        class="col-span-4 mt-1 text-center text-sm text-red-600"
      >
        {{ loginForm!.errors.password }}
      </p>
    </div>
  </div>

  <div class="space-y-4">
    <button
      @click.prevent="onLoginClick?.()"
      class="font-bold bg-blue block h-7 mx-auto rounded-full
      text-white w-28 hover:opacity-80"
    >
      Login
    </button>

    <button
      @click.prevent="onCloseModalClick?.()"
      class="font-bold bg-white block border border-blue h-7
        mx-auto rounded-full text-blue w-28 hover:opacity-80"
    >
      Cancel
    </button>
  </div>
</template>
