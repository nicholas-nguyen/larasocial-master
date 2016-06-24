var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
var requestify = require('requestify');



server.listen(8890);
io.on('connection', function (socket) {

    console.log("client connected");
    var redisClient = redis.createClient();
    redisClient.subscribe('message');
    redisClient.subscribe('like');
    redisClient.subscribe('likecm');
    redisClient.subscribe('editStatus');
    
    redisClient.on("message", function(channel, data) {

            /*requestify.post('http://localhost:8080/larasocial-master/messages', {
                message: data.message,
                sender_id: data.my_id,
                reciver_id: data.user_id
            })
            .then(function (response) {
                console.log(response.getBody());
            });*/

        socket.emit(channel, data);
    });

    redisClient.on("like", function(channel, data) {
        console.log("new like add in queue "+ data['like'] + " channel");
        socket.emit(channel, data);
    });

    redisClient.on("likecm", function(channel, data) {
        console.log("new like_cm add in queue "+ data['likecm'] + " channel");
        socket.emit(channel, data);
    });
    
    socket.on('disconnect', function() {
        redisClient.quit();
    });

});