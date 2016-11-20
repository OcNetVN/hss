socket.on('ControlRefresh', function(PageRefresh){
    if(PageRefresh == 'lot_damacai'){
       load_damacai();
    }
});
$(document).ready(function() {
    load_damacai(); 
    $( "#seday" ).bind("change",function(){
        load_damacai();
    });
});

/*
|----------------------------------------------------------------
| function load damacai
|----------------------------------------------------------------
*/
function load_damacai(){
    $("#span_date").html("");
    $("#spandrawno").html("");
    $("#span_1st_1_3d").html("");
    $("#span_2nd_1_3d").html("");
    $("#span_3rd_1_3d").html("");
    $("#span_1st_3d").html("");
    $("#span_2nd_3d").html("");
    $("#span_3rd_3d").html("");
    $("#tbody_special").html("");
    $("#tbody_consolation").html("");
    $("#span_rm_13djp1").html("");
    $("#span_rm_13djp2").html("");
    $("#span_rm_3djp").html("");
    $("#span_rm_dmcjp1").html("");
    $("#span_rm_dmcjp2").html("");
    $("#tbody_jackpotonethreed").html("");
    $("#tbody_jackpotthreed").html("");
    $("#tbody_dmcjpone").html("");
    $("#tbody_dmcjptwo").html("");
    $("#tbody_jackpottwoonethreed").html("");
    
    var seday = $( "#seday" ).val();
    $.ajax({
            type:"POST",
            url: "../home_controller/load_damacai",
            dataType:"text",
            data: {seday: seday},
            cache:false,
            success:function (data) {
                load_damacai_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_damacai_Complete(data){
    var sRes = JSON.parse(data);
    if(sRes.flag != 0)
    {
        $("#span_date").html(sRes.span_date);
        $("#spandrawno").html(sRes.str_Draw_No);
        $("#span_1st_1_3d").html(sRes.str_1_3D_1st_Price);
        $("#span_2nd_1_3d").html(sRes.str_1_3D_2nd_Price);
        $("#span_3rd_1_3d").html(sRes.str_1_3D_3rd_Price);
        $("#span_1st_3d").html(sRes.str_3D_1st_Price);
        $("#span_2nd_3d").html(sRes.str_3D_2nd_Price);
        $("#span_3rd_3d").html(sRes.str_3D_3rd_Price);
        $("#tbody_special").html(sRes.str_spacial_res);
        $("#tbody_consolation").html(sRes.str_Consolation_res);
        $("#span_rm_13djp1").html(sRes.str_1_3DJp1_RM);
        $("#span_rm_13djp2").html(sRes.str_1_3DJp2_RM);
        $("#span_rm_3djp").html(sRes.str_3D_Jp_RM);
        $("#span_rm_dmcjp1").html(sRes.str_DMC_Jp1_RM);
        $("#span_rm_dmcjp2").html(sRes.str_DMC_Jp2_RM);
        $("#tbody_jackpotonethreed").html(sRes.str_1_3DJp1_res);
        $("#tbody_jackpotthreed").html(sRes.str_3DJp_res);
        $("#tbody_dmcjpone").html(sRes.str_DMC_Jp1_res);
        $("#tbody_dmcjptwo").html(sRes.str_DMC_Jp2_res);
        $("#tbody_jackpottwoonethreed").html(sRes.str_1_3DJp2_res);
    }
    $("#seday").html(sRes.str_date);
}

