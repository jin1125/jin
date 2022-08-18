<script setup lang="ts">
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import Page from '@/Layouts/Page.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

const isOpenModal = ref(false);

defineProps({
  isLogin: {
    type: Boolean,
    default: false,
  },
})

const form = useForm({
  email: '',
  password: '',
});

const onOpenModalClick = () => isOpenModal.value = true;

const onLoginClick = () => {
  form.post(route('login'),
    {
      onSuccess: () => isOpenModal.value = false,
      onError: () => form.reset('password'),
  });
};

const onLogoutClick = () => {
  Inertia.post(route('logout'),
    {},
    {
      onSuccess: () => isOpenModal.value = false,
  });
};
</script>

<template>
  <Page >
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

    <div
      class="bg-blue font-bold gap-2 grid
        grid-cols-[150px_100px_100px_100px_minmax(200px,_1fr)_100px]
        h-12 items-center overflow-x-auto px-5 text-white"
    >
      <h3>タイトル</h3>
      <h3>リンク</h3>
      <h3>進捗</h3>
      <h3>完了日</h3>
      <h3>所感</h3>
      <button
        @click.prevent="onOpenModalClick()"
        class="justify-self-end hover:opacity-80"
      >
        <font-awesome-icon icon="fa-solid fa-pen-to-square" />
      </button>
    </div>

    <Modal v-model="isOpenModal">
      <div class="text-blue text-center">
        <div class="font-bold mb-10 text-blue text-2xl">
          {{ isLogin ? 'Edit?' : 'Admin login' }}
        </div>

        <div v-if="!isLogin">
          <div class="mb-10 space-y-5">
            <div>
              <div class="gap-5 grid grid-cols-4 items-center text-start">
                <label
                  class="col-span-1 font-bold"
                  for="email"
                >
                  Email
                </label>
                <div class="border-b border-blue col-span-3">
                  <input
                    class="appearance-none border-none py-1 w-full focus:outline-none"
                    id="email"
                    type="email"
                    v-model="form.email"
                    autocomplete="on"
                    autofocus
                    required
                  >
                </div>
              </div>
              <p
                v-if="form.errors.email"
                class="text-sm text-red-600"
              >
                {{ form.errors.email }}
              </p>
            </div>

            <div>
              <div class="gap-5 grid grid-cols-4 items-center text-start">
                <label
                  class="col-span-1 font-bold"
                  for="password"
                >
                  Password
                </label>
                <div class="border-b border-blue col-span-3">
                  <input
                    class="appearance-none border-none py-1 w-full focus:outline-none"
                    id="password"
                    type="password"
                    v-model="form.password"
                    autocomplete="on"
                    required
                  >
                </div>
              </div>
              <p
                v-if="form.errors.password"
                class="text-red-600 text-sm"
              >
                {{ form.errors.password }}
              </p>
            </div>
          </div>

          <button
            @click.prevent="onLoginClick()"
            class="font-bold bg-blue py-1 rounded-full
              text-white w-28 hover:opacity-80"
          >
            Login
          </button>
        </div>

        <div
          v-else
          class="flex-col space-y-5 w-52"
        >
          <button
            class="font-bold bg-blue block mx-auto py-1 rounded-full
              text-white w-28 hover:opacity-80"
          >
            OK
          </button>

          <button
            class="font-bold bg-white block border border-blue mx-auto
              py-1 rounded-full text-blue w-28 hover:opacity-80"
          >
            Cancel
          </button>

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
      </div>
    </Modal>
  </Page>
</template>
