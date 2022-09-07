<script setup lang="ts">
import { inject, Ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import ModalTitle from '@/Components/ModalTitle.vue';
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
</script>

<template>
  <Modal>
    <div class="text-blue text-center">
      <div v-if="!showProcessing">
        <ModalTitle :is-login="isLogin" />
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
