var CounterHandle_timer=0;
var CounterHandle_MY=0;
var CounterHandle_SG=0;
var CounterHandle_HK=0;
var CounterHandle_MC=0;
var CounterHandle_SA=0;
var CounterHandle_AU=0;
var CounterHandle_EU=0;

var datahaverace_MY = 0;
var datahaverace_SG = 0;
var datahaverace_HK = 0;
var datahaverace_MC = 0;
var datahaverace_SA = 0;
var datahaverace_AU = 0;
var datahaverace_EU = 0;
var list = [];
var listtimecountry = [];
var time_my;
var time_sg;
var time_hk;
var time_mc;
var time_sa;
var time_au;
var time_eu;
var current_country = "";

var listFC = [];  

socket_race.on('StartTime',function(res)
    {
        /*load_time_country("MY",res[0]);
        load_time_country("SG",res[1]);
        load_time_country("HK",res[2]);
        load_time_country("MC",res[3]);
        load_time_country("SA",res[4]);
        load_time_country("AU",res[5]);
        load_time_country("EU",res[6]);
        */
        //var country_url = current_country;
        //console.log(res);
        // glo_res = res;           
        //$("#testNJS").html("abc kjhkj h");
        for(var i=0; i < listFC.length; i++)
        {
            switch(listFC[i].CountryCode)
            {
                case "MY":
                {
                    load_time_country("MY",res[0]);
                    break;
                }
                case "SG":
                {
                    load_time_country("SG",res[1]);
                    break;
                }
                case "HK":
                {
                    load_time_country("HK",res[2]);
                    break;
                }
                case "MC":
                {
                    load_time_country("MC",res[3]);
                    break;
                }
                case "SA":
                {
                    load_time_country("SA",res[4]);
                    break;
                }
                case "AU":
                {
                    load_time_country("AU",res[5]);
                    break;
                }
                case "EU":
                {
                    load_time_country("EU",res[6]);
                    break;
                }
            }
        }        
});

$(document).ready(function() 
    {
        $("div[id*='div_Flag_']" ).hide(0);
        $("span[id*='time_']").text("00:00");
        re_LoadRaceHorseInfo_Other(current_country);
        //LoadTimeFlag();

});

// tách riêng Race Board khỏi ảnh hướng đến AutoLiveTo ngày 8/13/2015
socket_race.on('StopTime', function(res)
    {
        var country = res.split('|')[0];
        var country_url = current_country;
        if(country_url =="" || country_url==null)
            country_url = "MY";
        if(country == country_url)
        {
            clearInterval(CounterHandle_timer);
            $("#m_timer").html("00:00");
        }

        switch(country)
        {
            case "MY":  clearInterval(CounterHandle_MY);
                $("#time_myflag").html("00:00");
                my_time = 0 ;
                // $.cookie('my_time',0);
                $.removeCookie('my_time');
                break;

            case  "SG": clearInterval(CounterHandle_SG);
                $("#time_sgflag").html("00:00");
                sg_time = 0;
                // $.cookie('sg_time',0);
                $.removeCookie('sg_time');
                break;

            case   "HK":clearInterval(CounterHandle_HK);
                $("#time_hkflag").html("00:00");
                hk_time = 0;
                //$.cookie('hk_time',0);
                $.removeCookie('hk_time');
                break;

            case    "MC": clearInterval(CounterHandle_MC);
                $("#time_mcflag").html("00:00");
                mc_time = 0; 
                //$.cookie('mc_time',0);
                $.removeCookie('mc_time');
                break;

            case    "SA":  clearInterval(CounterHandle_SA);
                $("#time_saflag").html("00:00");
                sa_time = 0;
                //$.cookie('sa_time',0);
                $.removeCookie('sa_time');
                break;

            case    "AU": clearInterval(CounterHandle_AU);
                $("#time_auflag").html("00:00");
                au_time = 0;
                //$.cookie('au_time',0);
                $.removeCookie('au_time');
                break;

            case    "EU": clearInterval(CounterHandle_EU);
                $("#time_euflag").html("00:00");
                eu_time = 0;
                // $.cookie('eu_time',0);
                $.removeCookie('eu_time');
                break;
        }

        //LoadTimeFlag();       
});

socket.on('RefreshLiveTote', function(res)
    {
        var list = res;
        //console.log(list);
        var country;
        var showflag;
        var list_Mal   ="";
        var list_Sin ="";
        var url_country = current_country;    
        if(url_country == "" || url_country == null)
            url_country = "MY";
        var object = "";

        list = list.split("|");
        country = list[0];
        showflag = list[1];
        if(typeof list[2] != "undefined")
            list_Mal = list[2];
        if(typeof list[3] != "undefined")
            list_Sin = list[3];
        //console.log(list_liveto);
        if(country == url_country)
        {
            LoadRaceLiveTo(country,object,list_Mal,list_Sin);
        }

        var flag;
        if(typeof showflag != "undefined")
        {
            flag = showflag.split(",");
            $( "div[id*='div_Flag_']" ).hide(0);
            if(flag.length > 0)
            {
                for(var i =0 ;i<flag.length;i++)
                {
                    $("#div_Flag_"+ flag[i]).show();
                    $("#div_Flag_"+ flag[i]+" span").text("00:00");
                }
            }  
        }
});

///// Sort JSON
var sort_by = function(field, reverse, primer)
{
    var key = primer ? function(x) {return primer(x[field])} : function(x) {return x[field]};
    reverse = !reverse ? 1 : -1;

    return function (a, b) 
    {
        return a = key(a), b = key(b), reverse * ((a > b) - (b > a));
    } 
}
//////////////////////////////////////////////////

function LoadRaceLiveTo(country,show_object,l_Show_Mal,l_Show_Sin)
{
    var l_Mal= "";
    var l_Sin= "";
    //console.log(l_Show_Mal);
    $("#trshowHorseWeight").css("display","none");
    $("#trshowHorseBoard").css("display","");
    if(l_Show_Mal != null)
        l_Mal = JSON.parse(l_Show_Mal);
    //console.log("Mảng Malaysia"+l_Mal);
    if(l_Show_Sin != null)
        l_Sin = JSON.parse(l_Show_Sin);
    //console.log("Mảng Sinagapo" + l_Sin);
    var ListMalayFull = [];
    var kk =0;
    if(l_Mal != null)
    {
        for(var k=0; k<20; k++)
        {
            var win =l_Mal[0][k];
            var place = l_Mal[1][k];
            if(win==="SCR")
            {
                win="-1";
            }
            if(place==="SCR")
            {
                place="-1";
            }
            var item = {
                "no": k+1,
                "win": win,
                "place": place
            }
            if(win==place && win =="")
                {}
            else
            {
                ListMalayFull[kk] = item;
                kk++;
            }
        }
        ListMalayFull.sort(sort_by('win', false, parseFloat));
    }
    var ListSingFull = []; 
    var SS = 0; 
    if(l_Sin != null)
    {  
        for(var k=0; k<20; k++)
        {
            var win =l_Sin[0][k];
            var place = l_Sin[1][k];
            if(win==="SCR")
            {
                win="-1";
            }
            if(place==="SCR")
            {
                place="-1";
            }
            var item = {
                "no": k+1,
                "win": win,
                "place": place
            }
            if(win==place && win =="")
                {}
            else
            {
                ListSingFull[SS] = item;
                SS++;
            }
        }
        ListSingFull.sort(sort_by('win', false, parseFloat));
    }
    for(var i=1;i<=5;i++)
    {
        $("#tbl_part1 tbody tr:eq(4) td:eq("+i+") strong span").html("");
        $("#tbl_part1 tbody tr:eq(5) td:eq("+i+") strong").html("");
        $("#tbl_part1 tbody tr:eq(6) td:eq("+i+") strong").html("");
    }
    // load Win No Play
    var WinNo = "";
    var WinMal = "";
    var dem = 0;
    if(ListMalayFull.length != 0 && ListSingFull.length == 0 )
    {
        for(var i=0;i < ListMalayFull.length ; i++)
        {
            WinNo = ListMalayFull[i]["no"];
            WinMal = ListMalayFull[i]["win"];
            if(dem < 6)
            {
                if(WinMal == -1 || WinNo == "-1")
                    {}
                else
                {
                    $("#tbl_part1 tbody tr:eq(4) td:eq("+(dem+1)+") strong span").html(WinNo);
                    $("#tbl_part1 tbody tr:eq(5) td:eq("+(dem+1)+") strong").html(WinMal);
                    dem++;
                }
            }   
        }
    }
    // load sin place play
    var WinSin = "";
    var demsin = 0;
    if(ListMalayFull.length == 0 && ListSingFull.length != 0)
    {
        for(var i=0; i < 5 ;i++)
        {
            WinSin = ListSingFull[i]["win"];
            WinNo = ListSingFull[i]["no"];
            if(demsin < 6)
            {
                if(WinSin == -1 || WinSin == "-1")
                    {}
                else
                {
                    $("#tbl_part1 tbody tr:eq(4) td:eq("+(demsin+1)+") strong span").html(WinNo);
                    $("#tbl_part1 tbody tr:eq(6) td:eq("+(demsin+1)+") strong").html(WinSin);
                    demsin++;
                }
            } 
        }
    }

    if(ListMalayFull.length != 0 &&  ListSingFull.length != 0)
    {
        for(var i=0;i < ListMalayFull.length ; i++)
        {
            WinNo = ListMalayFull[i]["no"];
            WinMal = ListMalayFull[i]["win"];
            WinSin = l_Sin[0][WinNo-1];
            if(dem < 6)
            {
                if(WinMal == -1 || WinNo == "-1")
                    {}
                else
                {
                    $("#tbl_part1 tbody tr:eq(4) td:eq("+(dem+1)+") strong span").html(WinNo);
                    $("#tbl_part1 tbody tr:eq(5) td:eq("+(dem+1)+") strong").html(WinMal);
                    $("#tbl_part1 tbody tr:eq(6) td:eq("+(dem+1)+") strong").html(WinSin);
                    dem++;
                }
            }   
        }
    }

    str_liveto = "";
    $("#ShowHeader").html("");
    $("#InfoLiveTo").html("");
    if(l_Mal != null && l_Sin == null)
    {
        for(var i=0 ; i < 20;i++)
        {
            var Win = "";
            var Place = "";
            Win   = l_Mal[0][i];
            Place = l_Mal[1][i]; 
            if(Win == Place && Win === "" || Win === " ")
                {}
            else
            {
                if(Win != "SCR")
                    Win = parseFloat(Win);
                if(Place != "SCR")
                    Place = parseFloat(Place);
                str_liveto = str_liveto + "<tr>";
                str_liveto = str_liveto + "<td align=\"center\" id='MalWin"+(i+1)+"' style=\"width:20%;border-left: 1px solid #FFF\">";
                str_liveto = str_liveto + Win + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" id='MalPlace"+(i+1)+"' style=\"width:20%;border-right: 1px solid #FFF;\">";
                str_liveto = str_liveto + Place + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" bgcolor=\"#00a2e8\" style=\"color:#FFF; width:20%;border-left: 1px solid #FFF;border-right: 1px solid #FFF;\">"+(i+1)+"</td>";
                str_liveto = str_liveto + "<td align=\"center\" style=\"width:20%;border-left: 1px solid #FFF;\">&nbsp;</td>";
                str_liveto = str_liveto + "<td align=\"center\" style=\"width:20%;border-left: 1px solid #FFF;\">&nbsp;</td>";
                str_liveto = str_liveto + "</tr>";
            }
        }
    }


    if(l_Mal == null && l_Sin != null)
    {
        for(var i=0 ; i < 20;i++)
        {
            Win   =  l_Sin[0][i];
            Place =  l_Sin[1][i];
            if(Win == Place && Win == "" || Win == " ")
                {}
            else
            {
                if(Win != "SCR")
                    Win = parseFloat(Win);
                if(Place != "SCR")
                    Place = parseFloat(Place);
                str_liveto = str_liveto + "<tr>";
                str_liveto = str_liveto + "<td align=\"center\" style=\"width:20%;border-left: 1px solid #FFF;\">&nbsp;</td>";
                str_liveto = str_liveto + "<td align=\"center\" style=\"width:20%;border-left: 1px solid #FFF;\">&nbsp;</td>";
                str_liveto = str_liveto + "<td align=\"center\" bgcolor=\"#00a2e8\" style=\"color:#FFF; width:20%;border-left: 1px solid #FFF;border-right: 1px solid #FFF;\">"+(i+1)+"</td>";
                str_liveto = str_liveto + "<td align=\"center\" id='SinWin"+(i+1)+"' style=\"width:20%;border-left: 1px solid #FFF\">";
                str_liveto = str_liveto + Win + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" id='SinPlace"+(i+1)+"' style=\"width:20%;border-right: 1px solid #FFF;\">";
                str_liveto = str_liveto + Place + "</td>";
                str_liveto = str_liveto + "</tr>";
            }
        }
    }

    var demmal = 0;
    var demsin = 0;
    if(l_Mal != null && l_Sin != null)
    {
        for(var i=0 ; i < 20;i++)
        {
            var Win = "";
            var Place = "";
            var Win_Sin = "";
            var Place_Sin = "";
            // live to mala
            Win       = l_Mal[0][i];
            Place     = l_Mal[1][i];
            Win_Sin   = l_Sin[0][i];
            Place_Sin = l_Sin[1][i];

            if(Win == Place && Win == "" || Win == " ")
                {}
            else
            {
                if(Win != "SCR")
                    Win = parseFloat(Win);
                if(Place != "SCR")
                    Place = parseFloat(Place);
                str_liveto = str_liveto + "<tr>";
                str_liveto = str_liveto + "<td align=\"center\" id='MalWin"+(demmal+1)+"' style=\"width:20%;border-left: 1px solid #FFF\">";
                str_liveto = str_liveto + Win + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" id='MalPlace"+(demmal+1)+"' style=\"width:20%;border-right: 1px solid #FFF;\">";
                str_liveto = str_liveto + Place + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" bgcolor=\"#00a2e8\" style=\"color:#FFF; width:20%;border-left: 1px solid #FFF;border-right: 1px solid #FFF;\">"+(demmal+1)+"</td>";
                demmal++;
            }

            if(Win_Sin == Place_Sin && Win_Sin === "" || Win_Sin === " ")
                {}
            else
            {
                if(Win_Sin != "SCR")
                    Win_Sin = parseFloat(Win_Sin);
                if(Place_Sin != "SCR")
                    Place_Sin = parseFloat(Place_Sin);
                str_liveto = str_liveto + "<td align=\"center\" id='SinWin"+(demsin+1)+"' style=\"width:20%;border-left: 1px solid #FFF\">";
                str_liveto = str_liveto + Win_Sin + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" id='SinPlace"+(demsin+1)+"' style=\"width:20%;border-right: 1px solid #FFF;\">";
                str_liveto = str_liveto + Place_Sin + "</td>";
                str_liveto = str_liveto + "</tr>";
                demsin++;
            }
        }

    }
    $("#InfoLiveTo").append(str_liveto);

    // show change
    var object;
    var raceboard;
    var obj_win_place;
    var str_split;
    if(typeof show_object != undefined || show_object != "")
    { 
        object = show_object.split("/");
        raceboard = object[0];
        //console.log(raceboard);
        obj_win_place = object[1];
        if(typeof  obj_win_place != "undefined")
        {
            str_split = obj_win_place.split("#");
            win = str_split[0];
            //console.log(win);
            place = str_split[1];
            //console.log(place);

            if(raceboard == "MY")
            {
                if(typeof win != "undefined")
                {
                    var list_win = win.split(",");
                    for(var i=0;i < list_win.length;i++)
                    {  
                        $("#MalWin" + list_win[i]).css("backgroundColor","yellow");
                        //console.log("Danh Mal Win" +  list_win[i]);   
                    } 
                }
                if(typeof place != "undefined")
                { 
                    // MalPlace1
                    var list_place = place.split(",");
                    for(var i=0;i < list_place.length;i++)
                    { 
                        $("#MalPlace" + list_place[i]).css("backgroundColor","yellow");
                        //console.log("Danh Mal Place" + list_place[i]);    
                    }
                }
            }
            else
            {
                if(typeof win != "undefined")
                {
                    var list_win = win.split(",");
                    for(var i=0;i < list_win.length;i++)
                    {  
                        $("#SinWin" + list_win[i]).css("backgroundColor","yellow");
                        //console.log("Danh Sin Win" + list_win[i]);   
                    } 
                }
                if(typeof place != "undefined")
                { 
                    var list_place = place.split(",");
                    // MalPlace1
                    for(var i=0;i < list_place.length;i++)
                    { 
                        $("#SinPlace" + list_place[i]).css("backgroundColor","yellow"); 
                        //console.log("Danh Sin Place" + list_place[i]);   
                    }
                }
            }

            setTimeout ('$("td[id*=Mal]").css("backgroundColor","")', 2000 );
            setTimeout ('$("td[id*=Sin]").css("backgroundColor","")', 2000 );
        } 
    }
}

socket.on('AutoHiliMalWin', function(res)
    {
        var url_country = current_country;   
        if(url_country == "" || url_country == null)
            url_country = "MY";
        var coutry;
        var horseno;// chut nua kiem tra o cho nay
        var res = res.split("|");
        var listflag;
        var list_Mal   ="";
        var list_Sin ="";
        country = res[0];
        object  = res[1];
        listflag = res[2];
        var flag;
        if(typeof res[3] != "undefined")
            list_Mal = res[3];
        if(typeof res[4] != "undefined")
            list_Sin = res[4];
        //console.log(list_liveto);
        if(country == url_country)
        {
            LoadRaceLiveTo(country,object,list_Mal,list_Sin); 
        }
        if(typeof listflag != "undefined")
        {
            flag = listflag.split(",");
            $( "div[id*='div_Flag_']" ).hide(0);
            if(flag.length > 0)
            {
                for(var i =0 ;i<flag.length;i++)
                {
                    $("#div_Flag_"+ flag[i]).show();
                    $("#div_Flag_"+ flag[i]+" span").text("00:00");
                }
            }  
        }
});

socket.on('PageRefresh',function(res)
    {
        var message = res.message;
        var RaceId  = res.RaceID;
        var list    = res.l_weight;
        var country ;
        //console.log(res);
        if(message == "RefreshWeight")
        {
            country = RaceId.substring(0,2);
            if(country == current_country)
            {
                load_nodejs_detailweight(list,country);
            }
        }
});
socket_race.on('RefreshRaceInfo_1234',function(res){
    var res = res.split("|");
    var country = res[0];
    var list_info = res[1];
    if(country == current_country)
        LoadRaceBoardInfo(country,list_info);
});

socket_race.on('RefreshRaceInfo', function(res)
    {
        var url_country = current_country;    
        if(url_country == "" || url_country == null)
            url_country = "MY";
        var object = "";
        if(res == url_country)
        {
            LoadRaceHorseInfo(res,object);
        }
});

function select_country(SELcountry,time,object)
{
    current_country = SELcountry;
    LoadRaceHorseInfo(SELcountry,object);
    //if(current_country == country)
    //countdown_timer(time);
    //console.log(current_country);
    //console.log(object);
}

function re_LoadRaceHorseInfo_Other(country)
{
    var object = "";
    LoadRaceHorseInfo(country,object);
}

function LoadRaceHorseInfo(country,object)
{
    $.ajax({
        type:"POST",
        url: "../home_controller/getListHorseInfo",
        dataType:"text",
        data: {
            country: country,
            object:object
        },
        cache:false,
        success:function (data) 
        {
            ListHorseInfo_Complete(data);
        },
        //error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}


function LoadRaceBoardInfo(country,list)
{
    $("#trshowHorseWeight").css("display","none");
    $("#trshowHorseBoard").css("display","");
    var list_info = JSON.parse(list);
    var lang = "";
    lang = getUrlParameter("lang");
    if(lang == "" || lang == null)
        lang = 1;

    if(lang == 1 || lang == "1")
    {
        $("#tbl_part1 tbody tr:eq(0) td:eq(0)").html(list_info.header1);
        $("#tbl_part1 tbody tr:eq(1) td:eq(0)").html(list_info.header2);
        if(list_info.header3 != "RM  () () ()"){
            $("#tbl_part1 tbody tr:eq(2) td:eq(0)").html(list_info.header3); 
        }    
        else{
            $("#tbl_part1 tbody tr:eq(2) td:eq(0)").html(""); 
        }
        if(list_info.header4 != "$  () () ()") {
            $("#tbl_part1 tbody tr:eq(3) td:eq(0)").html(list_info.header4);
        } 
        else{
            $("#tbl_part1 tbody tr:eq(3) td:eq(0)").html(""); 
        } 
    }
    else
    {
        $("#tbl_part1 tbody tr:eq(0) td:eq(0)").html(list_info.header1_cn);
        $("#tbl_part1 tbody tr:eq(1) td:eq(0)").html(list_info.header2_cn);
        if(list_info.header3_cn != "RM  () () ()"){
        
            $("#tbl_part1 tbody tr:eq(2) td:eq(0)").html(list_info.header3_cn);
        }  
        else{
            $("#tbl_part1 tbody tr:eq(2) td:eq(0)").html(""); 
        }   
        if(list_info.header4_cn != "$  () () ()") {
            $("#tbl_part1 tbody tr:eq(3) td:eq(0)").html(list_info.header4_cn);
        }  
        else{
            $("#tbl_part1 tbody tr:eq(3) td:eq(0)").html(""); 
        }   


    }
    console.log("Langues" + lang);
}

function ListHorseInfo_Complete(data)
{
    var sRes = JSON.parse(data);
    
    //console.log(sRes)   ;
    var ar_HorseNo;
    var li_HorseNo;
    var object;
    var str_split;
    var win;
    var place;
    var raceboard;
    var obj_win_place;
    var flag_country;
    var check_tickcountry = sRes.check_country;
    var race_infor        = sRes.l_raceboard;
    var header1           = sRes.header1;
    var header2           = sRes.header2;
    var header3           = sRes.header3;
    var header4           = sRes.header4;
    var winNo             = sRes.l_winNo;
    var winPlayMal        = sRes.l_winMal;
    var winPlaySin        = sRes.l_winSin;
    var value_Mal         = sRes.l_liveto_MY;
    var value_Sin         = sRes.l_liveto_SIN;
    //console.log(value_Sin);
    var str_liveto = "";
    $("#InfoLiveTo").html("");
    // check flag country is tick 
    $("#tbl_part1 tbody tr:eq(0) td:eq(0)").html("");
    $("#tbl_part1 tbody tr:eq(1) td:eq(0)").html("");
    $("#tbl_part1 tbody tr:eq(2) td:eq(0)").html("");
    $("#tbl_part1 tbody tr:eq(3) td:eq(0)").html("");
    for(var j=1;j<=5;j++)
    {
        $("#tbl_part1 tbody tr:eq(4) td:eq("+j+") strong span").html(" ");
        $("#tbl_part1 tbody tr:eq(5) td:eq("+j+") strong").html(" ");
        $("#tbl_part1 tbody tr:eq(6) td:eq("+j+") strong").html(" ");
    }
    if(check_tickcountry > 0)
    {
        // load header side race board
        $("#tbl_part1 tbody tr:eq(0) td:eq(0)").html(header1);
        $("#tbl_part1 tbody tr:eq(1) td:eq(0)").html(header2); 
        
        if(header3 === "RM  () () ()"){
            $("#tbl_part1 tbody tr:eq(2) td:eq(0)").html("");   
        }    
        else{
            $("#tbl_part1 tbody tr:eq(2) td:eq(0)").html(header3);    
        }
        if(header4=="$  () () ()") {
            $("#tbl_part1 tbody tr:eq(3) td:eq(0)").html("");   
        }  
        else{
           $("#tbl_part1 tbody tr:eq(3) td:eq(0)").html(header4);   
        }
        // load Win No Play
        if(winNo.length > 0)
        {
            for(var i=0;i < winNo.length; i++)
            {
                $("#tbl_part1 tbody tr:eq(4) td:eq("+(i+1)+") strong span").html(winNo[i]); 
            }
        }

        // load mal win play
        if(winPlayMal.length > 0)
        {
            for(var i=0; i < winPlayMal.length;i++)
            {
                $("#tbl_part1 tbody tr:eq(5) td:eq("+(i+1)+") strong").html(parseFloat(winPlayMal[i])); 
            }
        }

        // load sin place play
        if(winPlaySin.length > 0)
        {
            for(var i=0; i < winPlaySin.length;i++)
            {
                $("#tbl_part1 tbody tr:eq(6) td:eq("+(i+1)+") strong").html(parseFloat(winPlaySin[i])); 
            }
        }

        // load value liveto of mal and sin str_liveto

        if(value_Mal.length != 0 && value_Sin.length == 0)
        {
            for(var i=0 ; i < value_Mal.length;i++)
            {
                var Win = parseFloat(value_Mal[i]["Win"]);
                if(Win < 0)
                    Win = "SCR";
                var Place = parseFloat(value_Mal[i]["Place"]); 
                if(Place < 0)
                    Place = "SCR";
                str_liveto = str_liveto + "<tr>";
                str_liveto = str_liveto + "<td align=\"center\" id='MalWin"+(i+1)+"' style=\"width:20%;border-left: 1px solid #FFF\">";
                str_liveto = str_liveto + Win + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" id='MalPlace"+(i+1)+"' style=\"width:20%;border-right: 1px solid #FFF;\">";
                str_liveto = str_liveto + Place + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" bgcolor=\"#00a2e8\" style=\"color:#FFF; width:20%;border-left: 1px solid #FFF;border-right: 1px solid #FFF;\">"+(i+1)+"</td>";
                str_liveto = str_liveto + "<td align=\"center\" style=\"width:20%;border-left: 1px solid #FFF;\">&nbsp;</td>";
                str_liveto = str_liveto + "<td align=\"center\" style=\"width:20%;border-left: 1px solid #FFF;\">&nbsp;</td>";
                str_liveto = str_liveto + "</tr>";
            }
        }

        if(value_Mal.length == 0 && value_Sin.length != 0)
        {
            for(var i=0 ; i < value_Sin.length; i++)
            {
                var Win = parseFloat(value_Sin[i]["Win"]);
                if(Win < 0)
                    Win = "SCR";
                var Place = parseFloat(value_Sin[i]["Place"]); 
                if(Place < 0)
                    Place = "SCR";
                str_liveto = str_liveto + "<tr>";
                str_liveto = str_liveto + "<td align=\"center\" id='SinWin"+(i+1)+"' style=\"width:20%;border-left: 1px solid #FFF\">";
                str_liveto = str_liveto + Win + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" id='SinPlace"+(i+1)+"' style=\"width:20%;border-right: 1px solid #FFF;\">";
                str_liveto = str_liveto + Place + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" bgcolor=\"#00a2e8\" style=\"color:#FFF; width:20%;border-left: 1px solid #FFF;border-right: 1px solid #FFF;\">"+(i+1)+"</td>";
                str_liveto = str_liveto + "<td align=\"center\" style=\"width:20%;border-left: 1px solid #FFF;\">&nbsp;</td>";
                str_liveto = str_liveto + "<td align=\"center\" style=\"width:20%;border-left: 1px solid #FFF;\">&nbsp;</td>";
                str_liveto = str_liveto + "</tr>";
            }
        }

        if(value_Mal.length != 0 && value_Sin.length != 0)
        {
            for(var i=0 ; i < value_Mal.length;i++)
            {
                if(typeof(value_Mal[i]["Win"]) != "undefined" && value_Mal[i]["Win"] !== null)
                {
                    var Win_Mal = parseFloat(value_Mal[i]["Win"]);
                    if(Win_Mal < 0)
                        Win_Mal = "SCR";
                }

                if(typeof(value_Mal[i]["Place"]) != "undefined" && value_Mal[i]["Place"] !== null)
                {
                    var Place_Mal = parseFloat(value_Mal[i]["Place"]);
                    if(Place_Mal < 0)
                        Place_Mal = "SCR";
                }

                str_liveto = str_liveto + "<tr>";
                str_liveto = str_liveto + "<td align=\"center\" id='MalWin"+(i+1)+"' style=\"width:20%;border-left: 1px solid #FFF\">";
                str_liveto = str_liveto + Win_Mal + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" id='MalPlace"+(i+1)+"' style=\"width:20%;border-right: 1px solid #FFF;\">";
                str_liveto = str_liveto + Place_Mal + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" bgcolor=\"#00a2e8\" style=\"color:#FFF; width:20%;border-left: 1px solid #FFF;border-right: 1px solid #FFF;\">"+(i+1)+"</td>";

                if(typeof(value_Sin[i]) != "undefined" && value_Sin[i] !== null)
                {
                    if(typeof(value_Sin[i]["Win"]) != "undefined" && value_Sin[i]["Win"] !== null)
                    {
                        var Win_Sin = parseFloat(value_Sin[i]["Win"]);
                        if(Win_Sin < 0)
                            Win_Sin = "SCR";
                    }
                    if(typeof(value_Sin[i]["Place"]) != "undefined" && value_Sin[i]["Place"] !== null)
                    {
                        var Place_Sin = parseFloat(value_Sin[i]["Place"]);
                        if(Place_Sin < 0)
                            Place_Sin = "SCR";
                    }
                }
                else{
                    Win_Sin = "";
                    Place_Sin = ""
                }

                str_liveto = str_liveto + "<td align=\"center\" id='SinWin"+(i+1)+"' style=\"width:20%;border-left: 1px solid #FFF\">";
                str_liveto = str_liveto + Win_Sin + "</td>";
                str_liveto = str_liveto + "<td align=\"center\" id='SinPlace"+(i+1)+"' style=\"width:20%;border-right: 1px solid #FFF;\">";
                str_liveto = str_liveto + Place_Sin + "</td>";
                str_liveto = str_liveto + "</tr>";
            }
        }  
        $("#InfoLiveTo").append(str_liveto);
    }


    // show flag country được tick ở admin liveto
    flag_country = sRes.flagcountry;
    listFC = sRes.flagcountry;
    //console.log(sRes)         ;
    var check_country;
    if(flag_country.length > 0)
    {
        if(current_country === "")
            current_country = flag_country[flag_country.length-1]['CountryCode'];
        //console.log(current_country);
        for(var i =0 ;i<flag_country.length;i++)
        {
            $("#div_Flag_"+ flag_country[i]['CountryCode']).show();
            check_country = flag_country[i]['CountryCode'];
            switch(check_country)
            {
                case  'MY': $("#div_Flag_MY").attr("onclick","select_country('MY','"+ time_my +"','')");
                    break;
                case  'SG': $("#div_Flag_SG").attr("onclick","select_country('SG','"+ time_sg +"','')");
                    break;
                case  'MC': $("#div_Flag_MC").attr("onclick","select_country('MC','"+ time_mc +"','')");
                    break;
                case  'HK': $("#div_Flag_HK").attr("onclick","select_country('HK','"+ time_hk +"','')");
                    break; 
                case  'AU': $("#div_Flag_AU").attr("onclick","select_country('AU','"+ time_au +"','')");
                    break; 
                case  'EU': $("#div_Flag_EU").attr("onclick","select_country('EU','"+ time_eu +"','')");
                    break;
                case  'SA': $("#div_Flag_SA").attr("onclick","select_country('SA','"+ time_sa +"','')");
                break;
            }
        }
    }

    // dem thoi gian cua tat ca cac nươc
    // set time for country
    switch(current_country)
    {
        case "MY":$("#m_timer").removeAttr("style");
            $("#m_timer").attr("style","display:inline-block;color:black;font-size:XX-Large;font-weight:bold;width:100%;");

            break;
        case "SG":
            $("#m_timer").removeAttr("style");
            $("#m_timer").attr("style","display:inline-block;color:green;font-size:XX-Large;font-weight:bold;width:100%;");

            break;
        case "HK":                   
            $("#m_timer").removeAttr("style");
            $("#m_timer").attr("style","display:inline-block;color:blue;font-size:XX-Large;font-weight:bold;width:100%;");                     
            break;
        default:
            $("#m_timer").removeAttr("style");
            $("#m_timer").attr("style","display:inline-block;color:blue;font-size:XX-Large;font-weight:bold;width:100%;");                
    }

    if(check_tickcountry > 0)
    {
        // if(typeof my_time === "undefined" || my_time === "")
        // {
        //     $("#time_myflag").text("00:00");
        //     $("#m_timer").text("00:00");
        // }
        // else
        // {
        //     if(my_time > 0)
        //     {
        //       countdown_my(my_time);
        //       if(current_country == "MY")
        //          countdown_timer(my_time); 
        //     }
        // }

        // if(typeof sg_time === "undefined" || sg_time === "")
        // {
        //     $("#time_sgflag").text("00:00");
        //     $("#m_timer").text("00:00");
        // }
        // else
        // {
        //     if(sg_time > 0)
        //     {
        //       countdown_sg(sg_time);
        //       if(current_country == "SG")
        //           countdown_timer(sg_time);
        //     } 
        // }

        // if(typeof hk_time === "undefined" || hk_time === "")
        // {
        //     $("#time_hkflag").text("00:00");
        //     $("#m_timer").text("00:00");
        // }
        // else
        // {
        //     if(hk_time > 0)
        //     {
        //       countdown_hk(hk_time);
        //       if(current_country == "HK")
        //        countdown_timer(hk_time);
        //     }
        // }

        // if(typeof mc_time === "undefined" || mc_time === null)
        // {
        //     $("#time_mcflag").text("00:00");
        //     $("#m_timer").text("00:00");
        //     console.log(mc_time);
        // }
        // else
        // {
        //     countdown_mc(mc_time);
        //     if(current_country == "MC" && mc_time > 0)
        //     countdown_timer(mc_time);
        //     else
        //      $("#time_mcflag").text("00:00"); 
        // }

        // if(typeof eu_time === "undefined" || eu_time === "")
        // {
        //     $("#time_euflag").text("00:00");
        //     $("#m_timer").text("00:00");
        // }
        // else
        // {
        //    if(eu_time > 0)
        //    {
        //      countdown_eu(eu_time);
        //      if(current_country == "EU")
        //       countdown_timer(eu_time); 
        //    }
        // }
        // if(typeof sa_time === "undefined" || sa_time === "00:00")
        // {
        //     $("#time_saflag").text("00:00");
        //     $("#m_timer").text("00:00");
        // }
        // else
        // {
        //     if(sa_time > 0)
        //     {
        //       countdown_sa(sa_time);
        //       if(current_country == "SA")
        //       countdown_timer(sa_time);
        //     } 
        // }
        // if(typeof au_time === "undefined" || au_time === "00:00")
        // {
        //     $("#time_auflag").text("00:00");
        //     $("#m_timer").text("00:00");
        // }
        // else
        // {
        //    if(au_time > 0)
        //    {
        //     countdown_au(au_time);
        //     if(current_country == "AU")
        //         countdown_timer(au_time);
        //    } 
        // }
    }

    // end show flag country 
    // tach doi tuong xem la win hay place cua board MY 
    object = sRes.str_object;
    object = object.split("/");
    raceboard = object[0];
    // console.log(raceboard);
    obj_win_place = object[1];
    if(typeof  obj_win_place != "undefined")
    {
        str_split = obj_win_place.split("#");
        win = str_split[0];
        console.log(win);
        place = str_split[1];
        console.log(place);

        if(raceboard == "MY")
        {
            if(typeof win != "undefined")
            {
                var list_win = win.split(",");
                for(var i=0;i < list_win.length;i++)
                {  
                    $("#MalWin" + list_win[i]).css("backgroundColor","yellow");
                    //console.log("Danh Mal Win" +  list_win[i]);   
                } 
            }
            if(typeof place != "undefined")
            { 
                // MalPlace1
                var list_place = place.split(",");
                for(var i=0;i < list_place.length;i++)
                { 
                    $("#MalPlace" + list_place[i]).css("backgroundColor","yellow");
                    //console.log("Danh Mal Place" + list_place[i]);    
                }
            }
        }
        else
        {
            if(typeof win != "undefined")
            {
                var list_win = win.split(",");
                for(var i=0;i < list_win.length;i++)
                {  
                    $("#SinWin" + list_win[i]).css("backgroundColor","yellow");
                    //console.log("Danh Sin Win" + list_win[i]);   
                } 
            }
            if(typeof place != "undefined")
            { 
                var list_place = place.split(",");
                // MalPlace1
                for(var i=0;i < list_place.length;i++)
                { 
                    $("#SinPlace" + list_place[i]).css("backgroundColor","yellow"); 
                    // console.log("Danh Sin Place" + list_place[i]);   
                }
            }
        }

        setTimeout ('$("td[id*=Mal]").css("backgroundColor","")', 2000 );
        setTimeout ('$("td[id*=Sin]").css("backgroundColor","")', 2000 );
    }                 
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
function countdown_my(Count)
{
    clearInterval(CounterHandle_MY);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second < 10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#time_myflag").html(time);
    time_my = Count;
    //document.cookie = time_my;
    //$.cookie("my_time",time_my);
    //console.log("MY" + time_my);
    var ex_count        = parseFloat(Count)-1;
    CounterHandle_MY    = setInterval(function (){
        if(ex_count >= 0)
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
    time_sg = Count;
    //$.cookie("sg_time",Count);
    //console.log("SG" + time_sg);
    $("#time_sgflag").html(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_SG = setInterval(function (){
        if(ex_count>=0)
            countdown_sg(ex_count);
        }, 1000);
}

function countdown_hk(Count)
{
    clearInterval(CounterHandle_HK);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second <10)
        second = "0" + second;
    var time = min + ":" + second;
    time_hk = Count;
    //$.cookie("hk_time",Count);
    //console.log("Hong kong" + time_hk);
    $("#time_hkflag").html(time);

    var ex_count = parseFloat(Count)-1;
    CounterHandle_HK = setInterval(function (){
        if(ex_count >= 0)
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
    if(second < 10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#time_mcflag").html(time);
    time_mc = Count;
    //$.cookie("mc_time",Count);

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
    $("#time_saflag").html(time);
    time_sa = Count;
    // $.cookie("sa_time",Count);

    var ex_count = parseFloat(Count)-1;
    CounterHandle_SA = setInterval(function ()
        {
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
    $("#time_auflag").html(time);
    time_au = Count;
    // $.cookie("au_time",Count);
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
    $("#time_euflag").html(time);

    time_eu = Count;
    //$.cookie("eu_time",Count);
    var link = $(location).attr('href');
    var country = getUrlParameter("country");
    var ex_count = parseFloat(Count)-1;
    CounterHandle_EU = setInterval(function (){
        if(ex_count>=0)
            countdown_eu(ex_count);
        }, 1000);
} 

function countdown_timer(Count)
{       
    clearInterval(CounterHandle_timer);     

    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count % 60;
    if(second < 10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#m_timer").html(time);
    //console.log(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_timer = setInterval(function (){
        if(ex_count>=0)
            countdown_timer(ex_count);
        }, 1000);

    //console.log(CounterHandle_timer);
}
function check_have_race_by_country_date(country,time)
{
    $.ajax({
        type:"POST",
        url: "../home_controller/check_have_race_by_country_date",
        dataType:"text",
        data: {country: country
        },
        cache:false,
        success:function (data) 
        {
            console.log(data);
            if(data == 1)
            {
                switch(country)
                {
                    case "MY":
                        $("#div_Flag_MY").show(500);
                        countdown_my(time);
                        if(current_country == country)
                            countdown_timer(time);
                        break;
                    case "SG":
                        $("#div_Flag_SG").show(500);
                        countdown_sg(time);
                        if(current_country == country)
                            countdown_timer(time);
                        break;
                    case "HK":
                        $("#div_Flag_HK").show(500);
                        countdown_hk(time);
                        if(current_country == country)
                            countdown_timer(time);
                        break;
                    case  "MC":
                        $("#div_Flag_MC").show(500);
                        countdown_mc(time);
                        if(current_country == country)
                            countdown_timer(time);
                        break;
                    case "SA": 
                        $("#div_Flag_SA").show(500);
                        countdown_sa(time);
                        if(current_country == country)
                            countdown_timer(time);
                        break;
                    case "AU": 
                        $("#div_Flag_AU").show(500);
                        countdown_au(time);
                        if(current_country == country)
                            countdown_timer(time);
                        break;
                    case "EU": 
                        $("#div_Flag_EU").show(500);
                        countdown_eu(time);
                        if(current_country == country)
                            countdown_timer(time);
                        break;
                }

            }
            else
            {
                switch(country)
                {
                    case "MY":$("#div_Flag_MY").hide(0);
                        $("#time_myflag").html("NoRace");break;

                    case "SG":$("#div_Flag_SG").hide(0);
                        $("#time_sgflag").html("NoRace");break;

                    case "HK":$("#div_Flag_HK").hide(0);  
                        $("#time_hkflag").html("NoRace");break;

                    case "MC":$("#div_Flag_MC").hide(0);  
                        $("#time_mcflag").html("NoRace");break;

                    case "SA":$("#div_Flag_SA").hide(0);  
                        $("#time_saflag").html("NoRace");break;

                    case "AU":$("#div_Flag_AU").hide(0);  
                        $("#time_auflag").html("NoRace");break;

                    case "EU":$("#div_Flag_EU").hide(0);  
                        $("#time_euflag").html("NoRace");break;
                }        
            }
        },
        //error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}

function load_time_country(country,time)
{
    //console.log("ssasa");    
    switch(country)
    {
        case "MY":
            $("#div_Flag_MY").css('display',"");
            countdown_my(time);
            if(current_country === country)            
                countdown_timer(time);               
            break;
        case "SG":
            $("#div_Flag_SG").css('display',"");
            countdown_sg(time);
            if(current_country === country)                
                countdown_timer(time);              
            break;
        case "HK":
            $("#div_Flag_HK").css('display',"");
            countdown_hk(time);
            if(current_country === country)             
                countdown_timer(time);               
            break;
        case  "MC":
            $("#div_Flag_MC").css('display',"");
            countdown_mc(time);
            if(current_country === country)
                countdown_timer(time);
            break;
        case "SA": 
            $("#div_Flag_SA").css('display',"");
            countdown_sa(time);
            if(current_country === country)
                countdown_timer(time);
            break;
        case "AU": 
            $("#div_Flag_AU").css('display',"");
            countdown_au(time);
            if(current_country === country)
                countdown_timer(time);
            break;
        case "EU": 
            $("#div_Flag_EU").css('display',"");
            countdown_eu(time);
            if(current_country === country)
                countdown_timer(time);
            break;
    }
}

function load_nodejs_detailweight(list,country)
{
    $("#trshowHorseWeight").css("display","");
    $("#trshowHorseBoard").css("display","none");
    $("#ShowHeader").html("");
    var l_weight = JSON.parse(list);
    $("#ShowHeader").html(country + " Horse weight");
    console.log(l_weight);
    var dem = 1;
    var str = "";
    if(l_weight != null)
    {
        for(var i=0;i < 20 ;i++)
        {
            var _weight = l_weight[0][i];
            var _hcp    = l_weight[1][i];
            console.log(_weight);
            if(_weight == _hcp && _weight != " " || _weight != " " || _hcp != " ")
            {
                str += "<tr>";
                str += "<td width=\"30%\" align=\"center\" bgcolor=\"#00a2e8\" style=\"color:white;\">"+dem+"</td>";
                str += "<td width=\"35%\" align=\"center\">" + _weight+"</td>";
                str += "<td width=\"35%\" align=\"center\">" + _hcp+"</td>";
                str +="</tr>";
                dem++;
            }
        }
    }
    $("#tbody_res").html(str); 
}

