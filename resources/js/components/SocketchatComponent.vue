<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="form-group">

                <textarea style="resize: none; " class="form-control chat"  cols="10" readonly rows="5">{{dataMessages.join('\n')}}</textarea>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ввведите сообщение..." v-model="message" required>
                    <div class="input-group-append">
                        <button @click="send" class="btn btn-dark">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
     data: function(){
       return {
            dataMessages: [],
            message: "",
            user: ""
       }
     },
        mounted() {
            let socket =io('https://85c6c7014580.ngrok.io:3000');
            socket.on("testing:App\\Events\\MessageEvent", function (data) {
                console.log(data.message);
                if(data.message===null) return false;
                this.dataMessages.push( data.username +": "+ data.message);
            }.bind(this));
        },
        methods:{
            send: function () {
                axios.get('/socket-message',{
                    params: {
                        message: this.message,
                    }
                }).then((response) =>{
                    this.message =""
                    this.update();
                });
            },
            update: function () {
                let $textarea = $('.chat');
                $textarea.scrollTop($textarea[0].scrollHeight);
            }
        }
    }

</script>
