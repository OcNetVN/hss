$(document).ready(function() {
	
    get_list_agent(1,"");
    $( "#btnsearch" ).bind("click",function(){
        $("body").addClass("loading");
        var txtsearch = $("#txtsearch").val();
        get_list_agent(1,txtsearch);
    });

    // add button enter search agent 08/11/2015
    $("#txtsearch").keydown(function (event) {
      if (event.which == 13) 
      {
        get_list_customer();
        return false;
      }
    });
    
});

function get_list_customer()
{
    var txtsearch = $("#txtsearch").val();
    $.ajax({
        type:"POST",
        url:"home_controller/get_list_agent",
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
function get_list_agent(page,username_serialnumber)
{
    $("body").addClass("loading");
    //alert("dsfds");
    $.ajax({
        type:"POST",
        url:"home_controller/get_list_agent",
        dataType:"text",
        data: {
                page: page,
                username_serialnumber: username_serialnumber                                
                },
        cache:false,
        success:function (data) {
            get_list_agent_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function get_list_agent_Complete(data)
{
    var sRes = JSON.parse(data);
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
