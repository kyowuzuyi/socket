
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
//socketPath:'/Applications/MAMP/tmp/mysql/mysql.sock'
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

// �ڑ��m�����̒ʐM�������������`
io.sockets.on( 'connection', function( socket ) {
	socket.join(socket.id);
  socket.on("get_name", function(name){
		
//		console.log(name);
//		console.log(socket.id);
		users[socket.id]=name;
//������id�������ɑ��M����
	var id_myself = socket.id;
	io.sockets.to(id_myself).emit("getid_myself",id_myself);
	
var query = connection.query('update user set socket_id= ? where name= ?',[socket.id,name], function (err, results) {

});


//usersList���\������

var query = connection.query('select name,socket_id from user;', function (err, results) {
	console.log(results);
	socket.broadcast.emit( 'show_name',results);
	socket.emit( 'show_name',results);

});

});

/*------------file-----------------*/

socket.on("get_file",function(forfile,partnerid){
	console.log(forfile);
	if(partnerid){
	io.sockets.to(partnerid).emit("down_file",forfile);//他人のページへ送信す
	}else{
	console.log('there is not the user');	
	}
});

/*-------------------------------------*/

socket.on("s2c", function(data){
console.log("data is :" + data);
if(data.message == 'basketball' && data.yourid != null ){
io.sockets.to(data.yourid).emit('animate_your');
}
//messageをdatabaseに登録する
var query = connection.query('insert into chat (nameA,nameB,message) value(?,?,?);',[data.myname,data.yourname,data.message], function (err, results) {
console.log(results);
});

//databaseから情報を取得する

//var i=0;
//var tempA;
var chat_mag = connection.query('select nameA,message from chat where (nameA = ? AND nameB = ?) or (nameA = ? AND nameB = ?);',[data.myname,data.yourname,data.yourname,data.myname], function (err, results) {
	if(data.yourid && data.myid){
	io.sockets.to(data.yourid).emit("show_message",data.myid,results);//他人のページのchat_box
	io.sockets.to(data.myid).emit("show_message",data.yourid,results);//自分のページのchat_box
	}else{
	console.log('there is not the user');	
	}
});

});



socket.on("s_build_chat_box",function(chat_ids){
	io.sockets.to(chat_ids.yourid).emit("c_build_chat_box",chat_ids);
//databaseから情報を取得する
var chat_mag = connection.query('select nameA,message from chat where (nameA = ? AND nameB = ?) or (nameA = ? AND nameB = ?);',[chat_ids.myname,chat_ids.yourname,chat_ids.yourname,chat_ids.myname], function (err, results) {
	console.log(results);
	if(chat_ids.yourid && chat_ids.myid){
	io.sockets.to(chat_ids.yourid).emit("show_message",chat_ids.myid,results);//他人のページのchat_box
	io.sockets.to(chat_ids.myid).emit("show_message",chat_ids.yourid,results);//自分のページのchat_box
	}else{
	console.log('there is not the user');	
	}

	});

});


socket.on("file_message_s2c",function(partnerid){
	io.sockets.to(partnerid).emit("show_file_Arrived_message");
});




});







