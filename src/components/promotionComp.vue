<template>
  <div style="width: 90%; margin-left: -39px;">
    <div style="gap: 20px; width: 512px; height: 300px;">
      <div
        v-for="(promo, index) in promos"
        :key="index"
        :class="promo.bg"
        :style="{ backgroundColor: promo.color }"
      >
        <div class="con1">
          <h3>
            {{ promo.title }}
          </h3>
          <buttonComp />
        </div class="con2">
        <div>
          <img :src="promo.image" :alt="promo.title"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import buttonComp from './buttonComp.vue';

const promos = [
  {
    title: "Everyday Fresh & Clean with Our Products",
    image: "src/assets/images/onion.png",
    color: "#F0E8D5",
  },
  {
    title: "Make your Breakfast Healthy and Easy",
    image: "src/assets/images/juice.png",
    color: "#F3E8E8",
  },
  {
    title: "The best Organic Products Online",
    image: "src/assets/images/basket.png",
    color: "#E7EAF3",
  },
];
</script>

<style scoped>
  div > div {
    display: flex;
    padding: 20px;
    border-radius: 10px;
  }

  h3 {
    font-size: 20px;
    font-family: 'Arial', sans-serif;
  }

  .con1 {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  img {
    width: 100%;
    height: auto;
    width: 260px;
    height: 190px;
  }

</style>
