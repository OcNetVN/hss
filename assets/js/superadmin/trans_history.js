$(document).ready(function() {
    var datefrom    = $( "#txtdatefrom" ).val();
    var dateto      = $( "#txtdateto" ).val();
    show_all_trans(1,datefrom,dateto);
    
    $( "#btnclearhistory" ).bind("click",function(){
        click_btn_clear_history();
    });
    $( "#btnsearch" ).bind("click",function(){
        var datefrom    = $( "#txtdatefrom" ).val();
        var dateto      = $( "#txtdateto" ).val();
        show_all_trans(1,datefrom,dateto);
    });
});
function show_all_trans(page,datefrom,dateto)
{
    $("body").addClass("loading");
    //alert("dsfds");
    $.ajax({
        type:"POST",
        url:"home_controller/show_all_trans",
        dataType:"text",
        data: {
                page:       page,
                datefrom:   datefrom,
                dateto:     dateto                               
                },
        cache:false,
        success:function (data) {
            show_all_trans_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function show_all_trans_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes.totalrow > 0)
    {
        $("#notifyres").hide();
        $("#tbodylisttrans").html(sRes.str_list);
        $("#divpagination").html(sRes.str_numpage);
        $("#tbllisttrans").show();
    }
    else
    {
        $("#tbllisttrans").hide();
        $("#notifyres").html(sRes.notfound);
        $("#notifyres").show();
        $("#divpagination").html("");
    }
    $("body").removeClass("loading");
}
function click_btn_clear_history()
{
    var strconfirm = confirm("Do you want to delete?");
    if (strconfirm == true)
    {
        $("body").addClass("loading");
        $.ajax({
            type:"POST",
            url:"home_controller/click_btn_clear_history",
            dataType:"text",
            cache:false,
            success:function (data) {
                click_btn_clear_history_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
        });
    }
}
function click_btn_clear_history_Complete(data)
{
    var sRes = JSON.parse(data);
    if(sRes==0 || sRes=="0")
        alert("Error!");
        var datefrom    = $( "#txtdatefrom" ).val();
        var dateto      = $( "#txtdateto" ).val();
        show_all_trans(1,datefrom,dateto);
    $("body").removeClass("loading");
}