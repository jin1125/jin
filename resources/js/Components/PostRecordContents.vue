<script setup lang="ts">
import { inject, PropType } from 'vue';

defineProps({
  isLogin: {
    type: Boolean,
    default: false,
  },

  studyRecords: {
    type: Array as PropType<StudyRecords[]>,
    default: ()=>([]),
  },
});

const onOpenModalClick = inject<(postId: number) => void>('onOpenModalClick');
const onDestroyPostClick = inject<(postId: number) => void>('onDestroyPostClick');
</script>

<template>
  <ul>
    <li
      v-for="(studyRecord) in studyRecords"
      :key="studyRecord.id"
      class="border-b border-blue font-bold gap-5 grid
      grid-cols-[150px_200px_50px_100px_100px_minmax(200px,_1fr)_50px]
      items-center p-3 pr-6"
      :class="[
        isLogin
        ? 'grid-cols-[150px_200px_50px_100px_100px_minmax(200px,_1fr)_80px]'
        : 'grid-cols-[150px_200px_50px_100px_100px_minmax(200px,_1fr)]'
      ]"
    >
      <span class="break-all">
        {{ studyRecord.category }}
      </span>
      <span class="break-all">
        {{ studyRecord.title }}
      </span>
      <a
        class="justify-self-center hover:opacity-80"
        :href="studyRecord.link"
        target="_blank"
      >
        <font-awesome-icon
          v-if="studyRecord.link"
          icon="fa-solid fa-link"
        />
      </a>
      <span class="justify-self-center">
        {{ studyRecord.status }}
      </span>
      <span class="justify-self-center">
        {{ studyRecord.complete_at }}
      </span>
      <span class="whitespace-pre">
        {{ studyRecord.comment }}
      </span>
      <div
        v-if="isLogin"
        class="flex space-x-5 text-end"
      >
        <button
          @click.prevent="onOpenModalClick?.(studyRecord.id)"
          class="justify-self-center hover:opacity-80"
        >
          <font-awesome-icon icon="fa-solid fa-pen-to-square" />
        </button>
        <button
          @click.prevent="onDestroyPostClick?.(studyRecord.id)"
          class="justify-self-center hover:opacity-80"
        >
          <font-awesome-icon icon="fa-solid fa-delete-left" />
        </button>
      </div>
    </li>
  </ul>
</template>
