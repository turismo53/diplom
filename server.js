let http = require('http').Server();
let io = require('socket.io')(http);
let Redis = require('ioredis');

let redis = new Redis();

redis.subscribe('testing');
redis.on('message',function (channel, message) {
    console.log('recived:' + message);
    console.log('channel:' + channel);
     message = JSON.parse(message);
     io.emit(channel + ':' + message.event,message.data);
});
http.listen(3000,function () {
console.log('server up')
});
