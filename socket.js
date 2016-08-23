var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

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
    socket.on('livescore_stop_timers',function(){
        io.emit('livescore_stop_timers');
    });
    socket.on('driver_update',function(data){
        io.emit('driver_update', data);
    });

    socket.on('update_map',function(data){
        io.emit('update_map',data);
        // console.log(data);
    });
    socket.on('setOnLivescore', function(data){
        io.emit('setOnLivescore',data);
    });
    socket.on('startTimerOnLivescore',function(data){
        io.emit('startTimerOnLivescore',data);
    });
    socket.on('stopTimerOnLivescore',function(data){
        io.emit('stopTimerOnLivescore',data);
    });
    
    socket.on('test', function(msg){
        io.emit('test', msg);
    });
});



http.listen(3000, function(){
    console.log('Listening on Port: 3000');
});
// http.listen(3000, '139.59.177.94');