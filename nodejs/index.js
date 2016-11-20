var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var ss_MY=0;
var ss_SG=0;
var ss_HK=0;
var ss_MC=0;
var ss_SA=0;
var ss_AU=0;
var ss_EU=0;

var ss = [];
	ss[0] = ss_MY;
	ss[1] = ss_SG;
	ss[2] = ss_HK;
	ss[3] = ss_MC;
	ss[4] = ss_SA;
	ss[5] = ss_AU;
	ss[6] = ss_EU;

var Set_Interval_MY;
var Set_Interval_SG;
var Set_Interval_HK;
var Set_Interval_MC;
var Set_Interval_SA;
var Set_Interval_AU;
var Set_Interval_EU;

// io.on('connection', function(socket){
//   console.log('user connected');
//   //console.log(ss);
//   socket.on('disconnect', function(){
//     console.log('user disconnected');
//   });
//   io.emit('StartTime', ss);
//   console.log(ss);

// });

io.on('connection', function(socket){
  //start
  socket.on('PageRefresh', function(res){
    io.emit('PageRefresh', res);
	console.log(res);
  });
  //end

  // side socket today
  socket.on('SoccerTODAY',function(res){
	  io.emit('SoccerTODAY',res);
	  console.log(res);
  });
  //start
  socket.on('PageRefresh_livedraw', function(res){
    io.emit('PageRefresh_livedraw', res);
	console.log(res);
  });
  //end
   socket.on('PageRefresh_sinlivedraw', function(res)
  {
     io.emit('PageRefresh_sinlivedraw', res);
     console.log(res);
  });
  //start

  // sintoto
  socket.on('PageRefresh_SinToTolivedraw', function(res)
   {
     io.emit('PageRefresh_SinToTolivedraw', res);
     console.log(res);
  });
  // end sintoto
  socket.on('RefreshLiveTote', function(res){
    io.emit('RefreshLiveTote', res);
	console.log(res);
  });
  socket.on('RefreshF5', function(res){
    io.emit('RefreshF5', res);
	console.log(res);
  });
  //end
  // định nghĩa lại refresh livetote đành cho admin 05/06/2015
    socket.on('RefreshLiveToteAdmin', function(res){
      io.emit('RefreshLiveToteAdmin', res);
      console.log(res);
  });
  // end định nghĩa lại refresh RefreshLiveToteAdmin
  
  //start
  // socket.on('RefreshRaceInfo', function(res){
  //   io.emit('RefreshRaceInfo', res);
  //   console.log(res);
  // });
  //end

  // not show flag country 

  socket.on('RefreshNotShowFlag', function(res){
    io.emit('RefreshNotShowFlag', res);
    console.log(res);
  });

  // end show flag country

  // auto hightligh mal
  socket.on('AutoHiliSinlWin', function(res){
    io.emit('AutoHiliSinlWin', res);
    console.log(res);
  });

  socket.on('AutoHiliMalWin', function(res){
    io.emit('AutoHiliMalWin', res);
    console.log("To Mau : "+res);
  });
  // start time 
  // socket.on('StartTime', function(res){
  //   //
  //   var country = res.split('|')[0];
  //   var time = parseFloat(res.split('|')[1]);       
	 //   var timer = parseFloat(time*60);
  //   if(country == "MY")
  //   {
  //       ss_MY = timer;
		// var chay=0;
  //       clearInterval(Set_Interval_MY);
  //   	Set_Interval_MY = setInterval(function (){
  //   		if(ss_MY>0)
  //   		{
				
  //   			ss_MY = ss_MY-1;
  //   			//var ss = [];
  //                   ss[0] = ss_MY;
		// 			if(chay==0)
		// 				io.emit('StartTime',ss);
		// 			chay++;
  //                 console.log(ss);
  //   		}
  //   	},1000);
		
  //   }
  //   else
  //   {
  //       chay=0;
  //       if(country == "SG")
  //       {
  //           ss_SG = timer;
  //       	clearInterval(Set_Interval_SG);
 	//         Set_Interval_SG = setInterval(function (){
  //       		if(ss_SG>0)
  //       		{
  //       			ss_SG = ss_SG-1;
  //                   ss[1] = ss_SG;
  //                   if(chay==0)
		// 				io.emit('StartTime',ss);
		// 			chay++;
  //       			console.log(ss_SG);
  //       		}
  //       	},1000);
  //       }
  //       else
  //       {
  //           chay=0;
  //           if(country == "HK")
  //           {
  //               ss_HK = timer;
  //           	clearInterval(Set_Interval_HK);
  //               Set_Interval_HK = setInterval(function (){
  //           		if(ss_HK>0)
  //           		{
  //           			ss_HK = ss_HK-1;
		// 				ss[2] = ss_HK;
  //                       if(chay==0)
  //   						io.emit('StartTime',ss);
  //   					chay++;
  //           			console.log(ss_HK);
  //           		}
  //           	},1000);
  //           }
  //           else
  //           {
  //               chay=0;
  //               if(country == "MC")
  //               {
  //                   ss_MC = timer;
  //               	clearInterval(Set_Interval_MC);
  //                   Set_Interval_MC = setInterval(function (){
  //               		if(ss_MC>0)
  //               		{
  //               			ss_MC = ss_MC-1;
		// 					ss[3] = ss_MC;
  //                           if(chay==0)
  //       						io.emit('StartTime',ss);
  //       					chay++;
  //               			console.log(ss_MC);
  //               		}
  //               	},1000);
  //               }
  //               else
  //               {
  //                   chay=0;
  //                   if(country == "SA")
  //                   {
  //                       ss_SA = timer;
  //                   	clearInterval(Set_Interval_SA);
  //                       Set_Interval_SA = setInterval(function (){
  //                   		if(ss_SA>0)
  //                   		{
  //                   			ss_SA = ss_SA-1;
		// 						ss[4] = ss_SA;
  //                               if(chay==0)
  //           						io.emit('StartTime',ss);
  //           					chay++;
  //                   			console.log(ss_SA);
  //                   		}
  //                   	},1000);
  //                   }
  //                   else
  //                   {
  //                       chay=0;
  //                       if(country == "AU")
  //                       {
  //                           ss_AU = timer;
  //                           clearInterval(Set_Interval_AU);
  //                           Set_Interval_AU = setInterval(function (){
  //                       		if(ss_AU>0)
  //                       		{
  //                       			ss_AU = ss_AU-1;
		// 							ss[5] = ss_AU;
  //                                   if(chay==0)
  //               						io.emit('StartTime',ss);
  //               					chay++;
  //                       			console.log(ss_AU);
  //                       		}
  //                       	},1000);
  //                       }
  //                       else
  //                       {
  //                           chay=0;
  //                           if(country == "EU")
  //                           {
  //                               ss_EU = timer;
  //                           	clearInterval(Set_Interval_EU);
  //                               Set_Interval_EU = setInterval(function (){
  //                           		if(ss_EU>0)
  //                           		{
  //                           			ss_EU = ss_EU-1;
		// 								ss[6] = ss_EU;
  //                                       if(chay==0)
  //                   						io.emit('StartTime',ss);
  //                   					chay++;
  //                           			console.log(ss_EU);
  //                           		}
  //                           	},1000);
  //                           }
  //                       }
  //                   }
  //               }
  //           }
  //       }
  //   }
  //   //console.log(ss);
  // });
  //end time
  
  // start time 
  // socket.on('StopTime', function(res){
  //   var country = res.split('|')[0];
  //   if(country == "MY")
  //   {
  //       clearInterval(Set_Interval_MY);
  //       ss[0] = 0;
  //   }
  //   else
  //   {
  //       if(country == "SG")
  //       {
  //           clearInterval(Set_Interval_SG);
  //           ss[1] = 0;
  //       }
  //       else
  //       {
  //           if(country == "HK")
  //           {
  //               clearInterval(Set_Interval_HK);
  //               ss[2] = 0;
  //           }
  //           else
  //           {
  //               if(country == "MC")
  //               {
  //                   clearInterval(Set_Interval_MC);
  //                   ss[3] = 0;
  //               }
  //               else
  //               {
  //                   if(country == "SA")
  //                   {
  //                       clearInterval(Set_Interval_SA);
  //                       ss[4] = 0;
  //                   }
  //                   else
  //                   {
  //                       if(country == "AU")
  //                       {
  //                           clearInterval(Set_Interval_AU);
  //                           ss[5] = 0;
  //                       }
  //                       else
  //                       {
  //                           if(country == "EU")
  //                           {
  //                               clearInterval(Set_Interval_EU);
  //                               ss[6] = 0;
  //                           }
  //                       } 
  //                   }  
  //               }  
  //           }  
  //       }  
  //   }   
  //   io.emit('StopTime', res);
  //   console.log(res);
  // });
  //end time

  // soccer
  socket.on('PageAllTables',function(res){
      io.emit('PageAllTables',res);
      console.log(res);
  });

  socket.on('PageLeagueTable',function(res){
     io.emit('PageLeagueTable',res);
     console.log(res);
  });
  
});
http.listen(1810, function(){
  console.log('listening on *:1810');
});
// function setvaluetime(country,timer)
// {
//     io.emit('StartTime', timer);
//     console.log(timer);
// }


 //net = require('net')

// Supports multiple client chat application

// Keep a pool of sockets ready for everyone
// Avoid dead sockets by responding to the 'end' event
 //var sockets = [];

// // Create a TCP socket listener
 //var s = net.Server(function (socket) {

     // Add the new client socket connection to the array of
     // sockets
     //sockets.push(socket);

     // 'data' is an event that means that a message was just sent by the 
     // client application
    //socket.on('data', function (msg_sent) {
        // Loop through all of our sockets and send the data
        //for (var i = 0; i < sockets.length; i++) {
            // Don't send the data back to the original sender
            //if (sockets[i] == socket) // don't send the message to yourself
                //continue;
            // Write the msg sent by chat client
            //sockets[i].write(msg_sent);
            //buf = new Buffer(msg_sent.length);
            //for (var i = 0 ; i < msg_sent.length ; i++) {
            //    buf[i] = msg_sent[i]; // 97 is ASCII a
            //}
            //var str = msg_sent.toString('ascii');
            //io.emit('RefreshLiveTote', str);
            //console.log(str);
            //io.emit('AutoHiliMalWin', str);
            //console.log("To Mau : "+str);
            //console.log(msg_sent);

        //}
    //});
    // Use splice to get rid of the socket that is ending.
    // The 'end' event means tcp client has disconnected.
   // socket.on('end', function () {
//        var i = sockets.indexOf(socket);
//        sockets.splice(i, 1);
//    });


//});

// s.listen(8000);
// console.log('System waiting at http://localhost:8000');