<template>
  <div class="categories-container">
    <div
      v-for="(category, index) in categories"
      :key="index"
      class="back"
      :style="{ backgroundColor: category.color }"
    >
      <div>
        <img :src="category.image" :alt="category.name" />
        <h3>{{ category.name }}</h3>
        <p>{{ category.items }} items</p>
      </div>
    </div>
  </div>
</template>

<script setup>
const categories = [
  { name: "Cake & Milk", items: 14, image: "src/assets/images/cake1.png", color: "#d6e9bc" },
  { name: "Peach", items: 17, image: "src/assets/images/peach.png", color: "#FFFCEB" },
  { name: "Organic Kiwi", items: 21, image: "src/assets/images/kiwi.png", color: "#ECFFEC" },
  { name: "Red Apple", items: 68, image: "src/assets/images/apple.png", color: "#FEEFEA" },
  { name: "Snack", items: 34, image: "src/assets/images/snack.png", color: "#FFF3EB" },
  { name: "Black plum", items: 25, image: "src/assets/images/plum.png", color: "#FFF3FF" },
  { name: "Vegetables", items: 65, image: "src/assets/images/vegetable.png", color: "#F2FCE4" },
  { name: "Headphone", items: 33, image: "src/assets/images/headphone.png", color: "#FFFCEB" },
  { name: "Cake & Milk", items: 54, image: "src/assets/images/cake2.png", color: "#F2FCE4" },
  { name: "Orange", items: 63, image: "src/assets/images/orange.png", color: "#FFF3FF" },
];
</script>

<style scoped>
  .categories-container {
    display: flex;
    gap: 20px;
    width: 90%;
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
