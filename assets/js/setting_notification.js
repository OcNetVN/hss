$(document).ready(function() {
    //Select_SerialNumber();
    Load_Type_Of_Notification();
    $("#cml_custom").select2();
    Select_SerialNumber();

    // event checked

    $("#SerialAll").change(function(){
        if(this.checked)
        {
            $('#cml_custom').prop('disabled', 'disabled');
        }
        else{
            $('#cml_custom').prop('disabled', false);
        }
    });
});

$("#cmbTypeNotifi").change(function()
{
    // hiển thị danh sách race no có
    //Select_SerialNumber();
    Load_Type_Of_Notification();
     
});

// hien thi list customer win in lottery
// $("#cmbTypeCon").change(function()
// {
//     Load_Type_Lottery();
//     //Load_List_Serial_Number();
// });

$("#cmbTypeLottery").change(function()
{
    Load_List_Serial_Number();
});

function Load_Type_Lottery()
{
    var typelottery = $("#cmbTypeCon").val();
    console.log(typelottery);
    $("#cmbTypeLottery").html("");
    var str = "";
    if(typelottery == "0201")
    {
        str = str + "<option value=\"damacai\">Damacai</option>";
        str = str + "<option value=\"magnum\">Magnum</option>";
        str = str + "<option value=\"toto\">TOTO</option>";
        
    }
    
    if(typelottery == "0202")
    {
        str = str + "<option value=\"sinfourd\">SIN 4D</option>";
        str = str + "<option value=\"sintoto\">SIN TOTO</option>";
        
    }

    if(typelottery == "0203")
    {
        str = str + "<option value=\"cashsweep\">Cash sweep</option>";
        str = str + "<option value=\"stc4d\">STC 4D</option>";
        str = str + "<option value=\"sabah88\">Sabah 88</option>";
    }
    

    $("#cmbTypeLottery").append(str);
    $("#div_TypeLottery").css("display","");
    Load_List_Serial_Number();
}

function Load_List_Serial_Number()
{
    var typelottery = $("#cmbTypeLottery").val();
    $.ajax({
            type: "POST",
            url:  "homelt_controller/loadSerialNumberWin",
            data: { type: typelottery},
            dataType:"text",
            cache:false,
            success:function(data){
                Load_List_SerialNumber_Complete(data);
            },
            error:function(){}

    });
    
}

function Load_List_SerialNumber_Complete(data)
{
    var sRes = JSON.parse(data);
    var l_Serial  = sRes.l_Serial;
    var l_Gia     = sRes.l_Gia;
    var type      = sRes.type;
    var str;
    $("#cml_custom").html("");
    if(type != "" || type != " ")
    {
        $("#sp_SerialNumber").text(type);
    }
    else{

        $("#sp_SerialNumber").text("Not Reward");
    }
    if(l_Serial.length > 0)
    {
        for(var i=0;i< l_Serial.length;i++)
        {
            var Str_SerialNumber = l_Serial[i];
            var SerialNumber     = Str_SerialNumber.split("-");
            if(SerialNumber.length > 0)
            {
                str = str + "<option value="+SerialNumber[0]+">"+ Str_SerialNumber +"</option>";
            } 
        }

        $("#cml_custom").append(str);
    }
    console.log(l_Serial);
    console.log(l_Gia);
}

function Load_Type_Of_Notification()
{
    var notetype = $("#cmbTypeNotifi").val();
    $("#cmbTypeCon").html("");
    var str = "";
    if(notetype == "01")
    {
        str = str + "<option value=\"0101\">Racing Day</option>";
        str = str + "<option value=\"0102\">Tips</option>";
        $("#div_TypeLottery").css("display","none");
        $("#cmbTypeCon").append(str);
    }
    else{
            if(notetype == "02")
            {
                str = str + "<option value=\"0201\">West Malaysia</option>";
                str = str + "<option value=\"0202\">Singapore</option>";
                str = str + "<option value=\"0203\">East Malaysia</option>";
                $("#cmbTypeCon").append(str);
                //Load_Type_Lottery();
                //$("#div_TypeLottery").css("display","");
            }
            else
            {
                str = str + "<option value=\"0301\">Tips</option>";
                str = str + "<option value=\"0302\">Goal</option>";
                $("#div_TypeLottery").css("display","none");
                $("#cmbTypeCon").append(str);
            }
    }

}

function Select_SerialNumber()
{
    var type = $("#cmbTypeNotifi").val();
    $.ajax({
            type:"POST",
            url:"homelt_controller/getSerialNumber",
            dataType:"text",
            //data: {type: type},
            cache:false,
            success:function (data) {
                SelectSerialNumber_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function SelectSerialNumber_Complete(data)
{
    var sRes = JSON.parse(data);
    var l_serial = sRes.l_serial;
    //$("#cml_custom").html("");
    var str = "";
    if(l_serial.length > 0)
    {
        for(var i=0;i<l_serial.length;i++)
        {
            var serial = l_serial[i]['ImieNo'];
            if(serial != null && serial != "" )
            {
                str = str + "<option value="+l_serial[i]['ImieNo']+">"+l_serial[i]['ImieNo']+"</option>";
            }
            
        }

        $("#cml_custom").append(str);
        
    }
}

function SendNotification()
{
    var notetype            = $("#cmbTypeNotifi").val();
    var typeCon             = $("#cmbTypeCon").val();
    var SerialNumber;
    if($("#SerialAll").is(":checked")) 
    {
        SerialNumber = $("#SerialAll").val();
    }
    else
    {
        SerialNumber = $("#cml_custom").select2("val");
    }
    var content             = $("#ContentConvert").val();
    var url                 = $("#txtUpChine").val();
    $.ajax({
            type:"POST",
            url:"homelt_controller/SendNotification",
            dataType:"text",
            data: { typeCha: notetype,
                    typeCon: typeCon,
                    SerialNumber:SerialNumber,
                    content:content,
                    url:url 
                  },
            cache:false,
            success:function (data) {
                SendNotification_Complete(data,notetype,typeCon,SerialNumber,content,url);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function SendNodeNotifcation(notetype,typeCon,SerialNumber,content,url)
{
     
}

function SendNotification_Complete(data,notetype,typeCon,SerialNumber,content,url)
{
    var sRes = JSON.parse(data);
    if(sRes.result != "")
    {
        //socket_push.emit("RefreshNotification","test demo");
        $("#spantb").text("success");
    }
}

function DeleteHistoryNotification()
{
    $.ajax({
            type:"POST",
            url:"homelt_controller/deletnotifcation",
            dataType:"text",
            // data: { typeCha: notetype,
            //         typeCon: typeCon,
            //         SerialNumber:SerialNumber,
            //         content:content,
            //         url:url 
            //       },
            cache:false,
            success:function (data) {
                deletenotifcation_Complete(data);
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
}

function deletenotifcation_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes == 1)
    {
        $("#spantb").text("Clear history notification success");
    }
}