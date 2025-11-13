<template>
  <div style="width: 100%; display: flex; justify-content: center; margin: auto; flex-direction: column; gap: 20px;">
    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
      <div
        v-for="(promo, index) in props.promotionComp"
        :key="index"
        class="promo-card"
        :style="{ backgroundColor: promo.color }"
        style="width: 500px;"
      >
        <div class="con1">
          <h3>{{ promo.title }}</h3>
          <buttonComp :promotion-comp="promo" />
        </div>
        <div class="con2">
          <img :src="promo.image" :alt="promo.title" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import buttonComp from './buttonComp.vue';

  import { defineProps } from "vue";

  const props = defineProps({
      promotionComp: {
          type: Object,
          required: true,
      },
  });
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
    width: 100%;
  }

  .con1 {
    flex-direction: column;
    justify-content: center;
    width: 50%;
  }

  img {
    width: 100%;
    height: auto;
    width: 260px;
    height: 190px;
  }

</style>
