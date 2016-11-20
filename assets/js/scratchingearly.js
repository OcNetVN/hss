$(document).ready(function() {
    //$("input[id*='input_2_']").ForceNumericOnly();
    //$("input[id*='input_1_']").ForceNumericOnly();
    //click button clear
     $('#btnclear').bind("click",function(){
            $("input[id*='etic_1_']").val("");
            $("input[id*='scr_1_']").val("");
     });
    //end click button clear
    
    // change Race Card ID
    $('#ChooseCountry').change(function(){  
        var country = $("#ChooseCountry").val();
       LoadScratchingEarly(country); 
   }).trigger('change');
    
});



// load List Race Card ID
function LoadListRaceCardIDChange(){
  
   $.ajax({
            type:"POST",
            url:"home_controller/loadRaceWeightBaord",
            dataType:"text",
            //data: {contry: contry},
            cache:false,
            success:function (data) {
                loadRaceCard_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
   }) 
}

function loadRaceCard_Complete(data){
     var sRes = JSON.parse(data);
     if(sRes.RCID != null || sRes.RCID != "" ){
        var listRCID =  sRes.RCID;
        var str = "";
        for(var i = 0;i < listRCID.length ; i++){
            str = str + "<option value="+ listRCID[i].RaceID +">"+ listRCID[i].RaceID +"</option>";      
        } 
        $("#RaceCardID").html(str);
     }
}

function SaveEarlyScratching(){
        var chooseCountry = $("#ChooseCountry").val();
        var sumSE = $('table#tbGetSE tbody tr:last').index()-1;
        alert(sumSE);
        if (sumSE > 0) {
            var list = [];
            for(var i = 0 ;i < sumSE ;i++)
            {  
                var SE = {};
                    SE.Early          = $("#tbGetSE tbody tr:eq(" + (i+2) + ") td:eq(1)").find("input").val();
                    SE.Scarching      = $("#tbGetSE tbody tr:eq(" + (i+2) + ") td:eq(2)").find("input").val();
                    list[i] = SE;    
            }   
    }

    $.ajax({
                type:"POST",
                url:"home_controller/SaveSE",
                dataType:"json",
                data: {SE: JSON.stringify(list),
                       Country: chooseCountry},
                cache:false,
                success:function (data) {
                    SaveSE_Complete(data);
                    //socket.emit('SaveToteSin', "RefreshSin" );
                },
                error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
       });
}

function SaveSE_Complete(data){
    socket.emit('PageRefresh', 'RefreshScratEt'); 
    $("#spantb").text("Save successful");
}

function LoadScratchingEarly(country){
    var country = $("#ChooseCountry").val();
    $.ajax({
            type:"POST",
            url:"home_controller/getscrachingEarly",
            dataType:"text",
            data: {Country: country},
            cache:false,
            success:function (data) {
                LoadScratchingEarly_Complete(data,country);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
    
}

function LoadScratchingEarly_Complete(data,country)
{
     var sRes = JSON.parse(data);
     if(sRes.list_SE != null || sRes.list_SE != "" )
     {
        var listSE =  sRes.list_SE;
        var country = country;
        if(country == "MY")
            $("#Country").html("Malaysia");  
        if(country == "SG")
            $("#Country").html("Singapore"); 
        if(country == "HK")
            $("#Country").html("HongKong"); 
        if(country == "MC")
            $("#Country").html("MaCau"); 
        if(country == "SA")
            $("#Country").html("S Afica"); 
        if(country == "AU")
            $("#Country").html("Australia"); 
        if(country == "EU")
            $("#Country").html("Europe");

        for(var i = 0;i < listSE.length ; i++)
        {
            var RaceNo        = listSE[i].RaceNo;
            RaceNo            = parseInt(RaceNo);       
            var earlyTicket   = listSE[i].EarlyTicket;         
            var Scratching    = listSE[i].Scratching;
            var stt           = RaceNo + 1;
            $("#tbGetSE tbody tr:eq("+ stt +") td:eq(1) input").val(earlyTicket); 
            $("#tbGetSE tbody tr:eq("+ stt +") td:eq(2) input").val(Scratching); 
        
        }
     }
     
     if(sRes.list_SE == null || sRes.list_SE == ""){
        for(var i = 0 ; i < 20;i++){
            $("#tbGetSE tbody tr:eq("+ stt +") td:eq(1) input").val(""); 
            $("#tbGetSE tbody tr:eq("+ stt +") td:eq(2) input").val(""); 
          }
    }
}

