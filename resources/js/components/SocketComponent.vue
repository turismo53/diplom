<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRatio: true}"></line-chart>
                <label>
                    <input type="checkbox" v-model="realtime">
                </label> realtime
                <label>
                    <input type="text" v-model="label">
                </label>
                <label>
                    <input type="text" v-model="value">
                </label>
                <button @click="sendData" class="btn btn-dark">Update</button>
            </div>

        </div>
    </div>
</template>

<script>
    import LineChart from "./LineChart"
    export default {
        components: {
            LineChart
        },
     data: function(){
       return {
           data: [],
           realtime: false,
           label: "",
           value: 228
       }
     },
        mounted() {
            let socket =io('http://127.0.0.1:3000');
            socket.on("testing:App\\Events\\NewEvent", function (data) {
                this.data=data.result;
            }.bind(this));
            this.update()
        },
        methods:{
            update: function(){
              axios.get('/socket-chart').then((response) =>{
                  this.data = response.data
              });
            },
            sendData: function () {
                axios.get('/socket-chart',{

                    params: {
                        label: this.label,
                        value: this.value,
                        realtime: this.realtime
                    }
                }).then((response) =>{
                    this.data = response.data
                });
            }
        }
    }
</script>
