<template>
  <button class="btn">
        <slot>ShopNow</slot>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4" width="20px">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M17.25 8.25L21 12l-3.75 3.75M21 12H3" />
        </svg>
    </button>
</template>

<style scoped>
    .btn {
        display: flex;
        background: #3BB77E;
        color: white;
        width: 110px;
        height: 30px;
        border-radius: 3px;
        justify-content: center;
        align-items: center;
        border: none;
        font-size: 12px;
    }
</style>