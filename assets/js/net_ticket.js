var CounterHandle_timer;
var CounterHandle_MY;
var CounterHandle_SG;
var CounterHandle_HK;
var CounterHandle_MC;
var CounterHandle_SA;
var CounterHandle_AU;
var CounterHandle_EU;
var Set_Interval_MY;
var Set_Interval_SG;
var Set_Interval_HK;
var Set_Interval_MC;
var Set_Interval_SA;
var Set_Interval_AU;
var Set_Interval_EU;
var datahaverace_MY = 0;
var datahaverace_SG = 0;
var datahaverace_HK = 0;
var datahaverace_MC = 0;
var datahaverace_SA = 0;
var datahaverace_AU = 0;
var datahaverace_EU = 0;
var run_time = 0;
var _country = "";
var chooseCountry = "MY";

$(document).ready(function() 
    {        
        $("#txtHeader2").change(function(){    
            var text =  $("#txtHeader2").val();
            text = text.replace("Net Tic","网出票").replace("Et","早票 ")
            $("#txtHeader2Man").val(text);
        });
        if(typeof $.cookie("_country") != undefined || $.cookie("_country") != "")
        { 
            $('#cmbRace option[value='+ $.cookie("_country") +']').attr('selected','selected');
        }          
        $('#cmbRace').change(function()
            {
                var cmbRace = $("#cmbRace").val();
                $.cookie("_country",cmbRace);
                if(cmbRace == "MY" )
                {
                    $("#txtCountry").val("MALAYSIA");
                    $("#time_myflag").css("display","");
                    $("#time_sgflag").css("display","none");
                    $("#time_hkflag").css("display","none");
                    $("#time_mcflag").css("display","none");
                    $("#time_saflag").css("display","none");
                    $("#time_auflag").css("display","none");
                    $("#time_euflag").css("display","none");
                }
                if(cmbRace == "SG" )
                {
                    $("#txtCountry").val("SINGAPORE");
                    $("#time_myflag").css("display","none");
                    $("#time_sgflag").css("display","");
                    $("#time_hkflag").css("display","none");
                    $("#time_mcflag").css("display","none");
                    $("#time_saflag").css("display","none");
                    $("#time_auflag").css("display","none");
                    $("#time_euflag").css("display","none");
                }
                if(cmbRace == "HK" )
                {
                    $("#txtCountry").val("HONG KONG");
                    $("#time_myflag").css("display","none");
                    $("#time_sgflag").css("display","none");
                    $("#time_hkflag").css("display","");
                    $("#time_mcflag").css("display","none");
                    $("#time_saflag").css("display","none");
                    $("#time_auflag").css("display","none");
                    $("#time_euflag").css("display","none");
                }
                if(cmbRace == "MC" )
                {
                    $("#txtCountry").val("Ma Cau"); 
                    $("#time_myflag").css("display","none");
                    $("#time_sgflag").css("display","none");
                    $("#time_hkflag").css("display","none");
                    $("#time_mcflag").css("display","");
                    $("#time_saflag").css("display","none");
                    $("#time_auflag").css("display","none");
                    $("#time_euflag").css("display","none");
                }

                if(cmbRace == "SA" )
                {
                    $("#txtCountry").val("S Afica");
                    $("#time_myflag").css("display","none");
                    $("#time_sgflag").css("display","none");
                    $("#time_hkflag").css("display","none");
                    $("#time_mcflag").css("display","none");
                    $("#time_saflag").css("display","");
                    $("#time_auflag").css("display","none");
                    $("#time_euflag").css("display","none");
                } 
                if(cmbRace == "AU" )
                {
                    $("#txtCountry").val("Australia");
                    $("#txtCountry").val("S Afica");
                    $("#time_myflag").css("display","none");
                    $("#time_sgflag").css("display","none");
                    $("#time_hkflag").css("display","none");
                    $("#time_mcflag").css("display","none");
                    $("#time_saflag").css("display","none");
                    $("#time_auflag").css("display","");
                    $("#time_euflag").css("display","none");
                } 

                if(cmbRace == "EU" )
                {
                    $("#txtCountry").val("Europe");
                    $("#txtCountry").val("S Afica");
                    $("#time_myflag").css("display","none");
                    $("#time_sgflag").css("display","none");
                    $("#time_hkflag").css("display","none");
                    $("#time_mcflag").css("display","none");
                    $("#time_saflag").css("display","none");
                    $("#time_auflag").css("display","none");
                    $("#time_euflag").css("display","");
                } 

                LoadListRaceCardIDChange();
        }).trigger('change');

        $('#cmbRaceCardID').change(function()
            {  
                LoadListRaceInfoChange();
        }).trigger('change');
});
function ChangeText()
{
    alert(1);
}
function ClearInternet()
{
    $("#txtIT").val("");
    $("#txtET").val("");
    $("#txtIT1").val("");
    $("#txtITP1").val("");
    $("#txtIT2").val("");
    $("#txtITP2").val("");
    $("#txtIT3N").val("");
    $("#txtITP3N").val("");
    $("#txtIT3").val("");
    $("#txtITP3").val("");
    $("#txtIT4").val("");
    $("#txtITP4").val("");
    $("#txtIT5").val("");
    $("#txtITP5").val("");
}

function UpdateInTicket()
{
    var itemIT_2 = $("#txtIT").val();
    var itemET_2 = $("#txtET").val();
    var itemIT_3_1 = $("#txtIT1").val();
    var itemIT_3_2 = $("#txtITP1").val();
    var itemIT_3_3 = $("#txtIT3N").val(); 
    var itemET_3_1 = $("#txtIT2").val();
    var itemET_3_2 = $("#txtITP2").val();
    var itemET_3_3 = $("#txtITP3N").val();
    var itemIT_4_1 = $("#txtIT3").val();
    var itemIT_4_2 = $("#txtITP3").val();
    var itemIT_4_3 = $("#txtIT5").val();
    var itemET_4_1 = $("#txtIT4").val();
    var itemET_4_2 = $("#txtITP4").val();
    var itemET_4_3 = $("#txtITP5").val();
    var itemEnNetTic_2 = "Net Tic";
    var itemCnNetTic_2 = "网出票";
    var itemEnNetTic_3 = "RM ";
    var itemCnNetTic_3 = "RM ";
    var itemEnNetTic_4 = "$ ";
    var itemCnNetTic_4 = "$ ";

    itemEnNetTic_2 = itemEnNetTic_2 + " "+ itemIT_2 + " Et" + " " + itemET_2;
    itemCnNetTic_2 = itemCnNetTic_2 + " "+ itemIT_2 + " 早票" + " " + itemET_2;
    $("#txtHeader2").val(itemEnNetTic_2);
    $("#txtHeader2Man").val(itemCnNetTic_2);
    itemEnNetTic_3 = itemEnNetTic_3 + " ("+itemIT_3_1+")" + itemIT_3_2 + " ("+itemET_3_1+")" + itemET_3_2 + " ("+itemIT_3_3+")" + itemET_3_3;
    itemCnNetTic_3 = itemCnNetTic_3 + "("+itemIT_3_1+")" + itemIT_3_2 + " ("+itemET_3_1+")" + itemET_3_2  + " ("+itemIT_3_3+")" + itemET_3_3;

    $("#txtHeader3").val(itemEnNetTic_3);
    $("#txtHeader3Man").val(itemCnNetTic_3); 


    itemEnNetTic_4 = itemEnNetTic_4 + " ("+itemIT_4_1+")" + itemIT_4_2 + " ("+itemET_4_1+")" + itemET_4_2 + " ("+itemIT_4_3+")" + itemET_4_3;
    itemCnNetTic_4 = itemCnNetTic_4 + "("+itemIT_4_1+")" + itemIT_4_2 + " ("+itemET_4_1+")" + itemET_4_2  + " ("+itemIT_4_3+")" + itemET_4_3;

    $("#txtHeader4").val(itemEnNetTic_4);
    $("#txtHeader4Man").val(itemCnNetTic_4);

    saveRaceInfo3();
}

function saveRaceInfo3(list_info)
{
    // phan header 
    var items1en;
    var items1cn;
    // if($("#ch_header1").is(":checked"))
    // {
    //     items1en = "";
    //     items1cn = "";
    // }
    // else
    // {
    //     items1en = $("#txtHeader1").val();
    //     items1cn = $("#txtHeader1Man").val();
    // }
    items1en     = $("#txtHeader1").val();
    items1cn     = $("#txtHeader1Man").val();
    var items2en = $("#txtHeader2").val();
    var items2cn = $("#txtHeader2Man").val();
    var items3en = $("#txtHeader3").val();
    var items3cn = $("#txtHeader3Man").val();
    var items4en = $("#txtHeader4").val();
    var items4cn = $("#txtHeader4Man").val();
    var Race     = $("#cmbRace").val();
    var Country  = $("#txtCountry").val();
    var RaceID   = $("#cmbRaceCardID").val();
    var list_info3 = [];
    var item = {
        header1:items1en,
        header2:items2en,
        header3:items3en,
        header4:items4en,
        headercn1:items1cn,
        headercn2:items2cn,
        headercn3:items3cn,
        headercn4:items4cn
    };
    list_info3[0] = item;

    // internet Ticket Price
    var itemIT_2 = $("#txtIT").val();
    var itemET_2 = $("#txtET").val();
    var itemIT_3_1 = $("#txtIT1").val();
    var itemIT_3_2 = $("#txtITP1").val(); 
    var itemET_3_1 = $("#txtIT2").val();
    var itemET_3_2 = $("#txtITP2").val();
    var itemIT_4_1 = $("#txtIT3").val();
    var itemIT_4_2 = $("#txtITP3").val();
    var itemET_4_1 = $("#txtIT4").val();
    var itemET_4_2 = $("#txtITP4").val();
    var itemET_5_1 = $("#txtIT3N").val();
    var itemET_5_2 = $("#txtITP3N").val();
    var itemET_6_1 = $("#txtIT5").val();
    var itemET_6_2 = $("#txtITP5").val();
    var ITPH3      = itemIT_3_1 + "|" + itemIT_3_2;
    var ITPH4      = itemIT_4_1 + "|" + itemIT_4_2;
    var ITPH5      = itemET_3_1 + "|" + itemET_3_2;
    var ITPH6      = itemET_4_1 + "|"  + itemET_4_2;
    var ITPH7      = itemET_5_1 + "|"  + itemET_5_2;
    var ITPH8      = itemET_6_1 + "|"  + itemET_6_2;
    if(RaceID != "")
    {
        $.ajax({
            type:"POST",
            url:"home_controller/saveRaceInfo3",
            dataType:"text",
            data: {
                Race:Race,
                Country:Country,
                RaceID:RaceID,
                items1en:items1en,
                items1cn:items1cn,
                items2en:items2en,
                items2cn:items2cn,
                items3en:items3en,
                items3cn:items3cn,
                items4en:items4en,
                items4cn:items4cn,
                itemIT_2:itemIT_2,
                itemET_2:itemET_2,
                ITPH3:ITPH3,
                ITPH4:ITPH4,
                ITPH5:ITPH5,
                ITPH6:ITPH6,
                ITPH7:ITPH7,
                ITPH8:ITPH8
            },
            cache:false,
            success:function (data) {
                saveRaceInfo3_Complete(data,JSON.stringify(list_info3));
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
    }
    else
    {

    } 
}

function saveRaceInfo3_Complete(data,list_info)
{
    LoadListRaceInfoChange();
    var country = $("#cmbRace").val();
    var sRes = JSON.parse(data);
    var result = sRes.result;
    if(result == 1 || result == "1")
    {
        var trans = {};
        trans.header1     = sRes.header1;
        trans.header2     = sRes.header2;
        trans.header3     = sRes.header3;
        trans.header4     = sRes.header4;
        trans.header1_cn  = sRes.header1_cn;
        trans.header2_cn  = sRes.header2_cn;
        trans.header3_cn  = sRes.header3_cn;
        trans.header4_cn  = sRes.header4_cn;          
        var Rel  = country + "|" + JSON.stringify(trans);
        socket_race.emit('RefreshRaceInfo_1234', Rel);
    } 
}

function StartTime()
{
    var starttime = $("#txtMin").val();
    var Race     = $("#cmbRace").val();
    var value     = Race + "|" + starttime;
    //var converttime = ConvertTime(starttime);
    socket_race.emit('StartTime', value);
    //socket_race.emit('ReloadPage', value); 
    var timer = parseFloat(starttime*60); 
}

socket_race.on('StartTime',function(res)
    {
        //var country_url = current_country;
        if(res[0] != "")
            load_time_country("MY",res[0]);
        if(res[1] != "")
            load_time_country("SG",res[1]);
        if(res[2] != "")
            load_time_country("HK",res[2]);
        if(res[3] != "")
            load_time_country("MC",res[3]);
        if(res[4] != "")
            load_time_country("SA",res[4]);
        if(res[5] != "")
            load_time_country("AU",res[5]);
        if(res[6] != "")
            load_time_country("EU",res[6]);
});

function load_time_country(country,time)
{
    switch(country)
    {
        case "MY":
            countdown_my(time);
            break;
        case "SG":
            countdown_sg(time);
            break;
        case "HK":
            countdown_hk(time);
            break;
        case  "MC":
            countdown_mc(time);
            break;
        case "SA": 
            countdown_sa(time);
            break;
        case "AU": 
            countdown_au(time);
            break;
        case "EU": 
            countdown_eu(time);
            break;
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

    var ex_count        = parseFloat(Count)-1;
    CounterHandle_MY    = setInterval(function (){
        if(ex_count >= 0)
            countdown_my(ex_count);
        }, 1000);
}
function countdown_sg(Count)
{
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
    $("#time_hkflag").html(time);
    var ex_count = parseFloat(Count)-1;
    CounterHandle_HK = setInterval(function (){
        if(ex_count >= 0)
            countdown_hk(ex_count);
        }, 1000);
}

function countdown_mc(Count)
{
    var country = $("#cmbRace").val();
    clearInterval(CounterHandle_MC);
    var min = Math.floor(Count/60);
    if(min < 10)
        min = "0" + min;
    var second = Count%60;
    if(second < 10)
        second = "0" + second;
    var time = min + ":" + second;
    $("#time_mcflag").html(time);
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
    var ex_count = parseFloat(Count)-1;
    CounterHandle_EU = setInterval(function (){
        if(ex_count>=0)
            countdown_eu(ex_count);
        }, 1000);
}

function StopTime(){
    var Race     = $("#cmbRace").val();
    var value  = Race + "|stoptime";
    switch(Race)
    {
        case "MY": clearInterval(Set_Interval_MY);
        case "SG": clearInterval(Set_Interval_SG);
        case "HK": clearInterval(Set_Interval_HK);
        case "MC": clearInterval(Set_Interval_MC);
        case "SA": clearInterval(Set_Interval_SA);
        case "EU": clearInterval(Set_Interval_EU);
        case "AU": clearInterval(Set_Interval_AU);
    }  
    socket_race.emit('StopTime', value);
}

socket_race.on('StopTime', function(res)
    {
        var country = res.split('|')[0];
        //var country_url = chooseCountry;
        switch(country)
        {
            case "MY":  clearInterval(CounterHandle_MY);
                $("#time_myflag").html("00:00");
                break;

            case  "SG": clearInterval(CounterHandle_SG);
                $("#time_sgflag").html("00:00");
                break;

            case   "HK":clearInterval(CounterHandle_HK);
                $("#time_hkflag").html("00:00");
                break;

            case    "MC": clearInterval(CounterHandle_MC);
                $("#time_mcflag").html("00:00");
                break;

            case    "SA":  clearInterval(CounterHandle_SA);
                $("#time_saflag").html("00:00");
                break;

            case    "AU": clearInterval(CounterHandle_AU);
                $("#time_auflag").html("00:00");
                break;

            case    "EU": clearInterval(CounterHandle_EU);
                $("#time_euflag").html("00:00");
                break;
        }

        //LoadTimeFlag();       
});

function LoadListRaceCardIDChange(){
    var contry = $("#cmbRace").val();
    //var RaceCardID = $("#cmbRaceCardID").val();
    $.ajax({
        type:"POST",
        url:"home_controller/loadRCID",
        dataType:"text",
        data: {contry: contry},
        cache:false,
        success:function (data) {
            loadRaceCard_Complete(data);
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    }); 
}

function loadRaceCard_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.RCID != null || sRes.RCID != "" )
    {
        var listRCID =  sRes.RCID;
        var listMeter = sRes.Meter;

        var str = "";
        for(var i = 0;i < listRCID.length ; i++){
            if(listRCID[i].Meter != null && listRCID[i].Meter != ""){  
                str = str + "<option value="+ listRCID[i].RaceID +">"+ listRCID[i].RaceID+"M"+listRCID[i].Meter +"</option>"; 
            }
            else {
                str = str + "<option value="+ listRCID[i].RaceID +">"+ listRCID[i].RaceID +"</option>";   
            } 
        } 
        $("#cmbRaceCardID").html(str);
        LoadListRaceInfoChange();
    }
}

function LoadListRaceInfoChange(){
    var contry = $("#cmbRace").val();
    var RaceCardID = $("#cmbRaceCardID").val();
    $.ajax({
        type:"POST",
        url:"home_controller/loadRaceInfo",
        dataType:"text",
        data: {
            contry: contry,
            RaceCardID:RaceCardID
        },
        cache:false,
        success:function (data) {
            loadRaceInfo_Complete(data);
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}


function loadRaceInfo_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.RaceInfo != null || sRes.RaceInfo !="")
    {
        var info = sRes.RaceInfo;   
        // console.log(info[0]);
        if(info.length > 0)
        {
            $("#txtHeader1").val(info[0].items1en);
            $("#txtHeader2").val(info[0].items2en);

            if(info[0].items3en != "RM  () () ()")
            {
                $("#txtHeader3").val(info[0].items3en);  
                $("#txtHeader3Man").val(info[0].items3cn);
            }
            else
            {
                $("#txtHeader3").val("");  
                $("#txtHeader3Man").val("");
            }              
            if(info[0].items4en != "$  () () ()")
            {
                $("#txtHeader4").val(info[0].items4en);
                $("#txtHeader4Man").val(info[0].items4cn);
            }
            else
            {
                $("#txtHeader4").val(""); 
                $("#txtHeader4Man").val("");
            }
            $("#txtHeader1Man").val(info[0].items1cn);
            $("#txtHeader2Man").val(info[0].items2cn);



            // internet ticket price
            $("#txtIT").val(info[0].ITPH2); 
            $("#txtET").val(info[0].ITPET);
            var itph3 = info[0].ITPH3;
            if(itph3 != null && itph3 != "")
            {
                var  itph3_edit = itph3.split('|');
                $("#txtIT1").val(itph3_edit[0]);
                $("#txtITP1").val(itph3_edit[1]);
            } 

            var itph5 = info[0].ITPH5;
            if(itph5 != null && itph5 != ""){
                itph5    = itph5.split('|');
                $("#txtIT2").val(itph5[0]);
                $("#txtITP2").val(itph5[1]);
            }


            var  itph4 = info[0].ITPH4;
            if(itph4 != null && itph4 != "")
            {
                itph4  = itph4.split('|');
                $("#txtIT3").val(itph4[0]);
                $("#txtITP3").val(itph4[1]);
            }

            var  itph6 = info[0].ITPH6;
            if(itph6 != null && itph6 !="")
            {
                itph6  = itph6.split('|');
                $("#txtIT4").val(itph6[0]);
                $("#txtITP4").val(itph6[1]); 
            }
            var itph7 = info[0].ITPH7;
            if(itph7 != null && itph7 != "")
            {
                itph7 = itph7.split("|");
                $("#txtIT3N").val(itph7[0]);
                $("#txtITP3N").val(itph7[1]);
            }
            var itph8 = info[0].ITPH8;
            if(itph8 != null && itph8 != "")
            {
                itph8 = itph8.split("|");
                $("#txtIT5").val(itph8[0]);
                $("#txtITP5").val(itph8[1]);
            }  

            // winner horser
            var WinNo1     = info[0].win1A;
            var WinNo_1P   = info[0].win1P;
            var WinNo2     = info[0].win2A;
            var WinNo_2P   = info[0].win2P;
            var WinNo3     = info[0].win3A;
            var WinNo_3P   = info[0].win3P;
            var WinNo4     = info[0].win4A;
            var WinNo_4P   = info[0].win4P;

            if(WinNo1 != null || WinNo1 != ""){
                WinNo1 = WinNo1.split("|");
                $("#txtWinNo").val(WinNo1[0]);
                $("#txtWinBy1").val(WinNo1[1]);
            } 

            if(WinNo2 != null || WinNo2 !=""){
                WinNo2 = WinNo2.split("|");
                $("#txtWinNo2").val(WinNo2[0]);
                $("#txtWinBy2").val(WinNo2[1]);
            }

            if(WinNo3 != null || WinNo3 !=""){
                WinNo3 = WinNo3.split("|");
                $("#txtWinNo3").val(WinNo3[0]);
                $("#txtWinBy3").val(WinNo3[1]);
            }

            if(WinNo4 != null || WinNo4 != ""){
                WinNo4 = WinNo4.split("|");
                $("#txtWinNo4").val(WinNo4[0]);
                $("#txtWinBy4").val(WinNo4[1]);
            }


            $("#cmbUnit1 option[value='"+WinNo_1P+"']").attr("selected", "selected");
            $("#cmbUnit2 option[value='"+WinNo_2P+"']").attr("selected", "selected");
            $("#cmbUnit3 option[value='"+WinNo_3P+"']").attr("selected", "selected");
            $("#cmbUnit4 option[value='"+WinNo_4P+"']").attr("selected", "selected");
            //$("#txtHeader1").val(" ");
        }
    }
    if(sRes.RaceInfo == null || sRes.RaceInfo == ""){
        $("#txtWinNo").val("");
        $("#txtWinNo2").val("");
        $("#txtWinNo3").val("");
        $("#txtWinNo4").val("");
        $("#txtWinBy1").val("");
        $("#txtWinBy2").val("");
        $("#txtWinBy3").val("");
        $("#txtWinBy4").val("");
        $("#cmbUnit1").find('option:selected').removeAttr("selected");
        $("#cmbUnit2").find('option:selected').removeAttr("selected");
        $("#cmbUnit3").find('option:selected').removeAttr("selected");
        $("#cmbUnit4").find('option:selected').removeAttr("selected"); 

        $("#txtHeader1").val(" ");
        $("#txtHeader2").val(" ");
        $("#txtHeader3").val(" ");
        $("#txtHeader4").val(" ");
        $("#txtHeader1Man").val(" ");
        $("#txtHeader2Man").val(" ");
        $("#txtHeader3Man").val(" ");
        $("#txtHeader4Man").val(" ");
    }
}

$('#btnClear_Hearder').bind("click",function(){
    $("#txtHeader1").val("");
    $("#txtHeader2").val("");
    $("#txtHeader3").val("");
    $("#txtHeader4").val("");
    $("#txtHeader1Man").val("");
    $("#txtHeader2Man").val("");
    $("#txtHeader3Man").val("");
    $("#txtHeader4Man").val("");

});

// button Save header 1,2,3,4
function SaveDetail1234(){
    // phan header 
    var items1en = $("#txtHeader1").val();
    var items1cn = $("#txtHeader1Man").val();
    var items2en = $("#txtHeader2").val();
    var items2cn = $("#txtHeader2Man").val();
    var items3en = $("#txtHeader3").val();
    var items3cn = $("#txtHeader3Man").val();
    var items4en = $("#txtHeader4").val();
    var items4cn = $("#txtHeader4Man").val();
    var Race     = $("#cmbRace").val();
    var Country  = $("#txtCountry").val();
    var RaceID   = $("#cmbRaceCardID").val();
    var list_1234 = [];
    if(RaceID != "")
    {
        var item = {
            header1:items1en,
            header2:items2en,
            header3:items3en,
            header4:items4en,
            headercn1:items1cn,
            headercn2:items2cn,
            headercn3:items3cn,
            headercn4:items4cn
        };
        list_1234[0] = item;        
        $.ajax({
            type:"POST",
            url:"home_controller/saveRaceInfo2",
            dataType:"text",
            data: {
                Race:Race,
                Country:Country,
                RaceID:RaceID,
                items1en:items1en,
                items1cn:items1cn,
                items2en:items2en,
                items2cn:items2cn,
                items3en:items3en,
                items3cn:items3cn,
                items4en:items4en,
                items4cn:items4cn

            },
            cache:false,
            success:function (data) {
                saveRaceInfo2_Complete(data,JSON.stringify(list_1234));
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        }); 
    }
    else
    {
        alert("Race Card ID haven't. Please choose or creaded Race Card");
    }
}

function saveRaceInfo2_Complete(data,list_info)
{
    LoadListRaceInfoChange();
    var country = $("#cmbRace").val();
    var sRes = JSON.parse(data);
    if(sRes.result == 1 || sRes.result == "1")
    {
        var trans = {};
        trans.header1     = sRes.header1;
        trans.header2     = sRes.header2;
        trans.header3     = sRes.header3;
        trans.header4     = sRes.header4;
        trans.header1_cn  = sRes.header1_cn;
        trans.header2_cn  = sRes.header2_cn;
        trans.header3_cn  = sRes.header3_cn;
        trans.header4_cn  = sRes.header4_cn;
        console.log(trans);
        var Rel = country + "|" + JSON.stringify(trans); 
        socket_race.emit('RefreshRaceInfo_1234', Rel);
    }
}

function Refresh()
{
    console.log($.cookie("_country"));
    document.location.href = "net_ticket";
}