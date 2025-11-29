<template>
    <div class="product-grid">
        <div class="container">
            <div
                v-for="(product, index) in productComp"
                :key="index"
                class="product-card"
            >
                <div style="height: 50%;">
                    <div class="badge-wrapper">
                        <div v-if="product.promotionAsPercentage" class="badge discount">
                            -{{ product.promotionAsPercentage }}%
                        </div>
                        <div v-if="product.countSold >= 50" class="badge hot">Hot</div>
                        <div v-else-if="product.countSold >= 25" class="badge sale">Sale</div>
                    </div>
                    
                    <div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                        <img :src="product.image" alt="" class="product-image" />
                    </div>
                </div>

                <!-- Product Info -->
                <div class="product-info">
                    <p style="font-size: 12px; color: #7E7E7E;">Hodo Food</p>
                    <h3 class="product-title">{{ product.name }}</h3>
                    <div class="product-rating">
                        <span v-for="n in 5" :key="n">
                            <i class="star" :class="n <= product.rating ? 'filled' : ''">★</i>
                        </span>
                        <a style="font-size: 12px; color: #7E7E7E;"> ({{ product.rating }}.0)</a>
                    </div>
                    <p class="product-size">{{ product.size }}</p>

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="product-price">
                            <span class="current-price">${{(product.price-(( product.price *product.promotionAsPercentage)/100)).toFixed(2)}}</span>
                            <span class="promotion" v-if="product.promotionAsPercentage">
                                {{ product.price.toFixed(2) }}
                            </span>
                        </div>

                        <div class="product-action">
                            <template v-if="product.quantity > 0">
                                <button @click="decrement(product)">-</button>
                                <span>{{ product.quantity }}</span>
                                <button @click="increment(product)">+</button>
                            </template>
                            <button v-else @click="addProduct(product)">Add +</button>
                        </div>                    
                    </div>
                </div>
            </div>            
        </div>

    </div>
</template>

<script setup>
    import { defineProps } from "vue";

    // Props
    const props = defineProps({
        productComp: {
            type: Object,
            required: true,
        }
    });

    // Methods
    function addProduct(product) {
        product.quantity = 1;
    }

    function increment(product) {
        product.quantity++;
    }

    function decrement(product) {
        if (product.quantity > 0) product.quantity--;
    }
</script>


<style scoped>
.product-grid {
    display: flex;
    justify-self: center;
}

.container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.product-card {
    border: 1px solid #BCE3C9;
    border-radius: 8px;
    padding: 10px;
    position: relative;
    width: 298px;
    height: 402px;
    background-color: #fff;
}

.badge-wrapper {
    position: absolute;
    top: 20px;
    left: 0;
    display: flex;
    flex-direction: column;
    gap: 5px;
    text-align: center;
}

.badge {
    padding: 10px 20px;
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    font-size: 12px;
    color: #fff;
}

.badge.discount {
    background-color: #3BB77E;
}

.badge.hot {
    background-color: #ef4444;
}

.badge.sale {
    background-color: #f59e0b;
}

.product-image {
    width: 201px;
    height: 144px;
    object-fit: contain;
}

.product-info {
    margin-top: 10px;
    margin-left: 10px;
}

.product-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 5px;
    color: #253D4E;
}

.product-size {
    font-size: 12px;
    color: #6b7280;
    margin-bottom: 5px;
}

.product-rating {
    margin-bottom: 5px;
}

.star {
    color: #d1d5db;
}

.star.filled {
    color: #facc15;
}

.product-price {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-bottom: 10px;
}

.current-price {
    font-weight: bold;
    color: #3BB77E;
    font-size: 20px;
}

.promotion {
    text-decoration: line-through;
    font-weight: bold;
    color: #7E7E7E;
    font-size: 12px;
}

.product-action {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-right: 10px;

}

.product-action button {
    padding: 5px 10px;
    border: 0px solid ;
    background-color: #DEF9EC;
    color: #3BB77E;
    border-radius: 4px;
    cursor: pointer;
}
</style>
