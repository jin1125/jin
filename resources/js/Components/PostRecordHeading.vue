<script setup lang="ts">
import { inject } from 'vue';

const newPostFlagNum = inject<number>('newPostFlagNum');
const onOpenModalClick = inject<(postId: number) => void>('onOpenModalClick');
</script>

<template>
  <div
    class="bg-blue font-bold gap-5 grid
      grid-cols-[150px_200px_50px_100px_100px_minmax(200px,_1fr)_80px]
      h-10 items-center pl-3 pr-6 text-white"
  >
    <h3>
      カテゴリー
    </h3>
    <h3>
      タイトル
    </h3>
    <h3 class="justify-self-center">
      リンク
    </h3>
    <h3 class="justify-self-center">
      進捗
    </h3>
    <h3 class="justify-self-center">
      完了日
    </h3>
    <h3>
      コメント
    </h3>
    <button
      @click.prevent="onOpenModalClick?.(newPostFlagNum!)"
      class="justify-self-end hover:opacity-80"
    >
      <font-awesome-icon icon="fa-solid fa-circle-plus" />
    </button>
  </div>
</template>
