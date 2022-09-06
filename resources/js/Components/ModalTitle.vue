<script setup lang="ts">
import { inject, Ref } from 'vue';

defineProps({
  isLogin: {
    type: Boolean,
    default: false,
  },
});

const postFormFlag = inject<Ref<number>>('postFormFlag');
</script>

<template>
  <h3 class="font-bold mb-12 text-blue text-2xl">
    {{
      !isLogin
      ? 'Admin login'
      : postFormFlag
        ? 'Update post'
        : 'New post'
    }}
  </h3>
</template>
