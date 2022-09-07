<script setup lang="ts">
import { PropType } from 'vue';
import PostRecordHeading from './PostRecordHeading.vue';
import PostRecordContents from './PostRecordContents.vue';

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
</script>

<template>
  <div class="overflow-x-auto">
    <div class="w-max">
      <PostRecordHeading />

      <PostRecordContents
        :is-login="isLogin"
        :study-records="studyRecords"
      />
    </div>
  </div>
</template>
