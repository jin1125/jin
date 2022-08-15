<script setup lang="ts">
import Header from '@/Layouts/Header.vue';
</script>

<template>
  <Header />

  <div class="grid grid-cols-2 justify-items-center m-20">
    <div class="space-y-6 text-center">
      <img
        class="rounded-full w-64"
        src="image/profile.png"
        alt="profile image"
      >

      <div class="text-blue font-bold">
        <h2 class="mb-3 text-2xl">
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
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim asperiores maxime nisi nulla vel minus, minima non unde quibusdam saepe ducimus beatae neque sint voluptatem repellat aspernatur dicta, libero officiis.
        </p>
      </div>
    </div>
  </div>
</template>
