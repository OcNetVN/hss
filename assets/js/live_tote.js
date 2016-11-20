var arr_newMal = [];
var arr_newMalPlace = [];
var arr_oldMal = [];
var arr_oldMalPlace = [];
var arr_newSin = [];
var arr_newSinPlace = [];
var arr_oldSin = [];
var arr_oldSinPlace = [];
var ListMalay = null;
var ListSing  = null;

$(document).ready(function() 
    {
        // show default flag mal
        $("#div_Flag_MY").show();
        // end show default 
        $("#ChooseCountry").change(function()
            {
                // set arr_show node js Maylay null and arr_show node js sing
                ListMalay = null;
                ListSing  = null;

                $("div[id*='div_Flag_']").hide(0)
                var country = $("#ChooseCountry").val();
                $("#div_Flag_" + country).show();
                var showflag = 0;
                if($('#check_Flag_' + country).is(':checked'))
                {
                    showflag = 1;
                }
                // hiển thị danh sách race no có
                Select_RaceNoSin();
        });
        Select_RaceNoSin();

        // check 4 digit number
        function isNumber (o) 
        {
            return ! isNaN (o-0);
        }  

        //1st 2nd 3rd only can key in 4 digit number
        $("input[id*='inputmal_']").keyup(function(e)
            {
                txtVal = $(this).val(); 
                txtVal = $.trim(txtVal);
                if(txtVal.length > 3)
                {
                    $(this).val(txtVal.substring(0,3))
                }
        }); 

        $("input[id*='inputsin_']").keyup(function(e)
            {
                txtVal = $(this).val(); 
                txtVal = $.trim(txtVal);
                var country = $("#ChooseCountry").val();
                if(country == "HK")
                {
                    if(txtVal.length > 4)
                    {
                        $(this).val(txtVal.substring(0,4));
                    }
                }
                else
                {
                    if(txtVal.length > 3)
                    {
                        $(this).val(txtVal.substring(0,3))
                    }
                }
        });

});

$("input[id*='inputmal_']" ).keypress(function (event) 
    {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == 13) 
        {
            SaveToteMala();
            return false;   
        }
});

$("input[id*='inputsin_']" ).keypress(function (event) 
    {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == 13) 
        {
            SaveToteSin();
            return false;   
        }
});

$("input[id*='check_Flag_']").click(function () 
    {
        var country = $("#ChooseCountry").val();
        var showflag = 0;
        if($('#check_Flag_' + country).is(':checked'))
        {
            showflag = 1;
        }
        else
        {
            showflag = 0;
        }
        tickflagcountry(country,showflag);
});

function ClearMala()
{
    $( "input[id*='inputmal_']" ).val("");
}

function InsertMala999()
{
    $( "input[id*='inputmal_']" ).val("999");
}

function ClearSin()
{
    $( "input[id*='inputsin_']" ).val("");
}

function InsertSin999()
{
    $( "input[id*='inputsin_']" ).val("999");
}

function tickflagcountry(country,showinfo)
{
    $.ajax({
        type:"POST",
        url:"home_controller/tickflagcountry",
        dataType:"text",
        data: {  country:country, 
            showinfo:showinfo
        },
        cache:false,
        success:function(data) 
        {
            tickflagcountry_Complete(data,country);
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function tickflagcountry_Complete(data,country)
{
    var sRes = JSON.parse(data);
    var Rel;
    var listflag;
    if(sRes.result == 1 || sRes.result == "1")
    {
        listflag   = sRes.arr_flag;
        Rel = country + "|" + listflag + "|" + ListMalay + "|" + ListSing;
        socket.emit('RefreshLiveTote',Rel);
    }
}

var settingtime = 0;
var deltaSecond = 0;
var deltaMinute = 0;
var deltaHour = 0;
var isStartTimer = false;
function Select_RaceNoSin()
{
    var RaceCountry = $("#ChooseCountry").val();
    $.ajax({
        type:"POST",
        url:"home_controller/getSelectRaceSin",
        dataType:"text",
        data: {raceCountry: RaceCountry},
        cache:false,
        success:function (data) {
            SelectRaceNoSin_Complete(data);
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });

}

function SelectRaceNoSin_Complete(data)
{
    //ListSing  = null;
    //ListMalay = null;
    var sRes = JSON.parse(data);    

    if(sRes.list_mal != null || sRes.list_mal != "" )
    {
        var listwin =  sRes.list_mal;
        if(listwin.length > 0)
        {
            for(var i = 0;i < listwin.length ; i++)
            {
                var raceNo  = listwin[i].RaceNo;
                raceNo = raceNo.substring(raceNo.length-2,raceNo.length);
                raceNo = parseInt(raceNo) - 1;

                var winMal   = listwin[i].Win;

                winMal = winMal.replace(".00","");
                if(winMal == -1 || winMal == "-1"){
                    winMal = "SCR";
                }
                if(winMal == 0 || winMal == "0"){
                    winMal = "";
                } 
                // console.log(winMal);
                var placeMal = listwin[i].Place;
                placeMal = placeMal.replace(".00","");
                if(placeMal == -1 || placeMal == "-1"){
                    placeMal = "SCR";
                }
                if(placeMal == 0 || placeMal == "0"){
                    placeMal = "";
                }                
                $("#tbGetToteMala tbody tr:eq(0) td:eq("+raceNo+") input").val(winMal);  
                $("#tbGetToteMala tbody tr:eq(1) td:eq("+raceNo+") input").val(placeMal);
                // lưu tạm array live to of race mala 9/8/2015
                arr_oldMal[i]       = winMal;
                arr_oldMalPlace[i]  = placeMal;
            }
        }
        else
        {
            arr_oldMal          = [];
            arr_oldMalPlace     = [];
        }
    }

    if(sRes.list_mal == null || sRes.list_mal == "")
    {
        for(var i = 0 ; i < 20;i++)
        {
            $("#tbGetToteMala tbody tr:eq(0) td:eq("+i+") input").val(" ");   
            $("#tbGetToteMala tbody tr:eq(1) td:eq("+i+") input").val(" ");  
        }
    }

    if(sRes.list_sin != null || sRes.list_sin != "" )
    {
        var listsin =  sRes.list_sin;
        if(listsin.length > 0)
        {
            for(var j = 0;j < listsin.length ; j++)
            {
                var raceNoPlace =  listsin[j].RaceNo;
                raceNoPlace    = raceNoPlace.substring(raceNoPlace.length-2,raceNoPlace.length);
                raceNoPlace    = parseInt(raceNoPlace) - 1;
                var winSin   = listsin[j].Win;
                winSin = winSin.replace(".00","");
                if(winSin == -1 || winSin == "-1")
                    winSin = "";
                if(winSin == 0 || winSin == "0"){
                    winSin = "";
                } 
                var placeSin = listsin[j].Place;
                placeSin = placeSin.replace(".00","");
                if(placeSin == -1 || placeSin == "-1")
                    placeSin = "";
                if(placeSin == 0 || placeSin == "0"){
                    placeSin = "";
                }

                $("#tbGetToteSIN tbody tr:eq(0) td:eq("+raceNoPlace+") input").val(eval(winSin));
                $("#tbGetToteSIN tbody tr:eq(1) td:eq("+raceNoPlace+") input").val(eval(placeSin));
                // lưu tạm array live to of race sin 9/8/2015 
                arr_oldSin[j] = winSin;
                arr_oldSinPlace[j] = placeSin;   
            }
        }
        else
        {
            arr_oldSin = [];
            arr_oldSinPlace = [];
        }
    }
    if(sRes.list_sin == null || sRes.list_sin == "")
    {
        for(var i = 0 ; i < 20;i++)
        {
            $("#tbGetToteSIN tbody tr:eq(0) td:eq("+i+") input").val(" ");
            $("#tbGetToteSIN tbody tr:eq(1) td:eq("+i+") input").val(" ");   
        }
    }


    if(sRes.flag == 1 || sRes.flag == "1")
    {
        var country = sRes.country;
        $('#check_Flag_' + country).prop('checked', true);
    }
}

function Select_RaceNo()
{
    var RaceCountry = $("#ChooseCountry").val();
    $.ajax({
        type:"POST",
        url:"home_controller/getSelectRace",
        dataType:"text",
        data: {raceCountry: RaceCountry},
        cache:false,
        success:function (data) {
            SelectRaceNo_Complete(data);
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });    
}

function SelectRaceNo_Complete(data)
{
    var sRes = JSON.parse(data);
    console.log(sRes);
    if(sRes.list_win_mal != null || sRes.list_win_mal != "" )
    {
        var listwin =  sRes.list_win_mal;
        for(var i = 0;i < listwin.length ; i++){
            var RaceNoWin = listwin[i].RaceNo;
            RaceNoWin     = RaceNoWin.substring(RaceNoWin.length-2,RaceNoWin.length);
            RaceNoWin     = parseInt(RaceNoWin) - 1;
            var winAmt  = listwin[i].Win;
            winAmt = winAmt.replace(".00","");
            if(winAmt == 0 || winAmt == "0"){
                winAmt = "";
            } 
            $("#tbGetToteMala tbody tr:eq(0) td:eq("+ RaceNoWin +") input").val(winAmt);    
        }
    }

    if(sRes.list_win_mal == null || sRes.list_win_mal == ""){
        for(var i = 0 ; i < 20;i++){
            $("#tbGetToteMala tbody tr:eq(0) td:eq("+i+") input").val(" ");   
        }
    }

    if(sRes.list_place_mal != null || sRes.list_place_mal != "" ){
        var listplace =  sRes.list_place_mal;
        for(var j = 0;j < listplace.length ; j++){
            var RaceNoPlace = listplace[j].RaceNo;
            RaceNoPlace  = RaceNoPlace.substring(RaceNoPlace.length-2,RaceNoPlace.length);
            RaceNoPlace  = parseInt(RaceNoPlace) - 1;
            var placeAmt  = listplace[j].Place;
            placeAmt = placeAmt.replace(".00","");
            if(placeAmt == 0 || placeAmt == "0"){
                placeAmt = "";
            } 
            $("#tbGetToteMala tbody tr:eq(1) td:eq("+ RaceNoPlace +") input").val(placeAmt);    
        }
    }

    if(sRes.list_place_mal == null || sRes.list_place_mal == "")
    {
        for(var i = 0 ; i < 20;i++)
        {
            $("#tbGetToteMala tbody tr:eq(1) td:eq("+i+") input").val(" ");   
        }
    }  
}

function SaveToteMala()
{
    // get array new input 08/09/2015
    for(var i = 0;i<20;i++)
    {
        var value_WinMal   = $("#inputmal_1_"+(i+1)).val();
        if(value_WinMal.indexOf("-") > -1)
            value_WinMal = "SCR";
        var value_placeMal = $("#inputmal_2_"+(i+1)).val();
        if(value_placeMal.indexOf("-") > -1)
            value_placeMal = "SCR";
        arr_newMal[i]      =  value_WinMal;
        arr_newMalPlace[i] =  value_placeMal;
    }

    // get data live send for node js apk 09/09/2015
    var sumtablemal = $('table#tbGetToteMala tbody tr:last').index() + 1;
    //alert(sumtablemal);
    if (sumtablemal > 0) {
        var i = 0;
        var list = [];
        while (i < sumtablemal) {
            var racenomala = {};
            racenomala[0] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(0)").find("input").val();
            if(racenomala[0].indexOf("-") > -1)
                racenomala[0] = "SCR";
            racenomala[1] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(1)").find("input").val();
            if(racenomala[1].indexOf("-") > -1)
                racenomala[1] = "SCR";
            racenomala[2] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(2)").find("input").val();
            if(racenomala[2].indexOf("-") > -1)
                racenomala[2] = "SCR";
            racenomala[3] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(3)").find("input").val();
            if(racenomala[3].indexOf("-") > -1)
                racenomala[3] = "SCR";
            racenomala[4] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(4)").find("input").val();
            if(racenomala[4].indexOf("-") > -1)
                racenomala[4] = "SCR";
            racenomala[5] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(5)").find("input").val();
            if(racenomala[5].indexOf("-") > -1)
                racenomala[5] = "SCR";
            racenomala[6] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(6)").find("input").val();
            if(racenomala[6].indexOf("-") > -1)
                racenomala[6] = "SCR";
            racenomala[7] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(7)").find("input").val();
            if(racenomala[7].indexOf("-") > -1)
                racenomala[7] = "SCR";
            racenomala[8] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(8)").find("input").val();
            if(racenomala[8].indexOf("-") > -1)
                racenomala[8] = "SCR";
            racenomala[9] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(9)").find("input").val();
            if(racenomala[9].indexOf("-") > -1)
                racenomala[9] = "SCR";
            racenomala[10] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(10)").find("input").val();
            if(racenomala[10].indexOf("-") > -1)
                racenomala[10] = "SCR";
            racenomala[11] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(11)").find("input").val();
            if(racenomala[11].indexOf("-") > -1)
                racenomala[11] = "SCR";
            racenomala[12] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(12)").find("input").val();
            if(racenomala[12].indexOf("-") > -1)
                racenomala[12] = "SCR";
            racenomala[13] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(13)").find("input").val();
            if(racenomala[13].indexOf("-") > -1)
                racenomala[13] = "SCR";
            racenomala[14] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(14)").find("input").val();
            if(racenomala[14].indexOf("-") > -1)
                racenomala[14] = "SCR";
            racenomala[15] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(15)").find("input").val();
            if(racenomala[15].indexOf("-") > -1)
                racenomala[15] = "SCR";
            racenomala[16] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(16)").find("input").val();
            if(racenomala[16].indexOf("-") > -1)
                racenomala[16] = "SCR";
            racenomala[17] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(17)").find("input").val();
            if(racenomala[17].indexOf("-") > -1)
                racenomala[17] = "SCR";
            racenomala[18] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(18)").find("input").val();
            if(racenomala[18].indexOf("-") > -1)
                racenomala[18] = "SCR";
            racenomala[19] = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(19)").find("input").val();
            if(racenomala[19].indexOf("-") > -1)
                racenomala[19] = "SCR";
            list[i] = racenomala;       
            i = i + 1;      
        }
        ListMalay = JSON.stringify(list);
    }
    // so sanh array_old and array_ new 
    SoSanhMal();
}

function SoSanhMal()
{
    var horseNo = "";
    var country = $("#ChooseCountry").val();
    var list       = [];
    var list_place = [];
    var listMalWin = [];
    var listMalPlace = [];
    var listflag;
    var win;
    var place;
    var dem = 0;
    //console.log(arr_oldMal);
    //console.log(arr_oldMalPlace);

    if(arr_oldMal.length > 0)
    {
        for(var i=0;i<arr_oldMal.length;i++)
        {
            if(arr_newMal[i] != arr_oldMal[i])
            {
                var json_MalWin = {};
                horseNo = i+1;
                list.push(horseNo);
                win =  list;
                json_MalWin.horseNo = i;
                json_MalWin.Win     = arr_newMal[i];
                listMalWin[dem]     = json_MalWin;
                dem++;
            }
        }
    }
    else
    {
        for(var i=0;i<arr_newMal.length;i++)
        {
            var json_MalWinNew = {};
            json_MalWinNew.horseNo = i;
            json_MalWinNew.Win     = arr_newMal[i];
            listMalWin[i]          = json_MalWinNew;
            //console.log(listMalWin);
        }
    }
    dem = 0;
    if(arr_oldMalPlace.length > 0)
    {
        for(var i=0;i<arr_oldMalPlace.length;i++)
        {
            if(arr_newMalPlace[i] != arr_oldMalPlace[i])
            {
                var json_MalPlace = {};
                horseNo = i+1;
                list_place.push(horseNo);
                place =  list_place;
                json_MalPlace.horseNo = i;
                json_MalPlace.Place   = arr_newMalPlace[i];
                listMalPlace[dem]     = json_MalPlace;
                dem++;
            }
        }
    }
    else
    {
        for(var i=0;i<arr_newMalPlace.length;i++)
        {
            var json_MalPlaceNew = {};
            json_MalPlaceNew.horseNo = i;
            json_MalPlaceNew.Place   = arr_newMalPlace[i];
            listMalPlace[i] = json_MalPlaceNew; 
        } 
    }
    //console.log(listMalWin);
    //console.log(listMalPlace);
    // what is change then save to database
    SaveLiveToRaceMal(listMalWin,listMalPlace,win,place);
}

function SaveLiveToRaceMal(listMalWin,listMalPlace,win,place)
{
    var racecountry = $("#ChooseCountry").val();
    $.ajax({
        type:"POST",
        url:"home_controller/addlivetoMal",
        dataType:"text",
        data: {
            arr_MalWin: JSON.stringify(listMalWin),
            arr_MalPlace: JSON.stringify(listMalPlace),
            raceCountry: racecountry
        },
        cache:false,
        success:function (data) {
            AddlivetoMal_Complete(data,win,place);
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function AddlivetoMal_Complete(data,win,place)
{
    if (!isStartTimer)
    {
        // Start the timer
        isStartTimer = true;
        settingtime = setInterval ( "Setting()", 1000 );
    }
    else
    {
        $("#settimeHour").html("00:");
        $("#settimeMinute").html("00:");
        $("#settimeSecond").html("00");
        deltaSecond=0;
        deltaMinute=0;
        deltaHour=0;
    }

    var country = $("#ChooseCountry").val();
    var sRes = JSON.parse(data);
    listflag = sRes.flag_tick;
    sRel = country + "|MY/" + win + "#" + place + "|" + listflag + "|" + ListMalay + "|" + ListSing;
    socket.emit('AutoHiliMalWin',sRel);
    //console.log(sRel);
    Select_RaceNoSin(); 
}

function SaveToteSin()
{

    // get array Sin new input 08/09/2015
    for(var i = 0;i<20;i++)
    {
        var value_Win      = $("#tbGetToteSIN tbody tr:eq(0) td:eq("+i+")").find("input").val();
        var value_Place    = $("#tbGetToteSIN tbody tr:eq(1) td:eq("+i+")").find("input").val();

        if(value_Win.indexOf("-") > -1)
            value_Win   = "SCR";
        if(value_Place.indexOf("-") > -1)
            value_Place = "SCR";

        arr_newSin[i]      =  value_Win;
        arr_newSinPlace[i] =  value_Place;
    }

    // get data sin live to send node js date 09/09/2015
    var sumtablemal = $('table#tbGetToteSIN tbody tr:last').index() + 1;
    //alert(sumtablemal);
    if (sumtablemal > 0) 
    {
        var i = 0;
        var list = [];
        while (i < sumtablemal) 
        {
            var racenomala = {};
            var sin_1 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(0)").find("input").val();
            var sin_2 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(1)").find("input").val();
            var sin_3 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(2)").find("input").val();
            var sin_4 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(3)").find("input").val();
            var sin_5 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(4)").find("input").val();
            var sin_6 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(5)").find("input").val();
            var sin_7 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(6)").find("input").val();
            var sin_8 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(7)").find("input").val();
            var sin_9 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(8)").find("input").val();
            var sin_10 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(9)").find("input").val();
            var sin_11 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(10)").find("input").val();
            var sin_12 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(11)").find("input").val();
            var sin_13 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(12)").find("input").val();
            var sin_14 = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(13)").find("input").val();
            var sin_15  = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(14)").find("input").val();
            var sin_16  = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(15)").find("input").val();
            var sin_17  = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(16)").find("input").val();
            var sin_18  = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(17)").find("input").val();
            var sin_19  = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(18)").find("input").val();
            var sin_20  = $("#tbGetToteSIN tbody tr:eq(" + i + ") td:eq(19)").find("input").val();
            if(sin_1.indexOf("-") > -1)
                sin_1 = "SCR";
            if(sin_2.indexOf("-") > -1)
                sin_2 = "SCR";
            if(sin_3.indexOf("-") > -1)
                sin_3 = "SCR";
            if(sin_4.indexOf("-") > -1)
                sin_4 = "SCR";
            if(sin_5.indexOf("-") > -1)
                sin_5 = "SCR";
            if(sin_6.indexOf("-") > -1)
                sin_6 = "SCR";
            if(sin_7.indexOf("-") > -1)
                sin_7 = "SCR";
            if(sin_8.indexOf("-") > -1)
                sin_8 = "SCR";
            if(sin_9.indexOf("-") > -1)
                sin_9 = "SCR";
            if(sin_10.indexOf("-") > -1)
                sin_10 = "SCR";
            if(sin_11.indexOf("-") > -1)
                sin_11 = "SCR";
            if(sin_12.indexOf("-") > -1)
                sin_12 = "SCR";
            if(sin_13.indexOf("-") > -1)
                sin_13 = "SCR";
            if(sin_14.indexOf("-") > -1)
                sin_14 = "SCR";
            if(sin_15.indexOf("-") > -1)
                sin_15 = "SCR";
            if(sin_16.indexOf("-") > -1)
                sin_16 = "SCR";
            if(sin_17.indexOf("-") > -1)
                sin_17 = "SCR";
            if(sin_18.indexOf("-") > -1)
                sin_18 = "SCR";
            if(sin_19.indexOf("-") > -1)
                sin_19 = "SCR";
            if(sin_20.indexOf("-") > -1)
                sin_20 = "SCR";
            racenomala[0] = sin_1;
            racenomala[1] = sin_2;
            racenomala[2] = sin_3;
            racenomala[3] = sin_4;
            racenomala[4] = sin_5;
            racenomala[5] = sin_6;
            racenomala[6] = sin_7;
            racenomala[7] = sin_8;
            racenomala[8] = sin_9;
            racenomala[9] = sin_10;
            racenomala[10] = sin_11;
            racenomala[11] = sin_12;
            racenomala[12] = sin_13;
            racenomala[13] = sin_14;
            racenomala[14] = sin_15;
            racenomala[15] = sin_16;
            racenomala[16] = sin_17;
            racenomala[17] = sin_18;
            racenomala[18] = sin_19;
            racenomala[19] = sin_20;
            list[i] = racenomala;
            i = i + 1;    
        }
        ListSing = JSON.stringify(list);
    }
    // end get data sin live to send node js date 09/09/2015
    SoSanhSin();
}

function SoSanhSin()
{
    var horseNo = "";
    var list = [];
    var list_place = [];
    var win;
    var listflag;
    var listSinWin = [];
    var listSinPlace = [];
    var place;
    var country = $("#ChooseCountry").val();
    // Sin Win
    // console.log(arr_oldSin);
    //console.log(arr_oldSinPlace);
    var dem = 0;
    if(arr_oldSin.length > 0)
    {
        for(var i=0;i<arr_oldSin.length;i++)
        {
            if(arr_newSin[i] != arr_oldSin[i])
            {
                var jsonSinWin = {};
                horseNo = i+1;
                list.push(horseNo);
                win = list;
                jsonSinWin.horseNo = i;
                jsonSinWin.Win     = arr_newSin[i];
                listSinWin[dem]    =  jsonSinWin;
                dem++; 
            }
        }
    }
    else
    {
        for(var i=0;i<20;i++)
        {
            var jsonSinWinNew = {};
            jsonSinWinNew.horseNo = i;
            jsonSinWinNew.Win     = arr_newSin[i];
            listSinWin[i]      =  jsonSinWinNew;
        }
    }
    // Sin Place 
    dem = 0;
    if(arr_oldSinPlace.length > 0)
    {
        for(var i=0;i<arr_oldSinPlace.length;i++)
        {
            if(arr_newSinPlace[i] != arr_oldSinPlace[i])
            {
                var jsonSinPlace = {};
                horseNo = i+1;
                list_place.push(horseNo);
                place = list_place;
                jsonSinPlace.horseNo = i;
                jsonSinPlace.Place   = arr_newSinPlace[i];
                listSinPlace[dem]    =  jsonSinPlace;
                dem++; 
            }
        }
    }
    else
    {
        for(var i=0;i<20;i++)
        {
            var jsonSinPlaceNew          = {};
            jsonSinPlaceNew.horseNo      = i;
            jsonSinPlaceNew.Place        = arr_newSinPlace[i];
            listSinPlace[i]              =  jsonSinPlaceNew;
        }
    }

    //console.log(listSinPlace);
    //console.log(listSinWin);
    // what is change then save to dabase 
    SaveLiveToRaceSin(listSinWin,listSinPlace,win,place);
}

function SaveLiveToRaceSin(listSinWin,listSinPlace,win,place)
{
    var racecountry = $("#ChooseCountry").val();
    $.ajax({
        type:"POST",
        url:"home_controller/addlivetoSin",
        dataType:"text",
        data: {
            arr_SinWin: JSON.stringify(listSinWin),
            arr_SinPlace: JSON.stringify(listSinPlace),
            raceCountry: racecountry
        },
        cache:false,
        success:function (data) {
            AddlivetoSin_Complete(data,win,place);
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function AddlivetoSin_Complete(data,win,place)
{
    if (!isStartTimer)
    {
        // Start the timer
        isStartTimer = true;
        settingtime = setInterval ( "Setting()", 1000 );
    }
    else
    {
        $("#settimeHour").html("00:");
        $("#settimeMinute").html("00:");
        $("#settimeSecond").html("00");
        deltaSecond=0;
        deltaMinute=0;
        deltaHour=0;
    }
    var sRes = JSON.parse(data);
    var listflag = sRes.flag_tick;
    var country = $("#ChooseCountry").val();
    sRel = country + "|SIN/" + win + "#" + place + "|" + listflag + "|" + ListMalay + "|" + ListSing;
    socket.emit('AutoHiliMalWin',sRel);
    //console.log(sRel);
    Select_RaceNoSin();
}

function untickandtickflag()
{
    var list = [];
    if($('#check_Flag_MY').is(':checked'))
    {
        list.push($('#check_Flag_MY').val());
        console.log("MY");
    }
    if($('#check_Flag_HK').is(':checked'))
    {
        list.push($('#check_Flag_HK').val());
        console.log("HK");
    }
    if($('#check_Flag_SG').is(':checked'))
    {
        list.push($('#check_Flag_SG').val());
        console.log("SG");
    }

    if($('#check_Flag_MC').is(':checked'))
    {
        list.push($('#check_Flag_MC').val());
        console.log("MC");
    }

    if($('#check_Flag_SA').is(':checked'))
    {
        list.push($('#check_Flag_SA').val());
    }

    if($('#check_Flag_AU').is(':checked'))
    {
        list.push($('#check_Flag_AU').val());
        console.log("AU");
    }

    if($('#check_Flag_EU').is(':checked'))
    {
        list.push($('#check_Flag_EU').val());
        console.log("EU");
    }

    return list;
}

function Setting ()
{
    deltaSecond++;
    if(deltaSecond==60)
    {
        deltaSecond = 0;
        deltaMinute++;
    }
    if(deltaMinute==60)
    {
        deltaSecond=0;
        deltaMinute=0;
        deltaHour++;
    }
    if(deltaSecond < 10)
        $("#settimeSecond").html("0"+deltaSecond);
    else    
        $("#settimeSecond").html(deltaSecond);
    if(deltaMinute < 10)
        $("#settimeMinute").html("0"+deltaMinute+":");
    else    
        $("#settimeMinute").html(deltaMinute+":");
    if(deltaHour < 10)
        $("#settimeHour").html("0"+deltaHour+":");
    else    
        $("#settimeHour").html(deltaHour+":");
    setTimeout ('$("#settimeSecond").html("")', 500 );

}

function ConvertMal(){
    if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertMal_Chrome();
    }
    else
    {
        ConvertMal_FireFox();
    }
    //ConvertMal_FireFox();
}

function ConvertHK()
{
    var txtConvert = $("#ContentConvert").val()
    var lines = txtConvert.split('\n');
    var dong;
    var cot;
    var win;
    var place;
    for(var i=0; i<lines.length; i++)
    {
        dong = lines[i];
        dong = dong.split("\t");        
        if(dong[dong.length-1] == "")
        {
            win   = dong[dong.length-3];
            place = dong[dong.length-2];
        }
        else
        {
            win   = dong[dong.length-2];
            place = dong[dong.length-1];
        }
        //console.log(win);
        //console.log(place);

        $("#tbGetToteSIN tbody tr:eq(0) td:eq("+i+") input").val(win);
        $("#tbGetToteSIN tbody tr:eq(1) td:eq("+i+") input").val(place);
    }

    SaveToteSin();
}
function ConvertMal_FireFox()
{
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 
    for(var i=0; i<soDong ; i ++)
    {
        var dong = lines[i];
        var cols = dong.split(' ');  
        //alert("Côt ben firefox " + cols);
        //               alert("Tổng chiều dài côt" + cols.length);          
        if(cols.length > 2)
        {  
            var s_stt = cols[0];
            //alert("Lay stt: " + s_stt);
            var stt = parseInt(s_stt);
            var winAmt = cols[cols.length];
            //alert("Lay win" + winAmt);
            if($.isNumeric(stt))
            {
                if(stt>0 && stt<21)
                {
                    var horseName = cols[1];
                    var winAmt = cols[cols.length-2];
                    //alert("Lay win" + winAmt);
                    winAmt = winAmt.replace("$","");
                    winAmt = winAmt.replace("\t","");
                    winAmt = winAmt.replace(".00","");
                    winAmt = winAmt.replace(",","");

                    var placeAmt = cols[cols.length-1]; 
                    placeAmt = placeAmt.replace("$","");
                    placeAmt = placeAmt.replace("\t","");
                    placeAmt = placeAmt.replace(".00","");
                    placeAmt = placeAmt.replace(",","");
                    //alert("Lay Place" + placeAmt);
                    var sNo = stt -1;

                    $("#tbGetToteMala tbody tr:eq(0) td:eq("+sNo+") input").val(winAmt);
                    $("#tbGetToteMala tbody tr:eq(1) td:eq("+sNo+") input").val(placeAmt);
                    SaveLiveToToMalaDabase();
                }
            }       
        }
    }
}

function ConvertMal_Chrome(){
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 
    for(var i=0; i<soDong ; i ++)
    {
        var dong = lines[i];
        var cols = dong.split('\t');  
        //alert("Côt ben firefox " + cols);
        //alert("Tổng chiều dài côt" + cols.length);          
        if(cols.length > 2)
        {  
            var s_stt = cols[0];
            //alert("Lay stt: " + s_stt);
            var stt = parseInt(s_stt);
            var winAmt = cols[cols.length];
            //alert("Lay win" + winAmt);
            if($.isNumeric(stt))
            {
                if(stt>0 && stt<21)
                {
                    var horseName = cols[1];
                    var winAmt = cols[cols.length-2];
                    //alert("Lay win" + winAmt);
                    winAmt = winAmt.replace("$","");
                    winAmt = winAmt.replace("\t","");
                    winAmt = winAmt.replace(".00","");
                    winAmt = winAmt.replace(",","");

                    var placeAmt = cols[cols.length-1]; 
                    placeAmt = placeAmt.replace("$","");
                    placeAmt = placeAmt.replace("\t","");
                    placeAmt = placeAmt.replace(".00","");
                    placeAmt = placeAmt.replace(",","");
                    //alert("Lay Place" + placeAmt);
                    var sNo = stt -1;

                    $("#tbGetToteMala tbody tr:eq(0) td:eq("+sNo+") input").val(winAmt);
                    $("#tbGetToteMala tbody tr:eq(1) td:eq("+sNo+") input").val(placeAmt);
                    SaveToteMala();
                }
            }       
        }
    }


}

function ConvertSin(){
    if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertSin_Chrome();
    }
    else
    {
        ConvertSin_FireFox();
    }
}

function ConvertSin_Chrome(){
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');    
    var soDong = lines.length;   
    for(var k=0; k <= 20 ; k++)
    {
        $("#tbGetToteSIN tbody tr:eq(0) td:eq("+k+") input").val("");
        $("#tbGetToteSIN tbody tr:eq(1) td:eq("+k+") input").val("");
    }
    var i=0;    
    if(lines[3].substring(0,1)=="2")
    {
        while(i<soDong)
        {
            var dong = lines[i].substring(0,2);  
            var win =lines[i+1] ;
            var place=lines[i+2];  
            i=i+3;
            for(var j=1; j <= 20 ; j++)
            {  
                if(j== parseInt(dong)) 
                {   
                    winAmt =   win; 
                    winAmt = winAmt.replace("$","");
                    winAmt = winAmt.replace("\t","");
                    winAmt = winAmt.replace(".00","");
                    winAmt = winAmt.replace(",","");
                    winAmt_inter = parseInt(winAmt);
                    if(winAmt > 1000)
                        winAmt = 999;
                    var placeAmt = place; 
                    placeAmt = placeAmt.replace("$","");
                    placeAmt = placeAmt.replace("\t","");
                    placeAmt = placeAmt.replace(".00","");
                    placeAmt = placeAmt.replace(",","");
                    placeAmt_inter = parseInt(placeAmt);
                    if(placeAmt > 1000)
                        placeAmt = 999;

                    var sNo = j-1;

                    $("#tbGetToteSIN tbody tr:eq(0) td:eq("+sNo+") input").val(winAmt);
                    $("#tbGetToteSIN tbody tr:eq(1) td:eq("+sNo+") input").val(placeAmt);
                }             
            } 
          
        } 
    }
    else
    {
        while(i<soDong)
        {
            var dong = lines[i];      
            var dong2=  lines[i+2];  
            var dong3=  lines[i+3];   
            var win ="" ;
            var place="";        

            if(dong2.indexOf("SCR") != -1){     
                win ="SCR" ;
                place="SCR";             
                i=i+3;     
            }
            else  if(dong.indexOf("1st") != -1){
                i=i+5;  
            }  
            else if($.isNumeric(dong2)){
                win =  lines[i+2];
                place=   lines[i+3];
                i=i+5;   
            }
            else if(dong3.indexOf("SCR") != -1 ){
                win =  lines[i+3];
                place=   lines[i+3];
                i=i+5;     
            }
            else{
                win =  lines[i+3];
                place=   lines[i+4];
                i=i+6;   
            }

            for(var j=1; j <= 20 ; j++)
            {

                if(j== parseInt(dong)) 
                {   
                    winAmt =   win; 
                    winAmt = winAmt.replace("$","");
                    winAmt = winAmt.replace("\t","");
                    winAmt = winAmt.replace(".00","");
                    winAmt = winAmt.replace(",","");
                    winAmt_inter = parseInt(winAmt);
                    if(winAmt > 1000)
                        winAmt = 999;
                    var placeAmt = place; 
                    placeAmt = placeAmt.replace("$","");
                    placeAmt = placeAmt.replace("\t","");
                    placeAmt = placeAmt.replace(".00","");
                    placeAmt = placeAmt.replace(",","");
                    placeAmt_inter = parseInt(placeAmt);
                    if(placeAmt > 1000)
                        placeAmt = 999;

                    var sNo = j-1;

                    $("#tbGetToteSIN tbody tr:eq(0) td:eq("+sNo+") input").val(winAmt);
                    $("#tbGetToteSIN tbody tr:eq(1) td:eq("+sNo+") input").val(placeAmt);
                }             
            }


        }
    }
    //  for(var i=0; i < soDong ; i++)
    //    {                
    //  var cols = dong.split('\t');
    //       var dong = lines[i];  
    // console.log(i);
    //       console.log(dong);  
    // for(var j=0; j<soDong ; j++)
    //         {
    //              var dong = lines[j];  
    //              if(i== parseInt(dong))
    //              {
    //                 console.log(i);
    //                 console.log(dong);  
    // break;
    //              }
    //         }
    //         
    // console.log(i);
    //  console.log(dong);
    //  console.log(cols);

    //  if(cols.length > 2)
    //        {  
    //            var s_stt = cols[0];
    //            var stt = parseInt(s_stt);
    //            if($.isNumeric(stt))
    //            {
    //                if(stt>0 && stt<21)
    //                {
    //                    var horseName = cols[1];
    //                    var winAmt = cols[cols.length-2];
    //                    winAmt = winAmt.replace("$","");
    //                    winAmt = winAmt.replace("\t","");
    //                    winAmt = winAmt.replace(".00","");
    //                    winAmt = winAmt.replace(",","");
    //                    winAmt_inter = parseInt(winAmt);
    //                    if(winAmt > 1000)
    //                        winAmt = 999;
    //                    var placeAmt = cols[cols.length-1]; 
    //                    placeAmt = placeAmt.replace("$","");
    //                    placeAmt = placeAmt.replace("\t","");
    //                    placeAmt = placeAmt.replace(".00","");
    //                    placeAmt = placeAmt.replace(",","");
    //                    placeAmt_inter = parseInt(placeAmt);
    //                    if(placeAmt > 1000)
    //                        placeAmt = 999;

    //                    var sNo = stt -1;

    //                    $("#tbGetToteSIN tbody tr:eq(0) td:eq("+sNo+") input").val(winAmt);
    //                    $("#tbGetToteSIN tbody tr:eq(1) td:eq("+sNo+") input").val(placeAmt);
    //                }
    //            }       
    //        }   
    //    }
    //SaveLiveToSinDabase();
    SaveToteSin();
    $('#ContentConvert').val(" ");
}

function ConvertSin_FireFox(){
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length;  
    for(var i=0; i<soDong ; i ++)
    {
        var dong = lines[i];
        var cols = dong.split(' ');
        if(cols.length > 2)
        {  
            var s_stt = cols[0];
            var stt = parseInt(s_stt);
            if($.isNumeric(stt))
            {
                if(stt>0 && stt<21)
                {
                    var horseName = cols[1];
                    var winAmt = cols[cols.length-2];
                    winAmt = winAmt.replace("$","");
                    winAmt = winAmt.replace("\t","");
                    winAmt = winAmt.replace(".00","");
                    winAmt = winAmt.replace(",","");
                    //winAmt_inter = parseInt(winAmt);
                    if(winAmt > 1000)
                        winAmt = 999;

                    var placeAmt = cols[cols.length-1]; 
                    placeAmt = placeAmt.replace("$","");
                    placeAmt = placeAmt.replace("\t","");
                    placeAmt = placeAmt.replace(".00","");
                    placeAmt = placeAmt.replace(",","");
                    //placeAmt = parseInt(placeAmt);
                    if(placeAmt > 1000)
                        placeAmt = 999;

                    var sNo = stt -1;

                    $("#tbGetToteSIN tbody tr:eq(0) td:eq("+sNo+") input").val(winAmt);
                    $("#tbGetToteSIN tbody tr:eq(1) td:eq("+sNo+") input").val(placeAmt);
                }
            }       
        }  
    }
    SaveToteSin();
    $('#ContentConvert').val(" "); 
}

function ConvertMal_tele(){
    if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertMaltele_Chrome();
    }
    else
    {
        ConvertMaltele_FireFox();
    }
}



function ConvertMaltele_Chrome()
{
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 
    // console.log(txtConvert);
    //     console.log(lines);
    //     console.log(soDong);

    for(var i=13; i<soDong ; i ++)
    {
        var dong = lines[i];
        var cols = dong.split('\t'); 
        if(cols.length > 2)
        {     

            var s_stt = cols[0];
            var stt = parseInt(s_stt);
            if($.isNumeric(stt))
            {
                if(stt>0 && stt<21)
                {                      
                    var horseName = cols[0];
                    var winAmt = cols[1];
                    winAmt = winAmt.replace("\t","");
                    //winAmt_inter = parseInt(winAmt);
                    if(winAmt > 1000)
                        winAmt = 999; 
                    var placeAmt = cols[2]; 
                    placeAmt = placeAmt.replace("\t","");
                    //placeAmt_inter = parseInt(placeAmt);
                    if(placeAmt > 1000)
                        placeAmt = 999;
                    var sNo = stt -1;

                    $("#tbGetToteMala tbody tr:eq(0) td:eq("+sNo+") input").val(winAmt);
                    $("#tbGetToteMala tbody tr:eq(1) td:eq("+sNo+") input").val(placeAmt);
                }
            }       
        }
    }
    SaveToteMala();
    $('#ContentConvert').val(" ");
}

function ConvertMaltele_FireFox()
{
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 

    for(var i=13; i<soDong ; i ++)
    {
        var dong = lines[i];


        var cols = dong.split('\t');    

        if(cols.length > 2)
        {  
            var s_stt = cols[0];              
            var stt = parseInt(s_stt);
            if($.isNumeric(stt))
            {
                if(stt>0 && stt<21)
                {
                    var horseName = cols[0];
                    var winAmt = cols[1];
                    winAmt = winAmt.replace("\t","");
                    //winAmt_inter = parseInt(winAmt);
                    if(winAmt > 1000)
                        winAmt = 999;

                    var placeAmt = cols[2]; 
                    placeAmt = placeAmt.replace("\t","");
                    //placeAmt_inter = parseInt(placeAmt);
                    if(placeAmt > 1000)
                        placeAmt = 999;

                    var sNo = stt -1;

                    $("#tbGetToteMala tbody tr:eq(0) td:eq("+sNo+") input").val(winAmt);
                    $("#tbGetToteMala tbody tr:eq(1) td:eq("+sNo+") input").val(placeAmt);

                }
            }       
        }
    }
    SaveToteMala();
    $('#ContentConvert').val(" ");
}

function ConvertSin_tele(){
    if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertSintele_Chrome();
    }
    else
    {
        ConvertSintele_FireFox();
    } 
}

function ConvertSintele_Chrome(){
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 
    for(var i=0; i<soDong ; i ++)
    {
        var dong = lines[i];
        var cols = dong.split('\t');          
        if(cols.length > 2)
        {  
            var s_stt = cols[1];
            var stt = parseInt(s_stt);
            if($.isNumeric(stt))
            {
                if(stt>0 && stt<21)
                {
                    var horseName = cols[1];
                    var winAmt = cols[0];
                    winAmt = winAmt.replace("\t","");

                    var placeAmt = cols[2]; 

                    placeAmt = placeAmt.replace("\t","");
                    var sNo = stt -1;

                    $("#tbGetToteSIN tbody tr:eq(0) td:eq("+sNo+") input").val(winAmt);
                    $("#tbGetToteSIN tbody tr:eq(1) td:eq("+sNo+") input").val(placeAmt);
                }
            }       
        }
    }
}

function ConvertSintele_FireFox()
{
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 
    for(var i=0; i<soDong ; i ++)
    {
        var dong = lines[i];
        var cols = dong.split(' ');     
        if(cols.length > 2)
        {  
            var s_stt = cols[1];
            var stt = parseInt(s_stt);
            if($.isNumeric(stt))
            {
                if(stt>0 && stt<21)
                {
                    var horseName = cols[1];
                    var winAmt = cols[0];
                    winAmt = winAmt.replace("\t","");

                    var placeAmt = cols[2]; 
                    placeAmt = placeAmt.replace("\t","");                    
                    var sNo = stt -1;

                    $("#tbGetToteSIN tbody tr:eq(0) td:eq("+sNo+") input").val(winAmt);
                    $("#tbGetToteSIN tbody tr:eq(1) td:eq("+sNo+") input").val(placeAmt);
                }
            }       
        }
    }
}