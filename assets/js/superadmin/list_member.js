$(document).ready(function() {  
    get_list_member(1,"");
    $("#txtsearch").keydown(function (event) {
      if (event.which == 13) 
      {
        get_list_customer();
        return false;
      }
    });

    $( "#btnsearch" ).bind("click",function(){
        $("body").addClass("loading");
        var txtsearch = $("#txtsearch").val();
        get_list_member(1,txtsearch);
    });
    $( "#btn_save_addagent" ).bind("click",function(){
        btn_save_addagent();
    });
    get_option_list_agent();
});


function get_list_customer()
{
    var txtsearch = $("#txtsearch").val();
    $.ajax({
        type:"POST",
        url:"home_controller/get_list_member",
        dataType:"text",
        data: {
                page: 1,
                username_serialnumber: txtsearch                                
                },
        cache:false,
        success:function (data) {
            get_list_customer_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}

function get_list_customer_Complete(data)
{
    var sRes = JSON.parse(data);
    //alert(sRes);
    if(sRes.totalrow > 0)
    {
        $("#notifyres").hide();
        $("#tbodylistagent").html(sRes.str_list);
        $("#divpagination").html(sRes.str_numpage);
        $("#tbllistagent").show();
    }
    else
    {
        $("#tbllistagent").hide();
        $("#notifyres").html(sRes.notfound);
        $("#notifyres").show();
        $("#divpagination").html("");
    }
    //$("body").removeClass("loading");
}

function get_list_member(page,username_serialnumber)
{
    $("body").addClass("loading");
    //alert("dsfds");
    $.ajax({
        type:"POST",
        url:"home_controller/get_list_member",
        dataType:"text",
        data: {
                page: page,
                username_serialnumber: username_serialnumber                                
                },
        cache:false,
        success:function (data) {
            get_list_member_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function get_list_member_Complete(data)
{
    var sRes = JSON.parse(data);
    //alert(sRes);
    if(sRes.totalrow > 0)
    {
        $("#notifyres").hide();
        $("#tbodylistagent").html(sRes.str_list);
        $("#divpagination").html(sRes.str_numpage);
        $("#tbllistagent").show();
    }
    else
    {
        $("#tbllistagent").hide();
        $("#notifyres").html(sRes.notfound);
        $("#notifyres").show();
        $("#divpagination").html("");
    }
    $("body").removeClass("loading");
}
function get_option_list_agent()
{
    $("body").addClass("loading");
    $.ajax({
        type:"POST",
        url:"home_controller/get_option_list_agent",
        dataType:"text",
        cache:false,
        success:function (data) {
            get_option_list_agent_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function get_option_list_agent_Complete(data)
{
    var sRes = JSON.parse(data);
    $("#list_username_agent").html(sRes.str_res);
    $("body").removeClass("loading");
}
function btn_addagent(id)
{
    $("#id_addagent").val(id);
}
function btn_save_addagent()
{
    $("body").addClass("loading");
    var username = $("#txtusernameagent").val();
    var id = $("#id_addagent").val();
    if(id!=null && id!="")
    {
        var cur_page=$("#divpagination ul li.active a").html();
        $.ajax({
            type:"POST",
            url:"home_controller/btn_save_addagent",
            dataType:"text",
            cache:false,
            data: {
                    username: username,
                    id: id,
                    cur_page: cur_page                                
                    },
            success:function (data) {
                btn_save_addagent_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
        });
    }
}
function btn_save_addagent_Complete(data)
{
    var sRes = JSON.parse(data);
    var txtsearch=$("#txtsearch").val();
    $( "#btnclosemodal" ).trigger( "click" );
    $( "#txtusernameagent" ).val( "" );
    get_list_member(sRes,txtsearch);
    $("body").removeClass("loading");
}
function generatecode(row_id)
{
    $("body").addClass("loading");
    $.ajax({
        type:"POST",
        url:"home_controller/generatecode",
        dataType:"text",
        cache:false,
        data: {
                row_id: row_id                                
                },
        success:function (data) {
            generatecode_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function generatecode_Complete(data)
{
    var sRes = JSON.parse(data);
    var cur_page=$("#divpagination ul li.active a").html();
    var txtsearch=$("#txtsearch").val();
    get_list_member(cur_page,txtsearch);
    $("body").removeClass("loading");
}