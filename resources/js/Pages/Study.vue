<script setup lang="ts">
import Page from '@/Layouts/Page.vue';
</script>

<template>
  <Page >
    <div class="flex items-center mb-10 space-x-5">
      <img
        class="w-40"
        src="image/study.png"
        alt="profile image"
      >
      <h2 class="font-bold text-3xl">
        Study record
      </h2>
    </div>

    <div
      class="bg-blue font-bold gap-2 grid
        grid-cols-[150px_100px_100px_100px_minmax(200px,_1fr)_100px]
        h-12 items-center overflow-x-auto px-3 text-white"
    >
      <h3>タイトル</h3>
      <h3>リンク</h3>
      <h3>進捗</h3>
      <h3>完了日</h3>
      <h3>所感</h3>
      <button
        class="bg-white justify-self-end w-8 h-8 rounded-full
          text-blue hover:bg-blue hover:text-white"
      >
        <font-awesome-icon icon="fa-solid fa-pen-to-square" />
      </button>
    </div>
  </Page>
</template>
