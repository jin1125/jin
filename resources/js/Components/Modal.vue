<script setup lang="ts">
import { inject } from 'vue';

const showModal = inject('showModal');
const onCloseModalClick = inject<() => boolean>('onCloseModalClick');
</script>

<template>
  <teleport to="body">
    <transition
      enter-active-class="duration-300"
      enter-from-class="opacity-0"
      enter-to-class="opacity-100"
      leave-active-class="duration-300"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
      <div
        v-if="showModal"
        @click.self="onCloseModalClick?.()"
        class="bg-black bg-opacity-30 bottom-0 fixed flex
          items-center justify-center left-0 right-0 top-0 z-20"
      >
        <div class="bg-white mx-5 p-8 rounded-md shadow-md">
          <slot />
        </div>
      </div>
    </transition>
  </teleport>
</template>
