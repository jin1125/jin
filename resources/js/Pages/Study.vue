<script setup lang="ts">
import { PropType, provide, ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';
import Page from '@/Layouts/Page.vue';
import StudyModal from '@/Components/StudyModal.vue';
import PostRecords from '@/Components/PostRecords.vue';

const newPostFlagNum = 0;

let showModal = ref(false);
let showProcessing = ref(false);
let postFormFlag = ref(0);

const props = defineProps({
  isLogin: {
    type: Boolean,
    default: false,
  },

  studyRecords: {
    type: Array as PropType<StudyRecords[]>,
    default: ()=>([]),
  },
});

const loginForm = useForm({
  email: '',
  password: '',
});

const newPostForm = useForm({
  category: '',
  title: '',
  link: '',
  status: '',
  complete_at: '',
  comment: '',
});

const updatePostForm = useForm({
  id: 0,
  category: '',
  title: '',
  link: '',
  status: '',
  complete_at: '',
  comment: '',
});

const onOpenModalClick = (postId: number) => {
  if (postId) {
      postFormFlag.value = postId;

      props.studyRecords.forEach(record => {
        if (record.id === postId) {
          updatePostForm.id = record.id
          updatePostForm.category = record.category
          updatePostForm.title = record.title
          updatePostForm.link = record.link
          updatePostForm.status = record.status
          updatePostForm.complete_at = record.complete_at
          updatePostForm.comment = record.comment
        }
      });
  }

  if (!postId) {
      postFormFlag.value = newPostFlagNum;
  }

  showModal.value = true
};

const onCloseModalClick = () => showModal.value = false;

const onLoginClick = () => {
  showProcessing.value = true;

  loginForm.post(route('login'),
    {
      onSuccess: () => showModal.value = false,
      onFinish: () => showProcessing.value = false,
      onError: () => loginForm.reset('password'),
    }
  );
};

const onLogoutClick = () => {
  showProcessing.value = true;

  Inertia.post(route('logout'),
    {},
    {
      onSuccess: () => showModal.value = false,
      onFinish: () => showProcessing.value = false,
    }
  );
};

const onPostClick = () => {
  showProcessing.value = true;

  if(!postFormFlag.value) {
    newPostForm.post(route('study.store'),
      {
        onSuccess: () => {
          showModal.value = false,
          newPostForm.reset()
        },
        onFinish: () => showProcessing.value = false,
      }
    );
  }

  if(postFormFlag.value) {
    updatePostForm.post(route('study.update'),
      {
        onSuccess: () => {
          showModal.value = false,
          updatePostForm.reset()
        },
        onFinish: () => showProcessing.value = false,
      }
    );
  }
};

const onDestroyPostClick = (postId: number) => {
  Inertia.post(route('study.destroy'), {
    postId: postId
  });
};

provide('newPostFlagNum', newPostFlagNum);
provide('showModal', showModal);
provide('showProcessing', showProcessing);
provide('postFormFlag', postFormFlag);
provide('loginForm', loginForm);
provide('newPostForm', newPostForm);
provide('updatePostForm', updatePostForm);
provide('onOpenModalClick', onOpenModalClick);
provide('onCloseModalClick', onCloseModalClick);
provide('onLoginClick', onLoginClick);
provide('onLogoutClick', onLogoutClick);
provide('onPostClick', onPostClick);
provide('onDestroyPostClick', onDestroyPostClick);
</script>

<template>
  <Page>
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

    <PostRecords
      :is-login="isLogin"
      :study-records="studyRecords"
    />

    <StudyModal :is-login="isLogin" />
  </Page>
</template>