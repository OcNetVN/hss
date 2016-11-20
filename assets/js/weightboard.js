var weight = null;
$(document).ready(function() 
{
	//$("input[id*='input_2_']").ForceNumericOnly();
	//$("input[id*='input_1_']").ForceNumericOnly();
	//click button clear
     $('#btnclear').bind("click",function(){
            $("input[id*='input_2_']").val("");
			$("input[id*='input_1_']").val("");
     });
	//end click button clear   
    // load Race Card ID
    LoadListRaceCardIDChange();
    
    // change Race Card ID
    $('#RaceCardID').change(function()
    {
       var RaceCardID = $("#RaceCardID").val();  
       LoadListWeightBoard();
       NumberHorseRaceCardID(RaceCardID); 
   }).trigger('change');

    function isNumber (o) 
    {
        return ! isNaN (o-0);
    }  

    //1st 2nd 3rd only can key in 4 digit number 
    $("input[id*=input_1_]").keyup(function(e)
    {
        txtVal = $(this).val();
        var country         = $("#RaceCardID").val();
            country_1        = country.substr(0, 2);
        if(country_1 == "HK")
        {
           if(isNumber(txtVal) && txtVal.length>5)
           {
             $(this).val(txtVal.substring(0,5));
           } 
        }
        else
        {
            if(isNumber(txtVal) && txtVal.length>4)
           {
             $(this).val(txtVal.substring(0,4));
           } 
        }    
    });
    
});

//only press number
jQuery.fn.ForceNumericOnly =
function () {
    return this.each(function () {
        $(this).keydown(function (e) {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 ||
                key == 9 ||
				key == 252 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};
//end only press number

// load List Race Card ID
function LoadListRaceCardIDChange()
{
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

function loadRaceCard_Complete(data)
{
     var sRes = JSON.parse(data);
     if(sRes.RCID != null || sRes.RCID != "" )
     {
        var listRCID =  sRes.RCID;
        var str = "";
        for(var i = 0;i < listRCID.length ; i++){
            str = str + "<option value="+ listRCID[i].RaceID +">"+ listRCID[i].RaceID +"</option>"; 

        } 
        $("#RaceCardID").html(str);
        NumberHorseRaceCardID(listRCID[0].RaceID);
        LoadListWeightBoard();

     }
}

function SaveWeightBoard()
{
        var RaceCard = $("#RaceCardID").val();
        var sumtablemal = $('table#tbGetToteMala tbody tr:last').index() + 1;
        //alert(sumtablemal);
        if (sumtablemal > 0) {
            var i = 0;
            var list = [];
            while (i < sumtablemal) 
            {
                var weightboard = {};
                    weightboard[0]   = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(1)").find("input").val();
                    weightboard[1]   = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(2)").find("input").val();
                    weightboard[2]   = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(3)").find("input").val();
                    weightboard[3]   = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(4)").find("input").val();
                    weightboard[4]   = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(5)").find("input").val();
                    weightboard[5]   = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(6)").find("input").val();
                    weightboard[6]   = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(7)").find("input").val();
                    weightboard[7]   = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(8)").find("input").val();
                    weightboard[8]   = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(9)").find("input").val();
                    weightboard[9]   = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(10)").find("input").val();
                    weightboard[10]  = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(11)").find("input").val();
                    weightboard[11]  = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(12)").find("input").val();
                    weightboard[12]  = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(13)").find("input").val();
                    weightboard[13]  = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(14)").find("input").val();
                    weightboard[14]  = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(15)").find("input").val();
                    weightboard[15]  = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(16)").find("input").val();
                    weightboard[16]  = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(17)").find("input").val();
                    weightboard[17]  = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(18)").find("input").val();
                    weightboard[18]  = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(19)").find("input").val();
                    weightboard[19]  = $("#tbGetToteMala tbody tr:eq(" + i + ") td:eq(20)").find("input").val();
                    
                    list[i] = weightboard;
                    i = i + 1;
                  
            }
            //console.log(list);
            weight = JSON.stringify(list);
    }

    $.ajax({
                type:"POST",
                url:"home_controller/SaveWeightBoard",
                dataType:"text",
                data: {weightBoard: JSON.stringify(list),
                       RaceCardId: RaceCard},
                cache:false,
                success:function (data) {
                    SaveWeightBoard_Complete(data);
                    //socket.emit('SaveToteSin', "RefreshSin" );
                },
                error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
       });
}

function SaveWeightBoard_Complete(data)
{
    var sRes       = JSON.parse(data);
    var arr_weight = sRes.arr_weight;
    var RaceID     = sRes.raceCardID;
    var trans = {};
        trans.message = "RefreshWeight";
        trans.list    = arr_weight;
        trans.RaceID  = RaceID;
        trans.l_weight = weight;
    socket.emit('PageRefresh',trans);
    $("#spantb").text("Save successful");   
}

function NumberHorseRaceCardID(raceID)
{
    $.ajax({
            type:"POST",
            url:"home_controller/getRaceCardDetail",
            dataType:"text",
            data: {RaceID: raceID},
            cache:false,
            success:function (data) {
                NumberHorseNo_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function NumberHorseNo_Complete(data)
{
    var sRes = JSON.parse(data);
    var list_RaceCard  = sRes.RaceID;
    var HorseNo = "";
    if(typeof list_RaceCard != "undefined" && list_RaceCard != null && list_RaceCard.length > 0)
    {
        var HorseNo =  list_RaceCard[0].HorseNo;
        if(HorseNo != "" || HorseNo != null)
        {
            $("#txt_totalhorse").val(HorseNo);
        }
        else
        {
           $("#txt_totalhorse").val(""); 
        }
    }
    else
    {
        $("#txt_totalhorse").val("");
    }
}

function LoadListWeightBoard(){
    var RaceCardId = $("#RaceCardID").val();
    $.ajax({
            type:"POST",
            url:"home_controller/getListWeightBoard",
            dataType:"text",
            data: {RaceCardId: RaceCardId},
            cache:false,
            success:function (data) {
                LoadListWeightBoard_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
    
}

function LoadListWeightBoard_Complete(data)
{
     var sRes = JSON.parse(data);
     if(sRes.list_weight != null || sRes.list_weight != "" ){
        var listweight =  sRes.list_weight;
        for(var i = 0;i < listweight.length ; i++){
            var HorseNo  = listweight[i].HorseNo;
            HorseNo = parseInt(HorseNo);       
            var wgt   = listweight[i].Wgt;         
            var hdp = listweight[i].Hdp;
            
            $("#tbGetToteMala tbody tr:eq(0) td:eq("+HorseNo+") input").val(wgt);  
            $("#tbGetToteMala tbody tr:eq(1) td:eq("+HorseNo+") input").val(hdp);  
        }
     }
     
     if(sRes.list_weight == null || sRes.list_weight == ""){
         for(var i = 0 ; i < 20;i++){
             $("#tbGetToteMala tbody tr:eq(0) td:eq("+(i+1)+") input").val(" ");   
             $("#tbGetToteMala tbody tr:eq(1) td:eq("+(i+1) +") input").val(" ");  
           }
     }
     
    
}

function ConvertWeight()
{
    var textconvert = $("#ContentConvert").val();
    var lines = textconvert.split("\n");
    var dong;
    var weight;
    var hdp;
    for(var i = 0 ; i < lines.length;i++)
    {
        dong = lines[i].split("\t");
        weight = dong[dong.length-2];
        // if(weight.indexOf("-") >= 0)
        // {}
        // else
        //    weight = "+" + weight;
        hdp   =  dong[dong.length-1];
        if(hdp.indexOf("-") >= 0)
        {}
        else
        {
            if(hdp != "SCR" || hdp != "scr")
            {}
            else
            {
                hdp = "+" + hdp; 
            }

                
        }
            
        $("#tbGetToteMala tbody tr:eq(0) td:eq("+(i+1)+") input").val(weight);  
        $("#tbGetToteMala tbody tr:eq(1) td:eq("+(i+1)+") input").val(hdp); 
    }

    $("#ContentConvert").val("");
}

