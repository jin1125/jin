<script setup lang="ts">
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import Page from '@/Layouts/Page.vue';
import { useForm } from '@inertiajs/inertia-vue3';

defineProps({
  isLogin: {
    type: Boolean,
    default: false,
  },
})

const isOpenModal = ref(false);

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
        onSuccess: () => isOpenModal.value = false,
    });
};

const onOpenModalClick = () => isOpenModal.value = true;
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
        h-12 items-center overflow-x-auto px-3 text-white"
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
      <div class="font-bold text-blue text-2xl">
        Admin login
      </div>
      
      <form @submit.prevent="submit">
        <div>
          <label for="email">
            Email
          </label>
          <input
            id="email"
            type="email"
            v-model="form.email"
            autocomplete="on"
            autofocus
            required
          >
          <p
            v-if="form.errors.email"
            class="text-sm text-red-600"
          >
            {{ form.errors.email }}
          </p>
        </div>

        <div class="mt-4">
          <label for="password">
            Password
          </label>
          <input
            id="password"
            type="password"
            v-model="form.password"
            autocomplete="on"
            required
          >
          <p
            v-if="form.errors.password"
            class="text-sm text-red-600"
          >
            {{ form.errors.password }}
          </p>
        </div>

        <button type="submit">
          Log in
        </button>
      </form>
    </Modal>
  </Page>
</template>
