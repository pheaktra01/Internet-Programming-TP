<template>
  <div>
    <CategoryList :category-comp="categories" />
    <PromoSection :promotionComp="promos" />
  </div>
</template>

<script setup>
  import { ref, onMounted } from "vue";
  import axios from "axios";
  import CategoryList from "@/components/categoryComp.vue";
  import PromoSection from "@/components/promotionComp.vue";

  const categories = ref([]);
  const promos = ref([]);

  const fixImagePath = (path) => {
    if (!path) return "";
    return `http://localhost:3000/${path.replace(/\\/g, "/")}`;
  };

  onMounted(async () => {
    try {
      const [catRes, promoRes] = await Promise.all([
        axios.get("http://localhost:3000/api/categories"),
        axios.get("http://localhost:3000/api/promotions"),
      ]);

      categories.value = catRes.data.map((c) => ({
        ...c,
        image: fixImagePath(c.image),
      }));

      promos.value = promoRes.data.map((p) => ({
        ...p,
        image: fixImagePath(p.image),
      }));
    } catch (err) {
      console.error("Error fetching data:", err);
    }
  });
</script>
