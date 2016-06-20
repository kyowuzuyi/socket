
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
  password : 'root',
  database : 'chat',
socketPath:'/Applications/MAMP/tmp/mysql/mysql.sock'
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

//meg_array.push("hjhjhjhjhj");


// �ڑ��m�����̒ʐM�������������`
io.sockets.on( 'connection', function( socket ) {
	socket.join(socket.id);
  socket.on("get_name", function(name){
		
		console.log(name);
		users[socket.id]=name;
/*
	console.log(socket.id);
	console.log(name);
*/

//������id�������ɑ��M����
	var id_myself = socket.id;
	io.sockets.to(id_myself).emit("getid_myself",id_myself);

//users��socket_id���X�V����
	
var query = connection.query('update users set socket_id= ? where name= ?',[socket.id,name], function (err, results) {
//	console.log('--- results ---');
//	console.log(results);//�N���X�^�̔z��
});


//usersList���\������

var query = connection.query('select * from users;', function (err, results) {
//	console.log('--- results ---');
//	console.log(results);//�N���X�^�̔z��
//	console.log('name is ...');
//	console.log(results.length);

//�S����userList���X�V����	
	socket.broadcast.emit( 'show_name',results);
	socket.emit( 'show_name',results);

});

});

socket.on("s2c", function(data){

	var name = data.name;
	var meg = data.message;
	var id= '';
  var my_id = '';

var meg_array = new Array();


	for(var key in users){
		if(users[key] == name){
		 id = key;//相手のid
		 data.yourid = id;
		}
		if(users[key] == data.myname){
			my_id = key;
			data.myid = my_id; 
		}
	}

//messageをdatabaseに登録する

var query = connection.query('insert into chat (nameA,nameB,message) value(?,?,?);',[data.myname,data.name,data.message], function (err, results) {
console.log(results);
});

//databaseから情報を取得する

//var i=0;
//var tempA;
var chat_mag = connection.query('select nameA,message from chat where (nameA = ? AND nameB = ?) or (nameA = ? AND nameB = ?);',[data.myname,data.name,data.name,data.myname], function (err, results) {
	
	console.log(results);
	if(id){
	io.sockets.to(id).emit("show_message",data,results);//他人のページのchat_box
	io.sockets.to(my_id).emit("show_message",data,results);//自分のページのchat_box
	}else{
	console.log('there is not the user');	
	}



});


});



socket.on("s_build_chat_box",function(chat_ids){

//partnerid�łǂ��֑��M���邩�����߂��Amyid�ŐV����chat_box��id�����߂�
//	console.log(chat_ids);

	io.sockets.to(chat_ids.partnerid).emit("c_build_chat_box",chat_ids);
	

});




});







