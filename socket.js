var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
// var Redis = require('ioredis');
// var redis = new Redis();


// io = socketio.listen(server);

// handle incoming connections from clients
// io.sockets.on('connection', function(socket) {
//     // once a client has connected, we expect to get a ping from them saying what room they want to join
//     socket.on('join', function(room) {
//         console.log("User Joined Room: "+room);
//         redis.subscribe(room, function(err, count) {});
//     });
// });

// redis.on('message', function(channel, message) {
//     console.log('Message Recieved: ' + message);
//     message = JSON.parse(message);
//     io.emit(channel + ':' + message.event, message.data);
// });

// io.on('connection', function(socket){
//     io.emit('test', 'Welcome!');
// });

// Controls -> stats skærm
io.on('connection', function(socket){
    // Check Connection
    socket.on('is_livescore_online',function(){
        io.emit('livescore_check_connection', '1');
    });
    socket.on('is_map_online',function(){
        io.emit('map_check_connection', '1');
    });
    socket.on('livescore_is_connected', function(){
        io.emit('livescore_connected', '1');
    });
    socket.on('map_is_connected',function(){
        io.emit('map_connected', '1');
    });

    socket.on('change_heat',function(data){
        io.emit('change_heat',data);
    });
    socket.on('driver_update',function(data){
        io.emit('driver_update', data);
    });

    socket.on('update_map',function(data){
        io.emit('update_map',data);
    });

    
    
    socket.on('test', function(msg){
        io.emit('test', msg);
    });
});



http.listen(3000, function(){
    console.log('Listening on Port 3000');
});