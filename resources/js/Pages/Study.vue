<script setup lang="ts">
import { PropType, provide, ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';
import StudyModal from '@/Components/StudyModal.vue';
import Page from '@/Layouts/Page.vue';

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
  progress: '',
  complete_at: '',
  comment: '',
});

const updatePostForm = useForm({
  id: 0,
  category: '',
  title: '',
  link: '',
  progress: '',
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
          updatePostForm.progress = record.progress
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

provide('showModal', showModal);
provide('showProcessing', showProcessing);
provide('postFormFlag', postFormFlag);
provide('loginForm', loginForm);
provide('newPostForm', newPostForm);
provide('updatePostForm', updatePostForm);
provide('onCloseModalClick', onCloseModalClick);
provide('onLoginClick', onLoginClick);
provide('onLogoutClick', onLogoutClick);
provide('onPostClick', onPostClick);
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

    <div class="overflow-x-auto">
      <div class="w-max">
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
            @click.prevent="onOpenModalClick(newPostFlagNum)"
            class="justify-self-end hover:opacity-80"
          >
            <font-awesome-icon icon="fa-solid fa-circle-plus" />
          </button>
        </div>

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
              {{ studyRecord.progress }}
            </span>
            <span class="justify-self-center">
              {{ studyRecord.complete_at }}
            </span>
            <span class="whitespace-pre">
              {{ studyRecord.comment }}
            </span>
            <div
              v-if="isLogin"
              class="space-x-5 text-end"
            >
              <button
                @click.prevent="onOpenModalClick(studyRecord.id)"
                class="justify-self-center hover:opacity-80"
              >
                <font-awesome-icon icon="fa-solid fa-pen-to-square" />
              </button>
              <button
                @click.prevent="onDestroyPostClick(studyRecord.id)"
                class="justify-self-center hover:opacity-80"
              >
                <font-awesome-icon icon="fa-solid fa-delete-left" />
              </button>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <StudyModal :is-login="isLogin" />
  </Page>
</template>

<style scoped>
input[type="date"]{
  position: relative;
}

input[type=date]::-webkit-calendar-picker-indicator {
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: 0;
}
</style>