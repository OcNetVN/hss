$(document).ready(function() {
    show_report();
});
function show_report()
{
    $("body").addClass("loading");
    //alert("dsfds");
    $.ajax({
        type:"POST",
        url:"home_controller/show_report",
        dataType:"text",
       /* data: {
                page: page                              
                },*/
        cache:false,
        success:function (data) {
            show_report_Complete(data);
        },
        error: function () { alert("Error!"); $("body").removeClass("loading");}
    });
}
function show_report_Complete(data)
{
    var sRes = JSON.parse(data);
    $("#ac_agent").html(sRes.ac_agent);
    $("#inac_agent").html(sRes.inac_agent);
    $("#ac_cus").html(sRes.ac_cus);
    $("#inac_cus").html(sRes.inac_cus);
    $("body").removeClass("loading");
}
