<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <tr v-for="product in products">
                    {{product.code}}

                </tr>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'products'
        ],
        mounted() {
            this.update();
        },
        methods:{
            update: function(){
                console.log(this.products);
            }
        }
    }
</script>
