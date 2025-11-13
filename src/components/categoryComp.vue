<template>
  <div class="categories-container">
    <div
      v-for="(category, index) in categoryComp"
      :key="index"
      class="back"
      :style="{ backgroundColor: category.color }"
    >
      <div>
        <img :src="category.image" :alt="category.name" />
        <h3>{{ category.name }}</h3>
        <p>{{ category.productCount }} items</p>
      </div>
    </div>
  </div>
</template>

<script setup>

  import { defineProps } from "vue";
  const props = defineProps({
     categoryComp: {
          type: Object,
          required: true,
      },
  });
</script>

<style scoped>
  .categories-container {
    display: flex;
    gap: 20px;
    width: 100%;
    justify-content: center;
  }

  .back {
    border-radius: 16px;
    text-align: center;
    color: white;
    width: 150px;
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  p {
    font-size: 12px;
    color: #B6B6B6;
  }

  h3 {
    font-size: 16px;
    color: #253D4E;
  }
  img {
    width: 80px;
    height: 80px;
  }
</style>
