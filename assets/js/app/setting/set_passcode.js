var idFocus = "";
$(document).ready( function() {    
    $("#input_1").focus(function(){
        idFocus =  "input_1";  
    });  
    $("#input_2").focus(function(){
        idFocus =  "input_2";  
    });
    $("#input_3").focus(function(){
        idFocus =  "input_3";  
    });
    $("#input_4").focus(function(){
        idFocus =  "input_4";   
    });   
});  
function Input1()
{
    $("#"+idFocus).val(1);     
    if(idFocus == "input_3")
    {
        $("#input_4").focus();  
    }
    if(idFocus == "input_2")
    {
        $("#input_3").focus();  
    }
    if(idFocus == "input_1")
    {
        $("#input_2").focus();  
    }
}

function Input2()
{
    $("#"+idFocus).val(2); 
    if(idFocus == "input_3")
    {
        $("#input_4").focus();  
    }
    if(idFocus == "input_2")
    {
        $("#input_3").focus();  
    }
    if(idFocus == "input_1")
    {
        $("#input_2").focus();  
    }
}

function Input3()
{
    $("#"+idFocus).val(3); 
    if(idFocus == "input_3")
    {
        $("#input_4").focus();  
    }
    if(idFocus == "input_2")
    {
        $("#input_3").focus();  
    }
    if(idFocus == "input_1")
    {
        $("#input_2").focus();  
    }
}

function Input4()
{
    $("#"+idFocus).val(4); 
    if(idFocus == "input_3")
    {
        $("#input_4").focus();  
    }
    if(idFocus == "input_2")
    {
        $("#input_3").focus();  
    }
    if(idFocus == "input_1")
    {
        $("#input_2").focus();  
    }
}

function Input5()
{
    $("#"+idFocus).val(5); 
    if(idFocus == "input_3")
    {
        $("#input_4").focus();  
    }
    if(idFocus == "input_2")
    {
        $("#input_3").focus();  
    }
    if(idFocus == "input_1")
    {
        $("#input_2").focus();  
    }
}

function Input6()
{
    $("#"+idFocus).val(6); 
    if(idFocus == "input_3")
    {
        $("#input_4").focus();  
    }
    if(idFocus == "input_2")
    {
        $("#input_3").focus();  
    }
    if(idFocus == "input_1")
    {
        $("#input_2").focus();  
    }
}

function Input7()
{
    $("#"+idFocus).val(7); 
    if(idFocus == "input_3")
    {
        $("#input_4").focus();  
    }
    if(idFocus == "input_2")
    {
        $("#input_3").focus();  
    }
    if(idFocus == "input_1")
    {
        $("#input_2").focus();  
    }
}

function Input8()
{
    $("#"+idFocus).val(8); 
    if(idFocus == "input_3")
    {
        $("#input_4").focus();  
    }
    if(idFocus == "input_2")
    {
        $("#input_3").focus();  
    }
    if(idFocus == "input_1")
    {
        $("#input_2").focus();  
    }
}

function Input9()
{
    $("#"+idFocus).val(9); 
    if(idFocus == "input_3")
    {
        $("#input_4").focus();  
    }
    if(idFocus == "input_2")
    {
        $("#input_3").focus();  
    }
    if(idFocus == "input_1")
    {
        $("#input_2").focus();  
    }
}

function Input0()
{
    $("#"+idFocus).val(0); 
    if(idFocus == "input_3")
    {
        $("#input_4").focus();  
    }
    if(idFocus == "input_2")
    {
        $("#input_3").focus();  
    }
    if(idFocus == "input_1")
    {
        $("#input_2").focus();  
    }
}

function InputCancel()
{
    $("[id*='input_']" ).val("");
}

function  InputOK()
{
    var code1 = $("#input_1").val();
    var code2 = $("#input_2").val();
    var code3 = $("#input_3").val();
    var code4 = $("#input_4").val();
    var passcode = "";
    if(code1 == "" && code2 == "" && code3 == "" && code4 == "")
    {
        alert("Please pass code empty");
    }
    else
    {
        var passcode = code1+code2+code3+code4;
    }

    $.ajax({
        type:"POST",
        url:"../home_controller/updatepasscode",
        dataType:"text",
        data: {passcode:passcode
        },
        cache:false,
        success:function (data) {
            UpdatePasscode_Complete(data);
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function UpdatePasscode_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.result == 1 || sRes.result == "1")
    {
        $("#spantb").text("Set Passcode success");
    }
    else
    {
        $("#spantb").text("Set Passcode not success");
    }
}