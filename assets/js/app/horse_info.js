var CounterHandle_timer;
var CounterHandle_MY;
var CounterHandle_SG;
var CounterHandle_HK;
var CounterHandle_MC;
var CounterHandle_SA;
var CounterHandle_AU;
var CounterHandle_EU;
var datahaverace_MY = 0;
var datahaverace_SG = 0;
var datahaverace_HK = 0;
var datahaverace_MC = 0;
var datahaverace_SA = 0;
var datahaverace_AU = 0;
var datahaverace_EU = 0;
$(document).ready(function() {
    re_LoadRaceHorseInfo(); 
    //re_load_tbl_part1();
    
});

socket.on('RefreshLiveTote', function(res){
    var url_country = getUrlParameter("country");    
    if(url_country == "" || url_country == null)
        url_country = "MY";
    if(res == url_country)
    {
        LoadRaceHorseInfo(res); 
        //load_tbl_part1(res);
    }
});
socket.on('RefreshRaceInfo', function(res){
     var url_country = getUrlParameter("country");    
    if(url_country == "" || url_country == null)
        url_country = "MY";
    if(res == url_country)
    {
       //load_tbl_part1(res);
       LoadRaceHorseInfo(res); 
    }
});
socket.on('StartTime', function(res){
	var country_url = getUrlParameter("country");
    if(country_url =="" || country_url==null)
        country_url = "MY";
	var time;
	if(country_url=="MY")
        time=parseFloat(res[0]*1000);
	else
	{
		if(country_url=="SG")
			time=parseFloat(res[1]*1000);
		else
		{
			if(country_url=="HK")
				time=parseFloat(res[2]*1000);
			else
			{
				if(country_url=="MC")
					time=parseFloat(res[3]*1000);
				else
				{
					if(country_url=="SA")
						time=parseFloat(res[4]*1000);
					else
					{
						if(country_url=="AU")
							time=parseFloat(res[5]*1000);
						else
						{
							if(country_url=="EU")
								time=parseFloat(res[6]*1000);
						}
					}
				}
			}
		}
	}
    check_have_race_by_country_date("MY",res[0]);
    check_have_race_by_country_date("SG",res[1]);
    check_have_race_by_country_date("HK",res[2]);
    check_have_race_by_country_date("MC",res[3]);
    check_have_race_by_country_date("SA",res[4]);
    check_have_race_by_country_date("AU",res[5]);
    check_have_race_by_country_date("EU",res[6]);
    
	//$('#m_timer').removeClass('ended').data('countdown').update(+(new Date) + time).start();
	//alert(time);
});
socket.on('StopTime', function(res){
    var country = res.split('|')[0];
    var country_url = getUrlParameter("country");
    if(country_url =="" || country_url==null)
        country_url = "MY";
    if(country == country_url)
    {
        clearInterval(CounterHandle_timer);
        $("#m_timer").html("00:00");
    }
    
    if(country == "MY")
    {
        clearInterval(CounterHandle_MY);
        $("#time_myflag").html("00:00");
    }
    
    if(country == "SG")
    {
        clearInterval(CounterHandle_SG);
        $("#time_sgflag").html("00:00");
    } 
    
    if(country == "HK")
    {
        clearInterval(CounterHandle_HK);
        $("#time_hkflag").html("00:00");
    }
    if(country == "MC") 
    {
        clearInterval(CounterHandle_MC);
        $("#time_hkflag").html("00:00");
    }  

    if(country == "SA") 
    {
        clearInterval(CounterHandle_SA);
        $("#time_hkflag").html("00:00");
    } 

    if(country == "AU") 
    {
        clearInterval(CounterHandle_AU);
        $("#time_hkflag").html("00:00");
    } 

    if(country == "EU") 
    {
        clearInterval(CounterHandle_EU);
        $("#time_hkflag").html("00:00");
    }    
});

function re_LoadRaceHorseInfo(){
    var url_country = getUrlParameter("country");    
    if(url_country == "" || url_country == null)
        url_country = "MY";
    LoadRaceHorseInfo(url_country);
}    
function LoadRaceHorseInfo(country){
        $.ajax({
                type:"POST",
                url: "../home_controller/getListHorseInfo",
                dataType:"text",
                data: {country: country},
                cache:false,
                success:function (data) {
                    ListHorseInfo_Complete(data);
                },
                error: function () { alert("Error!"); $("body").removeClass("loading");}
       });
}

function ListHorseInfo_Complete(data){
    var sRes = JSON.parse(data);
    $("#InfoLiveTo").html(sRes.str_res);
    console.log(sRes);
    $("#tbl_part1").html(sRes.str_tblpart_one);   
               
                    
}
function re_load_tbl_part1()
{
    var country = getUrlParameter("country");
    load_tbl_part1(country);
}
function load_tbl_part1(country)
{
    $.ajax({
            type:"POST",
            url: "../home_controller/load_tbl_part1",
            dataType:"text",
            data: {country: country},
            cache:false,
            success:function (data) {
                load_tbl_part1_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   });
}
function load_tbl_part1_Complete(data)
{
    var sRes = JSON.parse(data);
    $("#tbl_part1").html(sRes.str_res);
}

function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}    
function countdown_my(Count){
    clearInterval(CounterHandle_MY);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second <10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#time_myflag").html(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_MY = setInterval(function (){
                            if(ex_count>=0)
                                countdown_my(ex_count);
                        }, 1000);
}
function countdown_sg(Count){
    clearInterval(CounterHandle_SG);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second <10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#time_sgflag").html(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_SG = setInterval(function (){
                            if(ex_count>=0)
                                countdown_sg(ex_count);
                        }, 1000);
}
function countdown_hk(Count){
    clearInterval(CounterHandle_HK);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second <10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#time_hkflag").html(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_HK = setInterval(function (){
                            if(ex_count>=0)
                                countdown_hk(ex_count);
                        }, 1000);
}

function countdown_mc(Count)
{
    clearInterval(CounterHandle_MC);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second <10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#time_hkflag").html(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_MC = setInterval(function (){
                            if(ex_count>=0)
                                countdown_mc(ex_count);
                        }, 1000);
}
function countdown_sa(Count)
{
    clearInterval(CounterHandle_SA);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second <10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#time_hkflag").html(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_SA = setInterval(function (){
                            if(ex_count>=0)
                                countdown_sa(ex_count);
                        }, 1000);
}

function countdown_au(Count)
{
    clearInterval(CounterHandle_AU);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second <10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#time_hkflag").html(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_AU = setInterval(function (){
                            if(ex_count>=0)
                                countdown_au(ex_count);
                        }, 1000);
}

function countdown_eu(Count)
{
    clearInterval(CounterHandle_EU);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second <10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#time_hkflag").html(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_EU = setInterval(function (){
                            if(ex_count>=0)
                                countdown_eu(ex_count);
                        }, 1000);
} 

function countdown_timer(Count){
    clearInterval(CounterHandle_timer);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second <10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#m_timer").html(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_timer = setInterval(function (){
                            if(ex_count>=0)
                                countdown_timer(ex_count);
                        }, 1000);
}
function check_have_race_by_country_date(country,time)
{
    var urlcountry = getUrlParameter("country");
    //alert(urlcountry);
    $.ajax({
            type:"POST",
            url: "../home_controller/check_have_race_by_country_date",
            dataType:"text",
            data: {country: country
            },
            cache:false,
            success:function (data) {
                if(data == 1)
                {
                    if(country == "MY")
                    {
                        countdown_my(time);
                        if((urlcountry == country) || urlcountry == null || urlcountry == "")
                            countdown_timer(time);
                    }
                    if(country == "SG")
                    {
                        countdown_sg(time);
                        if(urlcountry == country)
                            countdown_timer(time);
                    }
                        
                    if(country == "HK")
                    {
                        countdown_hk(time);
                        if(urlcountry == country)
                            countdown_timer(time);
                    }

                    if(country == "MC")
                    {
                        countdown_mc(time);
                        if(urlcountry == country)
                            countdown_timer(time);
                    }

                    if(country == "SA")
                    {
                        countdown_sa(time);
                        if(urlcountry == country)
                            countdown_timer(time);
                    }

                    if(country == "AU")
                    {
                        countdown_au(time);
                        if(urlcountry == country)
                            countdown_timer(time);
                    }

                     if(country == "EU")
                    {
                        countdown_eu(time);
                        if(urlcountry == country)
                            countdown_timer(time);
                    }
                }
                else
                {
                    if(country == "MY")
                        $("#time_myflag").html("NoRace");
                    if(country == "SG")
                        $("#time_sgflag").html("NoRace");
                    if(country == "HK")
                        $("#time_hkflag").html("NoRace");
                    if(country == "MC")
                        $("#time_hkflag").html("NoRace");
                    if(country == "SA")
                        $("#time_hkflag").html("NoRace");
                    if(country == "AU")
                        $("#time_hkflag").html("NoRace");
                    if(country == "EU")
                        $("#time_hkflag").html("NoRace");
                }
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   });
}