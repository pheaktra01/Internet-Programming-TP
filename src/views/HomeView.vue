<template>
  <div>
    <headerComp />
    <div class="menu">
      <div class="menuCon">
        <h1>Featured Categories</h1>
        <menuComp :menuComp="productStore.groups" @group-selected="filterProducts" />        
      </div>

    </div>

    <CategoryList :category-comp="productStore.categories" />
    <PromoSection :promotionComp="productStore.promotions" />

    <div class="menu">
      <div class="menuCon">
        <h1>Popular Products</h1>
        <menuComp :menuComp="productStore.groups" @group-selected="filterProducts" />
      </div>

    </div>

    <productComp :productComp="displayProducts" />
  </div>
</template>

<script setup >
  import { ref, onMounted, computed } from "vue";
  import { useProductStore } from "@/stores/product.js";

  import CategoryList from "@/components/categoryComp.vue";
  import PromoSection from "@/components/promotionComp.vue";
  import MenuComp from "@/components/menuComp.vue";
  import ProductComp from "@/components/productComp.vue";

  import headerComp from "./components/header.vue";

  const productStore = useProductStore();
  const selectedGroup = ref("All");

  // Filtered products based on selected group
  const displayProducts = computed(() => {
    if (selectedGroup.value === "All") return productStore.products;
    return productStore.products.filter(p => p.group === selectedGroup.value);
  });

  // Update selected group when clicked in menu
  const filterProducts = (groupName) => {
    selectedGroup.value = groupName;
  };

  // Fetch data from store on mount
  onMounted(async () => {
    await productStore.initStore();
  });

  // Fix image paths in the store after fetch
  const fixImagePath = (path) => {
    if (!path) return "";

    // Handle stringified array
    try {
      const arr = JSON.parse(path);
      if (Array.isArray(arr) && arr.length) {
        return `http://localhost:3000/${arr[0].replace(/\\/g, "/")}`;
      }
    } catch (err) {
      // Not an array, just a string path
      return `http://localhost:3000/${path.replace(/\\/g, "/")}`;
    }

    return "";
  };

  onMounted(async () => {
    await productStore.initStore();

    // Normalize images
    productStore.categories = productStore.categories.map(c => ({
      ...c,
      image: fixImagePath(c.image),
    }));

    productStore.promotions = productStore.promotions.map(p => ({
      ...p,
      image: fixImagePath(p.image),
    }));

    productStore.products = productStore.products.map(p => ({
      ...p,
      image: fixImagePath(p.image),
      quantity: 0,
    }));
  });
</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');

  .product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }

  .menu {
    display: flex;
    justify-content: center;
    width: 100%;
  }

  .menuCon {
    width: 93%;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

</style>
