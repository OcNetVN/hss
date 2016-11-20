var app_race 	= require('express')();
var http_race 	= require('http').Server(app_race);
var io_race     = require('socket.io')(http_race);
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

io_race.on('connection', function(socket_race){
  console.log('user connected');

  socket_race.on('disconnect', function()
  {
    console.log('user disconnected');
  });

  //start
  socket_race.on('RefreshRaceInfo', function(res)
  {
    io_race.emit('RefreshRaceInfo', res);
    console.log(res);
  });
  //end
   socket_race.on('ReloadPage', function(res){
    io_race.emit('ReloadPage', res);
    console.log(res);
  });
  // start time 
  socket_race.on('RefreshRaceInfo_1234',function(res)
  {
     io_race.emit('RefreshRaceInfo_1234',res);
     console.log(res);
  });
  socket_race.on('StartTime', function(res)
  {
    var country = res.split('|')[0];
    var time = parseFloat(res.split('|')[1]); 
	var timer = parseFloat(time*60);
    if(country == "MY")
    {
        ss_MY = timer;
		var chay=0;
        clearInterval(Set_Interval_MY);
    	Set_Interval_MY = setInterval(function (){
    		if(ss_MY > 0)
    		{
    			ss_MY = ss_MY-1;
                ss[0] = ss_MY;
				//if(chay == 0)
					io_race.emit('StartTime',ss);
				//chay++;
                console.log(ss);
    		}
    	},1000);	
    }
    else
    {
        chay=0;
        if(country == "SG")
        {
            ss_SG = timer;
        	clearInterval(Set_Interval_SG);
 	        Set_Interval_SG = setInterval(function (){
        		if(ss_SG>0)
        		{
        			ss_SG = ss_SG-1;
                    ss[1] = ss_SG;
                    //if(chay==0)
						io_race.emit('StartTime',ss);
					//chay++;
        			console.log(ss_SG);
        		}
        	},1000);
        }
        else
        {
            chay=0;
            if(country == "HK")
            {
                ss_HK = timer;
            	clearInterval(Set_Interval_HK);
                Set_Interval_HK = setInterval(function (){
            		if(ss_HK > 0)
            		{
            			ss_HK = ss_HK-1;
						ss[2] = ss_HK;
                        //if(chay==0)
    						io_race.emit('StartTime',ss);
    					//chay++;
            			console.log(ss_HK);
            		}
            	},1000);
            }
            else
            {
                chay=0;
                if(country == "MC")
                {
                    ss_MC = timer;
                	clearInterval(Set_Interval_MC);
                    Set_Interval_MC = setInterval(function (){
                		if(ss_MC>0)
                		{
                			ss_MC = ss_MC-1;
							ss[3] = ss_MC;
                            //if(chay==0)
        						io_race.emit('StartTime',ss);
        					//chay++;
                			console.log(ss_MC);
                		}
                	},1000);
                }
                else
                {
                    chay=0;
                    if(country == "SA")
                    {
                        ss_SA = timer;
                    	clearInterval(Set_Interval_SA);
                        Set_Interval_SA = setInterval(function (){
                    		if(ss_SA>0)
                    		{
                    			ss_SA = ss_SA-1;
								ss[4] = ss_SA;
                                //if(chay==0)
            						io_race.emit('StartTime',ss);
            					//chay++;
                    			console.log(ss_SA);
                    		}
                    	},1000);
                    }
                    else
                    {
                        chay=0;
                        if(country == "AU")
                        {
                            ss_AU = timer;
                            clearInterval(Set_Interval_AU);
                            Set_Interval_AU = setInterval(function (){
                        		if(ss_AU>0)
                        		{
                        			ss_AU = ss_AU-1;
									ss[5] = ss_AU;
                                    //if(chay==0)
                						io_race.emit('StartTime',ss);
                					//chay++;
                        			console.log(ss_AU);
                        		}
                        	},1000);
                        }
                        else
                        {
                            chay=0;
                            if(country == "EU")
                            {
                                ss_EU = timer;
                            	clearInterval(Set_Interval_EU);
                                Set_Interval_EU = setInterval(function (){
                            		if(ss_EU>0)
                            		{
                            			ss_EU = ss_EU-1;
										ss[6] = ss_EU;
                                        //if(chay==0)
                    						io_race.emit('StartTime',ss);
                    					//chay++;
                            			console.log(ss_EU);
                            		}
                            	},1000);
                            }
                        }
                    }
                }
            }
        }
    }
    //console.log(ss);
  });

  //end time
  // start time 
  socket_race.on('StopTime', function(res){
    var country = res.split('|')[0];
    if(country == "MY")
    {
        clearInterval(Set_Interval_MY);
        ss[0] = 0;
    }
    else
    {
        if(country == "SG")
        {
            clearInterval(Set_Interval_SG);
            ss[1] = 0;
        }
        else
        {
            if(country == "HK")
            {
                clearInterval(Set_Interval_HK);
                ss[2] = 0;
            }
            else
            {
                if(country == "MC")
                {
                    clearInterval(Set_Interval_MC);
                    ss[3] = 0;
                }
                else
                {
                    if(country == "SA")
                    {
                        clearInterval(Set_Interval_SA);
                        ss[4] = 0;
                    }
                    else
                    {
                        if(country == "AU")
                        {
                            clearInterval(Set_Interval_AU);
                            ss[5] = 0;
                        }
                        else
                        {
                            if(country == "EU")
                            {
                                clearInterval(Set_Interval_EU);
                                ss[6] = 0;
                            }
                        } 
                    }  
                }  
            }  
        }  
    }   
    io_race.emit('StopTime', res);
    console.log(res);
  });
  //end time

});

http_race.listen(1819, function(){
  console.log('_race listening on *:1819');
});

function setvaluetime(country,timer)
{
    io_race.emit('StartTime', timer);
    console.log(timer);
}