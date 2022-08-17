<script setup lang="ts">
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import Page from '@/Layouts/Page.vue';

defineProps({
  isLogin: {
    type: Boolean,
    default: false,
  },
})

const isOpenModal = ref(false);
const onOpenModalClick = () => isOpenModal.value = true;
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
        @click.prevent="onOpenModalClick()"
        class="justify-self-end hover:opacity-80"
      >
        <font-awesome-icon icon="fa-solid fa-pen-to-square" />
      </button>
    </div>

    <Modal v-model="isOpenModal">
      <div class="font-bold text-blue text-2xl">
        Admin login
      </div>
    </Modal>
  </Page>
</template>
