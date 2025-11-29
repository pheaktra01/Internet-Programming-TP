<template>
    <div class="header">
        <div class="container1">
            <img src="/src/assets/images/Logo.png" alt="Logo">
            <div >
                SearchBox Component
            </div>
            <div class="item">
                <div>MenuItem</div>
                <div>MenuItem</div>
                <div>MenuItem</div>
                <div>MenuItem</div>
            </div>            
        </div>

        <div class="container2">
                <div style="display: flex; justify-content: space-evenly;">
                    <div>
                        Brow All Category
                    </div>
                    <div style="display: flex;">
                        <div>item</div>
                        <div>item</div>
                        <div>item</div>
                        <div>item</div>
                        <div>item</div>
                        <div>item</div>
                        <div>item</div>
                        <div>item</div>
                    </div>
                </div>
                <div>
                    Support Center
                </div>
        </div>

    </div>

</template>

<script setup>
    import { defineProps } from "vue";

    const props = defineProps({
        headerComp: {
            type: Object,
            required: true,
        }
    });
</script>

<style scoped>
    .header {
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        background-color: #f8f8f8;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .header img {
        height: 40px;
    }
    
    .item{
        display: flex;
        gap: 15px;
    }

    .container1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 95%;
    }

    .container2{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        width: 95%;
    }

</style>