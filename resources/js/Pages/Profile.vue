<script setup lang="ts">
import Page from '@/Layouts/Page.vue';
</script>

<template>
  <Page>
    <div
      class="grid justify-items-center mb-10 space-y-6
        md:grid-cols-2 md:space-y-0"
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

      <div class="space-y-14 text-blue">
        <div class="space-y-3">
          <h2 class="font-bold text-3xl">
            Skills
          </h2>
          <p>
            HTML / CSS / TailwindCSS / JavaScript /
            Typescript / Vue.js / PHP / Laravel
          </p>
        </div>

        <div>
          <h2 class="font-bold text-3xl mb-3">
            Careers
          </h2>
          <ol class="font-bold mb-10">
            <li>1. 人材系企業(営業)</li>
            <li>2. WEBマーケティング企業(WEB制作)</li>
            <li>3. 受託開発企業(エンジニア)</li>
          </ol>
          <div class="space-y-5 leading-7">
            <p>
              <span class="font-bold">人材系のベンチャー企業</span>
              にてキャリアをスタート。
            </p>
            <p>
              「仕事のできるカッコいいビジネスマン」を目指し、
              とにかくがむしゃらに仕事に没頭していました。
              その甲斐もあってか、
              <span class="font-bold">「営業成績は毎月社内1位」</span>
              <span class="font-bold">「歴代の月間売上成績の中で1位」</span>
              という結果を残すことができました。
              このような努力と結果が認められ、
              東京オフィスを統括する責任者を務めさせて頂きました。
            </p>
            <p>
              恵まれた環境の中で順風満帆にキャリアを築いていましたが、
              新たな挑戦をしたいという気持ちから、
              興味のあった
              <span class="font-bold">WEBマーケティングのベンチャー企業</span>
              へとキャリアチェンジ。
            </p>
            <p>
              総合職として入社しましたが、未経験である
              <span class="font-bold">WEB制作部</span>
              配属となり、「とにかく自走できるようになる」ことを目標に日々自己研鑽に努めました。
              その姿勢を評価頂き、
              <span class="font-bold">「新人賞」</span>
              を受賞することができました。
              少しずつできることも増えていき、充実した日々でしたが、会社が突然の倒産。
            </p>
            <p>
              今後のキャリアに悩みましたが、「なにかを作る楽しさ」「もっと技術を深めたい」
              という気持ちから
              <span class="font-bold">プログラミングを独学</span>
              。
            </p>
            <p>
              現在は
              <span class="font-bold">受託開発の企業にて勤務</span>
              し、先輩方との技術力の差を痛感しながらも、
              少しでも近づくために日々自己研鑽に励んでいます。
            </p>
          </div>
        </div>

        <div class="space-y-3">
          <h2 class="font-bold text-3xl">
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
