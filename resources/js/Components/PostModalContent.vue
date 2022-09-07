<script setup lang="ts">
import { inject, Ref } from 'vue';
import { InertiaForm } from '@inertiajs/inertia-vue3';

const postFormFlag = inject<Ref<number>>('postFormFlag');
const newPostForm = inject<InertiaForm<NewPostForm>>('newPostForm');
const updatePostForm = inject<InertiaForm<UpdatePostForm>>('updatePostForm');
const onLogoutClick = inject<() => void>('onLogoutClick');
const onPostClick = inject<() => void>('onPostClick');
const onCloseModalClick = inject<() => boolean>('onCloseModalClick');
</script>

<template>
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
        v-if="!postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="category"
        name="category"
        type="text"
        v-model="newPostForm!.category"
        autocomplete="on"
      >
      <input
        v-if="postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="category"
        name="category"
        type="text"
        v-model="updatePostForm!.category"
        autocomplete="on"
      >
      <p
        v-if="newPostForm!.errors.category
          || updatePostForm!.errors.category"
        class="col-span-4 mt-1 text-center text-sm text-red-600"
      >
        {{
          postFormFlag
          ? updatePostForm!.errors.category
          : newPostForm!.errors.category
        }}
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
        v-if="!postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="title"
        name="title"
        type="text"
        v-model="newPostForm!.title"
        autocomplete="on"
      >
      <input
        v-if="postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="title"
        name="title"
        type="text"
        v-model="updatePostForm!.title"
        autocomplete="on"
      >
      <p
        v-if="newPostForm!.errors.title
          || updatePostForm!.errors.title"
        class="col-span-4 mt-1 text-center text-sm text-red-600"
      >
        {{
          postFormFlag
          ? updatePostForm!.errors.title
          : newPostForm!.errors.title
        }}
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
        v-if="!postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="link"
        name="link"
        type="url"
        v-model="newPostForm!.link"
        autocomplete="on"
      >
      <input
        v-if="postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="link"
        name="link"
        type="url"
        v-model="updatePostForm!.link"
        autocomplete="on"
      >
      <p
        v-if="newPostForm!.errors.link
          || updatePostForm!.errors.link"
        class="col-span-4 mt-1 text-center text-sm text-red-600"
      >
        {{
          postFormFlag
          ? updatePostForm!.errors.link
          : newPostForm!.errors.link
        }}
      </p>
    </div>

    <div class="gap-x-5 grid grid-cols-4 items-center text-start">
      <label
        class="col-span-1 font-bold"
        for="status"
      >
        進捗
        <span class="text-red-600">
          *
        </span>
      </label>
      <select
        v-if="!postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="status"
        name="status"
        v-model="newPostForm!.status"
      >
        <option value=""></option>
        <option value="pending">Pending</option>
        <option value="doing">Doing</option>
        <option value="done">Done</option>
      </select>
      <select
        v-if="postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="status"
        name="status"
        v-model="updatePostForm!.status"
      >
        <option value=""></option>
        <option value="pending">Pending</option>
        <option value="doing">Doing</option>
        <option value="done">Done</option>
      </select>
      <p
        v-if="newPostForm!.errors.status
          || updatePostForm!.errors.status"
        class="col-span-4 mt-1 text-center text-sm text-red-600"
      >
        {{
          postFormFlag
          ? updatePostForm!.errors.status
          : newPostForm!.errors.status
        }}
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
        v-if="!postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="complete_at"
        name="complete_at"
        type="date"
        v-model="newPostForm!.complete_at"
        autocomplete="on"
      >
      <input
        v-if="postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="complete_at"
        name="complete_at"
        type="date"
        v-model="updatePostForm!.complete_at"
        autocomplete="on"
      >
      <p
        v-if="newPostForm!.errors.complete_at
          || updatePostForm!.errors.complete_at"
        class="col-span-4 mt-1 text-center text-sm text-red-600"
      >
        {{
          postFormFlag
          ? updatePostForm!.errors.complete_at
          : newPostForm!.errors.complete_at
        }}
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
        v-if="!postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="comment"
        name="comment"
        v-model="newPostForm!.comment"
        rows="1"
      ></textarea>
      <textarea
        v-if="postFormFlag"
        class="appearance-none border-0 border-b border-blue
          col-span-3 p-1 w-full focus:outline-none"
        id="comment"
        name="comment"
        v-model="updatePostForm!.comment"
        rows="1"
      ></textarea>
      <p
        v-if="newPostForm!.errors.comment
          || updatePostForm!.errors.comment"
        class="col-span-4 mt-1 text-center text-sm text-red-600"
      >
        {{
          postFormFlag
          ? updatePostForm!.errors.comment
          : newPostForm!.errors.comment
        }}
      </p>
    </div>
  </div>

  <div class="space-y-4">
    <button
      @click.prevent="onPostClick?.()"
      class="font-bold bg-blue block h-7 mx-auto rounded-full
        text-white w-28 hover:opacity-80"
    >
      OK
    </button>

    <button
      @click.prevent="onCloseModalClick?.()"
      class="font-bold bg-white block border border-blue h-7
        mx-auto rounded-full text-blue w-28 hover:opacity-80"
    >
      Cancel
    </button>
  </div>

  <div
    v-if="!postFormFlag"
    class="text-end"
  >
    <p
      @click.prevent="onLogoutClick?.()"
      class="cursor-pointer inline-block select-none
        underline hover:opacity-80"
    >
      Logout
    </p>
  </div>
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