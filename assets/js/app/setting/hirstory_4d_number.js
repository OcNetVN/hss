$(document).ready(function(){
    CheckedCheckbox();
});

function  CheckedCheckbox()
{
    // if click damacai
    $("#damacai").change(function(){
        if(this.checked)
        {
             $("#magnum").prop('checked',false);
             $("#toto").prop('checked',false);
             $("#sintoto").prop('checked',false);
             $("#cashsweep").prop('checked',false);
             $("#sabaha88").prop('checked',false);
             $("#stc4D").prop('checked',false);
            // $("#damacai").prop('checked',false);
            console.log("Damacai");
        }
        else
        {
            // $("#magnum").prop('checked',false);
            // $("#toto").prop('checked',false);
            // $("#sintoto").prop('checked',false);
            // $("#cashsweep").prop('checked',false);
            // $("#sabaha88").prop('checked',false);
            // $("#stc4D").prop('checked',false);
        }
    });

    // if click magnum
    $("#magnum").change(function(){
        if(this.checked)
        {
            //$("#magnum").prop('checked',false);
             $("#toto").prop('checked',false);
             $("#sintoto").prop('checked',false);
             $("#cashsweep").prop('checked',false);
             $("#sabaha88").prop('checked',false);
             $("#stc4D").prop('checked',false);
             $("#damacai").prop('checked',false);
            console.log("Magnum");
        }
        // else
        // {
        //     $("#damacai").removeAttr('disabled');
        //     $("#toto").removeAttr('disabled');
        //     $("#sintoto").removeAttr('disabled');
        //     $("#cashsweep").removeAttr('disabled');
        //     $("#sabaha88").removeAttr('disabled');
        //     $("#stc4D").removeAttr('disabled');
        // }
    });

    // if click toto

    $("#toto").change(function(){
        if(this.checked)
        {
             $("#magnum").prop('checked',false);
             //$("#toto").prop('checked',false);
             $("#sintoto").prop('checked',false);
             $("#cashsweep").prop('checked',false);
             $("#sabaha88").prop('checked',false);
             $("#stc4D").prop('checked',false);
             $("#damacai").prop('checked',false);
        }
        else
        {
            // $("#damacai").removeAttr('disabled');
            // $("#magnum").removeAttr('disabled');
            // $("#sintoto").removeAttr('disabled');
            // $("#cashsweep").removeAttr('disabled');
            // $("#sabaha88").removeAttr('disabled');
            // $("#stc4D").removeAttr('disabled');

        }
    });
    // if click sin toto
    $("#sintoto").change(function(){
        if(this.checked)
        {
             $("#magnum").prop('checked',false);
             $("#toto").prop('checked',false);
             //$("#sintoto").prop('checked',false);
             $("#cashsweep").prop('checked',false);
             $("#sabaha88").prop('checked',false);
             $("#stc4D").prop('checked',false);
             $("#damacai").prop('checked',false);
        }
        else
        {
            // $("#damacai").removeAttr('disabled');
            // $("#magnum").removeAttr('disabled');
            // $("#toto").removeAttr('disabled');
            // $("#cashsweep").removeAttr('disabled');
            // $("#sabaha88").removeAttr('disabled');
            // $("#stc4D").removeAttr('disabled');
        }
    });

    // if click cashsweep
    $("#cashsweep").change(function(){
        if(this.checked)
        {
             $("#magnum").prop('checked',false);
             $("#toto").prop('checked',false);
             $("#sintoto").prop('checked',false);
             //$("#cashsweep").prop('checked',false);
             $("#sabaha88").prop('checked',false);
             $("#stc4D").prop('checked',false);
             $("#damacai").prop('checked',false);
        }
        else
        {
            // $("#damacai").removeAttr('disabled');
            // $("#magnum").removeAttr('disabled');
            // $("#toto").removeAttr('disabled');
            // $("#sintoto").removeAttr('disabled');
            // $("#sabaha88").removeAttr('disabled');
            // $("#stc4D").removeAttr('disabled');
        }
    });

    // if click sabaha88
    $("#sabaha88").change(function(){
        if(this.checked)
        {
             $("#magnum").prop('checked',false);
             $("#toto").prop('checked',false);
             $("#sintoto").prop('checked',false);
             $("#cashsweep").prop('checked',false);
             //$("#sabaha88").prop('checked',false);
             $("#stc4D").prop('checked',false);
             $("#damacai").prop('checked',false);
        }
        else
        {
            // $("#damacai").removeAttr('disabled');
            // $("#magnum").removeAttr('disabled');
            // $("#toto").removeAttr('disabled');
            // $("#sintoto").removeAttr('disabled');
            // $("#cashsweep").removeAttr('disabled');
            // $("#stc4D").removeAttr('disabled');
        }
    });

    $("#stc4D").change(function(){
        if(this.checked)
        {
             $("#magnum").prop('checked',false);
             $("#toto").prop('checked',false);
             $("#sintoto").prop('checked',false);
             $("#cashsweep").prop('checked',false);
             $("#sabaha88").prop('checked',false);
             //$("#stc4D").prop('checked',false);
             $("#damacai").prop('checked',false);
        }
        else
        {
            // $("#damacai").removeAttr('disabled');
            // $("#magnum").removeAttr('disabled');
            // $("#toto").removeAttr('disabled');
            // $("#sintoto").removeAttr('disabled');
            // $("#cashsweep").removeAttr('disabled');
            // $("#sabaha88").removeAttr('disabled');
        }
    });
    
}
function SearchHistoryNumber()
{
	var txtsearch = $("#inputnumber").val();
    //var lottry;
	var lottry = [];
	$(':checkbox:checked').each(function(i){
          lottry[i] = $(this).val();
        });
	$.ajax({
            type:"POST",
            url: "../home_controller/SearchHistoryNumber",
            dataType:"text",
            data: {
                    search:txtsearch,
                    lottry:lottry   
                   },
            cache:false,
            success:function (data) {
                SearchHistoryNumber_Complete(data,lottry,txtsearch);
            },
            error: function () { alert("Error!");}
   });
	
}

// convert date sang weekend
function isWeekend(date)
{
    // new Date(ngay,thang,name);
   var a = new Date(date.substring(6),date.substring(4,2),date.substring(0,4)).getDay();
   var weekday;
   switch (a) 
    {
          case 0: weekday = 'Sun';break;
          case 1: weekday = 'Mon'; break;
          case 2: weekday = 'Tue';break;
          case 3: weekday = 'Wed';break;
          case 4: weekday = 'Thu';break;
          case 5: weekday = 'Fri';break;
          case 6: weekday = 'Sat';break; 
          default:weekday = '';break;
    }

    return weekday;
}

function isdate(date)
{
    var str_date='';
    var day = date.substring(6);
    var month = date.substring(4,6);
    var year  = date.substring(2,4);
    str_date = day + "/" + month + "/" + year;
    return str_date;
}

function GetBaseUrl() 
{
   var link = '';
   var l    = window.location;
   //var url  = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1] + "/";
   var url  = l.protocol + "//" + l.host + "/";
   return url  
}


function SearchHistoryNumber_Complete(data,lottry,number)
{
	var sRes = JSON.parse(data);
    // list danh sách lottry được chọn
    // show damacai 
    var dmc_1st = sRes.damacai.l_1st;
    var dmc_2nd = sRes.damacai.l_2nd;
    var dmc_3rd = sRes.damacai.l_3rd;
    var dmc_SP  = sRes.damacai.l_dmc_specail;
    var dmc_CON = sRes.damacai.l_conso;
    var url = GetBaseUrl();
    var str='';
    var Sun='';
    var day='';
    $("#showNumberHistory tbody").html("");
    if(typeof dmc_1st !== 'undefined' && dmc_1st.length > 0) 
    {
        for(var i=0; i<dmc_1st.length;i++)
        {
            Sun = isWeekend(dmc_1st[i]['txday']);
            day = isdate(dmc_1st[i]['txday']);
            str = str  +  "<tr width=\"100%\">";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">1ST</td>";
            str  = str + "<td width=\"20%\">"+ dmc_1st[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src=" + url + "assets/img/app/icon_damacai.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        
    }

    if(typeof dmc_2nd !== 'undefined' && dmc_2nd.length > 0) 
    {
        for(var i=0;i<dmc_2nd.length;i++)
        {
            Sun = isWeekend(dmc_2nd[i]['txday']);
            day = isdate(dmc_2nd[i]['txday']);
            str  = str + "<tr width=\"100%\">";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">2ND</td>";
            str  = str + "<td width=\"20%\">"+ dmc_2nd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src=" + url +"assets/img/app/icon_damacai.png style=\"width:80%;\" type=\"image\"></td>";
            str = str + "</tr>";
        }
        
    }

    if(typeof dmc_3rd !== 'undefined' && dmc_3rd.length > 0)
    {
        for(var i=0;i<dmc_3rd.length;i++)
        {
            Sun = isWeekend(dmc_3rd[i]['txday']);
            day = isdate(dmc_3rd[i]['txday']);
            str = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">3RD</td>";
            str  = str + "<td width=\"20%\">"+ dmc_3rd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src=" + url +"assets/img/app/icon_damacai.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        

    }

    if(typeof dmc_SP !== 'undefined' && dmc_SP.length > 0)
    {
        for(var i=0;i<dmc_SP.length;i++)
        {
            Sun = isWeekend(dmc_SP[i]['txday']);
            day = isdate(dmc_SP[i]['txday']);
            str  = str + "<tr>"; 
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">SP</td>";
            str  = str + "<td width=\"20%\">"+ dmc_SP[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src=" + url +"assets/img/app/icon_damacai.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        
    }

    if(typeof dmc_CON !== 'undefined' && dmc_CON.length > 0)
    {
        for(var i=0;i<dmc_CON.length;i++)
        {
            Sun = isWeekend(dmc_CON[i]['txday']);
            day = isdate(dmc_CON[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">CON</td>";
            str  = str + "<td width=\"20%\">"+ dmc_CON[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src=" + url +"assets/img/app/icon_damacai.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        
    }

    // show magnum 
    var magnum_1st = sRes.magnum.l_mgnum_1st;
    var magnum_2nd = sRes.magnum.l_mgnum_2nd;
    var magnum_3rd = sRes.magnum.l_mgnum_3rd;
    var magnum_SP  = sRes.magnum.l_mgnum_specail;
    var magnum_CON = sRes.magnum.l_mgnum_conso;

    if(typeof magnum_1st !== 'undefined' && magnum_1st.length > 0) 
    {
        for(var i=0; i<magnum_1st.length;i++)
        {
            Sun = isWeekend(magnum_1st[i]['txday']);
            day = isdate(magnum_1st[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">1ST</td>";
            str  = str + "<td width=\"20%\">"+ magnum_1st[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day  +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+ url + "assets/img/app/icon_magnum.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        
    }

    if(typeof magnum_2nd !== 'undefined' && magnum_2nd.length > 0) 
    {
        for(var i=0;i<magnum_2nd.length;i++)
        {
            Sun = isWeekend(magnum_2nd[i]['txday']);
            day = isdate(magnum_2nd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">2ND</td>";
            str  = str + "<td width=\"20%\">"+ magnum_2nd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_magnum.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        
    }

    if(typeof magnum_3rd !== 'undefined' && magnum_3rd.length > 0)
    {
        for(var i=0;i<magnum_3rd.length;i++)
        {
            Sun = isWeekend(magnum_3rd[i]['txday']);
            day = isdate(magnum_3rd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">3RD</td>";
            str  = str + "<td width=\"20%\">"+ magnum_3rd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_magnum.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        

    }

    if(typeof magnum_SP !== 'undefined' && magnum_SP.length > 0)
    {
        for(var i=0;i<magnum_SP.length;i++)
        {
            Sun = isWeekend(magnum_SP[i]['txday']);
            day = isdate(magnum_SP[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">SP</td>";
            str  = str + "<td width=\"20%\">"+ magnum_SP[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_magnum.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        
    }

    if(typeof magnum_CON !== 'undefined' && magnum_CON.length > 0)
    {
        for(var i=0;i<magnum_CON.length;i++)
        {
            Sun = isWeekend(magnum_CON[i]['txday']);
            day = isdate(magnum_CON[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">CON</td>";
            str  = str + "<td width=\"20%\">"+ magnum_CON[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_magnum.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        
    }

    // show toto
    var toto_1st = sRes.toto.l_toto_1st;
    var toto_2nd = sRes.toto.l_toto_2nd;
    var toto_3rd = sRes.toto.l_toto_3rd;
    var toto_SP  = sRes.toto.l_toto_specail;
    var toto_CON = sRes.toto.l_toto_conso;

    if(typeof toto_1st !== 'undefined' && toto_1st.length > 0) 
    {
        for(var i=0; i<toto_1st.length;i++)
        {
            Sun = isWeekend(toto_1st[i]['txday']);
            day = isdate(toto_1st[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">1ST</td>";
            str  = str + "<td width=\"20%\">"+ toto_1st[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day  +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_toto_MY.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        
    }

    if(typeof toto_2nd !== 'undefined' && toto_2nd.length > 0) 
    {
        for(var i=0;i<toto_2nd.length;i++)
        {
            Sun = isWeekend(toto_2nd[i]['txday']);
            day = isdate(toto_2nd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">2ND</td>";
            str  = str + "<td width=\"20%\">"+ toto_2nd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_toto_MY.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        
    }

    if(typeof toto_3rd !== 'undefined' && toto_3rd.length > 0)
    {
        for(var i=0;i<toto_3rd.length;i++)
        {
            Sun = isWeekend(toto_3rd[i]['txday']);
            day = isdate(toto_3rd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">3RD</td>";
            str  = str + "<td width=\"20%\">"+ toto_3rd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_toto_MY.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }
        
    }

    if(typeof toto_SP !== 'undefined' && toto_SP.length > 0)
    {
        for(var i=0;i<toto_SP.length;i++)
        {
            Sun = isWeekend(toto_SP[i]['txday']);
            day = isdate(toto_SP[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">SP</td>";
            str  = str + "<td width=\"20%\">"+ toto_SP[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_toto_MY.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }    
    }

    if(typeof toto_CON !== 'undefined' && toto_CON.length > 0)
    {
        for(var i=0;i<toto_CON.length;i++)
        {
            Sun = isWeekend(toto_CON[i]['txday']);
            day = isdate(toto_CON[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">CON</td>";
            str  = str + "<td width=\"20%\">"+ toto_CON[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_toto_MY.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }     
    }

    // show pools
    var pools_1st = sRes.sin4d.l_sin4d_1st;
    var pools_2nd = sRes.sin4d.l_sin4d_2nd;
    var pools_3rd = sRes.sin4d.l_sin4d_3rd;
    var pools_SP  = sRes.sin4d.l_sin4d_specail;
    var pools_CON = sRes.sin4d.l_sin4d_conso;

    if(typeof pools_1st !== 'undefined' && pools_1st.length > 0) 
    {
        for(var i=0; i<pools_1st.length;i++)
        {
            Sun = isWeekend(pools_1st[i]['txday']);
            day = isdate(pools_1st[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">1ST</td>";
            str  = str + "<td width=\"20%\">"+ pools_1st[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day  +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_singapool.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof pools_2nd !== 'undefined' && pools_2nd.length > 0) 
    {
        for(var i=0;i<pools_2nd.length;i++)
        {
            Sun = isWeekend(pools_2nd[i]['txday']);
            day = isdate(pools_2nd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">2ND</td>";
            str  = str + "<td width=\"20%\">"+ pools_2nd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_singapool.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof pools_3rd !== 'undefined' && pools_3rd.length > 0)
    {
        for(var i=0;i<pools_3rd.length;i++)
        {
            Sun = isWeekend(pools_3rd[i]['txday']);
            day = isdate(pools_3rd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">3RD</td>";
            str  = str + "<td width=\"20%\">"+ pools_3rd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_singapool.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof pools_SP !== 'undefined' && pools_SP.length > 0)
    {
        for(var i=0;i<pools_SP.length;i++)
        {
            Sun = isWeekend(pools_SP[i]['txday']);
            day = isdate(pools_SP[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">SP</td>";
            str  = str + "<td width=\"20%\">"+ pools_SP[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_singapool.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof pools_CON !== 'undefined' && pools_CON.length > 0)
    {
        for(var i=0;i < pools_CON.length;i++)
        {
            Sun = isWeekend(pools_CON[i]['txday']);
            day = isdate(pools_CON[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">CON</td>";
            str  = str + "<td width=\"20%\">"+ pools_CON[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_singapool.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    // show cash sweep
    var cashswepp_1st = sRes.cashsweep.l_cashsweep_1st;
    var cashswepp_2nd = sRes.cashsweep.l_cashsweep_2nd;
    var cashswepp_3rd = sRes.cashsweep.l_cashsweep_3rd;
    var cashswepp_SP  = sRes.cashsweep.l_cashsweep_specail;
    var cashswepp_CON = sRes.cashsweep.l_cashsweep_conso;

    if(typeof cashswepp_1st !== 'undefined' && cashswepp_1st.length > 0) 
    {
        for(var i=0; i<cashswepp_1st.length;i++)
        {
            Sun = isWeekend(cashswepp_1st[i]['txday']);
            day = isdate(cashswepp_1st[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">1ST</td>";
            str  = str + "<td width=\"20%\">"+ cashswepp_1st[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day  +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_cashwep.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof cashswepp_2nd !== 'undefined' && cashswepp_2nd.length > 0) 
    {
        for(var i=0;i<cashswepp_2nd.length;i++)
        {
            Sun = isWeekend(cashswepp_2nd[i]['txday']);
            day = isdate(cashswepp_2nd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">2ND</td>";
            str  = str + "<td width=\"20%\">"+ cashswepp_2nd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_cashwep.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof cashswepp_3rd !== 'undefined' && cashswepp_3rd.length > 0)
    {
        for(var i=0;i<cashswepp_3rd.length;i++)
        {
            Sun = isWeekend(cashswepp_3rd[i]['txday']);
            day = isdate(cashswepp_3rd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">3RD</td>";
            str  = str + "<td width=\"20%\">"+ cashswepp_3rd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_cashwep.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof cashswepp_SP !== 'undefined' && cashswepp_SP.length > 0)
    {
        for(var i=0;i<cashswepp_SP.length;i++)
        {
            Sun = isWeekend(cashswepp_SP[i]['txday']);
            day = isdate(cashswepp_SP[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">SP</td>";
            str  = str + "<td width=\"20%\">"+ cashswepp_SP[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_cashwep.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof cashswepp_CON !== 'undefined' && cashswepp_CON.length > 0)
    {
        for(var i=0;i < cashswepp_CON.length;i++)
        {
            Sun = isWeekend(cashswepp_CON[i]['txday']);
            day = isdate(cashswepp_CON[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">CON</td>";
            str  = str + "<td width=\"20%\">"+ cashswepp_CON[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td widt h=\"30%\"><input src="+url+"assets/img/app/icon_cashwep.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    // show sabaha 88
    var sabaha88_1st = sRes.sabaha88.l_sabah88_1st;
    var sabaha88_2nd = sRes.sabaha88.l_sabah88_2nd;
    var sabaha88_3rd = sRes.sabaha88.l_sabah88_3rd;
    var sabaha88_SP  = sRes.sabaha88.l_sabah88_specail;
    var sabaha88_CON = sRes.sabaha88.l_sabah88_conso;

    if(typeof sabaha88_1st !== 'undefined' && sabaha88_1st.length > 0) 
    {
        for(var i=0; i<sabaha88_1st.length;i++)
        {
            Sun = isWeekend(sabaha88_1st[i]['txday']);
            day = isdate(sabaha88_1st[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">1ST</td>";
            str  = str + "<td width=\"20%\">"+ sabaha88_1st[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day  +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_sahbah88.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof sabaha88_2nd !== 'undefined' && sabaha88_2nd.length > 0) 
    {
        for(var i=0;i<sabaha88_2nd.length;i++)
        {
            Sun = isWeekend(sabaha88_2nd[i]['txday']);
            day = isdate(sabaha88_2nd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">2ND</td>";
            str  = str + "<td width=\"20%\">"+ sabaha88_2nd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_sahbah88.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof sabaha88_3rd !== 'undefined' && sabaha88_3rd.length > 0)
    {
        for(var i=0;i<sabaha88_3rd.length;i++)
        {
            Sun = isWeekend(sabaha88_3rd[i]['txday']);
            day = isdate(sabaha88_3rd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">3RD</td>";
            str  = str + "<td width=\"20%\">"+ sabaha88_3rd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_sahbah88.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof sabaha88_SP !== 'undefined' && sabaha88_SP.length > 0)
    {
        for(var i=0;i<sabaha88_SP.length;i++)
        {
            Sun = isWeekend(sabaha88_SP[i]['txday']);
            day = isdate(sabaha88_SP[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">SP</td>";
            str  = str + "<td width=\"20%\">"+ sabaha88_SP[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_sahbah88.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof sabaha88_CON !== 'undefined' && sabaha88_CON.length > 0)
    {
        for(var i=0;i < sabaha88_CON.length;i++)
        {
            Sun = isWeekend(sabaha88_CON[i]['txday']);
            day = isdate(sabaha88_CON[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">CON</td>";
            str  = str + "<td width=\"20%\">"+ sabaha88_CON[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_sahbah88.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }
    
    // show stc4D
    // show sabaha 88
    var stc4d_1st = sRes.stc4d.l_stc4d_1st;
    var stc4d_2nd = sRes.stc4d.l_stc4d_2nd;
    var stc4d_3rd = sRes.stc4d.l_stc4d_3rd;
    var stc4d_SP  = sRes.stc4d.l_stc4d_specail;
    var stc4d_CON = sRes.stc4d.l_stc4d_conso;

    if(typeof stc4d_1st !== 'undefined' && stc4d_1st.length > 0) 
    {
        for(var i=0; i<stc4d_1st.length;i++)
        {
            Sun = isWeekend(stc4d_1st[i]['txday']);
            day = isdate(stc4d_1st[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">1ST</td>";
            str  = str + "<td width=\"20%\">"+ stc4d_1st[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day  +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_STC4.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof stc4d_2nd !== 'undefined' && stc4d_2nd.length > 0) 
    {
        for(var i=0;i<stc4d_2nd.length;i++)
        {
            Sun = isWeekend(stc4d_2nd[i]['txday']);
            day = isdate(stc4d_2nd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">2ND</td>";
            str  = str + "<td width=\"20%\">"+ stc4d_2nd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_STC4.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof stc4d_3rd !== 'undefined' && stc4d_3rd.length > 0)
    {
        for(var i=0;i<stc4d_3rd.length;i++)
        {
            Sun = isWeekend(stc4d_3rd[i]['txday']);
            day = isdate(stc4d_3rd[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\" style=\"color:red;\">3RD</td>";
            str  = str + "<td width=\"20%\">"+ stc4d_3rd[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_STC4.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof stc4d_SP !== 'undefined' && stc4d_SP.length > 0)
    {
        for(var i=0;i<stc4d_SP.length;i++)
        {
            Sun = isWeekend(stc4d_SP[i]['txday']);
            day = isdate(stc4d_SP[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">SP</td>";
            str  = str + "<td width=\"20%\">"+ stc4d_SP[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_STC4.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }

    if(typeof stc4d_CON !== 'undefined' && stc4d_CON.length > 0)
    {
        for(var i=0;i < stc4d_CON.length;i++)
        {
            Sun = isWeekend(stc4d_CON[i]['txday']);
            day = isdate(stc4d_CON[i]['txday']);
            str  = str + "<tr>";
            str  = str + "<td width=\"10%\">"+ number +"</td>";
            str  = str + "<td width=\"10%\">CON</td>";
            str  = str + "<td width=\"20%\">"+ stc4d_CON[i]['Draw_No'] +"</td>";
            str  = str + "<td width=\"20%\">"+ day   +"</td>";
            str  = str + "<td width=\"10%\">"+ Sun + "</td>";
            str  = str + "<td width=\"30%\"><input src="+url+"assets/img/app/icon_STC4.png style=\"width:80%;\" type=\"image\"></td>";
            str  = str + "</tr>";
        }        
    }


    $("#showNumberHistory ").append(str);

    //console.log(str);

}