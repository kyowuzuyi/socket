
/**
 * Module dependencies.
 */

var express = require('express')
  , routes = require('./routes')
  , user = require('./routes/user')
  , http = require('http')
  , path = require('path');


/*----------   mysql   -------*/
var mysql = require('mysql');

var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'chat'
});

connection.connect(function(err) {
  if (err) {
    console.error('error connecting: ' + err.stack);
    return;
  }
  console.log('connected as id ' + connection.threadId);
});


/*------------------------------*/




var app = express();

// all environments
app.set('port', process.env.PORT || 3000);
app.set('views', __dirname + '/views');
app.set('view engine', 'jade');
app.use(express.favicon());
app.use(express.logger('dev'));
app.use(express.bodyParser());
app.use(express.cookieParser());
app.use(express.methodOverride());
app.use(app.router);
app.use(express.static(path.join(__dirname, 'public')));

// development only
/*
if ('development' == app.get('env')) {
  app.use(express.errorHandler());
}
*/


app.get('/', function (req, res) {
    res.sendfile('views/index.html');
});
app.get('/test', function (req, res) {
  res.sendfile('views/test.html');
});



var server = http.createServer(app);
var io = require('socket.io').listen(server);

server.listen(app.get('port'), function(){
  console.log('Express server listening on port ' + app.get('port'));
});


var users = {};

// 接続確立後の通信処理部分を定義
io.sockets.on( 'connection', function( socket ) {
	socket.join(socket.id);
  socket.on("get_name", function(name){
		
		console.log(name);
		users[socket.id]=name;
/*
	console.log(socket.id);
	console.log(name);
*/

//自分のidを自分に送信する
	var id_myself = socket.id;
	io.sockets.to(id_myself).emit("getid_myself",id_myself);

//usersのsocket_idを更新する
	
var query = connection.query('update users set socket_id= ? where name= ?',[socket.id,name], function (err, results) {
	console.log('--- results ---');
	console.log(results);//クラス型の配列
});


//usersListを表示する

var query = connection.query('select * from users;', function (err, results) {
	console.log('--- results ---');
	console.log(results);//クラス型の配列
	console.log('name is ...');
	console.log(results.length);

//全員のuserListを更新する	
	socket.broadcast.emit( 'show_name',results);
	socket.emit( 'show_name',results);

});

});

socket.on("s2c", function(data){

	var name = data.name;
	var meg = data.message;
	var id= '';

	console.log(name);
	console.log(meg);
  //idを取得する
	for(var key in users){
		if(users[key] == name){
		 id = key;
		}
	}
	console.log(users);
	console.log(id);
	if(id){
	io.sockets.to(id).emit("show_message",data);
//	socket.broadcast.emit("show_message",data);
	socket.emit('show_message',data);
	}else{
	console.log('there is not the user');	
	}

});

socket.on("s_build_chat_box",function(chat_ids){

//partneridでどこへ送信するかを決める、myidで新しいchat_boxのidを決める
	console.log(chat_ids);

	io.sockets.to(chat_ids.partnerid).emit("c_build_chat_box",chat_ids);
	

});




});







