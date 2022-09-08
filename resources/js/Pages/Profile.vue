<script setup lang="ts">
import Page from '@/Layouts/Page.vue';
</script>

<template>
  <Page>
    <div
      class="grid justify-items-center space-y-6 md:grid-cols-2 md:space-y-0"
    >
      <div class="space-y-6 text-center">
        <img
          class="rounded-full w-64"
          src="image/profile.png"
          alt="profile image"
        >

        <div class="text-blue font-bold">
          <h2 class="mb-3 text-3xl">
            Shogo Jinta
          </h2>
          <p>
            千葉県在住
          </p>
          <p>
            1992年生まれ
          </p>
        </div>
      </div>

      <div class="space-y-10 text-blue">
        <div class="space-y-5">
          <h2 class="font-bold text-2xl">
            Skills
          </h2>
          <p>
            HTML / CSS / TailwindCSS / JavaScript /
            Typescript / Vue.js / PHP / Laravel
          </p>
        </div>

        <div class="space-y-5">
          <h2 class="font-bold text-2xl">
            Careers
          </h2>
          <ol>
            <li>1. 人材系企業(営業)</li>
            <li>2. WEBマーケティング企業(WEB制作)</li>
            <li>3. 受託開発企業(エンジニア)</li>
          </ol>
          <p>
            人材系のベンチャー企業にてキャリアをスタート。
          </p>
          <p>
            「仕事のできるカッコいいビジネスマン」を目指し、
            とにかくがむしゃらに仕事に没頭していました。
            その甲斐もあってか、「営業成績は毎月社内1位」「歴代の月間売上成績の中で1位」
            という結果を残すことができました。
            このような努力と結果が認められ、
            東京オフィスを統括する責任者を務めさせて頂きました。
          </p>
          <p>
            恵まれた環境の中で順風満帆にキャリアを築いていましたが、
            新たな挑戦をしたいという気持ちから、
            興味のあったWEBマーケティングのベンチャー企業へとキャリアチェンジ。
          </p>
          <p>
            総合職として入社しましたが、未経験であるWEB制作部配属となり、
            「とにかく自走できるようになる」ことを目標に日々自己研鑽に努めました。
            その姿勢を評価頂き、「新人賞」を受賞することができました。
            少しずつできることも増えていき、充実した日々でしたが、会社が突然の倒産。
          </p>
          <p>
            今後のキャリアに悩みましたが、「なにかを作る楽しさ」「もっと技術を深めたい」
            という気持ちからプログラミングを独学。
          </p>
          <p>
            現在は受託開発の企業にて勤務し、先輩方との技術力の差を痛感しながらも、
            少しでも近づくために日々自己研鑽に励んでいます。
          </p>
          <p>
            以上、お読み頂きありがとうございました。
          </p>
        </div>

        <div class="space-y-5">
          <h2 class="font-bold text-2xl">
            Hobbies
          </h2>
          <div>
            <p>旅行(国内 / 国外)</p>
            <p>日本は47都道府県を制覇しました。</p>
          </div>
        </div>
      </div>
    </div>
  </Page>
</template>
