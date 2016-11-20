socket.on('PageRefresh', function(PageRefresh){
    if(PageRefresh == 'RefreshHorseInfoBoard'){
       loadhorseinfoboard();
    }
});
$(document).ready(function() {
    loadhorseinfoboard(); 
});

function loadhorseinfoboard(){
    $.ajax({
            type:"POST",
            url: "../home_controller/loadhorseinfoboard",
            dataType:"text",
            //data: {country: country},
            cache:false,
            success:function (data) {
                loadhorseinfo_Complete(data);
            },
            error: function () { alert("Error!"); $("body").removeClass("loading");}
   });
}

function loadhorseinfo_Complete(data)
{
    var sRes = JSON.parse(data);
    var createday;
    var nodung;
    var name;
    var txtcontent;
    var dulieu;
    var str = "";
    if(sRes.req == 1 || sRes.req == "1")
    {
        var HorseInfo = sRes.HorseInfoBoard;
        if(HorseInfo.length > 0)
        {
            for(var i=0 ; i < HorseInfo.length;i++)
            {
                createday = HorseInfo[i].CreatedDate;
                nodung   = HorseInfo[i].content;
                dulieu   = nodung.split("\n");
                name    = dulieu[0];
                if(typeof name == "undefined")
                    name = "";
                txtcontent =  dulieu[1];
                if(typeof txtcontent == "undefined")
                    txtcontent = "";
                if(typeof nodung == "undefined")
                    nodung = "";
                // str = str + "<tr><td>"+name+"</td>";
                // str = str + "<td>"+createday+"</td>"
                // str = str  + "</tr>";
                str = str + "<tr><td colspan=\"2\">"+nodung+ " " + createday +"</td></tr>";

            }
            $("#loadHorseInfo").html(str);
        }
    }
   
}
