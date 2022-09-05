<script setup lang="ts">
import { inject, Ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import LoginModalContent from '@/Components/LoginModalContent.vue';
import PostModalContent from './PostModalContent.vue';

defineProps({
  isLogin: {
    type: Boolean,
    default: false,
  },
});

const showProcessing = inject<Ref<boolean>>('showProcessing');
const postFormFlag = inject<Ref<number>>('postFormFlag');
</script>

<template>
  <modal>
    <div class="text-blue text-center">
      <div
        v-if="!showProcessing"
        class="font-bold mb-12 text-blue text-2xl"
      >
        {{
          !isLogin
          ? 'Admin login'
          : postFormFlag
          ? 'Update post'
          : 'New post'
        }}
      </div>

      <div v-if="!isLogin && !showProcessing">
        <LoginModalContent />
      </div>

      <div v-if="isLogin && !showProcessing">
        <PostModalContent />
      </div>

      <div v-if="showProcessing">
        <div class="flex justify-center space-x-5">
          <span class="animate-ping bg-blue h-2 rounded-full w-2" />
          <span class="animate-ping bg-blue h-2 rounded-full w-2" />
          <span class="animate-ping bg-blue h-2 rounded-full w-2" />
        </div>
      </div>
    </div>
  </Modal>
</template>
