var DayRace="";
$(document).ready(function() {
    $('#btnaddnew').bind("click",function(){
        var day = $('#active').html(); 
        if(day == "" || day == null)
        {
            var d = new Date();
            day = d.getDate();
        }

        if(day < 10)
            day = '0' + day; 
        var stryear = $('.month').html();
        //alert(stryear);        
        var year = stryear.split('</span>')[1];
        year = year.substring(1);
        var month = stryear.split('</span>')[0];
        month = month.substring(6);
        //alert(month);
        var arr_month = { January : "01", February : "02", March : "03", April : "04", May : "05", June : "06", July : "07", August :"08", September : "09", October : "10", November : "11", December : "12" };

        var date = day + "-" + arr_month[month] + "-" + year;
        //var date = day + "-" + arr_month[month] + "-" + year;

        $('#spRaceDay').text(date);  
        $('#section2').show();
        $('#section1').hide(); 
        var RaceCard = $("#ChooseCountry").val()+year+ arr_month[month]+day;
        DayRace = year+ arr_month[month]+day;
        LoadsCratching("01",RaceCard);
    });
    $("#btnSave").click(function(){
        SaveScrachingEarlyByRaceNo();
    });
    $("#btnClear").click(function(){
        $('#txtEarlyTicket').val(""); 
        $('#txtScratching').val('');
        $('#txtBatamTic').val("");
        $('#txtMasterChoice').val(""); 
    });
     $("#btnCance").click(function(){
            $('#section2').hide();
            $('#section1').show();  
            $("#spMes").html("");
    });
    $("#ChooseRacNo").change(function(){
        LoadsCratching($("#ChooseRacNo").val(),$("#ChooseCountry").val()+ DayRace);  
    });  

});

function LoadsCratching(raceNo,raceCard){

    $.ajax({
        type:"POST",
        url:"home_controller/LoadScrachingEarlyByRaceNo",
        dataType:"text",
        data: {RaceNo: raceNo,RaceCard:raceCard},
        cache:false,
        success:function (data) {
            var sRes = JSON.parse(data);    
                    
            if(sRes.list_SE.length >0){
                $('#txtEarlyTicket').val(sRes.list_SE[0].EarlyTicket); 
                $('#txtScratching').val(sRes.list_SE[0].Scratching);
                $('#txtBatamTic').val(sRes.list_SE[0].BatamTic);
                $('#txtMasterChoice').val(sRes.list_SE[0].MasterChoice);    
            }  
            else {
                $('#txtEarlyTicket').val(""); 
                $('#txtScratching').val("");
                $('#txtBatamTic').val("");
                $('#txtMasterChoice').val("");  
            }                 
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    }) 
}
function SaveScrachingEarlyByRaceNo(){   
    $.ajax({
        type:"POST",
        url:"home_controller/SaveScrachingEarlyByRaceNo",
        dataType:"text",
        data: {RaceNo: $("#ChooseRacNo").val(),RaceCard:$("#ChooseCountry").val()+ DayRace,RaceCountry:$("#ChooseCountry").val(),RaceDay:DayRace,EarlyTicket:$('#txtEarlyTicket').val(),Scratching:$('#txtScratching').val(),MasterChoice: $('#txtMasterChoice').val(),BatamTic :$('#txtBatamTic').val()},
        cache:false,
        success:function (data) {
            var sRes = JSON.parse(data); 
            if(sRes.status == "InSuccess") {                 
                $("#spMes").html("Save data Successful");
                $("#spMes").css('color','green');
                socket.emit('PageRefresh', 'RefreshScratEt'); 
            }
            else if(sRes.status == "UpSuccess") {                 
                $("#spMes").html("Update data Successful");
                $("#spMes").css('color','green') ;
                socket.emit('PageRefresh', 'RefreshScratEt'); 
            }
            else{
                $("#spMes").html("Save data fail");
                $("#spMes").css('color','red') ;
            }
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    }) 
}
