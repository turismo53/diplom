<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <tr>
                    <h1>Ajax</h1>
                    <button @click="update" class="btn btn-primary" v-if="!is_refresh">Обновить {{id}}</button>
                    <span v-if="is_refresh"> жди падла </span>
                </tr>
            </div>
            <div class="col-md-12">
                <tr v-for="product in products">
                    {{product.code}}  {{product.url}}
                </tr>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
     data: function(){
       return {
           products: [],
           is_refresh: false,
           id: 0
       }
     },
        mounted() {
            this.update();

        },
        methods:{
            update: function(){
                this.is_refresh = true
              axios.get('/get-json').then((response) =>{
                  console.log( response)
                 this.products = response.data
                 this.is_refresh = false
                 this.id++
              });
            }
        }
    }
</script>
