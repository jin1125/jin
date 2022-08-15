<script setup lang="ts">
import Page from '@/Layouts/Page.vue';
</script>

<template>
  <Page>
    <div class="grid grid-cols-2 justify-items-center">
      <div class="space-y-6 text-center">
        <img
          class="rounded-full w-64"
          src="image/profile.png"
          alt="profile image"
        >

        <div class="text-blue font-bold">
          <h2 class="mb-3 text-3xl">
            Shogo Jinta
          </h2>
          <p>
            千葉県在住
          </p>
          <p>
            1992年生まれ
          </p>
        </div>
      </div>

      <div class="space-y-10 text-blue">
        <div class="space-y-3">
          <h2 class="font-bold text-2xl">
            Career
          </h2>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur debitis architecto ex? In ratione quae ea porro laborum eligendi numquam sit! Nam molestiae error saepe porro. Vero veniam quia dolorum.
          </p>
        </div>

        <div class="space-y-3">
          <h2 class="font-bold text-2xl">
            Skills
          </h2>
          <p>
            JavaScript / Typescript  / Vue.js / PHP / Laravel / TailwindCSS
          </p>
        </div>
      </div>
    </div>
  </Page>
</template>
