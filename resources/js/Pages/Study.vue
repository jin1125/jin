<script setup lang="ts">
import { PropType, ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import Page from '@/Layouts/Page.vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';

type StudyRecords = {
    id: number
    category: string
    title: string
    link: string
    progress: string
    complete_at: string
    comment: string
};

const showModal = ref(false);
const showProcessing = ref(false);

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

const onOpenModalClick = () => showModal.value = true;
const onCloseModalClick = () => showModal.value = false;

const onLoginClick = () => {
  showProcessing.value = true

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

const onNewPostClick = () => {
  showProcessing.value = true;

  newPostForm.post(route('study.store'),
    {
      onSuccess: () => {
        showModal.value = false,
        newPostForm.reset()
      },
      onFinish: () => showProcessing.value = false,
    }
  );
};

const onDestroyPostClick = (postId: number) => {
  Inertia.post(route('study.destroy'), {
    postId: postId
  });
};
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
          class="bg-blue font-bold gap-3 grid
            h-10 items-center px-3 text-white"
          :class="[
            isLogin
            ? 'grid-cols-[150px_200px_50px_100px_100px_minmax(200px,_1fr)_10px_50px]'
            : 'grid-cols-[150px_200px_50px_100px_100px_minmax(200px,_1fr)_50px]'
          ]"
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
            v-if="isLogin"
            class="justify-self-center hover:opacity-80"
          >
            <font-awesome-icon icon="fa-solid fa-pen-to-square" />
          </button>
          <button
            @click.prevent="onOpenModalClick()"
            class="justify-self-center hover:opacity-80"
          >
            <font-awesome-icon icon="fa-solid fa-circle-plus" />
          </button>
        </div>

        <ul>
          <li
            v-for="(studyRecord) in studyRecords"
            :key="studyRecord.id"
            class="border-b border-blue font-bold gap-3 grid
            grid-cols-[150px_200px_50px_100px_100px_minmax(200px,_1fr)_50px]
            items-center p-3"
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
            <button
              v-if="isLogin"
              @click.prevent="onDestroyPostClick(studyRecord.id)"
              class="justify-self-center hover:opacity-80"
            >
              <font-awesome-icon icon="fa-solid fa-delete-left" />
            </button>
          </li>
        </ul>
      </div>
    </div>

    <Modal v-model="showModal">
      <div class="text-blue text-center">
        <div
          v-if="!showProcessing"
          class="font-bold mb-12 text-blue text-2xl"
        >
          {{ !isLogin ? 'Admin login' : 'New post' }}
        </div>

        <div v-if="!isLogin && !showProcessing">
          <div class="mb-12 space-y-5">
            <div class="gap-x-5 grid grid-cols-4 items-center text-start">
              <label
                class="col-span-1 font-bold"
                for="email"
              >
                Email
              </label>
              <div class="border-b border-blue col-span-3">
                <input
                  class="appearance-none border-none py-1
                    w-full focus:outline-none"
                  id="email"
                  type="email"
                  v-model="loginForm.email"
                  autocomplete="on"
                  autofocus
                >
              </div>
              <p
                v-if="loginForm.errors.email"
                class="col-span-4 mt-1 text-center text-sm text-red-600"
              >
                {{ loginForm.errors.email }}
              </p>
            </div>

            <div class="gap-x-5 grid grid-cols-4 items-center text-start">
              <label
                class="col-span-1 font-bold"
                for="password"
              >
                Password
              </label>
              <div class="border-b border-blue col-span-3">
                <input
                  class="appearance-none border-none py-1
                    w-full focus:outline-none"
                  id="password"
                  type="password"
                  v-model="loginForm.password"
                  autocomplete="on"
                >
              </div>
              <p
                v-if="loginForm.errors.password"
                class="col-span-4 mt-1 text-center text-sm text-red-600"
              >
                {{ loginForm.errors.password }}
              </p>
            </div>
          </div>

          <div class="space-y-4">
            <button
              @click.prevent="onLoginClick()"
              class="font-bold bg-blue block h-7 mx-auto rounded-full
              text-white w-28 hover:opacity-80"
            >
              Login
            </button>

            <button
              @click.prevent="onCloseModalClick()"
              class="font-bold bg-white block border border-blue h-7
                mx-auto rounded-full text-blue w-28 hover:opacity-80"
            >
              Cancel
            </button>
          </div>
        </div>

        <div v-if="isLogin && !showProcessing">
          <div class="mb-12 space-y-5">
            <div class="gap-x-5 grid grid-cols-4 items-center text-start">
              <label
                class="col-span-1 font-bold"
                for="category"
              >
                カテゴリー
                <span class="text-red-600">
                  *
                </span>
              </label>
              <input
                class="appearance-none border-0 border-b border-blue
                  col-span-3 p-1 w-full focus:outline-none"
                id="category"
                name="category"
                type="text"
                v-model="newPostForm.category"
                autocomplete="on"
              >
              <p
                v-if="newPostForm.errors.category"
                class="col-span-4 mt-1 text-center text-sm text-red-600"
              >
                {{ newPostForm.errors.category }}
              </p>
            </div>

            <div class="gap-x-5 grid grid-cols-4 items-center text-start">
              <label
                class="col-span-1 font-bold"
                for="title"
              >
                タイトル
                <span class="text-red-600">
                  *
                </span>
              </label>
              <input
                class="appearance-none border-0 border-b border-blue
                  col-span-3 p-1 w-full focus:outline-none"
                id="title"
                name="title"
                type="text"
                v-model="newPostForm.title"
                autocomplete="on"
                autofocus
              >
              <p
                v-if="newPostForm.errors.title"
                class="col-span-4 mt-1 text-center text-sm text-red-600"
              >
                {{ newPostForm.errors.title }}
              </p>
            </div>

            <div class="gap-x-5 grid grid-cols-4 items-center text-start">
              <label
                class="col-span-1 font-bold"
                for="link"
              >
                リンク
              </label>
              <input
                class="appearance-none border-0 border-b border-blue
                  col-span-3 p-1 w-full focus:outline-none"
                id="link"
                name="link"
                type="url"
                v-model="newPostForm.link"
                autocomplete="on"
              >
              <p
                v-if="newPostForm.errors.link"
                class="col-span-4 mt-1 text-center text-sm text-red-600"
              >
                {{ newPostForm.errors.link }}
              </p>
            </div>

            <div class="gap-x-5 grid grid-cols-4 items-center text-start">
              <label
                class="col-span-1 font-bold"
                for="progress"
              >
                進捗
                <span class="text-red-600">
                  *
                </span>
              </label>
              <select
                class="appearance-none border-0 border-b border-blue
                  col-span-3 p-1 w-full focus:outline-none"
                id="progress"
                name="progress"
                v-model="newPostForm.progress"
              >
                <option value=""></option>
                <option value="pending">Pending</option>
                <option value="doing">Doing</option>
                <option value="done">Done</option>
              </select>
              <p
                v-if="newPostForm.errors.progress"
                class="col-span-4 mt-1 text-center text-sm text-red-600"
              >
                {{ newPostForm.errors.progress }}
              </p>
            </div>

            <div class="gap-x-5 grid grid-cols-4 items-center text-start">
              <label
                class="col-span-1 font-bold"
                for="complete_at"
              >
                完了日
              </label>
              <input
                class="appearance-none border-0 border-b border-blue
                  col-span-3 p-1 w-full focus:outline-none"
                id="complete_at"
                name="complete_at"
                type="date"
                v-model="newPostForm.complete_at"
                autocomplete="on"
              >
              <p
                v-if="newPostForm.errors.complete_at"
                class="col-span-4 mt-1 text-center text-sm text-red-600"
              >
                {{ newPostForm.errors.complete_at }}
              </p>
            </div>

            <div class="gap-x-5 grid grid-cols-4 items-center text-start">
              <label
                class="col-span-1 font-bold"
                for="comment"
              >
                コメント
              </label>
              <textarea
                class="appearance-none border-0 border-b border-blue
                  col-span-3 p-1 w-full focus:outline-none"
                id="comment"
                name="comment"
                v-model="newPostForm.comment"
                rows="1"
              ></textarea>
              <p
                v-if="newPostForm.errors.comment"
                class="col-span-4 mt-1 text-center text-sm text-red-600"
              >
                {{ newPostForm.errors.comment }}
              </p>
            </div>
          </div>

          <div class="space-y-4">
            <button
              @click.prevent="onNewPostClick()"
              class="font-bold bg-blue block h-7 mx-auto rounded-full
                text-white w-28 hover:opacity-80"
            >
              OK
            </button>

            <button
              @click.prevent="onCloseModalClick()"
              class="font-bold bg-white block border border-blue h-7
                mx-auto rounded-full text-blue w-28 hover:opacity-80"
            >
              Cancel
            </button>
          </div>

          <div class="text-end">
            <p
              @click.prevent="onLogoutClick()"
              class="cursor-pointer inline-block select-none
                underline hover:opacity-80"
            >
              Logout
            </p>
          </div>
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