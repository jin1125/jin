<script setup lang="ts">
import { inject, Ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import LoginModalContent from '@/Components/LoginModalContent.vue';
import PostModalContent from '@/Components/PostModalContent.vue';
import ProcessAnimate from '@/Components/ProcessAnimate.vue';

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
        <ProcessAnimate />
      </div>
    </div>
  </Modal>
</template>
