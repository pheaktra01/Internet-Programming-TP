<template>
  <div class="con">
    <div class="con1">
      <div class="con2">
        <!-- "All" shows all products -->
        <p @click="selectGroup('All')">All</p>
        <p
          v-for="(group, index) in menuComp"
          :key="index"
          @click="selectGroup(group)"
        >
          {{ group }}
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits } from "vue";

const props = defineProps({
  menuComp: {
    type: Array,
    required: true,
  },
});

const emit = defineEmits(["group-selected"]);

const selectGroup = (groupName) => {
  emit("group-selected", groupName);
};
</script>

<style scoped>
.con {
  font-family: 'quicksand', sans-serif;
}

.con1 {
  position: relative;
  margin-bottom: 20px;
}

.con2 {
  display: flex;
  gap: 15px;
  margin-top: 5px;
  right: 0;
  top: 10px;
  cursor: pointer;
}

.con2 p:hover {
  color: #007bff;
}
</style>
