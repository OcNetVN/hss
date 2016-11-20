$(document).ready(function() {
    //editable
    $.fn.editable.defaults.mode = 'popup';
    /*get value date for textbox*/
    get_value_date(); 
    var txtdate = $("#txtdate").val();
    get_data_by_txtdate(txtdate);

});


function get_value_date()
{
    var d       = new Date();
    var month   = d.getMonth()+1;
    var day     = d.getDate();
    var strdate = (day<10 ? '0' : '') + day + '-' + (month<10 ? '0' : '') + month + '-' + d.getFullYear();

    $("#txtdate").val(strdate);
}

function get_data_by_txtdate(txtdate)
{ 
    var url             = window.location.href;     // Returns full URL
    var arr_url         =   url.split("/");
    var para_url        =   arr_url[(arr_url.length-1)];

    if(para_url         ==  "stt")
    {
        $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/get_list_sintoto",
            dataType:"text",
            data: {
                txtdate         :   txtdate
            },
            cache:false,
            success:function (data) {
                get_list_sintoto_Complete(data);
            },
            error: function () { alert("Error!");}
        });
    }

    if(para_url         ==  "spl")
    {
        $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/get_list_pools4D",
            dataType:"text",
            data: {
                txtdate         :   txtdate
            },
            cache:false,
            success:function (data) {
                get_list_pools4D_Complete(data);
            },
            error: function () { alert("Error!");}
        });
    }

    if(para_url         ==  "ssw")
    {
        $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/get_list_sinsweep",
            dataType:"text",
            data: {
                txtdate         :   txtdate
            },
            cache:false,
            success:function (data) {
                get_list_sinsweep_Complete(data);
            },
            error: function () { alert("Error!");}
        });
    }

    if(para_url         ==  "esb")
    {
        $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/get_list_sabah88",
            dataType:"text",
            data: {
                txtdate         :   txtdate
            },
            cache:false,
            success:function (data) {
                get_list_sabah88_Complete(data);
            },
            error: function () { alert("Error!");}
        });
    }

    if(para_url         ==  "estc")
    {
        $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/get_list_stc4d",
            dataType:"text",
            data: {
                txtdate         :   txtdate
            },
            cache:false,
            success:function (data) {
                get_list_stc4d_Complete(data);
            },
            error: function () { alert("Error!");}
        });
    }

    if(para_url         ==  "ecw")
    {
        $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/get_cash_sweep",
            dataType:"text",
            data: {
                txtdate         :   txtdate
            },
            cache:false,
            success:function (data) {
                get_list_cashsweep_Complete(data);
            },
            error: function () { alert("Error!");}
        });
    }
}

function ConverMonth(month_arr)
{
    var month;
    switch (month_arr) {
        case '01': month = "Jan";
            break;
        case '02': month = "Feb";
            break;
        case '03': month = "Mar";
            break;
        case '04': month = "Apr";
            break;
        case '05': month = "May";
            break;
        case '06': month = "Jun";
            break;
        case '07': month = "Jul";
            break;
        case '08': month = "Aug";
            break;
        case '09': month = "Sep";
            break;
        case '10': month = "Oct";
            break;
        case '11': month = "Nov";
            break;
        case '12': month = "Dec";
            break;
        default:
            month = "";
            break;
    }

    return month;
}

function get_list_cashsweep_Complete(data)
{
    var sRes = JSON.parse(data);
    var special;
    var consolation;
    var list_cashsweep;
    var str_1;
    var str_2nd;
    var str_3rd;
    if(sRes.rel==1 || sRes.rel == "1")
    {
        list_cashsweep = sRes.list_cashweep;
        if(list_cashsweep.length >0)
        {
            $("#lbldrawnocurr").html(list_cashsweep[0].Draw_No);
            $("#lbldrawdatecurr").html("\t");
            str_1   = sRes.str_st1;
            str_1   = str_1.split("|");
            $("#lbl1prize").html(str_1[0]);
            $("#lbl3d1").html(str_1[1]);
            str_2nd = sRes.str_nd2;
            str_2nd = str_2nd.split("|");
            $("#lbl2prize").html(str_2nd[0]);
            $("#lbl3d2").html(str_2nd[1]);
            str_3rd = sRes.str_rd3;
            str_3rd = str_3rd.split("|");
            $("#lbl3prize").html(str_3rd[0]);
            $("#lbl3d3").html(str_3rd[1]);
            special = list_cashsweep[0].Special;
            special = special.split("|");
            consolation = list_cashsweep[0].Consolation;
            consolation = consolation.split("|");
            for(var i=0;i<special.length;i++)
            {
                if(i<5)
                {
                    var j = i+5;
                    $("#lblstarter" +(i+1)).html(special[i]);
                    $("#lblstarter" + (j+1)).html(special[j]);
                }
            }

            for(var i=0;i<consolation.length;i++)
            {
                if(i<5)
                {
                    j = i+5;
                    $("#lblcons" + (i+1)).html(consolation[i]);
                    $("#lblcons" + (j+1)).html(consolation[j]);
                }
            }
            $("#lbldrawnocurr").editable();
            //$("#lbldrawdatecurr").editable();
            $("#lbl1prize").editable();
            $("#lbl3d1").editable();
            $("#lbl2prize").editable();
            $("#lbl3d2").editable();
            $("#lbl3prize").editable();
            $("#lbl3d3").editable();
            $("span[id*='lblstarter']" ).editable();
            $("span[id*='lblcons']" ).editable();
        }
    }

    if(sRes.rel == "")
    {
        $("#lbldrawnocurr").html("");
        //$("#lbldrawdatecurr").editable();
        $("#lbl1prize").html("");
        $("#lbl3d1").html("");
        $("#lbl2prize").html("");
        $("#lbl3d2").html("");
        $("#lbl3prize").html("");
        $("#lbl3d3").html("");
        $("span[id*='lblstarter']" ).html("");
        $("span[id*='lblcons']" ).html("");
    }
}

function get_list_stc4d_Complete(data)
{
    var sRes = JSON.parse(data);
    var special;
    var consolation;
    var list_stc;
    if(sRes.rel==1 || sRes.rel == "1")
    {
        list_stc = sRes.l_sandakan;
        if(list_stc.length >0)
        {
            $("#s_draw1").html(list_stc[0].Draw_No);
            $("#s_date12").html("\t");
            $("#prize1").html(sRes.st_1);
            $("#prize2").html(sRes.nd_2);
            $("#prize3").html(sRes.rd_3);
            special = list_stc[0].Special;
            special = special.split("|");
            consolation = list_stc[0].Consolation;
            consolation = consolation.split("|");

            if(special.length >0)
            {
                $("#Starter_1").html(special[0]);
                $("#Starter_3").html(special[1]);
                $("#Starter_5").html(special[2]);
                $("#Starter_7").html(special[3]);
                $("#Starter_9").html(special[4]);
                $("#Starter_2").html(special[5]);
                $("#Starter_4").html(special[6]);
                $("#Starter_6").html(special[7]);
                $("#Starter_8").html(special[8]);
                $("#Starter_10").html(special[9]);
            }

            if(consolation.length >0)
            {
                $("#consolation_1").html(consolation[0]);
                $("#consolation_3").html(consolation[1]);
                $("#consolation_5").html(consolation[2]);
                $("#consolation_7").html(consolation[3]);
                $("#consolation_9").html(consolation[4]);
                $("#consolation_2").html(consolation[5]);
                $("#consolation_4").html(consolation[6]);
                $("#consolation_6").html(consolation[7]);
                $("#consolation_8").html(consolation[8]);
                $("#consolation_10").html(consolation[9]);
            }

            //$("#s_date12").editable();
            $("#s_draw1").editable();
            $("#prize1").editable();
            $("#prize2").editable();
            $("#prize3").editable();
            $("strong[id*='consolation_']" ).editable();
            $("strong[id*='Starter_']" ).editable();

        }
    }

    if(sRes.rel == "")
    {
        $("strong[id*='s_']" ).html("");
        $("strong[id*='prize']" ).html("");
        $("strong[id*='consolation_']" ).html("");
        $("strong[id*='Starter_']" ).html("");
    }
}

function get_list_sabah88_Complete(data)
{
    var sRes = JSON.parse(data);
    var st_1;
    var str_nd2;
    var str_rd3;
    var loto;
    var loto_date;
    var lucky;
    var day;
    var month;
    var year;
    var listday;
    var consolation;
    if(sRes.rel==1 || sRes.rel=="1")
    {
        var listsabah = sRes.list_sabah88;
        if(listsabah.length >0)
        {
            loto_date= listsabah[0].Lotto_txday;
            year = loto_date.substring(0,4);
            day  = loto_date.substring(6);
            month = ConverMonth(loto_date.substring(4,6));
            listday = day + "-" + month + "-" + year;
            //console.log(day + "-" + month + year);

            $("#s_DrawFistDate").html(" "+listday);
            $("#s_DrawFist").html(listsabah[0].Lotto_DrawNo);
            $("#s_draw").html(listsabah[0].Draw_No);
            $("#s_drawday").html("\t");
            $("#jackpot_1").html(listsabah[0].Lotto_1st);
            $("#jackpot_2").html(listsabah[0].Lotto_2nd);
            str_2nd = sRes.str_nd2;
            str_2nd = str_2nd.split("|");
            $("#s_prize2").html(str_2nd[0]);
            $("#prize22").html(str_2nd[1]);
            str_rd3 = sRes.str_rd3;
            str_rd3 = str_rd3.split("|");
            $("#s_prize3").html(str_rd3[0]);
            $("#prize33").html(str_rd3[1]);
            st_1 = sRes.str_st1;
            st_1 = st_1.split("|");
            $("#s_prize1").html(st_1[0]);
            $("#prize11").html(st_1[1]);
            loto = listsabah[0].Lotto;
            loto = loto.split("|");
            console.log(loto);
            for(var i=0;i<loto.length-1;i++)
            {
                $("#winner_" + i).html(loto[i]);
            }

            $("#winner_6").html(loto[loto.length-1]);

            lucky = listsabah[0].Special;
            lucky = lucky.split("|");
            for(var i=0;i<lucky.length;i++)
            {
                if(i<5)
                {
                    var j =  i+5;
                    $("#Starter_0_" + (i+1)).html(lucky[i]);
                    $("#Starter_1_" + (i+1)).html(lucky[j]);
                }
            }

            consolation = listsabah[0].Consolation;
            consolation = consolation.split("|");
            for(var i=0;i<consolation.length;i++)
            {
                if(i<5)
                {
                    j = i+5;
                    $("#consolation_0_" + (i+1)).html(consolation[i]);
                    $("#consolation_1_" + (i+1)).html(consolation[j]);
                }
            }

            $("#s_DrawFist").editable();
            $("#s_DrawFistDate").editable();
            $("strong[id*='winner_']" ).editable();
            $("strong[id*='jackpot_']" ).editable();
            $("#s_draw").editable();
            //$("#s_drawday").editable();
            $("strong[id*='s_prize']" ).editable();
            $("strong[id*='prize']" ).editable();
            $("strong[id*='Starter_']" ).editable();
            $("strong[id*='consolation_']" ).editable();

        }
    }

    if(sRes.rel == "")
    {
        $("#s_DrawFist").html("");
        $("#s_DrawFistDate").html("");
        $("strong[id*='winner_']" ).html("");
        $("strong[id*='jackpot_']" ).html("");
        $("#s_draw").html("");
        $("#s_drawday").html("");
        $("strong[id*='s_prize']" ).html("");
        $("strong[id*='prize']" ).html("");
        $("strong[id*='Starter_']" ).html(" ");
        $("strong[id*='consolation_']" ).html("");
    }
}

function get_list_sinsweep_Complete(data)
{

    var sRes = JSON.parse(data);
    var _jp ;
    var _lucky;
    var _gif;
    var _consolation;
    var paticipation;
    var _ddegigh;
    if(sRes.rel ==1 || sRes.rel == "1")
    {
        //$("#spanDraw").html("");
        $("#spanDrawNo").html(sRes.draw_no);
        $("#inpt1st").val(sRes.prize11);
        $("#inpt11st").val(sRes.prize12);
        $("#inpt2st").val(sRes.ndprize11);
        $("#inpt22st").val(sRes.ndprize12);
        $("#inpt3st").val(sRes.rdprize11);
        $("#inpt33st").val(sRes.rdprize12);
        _jp = sRes.jp;
        _lucky = sRes.lucky;
        _gif =  sRes.gif;
        _consolation = sRes.consolation;
        paticipation = sRes.patical;
        _ddegigh     = sRes.ddelight;

        _jp = _jp.split("|");
        for(var i=0;i<_jp.length;i++)
        {
            if(i <5)
            {
                var j = i+5;
                $("#tbJackpotPrize tbody tr:eq(1) td:eq("+i+") input").val(_jp[i]);
                $("#tbJackpotPrize tbody tr:eq(2) td:eq("+ i+") input").val(_jp[j])
            }
        }
        _lucky = _lucky.split("|");
        for(var i=0;i<_lucky.length ;i++)
        {
            if(i < 5)
            {
                var h = i+5;

                $("#tbLuckyPrizes tbody tr:eq(1) td:eq("+ i+") input").val(_lucky[i]);
                $("#tbLuckyPrizes tbody tr:eq(2) td:eq("+ i+") input").val(_lucky[h]);
            }
        }
        _gif = _gif.split("|");
        for(var i=0;i<_gif.length;i++)
        {
            if(i<5)
            {
                var b = i+5;
                var c = i+10;
                var d = i+15;
                var k = i+20;
                var z = i+25;
                $("#gift_1_" + i).val(_gif[i]);
                $("#gift_2_" + i).val(_gif[b]);
                $("#gift_3_" + i).val(_gif[c]);
                $("#gift_4_" + i).val(_gif[d]);
                $("#gift_5_" + i).val(_gif[k]);
                $("#gift_6_" + i).val(_gif[z]);
            }
        }

        _consolation = _consolation.split("|");
        for(var i=0;i<_consolation.length;i++)
        {
            if(i<5)
            {
                var  l = i+5;
                var  h = i+10;
                var j = i+15;
                var k = i+20;
                var z = i+25;
                $("#conso_1_" + i).val(_consolation[i]);
                $("#conso_2_" + i).val(_consolation[b]);
                $("#conso_3_" + i).val(_consolation[c]);
                $("#conso_4_" + i).val(_consolation[d]);
                $("#conso_5_" + i).val(_consolation[k]);
                $("#conso_6_" + i).val(_consolation[z]);
            }
        }

        paticipation = paticipation.split("|");
        for(var i=0;i<paticipation.length;i++)
        {
            if(i<5)
            {
                l = i+5;
                h = i+10;
                j = i+15;
                k = i+20;
                z = i+25;
                a = i+30;
                b = i+35;
                d = i+40;
                var e = i+45;
                $("#parti_1_" + i).val(paticipation[i]);
                $("#parti_2_" + i).val(paticipation[b]);
                $("#parti_3_" + i).val(paticipation[c]);
                $("#parti_4_" + i).val(paticipation[d]);
                $("#parti_5_" + i).val(paticipation[k]);
                $("#parti_6_" + i).val(paticipation[z]);
                $("#parti_7_" + i).val(paticipation[a]);
                $("#parti_8_" + i).val(paticipation[b]);
                $("#parti_9_" + i).val(paticipation[d]);
                $("#parti_10_" + i).val(paticipation[e]);
            }
        }

        _ddegigh = _ddegigh.split("|");
        for(var i=0;i<9;i++)
        {
            $("#tbDelight tbody tr:eq(0) td:eq("+i+") input").val(_ddegigh[i]);
        }

    }
    if(sRes.rel == "")
    {
        $("#spanDraw").html(" ");
        $("#spanDrawNo").html(" ");
        $("input[id*='inpt']").val(" ");
        $("input[id*='jackpot_']" ).val(" ");
        $("input[id*='lucky_']").val(" ");
        $("input[id*='gift_']").val(" ");
        $("input[id*='conso_']").val(" ");
        //parti_
        $("input[id*='parti_']").val(" ");
    }

}

function get_list_pools4D_Complete(data)
{
    var sRes = JSON.parse(data);
    var starter ;
    var consolation;
    var sinpool = sRes.l_sinpool;
    if(sRes.rel ==1 || sRes.rel == "1")
    {
        if(sinpool.length > 0)
        {
            $("#s_drawno").html(sinpool[0].Draw_No);
            $("#s_drawday").html("\t");
            $("#prs_1").html(sRes.str_1st);
            $("#prs_2").html(sRes.str_2nd);
            $("#prs_3").html(sRes.str_3rd);
            starter = sinpool[0].Special;
            starter = starter.split("|");
            for(var i=0;i<starter.length;i++)
            {
                if(i <5)
                {
                    var j = i+5;
                    $("#Starter_" + i + "_1").html(starter[i]);
                    $("#Starter_" + i + "_2").html(starter[j]);
                }
            }
            consolation = sinpool[0].Consolation;
            consolation = consolation.split("|");
            for(var i=0;i<consolation.length ;i++)
            {
                if(i < 5)
                {
                    var h = i+5;

                    $("#consolation_" + i + "_1").html(starter[i]);
                    $("#consolation_" + i + "_2").html(starter[h]);
                }
            }

            $("#s_drawno").editable();

            $("#prs_1").editable();
            $("#prs_2").editable();
            $("#prs_3").editable();
            $("strong[id*='Starter_']" ).editable();
            $("strong[id*='consolation_']" ).editable();
        }
    }
    if(sRes.rel == "")
    {
        $("#s_drawno").html(" ");
        $("#s_drawday").html(" ");
        $("#prs_1").html(" ");
        $("#prs_2").html(" ");
        $("#prs_3").html(" ");
        $("strong[id*='Starter_']" ).html(" ");
        $("strong[id*='consolation_']" ).html(" ");
    }
}


function get_list_sintoto_Complete(data)
{
    var group1;
    var group2;
    var group3;
    var group4;
    var group5;
    var group6;
    var group7;
    var win;
    var sRes = JSON.parse(data);
    if(sRes.rel ==1 || sRes.rel == "1")
    {
        var sintoo = sRes.l_sintoo;
        if(sintoo.length > 0)
        {
            $("#s_drawno").html(sintoo[0].Draw_No);
            $("#s_addNumber").html(sintoo[0].Add_Number);
            $("#s_Amount").html(sintoo[0].Amount_Jackpot);
            group1 = sintoo[0].Group1;
            group1 = group1.split("|");
            $("#st_group1_0").html(group1[0]);
            $("#st_group1_1").html(group1[1]);
            group2 = sintoo[0].Group2;
            group2 = group2.split("|");
            $("#st_group2_0").html(group2[0]);
            $('#st_group2_1').html(group2[1]);
            group3 = sintoo[0].Group3;
            group3 = group3.split("|");
            $("#st_group3_0").html(group3[0]);
            $("#st_group3_1").html(group3[1]);
            group4 = sintoo[0].Group4;
            group4 = group4.split("|");
            $("#st_group4_0").html(group4[0]);
            $("#st_group4_1").html(group4[1]);
            group5  = sintoo[0].Group5;
            group5 = group5.split("|");
            $("#st_group5_0").html(group5[0]);
            $("#st_group5_1").html(group5[0]);
            group6 = sintoo[0].Group6;
            group6 = group6.split("|");
            $("#st_group6_0").html(group6[0]);
            $("#st_group6_1").html(group6[1]);
            group7 = sintoo[0].Group7;
            group7 = group7.split("|");
            $("#st_group7_0").html(group7[0]);
            $("#st_group7_1").html(group7[1]);

            win = sintoo[0].WinNo;
            win = win.split("|");
            for(var i=0;i<win.length;i++)
            {
                $("#winning_" +i).html(win[i]);
            }

            $("#s_drawno").editable();
            $("#s_Amount").editable();
            $("#s_addNumber").editable();
            $("strong[id*='winning_']" ).editable();
            $("strong[id*='st_group']" ).editable();

        }
    }
    if(sRes.rel == "")
    {
        $("#s_drawno").html(" ");
        $("#s_drawday").html(" ");
        $("#s_addNumber").html(" ");
        $("strong[id*='winning_']" ).html(" ");
        $("strong[id*='st_group']" ).html(" ");
    }
}


function ConvertSweepSin()
{
    if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertSweepSin_Chrome();
    }
    else
    {
        ConvertSweepSin_FireFox();
    }
}

function ConvertSinSTC4D()
{
    if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertSinSTC4D_Chrome();
    }
    else
    {
        ConvertSinSTC4D_FireFox();
    }
}

function ConvertCashSweep()
{
    if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertCashSweep_Chrome();
    }
    else
    {
        ConvertCashSweep_FireFox();
    }
}

function ConvertCashSweep_Chrome()
{
    var txtConvert = $('#ContentConvert').val();
    var lines = txtConvert.split('\t');

    var soDong = lines.length;
    //   console.log(lines) ;
    //  console.log(soDong)   ;
    var list = [];
    var dong;
    var cols;
    var cash11st;
    var cash12st;
    var cash22nd;
    var cash21nd;
    var cash31rd;
    var cash32rd;
    var st1;
    var nd2;
    var rd3;
    var txtday;
    var draw_no;
    var special1 = "";
    var special2 = "";
    var special;
    var consolation1 = "";
    var consolation2 = "";
    var consolation;
    if(soDong > 0)
    {
        var data = {};
        dong = lines[0];           
        cols = dong.split(' ');
        cols2 = lines[1].split('\n');       
        txtday = cols2[0].split(':');
        day =   txtday[1].split(',')
        $("#lbldrawdatecurr").text(day[1]);

        draw_no = cols[3];
        $("#lbldrawnocurr").text(draw_no);

        //dong = lines[5];
        //cols = dong.split(' ');
        cash11st = lines[3];
        $("#lbl1prize").text(cash11st);

        dong = lines[4];
        cols = dong.split('\n');
        cash12st = cols[0];
        $("#lbl3d1").text(cash12st);      
        cash21nd = lines[5];
        $("#lbl2prize").text(cash21nd);


        dong = lines[6];
        cols = dong.split('\n');
        cash22nd = cols[0];
        $("#lbl3d2").text(cash22nd);

        cash31rd = lines[7];
        $("#lbl3prize").text(cash31rd);
        dong = lines[8];
        cols = dong.split('\n');
        cash32rd = cols[0];

        $("#lbl3d3").text(cash32rd);          

        st1 = cash11st + "|" + cash12st;
        nd2 = cash21nd + "|" + cash22nd;
        rd3 = cash31rd + "|" + cash32rd;
        cols = lines[9].split('\n');
        $("#lblstarter1").text(cols[1]);
        $("#lblstarter6").text(lines[10]);
        $("#lblcons1").text(lines[11]);

        dong = lines[12];            
        cols = dong.split('\n');
        $("#lblcons6").text(cols[0]);
        $("#lblstarter2").text(cols[1]);
        $("#lblstarter7").text(lines[13]);
        $("#lblcons2").text(lines[14]);
        dong = lines[15];            
        cols = dong.split('\n');

        $("#lblcons7").text(cols[0]);          
        $("#lblstarter3").text(cols[1]);
        $("#lblstarter8").text(lines[16]);
        $("#lblcons3").text(lines[17]);
        dong = lines[18];            
        cols = dong.split('\n'); 
        $("#lblcons8").text(cols[0]);
        $("#lblstarter4").text(cols[1]);
        $("#lblstarter9").text(lines[19]);
        $("#lblcons4").text(lines[20]); 
        dong = lines[21];            
        cols = dong.split('\n'); 
        $("#lblcons9").text(cols[0]);
        $("#lblstarter5").text(cols[1]);
        $("#lblstarter10").text(lines[22]);
        $("#lblcons5").text(lines[23]); 
        $("#lblcons10").text(lines[24]); 
                                                

        $("#lbldrawnocurr").editable();
        $("#lbldrawdatecurr").editable();
        $("#lbl1prize").editable();
        $("#lbl3d1").editable();
        $("#lbl2prize").editable();
        $("#lbl3d2").editable();
        $("#lbl3prize").editable();
        $("#lbl3d3").editable();
        $("span[id*='lblstarter']" ).editable();
        $("span[id*='lblcons']" ).editable();
        // data.txtday = txtday;
        // data.draw_no = draw_no;
        // data.st1 = st1;
        // data.nd2 = nd2;
        // data.rd3 = rd3;
        // data.special = special;
        // data.consolation = consolation;
        // list[0] = data;
        // console.log(list);
    }
    //SaveCashSweepSin(list);
    $('#ContentConvert').val('');

}

function ConvertCashSweep_FireFox()
{
    var txtConvert = $('#ContentConvert').val();
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    var list = [];
    var dong;
    var cols;
    var cash11st;
    var cash12st;
    var cash22nd;
    var cash21nd;
    var cash31rd;
    var cash32rd;
    var st1;
    var nd2;
    var rd3;
    var txtday;
    var draw_no;
    var special1 = "";
    var special2 = "";
    var special;
    var consolation1 = "";
    var consolation2 = "";
    var consolation;
    if(soDong > 0)
    {
        var data = {};
        dong = lines[0];
        cols = dong.split(' ');
        draw_no = cols[cols.length - 1];

        dong = lines[1];
        cols = dong.split(' ');
        txtday  = cols[cols.length -1];

        dong = lines[6];
        cols = dong.split('\t');
        //console.log(cols);
        cash11st = cols[1];
        dong = lines[7];
        cols = dong.split('\t');
        //console.log(cols);
        cash12st = cols[1];
        dong = lines[9];
        cols = dong.split('\t');
        cash21nd = cols[1];
        dong = lines[10];
        cols  = dong.split('\t');
        cash22nd = cols[1];
        dong = lines[12];
        cols = dong.split('\t');
        cash31rd = cols[1];
        dong = lines[13];
        cols = dong.split('\t');
        cash32rd = cols[1];

        st1 = cash11st + "|" + cash12st;
        nd2 = cash21nd + "|" + cash22nd;
        rd3 = cash31rd + "|" + cash32rd;

        for(var i=16;i<=20;i++)
        {
            dong = lines[i];
            cols = dong.split('\t');
            special1 = special1 +   cols[0] +  '|';
            special2 = special2 +   cols[1]   + "|"; 

        }
        special = special1  + special2;

        for( var h=24;h<=28; h++)
        {
            dong = lines[h];
            cols = dong.split('\t');
            consolation1 = consolation1  + cols[0] + "|";
            consolation2 = consolation2  + cols[1] + "|";
        }
        consolation = consolation1 + consolation2;

        data.txtday = txtday;
        data.draw_no = draw_no;
        data.st1 = st1;
        data.nd2 = nd2;
        data.rd3 = rd3;
        data.special = special;
        data.consolation = consolation;
        list[0] = data;
        console.log(list);
    }

    SaveCashSweepSin(list);
    $('#ContentConvert').val('');
}

function SaveCashSweep_AC()
{
    var list = [];

    var st1;
    var nd2;
    var rd3;
    var txtday;
    var draw_no;
    var special1 = "";
    var special2 = "";
    var special;
    var consolation1 = "";
    var consolation2 = "";
    var consolation;
    var result = confirm("You want to save all ?");
    if(result){
        var data_cashsweep = {};
        // end consolation
        txtday   = $("#lbldrawdatecurr").html();
        draw_no  = $("#lbldrawnocurr").html();
        st1 = $("#lbl1prize").text() + "|" + $("#lbl3d1").text();
        nd2 = $("#lbl2prize").text() + "|" + $("#lbl3d2").text();
        rd3 = $("#lbl3prize").text() + "|" + $("#lbl3d3").text();
        // special pize
        for(var i=1;i<=10;i++)
        {
            if(i <=5)
            {
                special1 = special1 + $("#lblstarter" + i).html() + "|";
            }
            else{
                special2 = special2 + $("#lblstarter" + i).html() + "|";
            }
        }
        special = special1 + special2;

        for(var i=1;i<=10;i++)
        {
            if(i<=5)
            {
                consolation1 = consolation1 +$("#lblcons" + i).html() + "|";
            }
            else
            {
                consolation2 = consolation2 + $("#lblcons" + i).html() + "|";
            }


        }
        consolation = consolation1 + consolation2;
        // end special pize
        data_cashsweep.txtday = txtday;
        data_cashsweep.draw_no = draw_no;
        data_cashsweep.st1 = st1;
        data_cashsweep.nd2 = nd2;
        data_cashsweep.rd3 = rd3;
        data_cashsweep.special = special;
        data_cashsweep.consolation = consolation;
        list[0] = data_cashsweep;
        console.log(list);
        SaveCashSweepSin(list,data_cashsweep);
    } 
}

function ClearCashSweep_AC()
{
    $("#ContentConvert").val(" ");
}
// end page convert cash sweep for firefox

function ConvertSinSTC4D_Chrome()
{
    var txtConvert = $('#ContentConvert').val();
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    if(soDong > 0)
    {

    }
}

function ConvertSinSTC4D_FireFox()
{
    var txtConvert = $('#ContentConvert').val();
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    var list = [];
    var dong;
    var cols;
    var txtday;
    var draw_no;
    var prizes1st;
    var prizes2nd;
    var prizes3rd;
    var specail;
    var specail1 = "";
    var consolation;
    var consolation1 = "";
    if(soDong > 0)
    {
        var data = {};
        dong = lines[1];
        cols = dong.split(' ');
        console.log(cols);
        txtday  = cols[cols.length-2];
        $("#s_date12").html(txtday);
        draw_no = cols[2];
        $("#s_draw1").html(draw_no);
        prizes1st = lines[3];
        $("#prize1").html(prizes1st);
        prizes2nd = lines[5];
        $("#prize2").html(prizes2nd);
        prizes3rd = lines[7];
        $("#prize3").html(prizes3rd);

        for(var i=10;i<=19;i++)
        {
            dong = lines[i];
            cols = dong.split(' ');
            //specail1 = specail1 +  cols[cols.length-1] + '|' ;
            $("#Starter_" + (i-9)).html(cols[cols.length-1]);
        }

        for(var h=23;h<=32;h++)
        {
            dong = lines[h];
            cols = dong.split(' ');
            //consolation1 = consolation1  + cols[cols.length-1] + '|';
            $("#consolation_" + (h-22)).html(cols[cols.length-1]);
        }


        $("#s_date12").editable();
        $("#s_draw1").editable();
        $("#prize1").editable();
        $("#prize2").editable();
        $("#prize3").editable();
        $("strong[id*='consolation_']" ).editable();
        $("strong[id*='Starter_']" ).editable();

        $("#ContentConvert").val(" ");
        // data.txtday = txtday;
        // data.draw_no = draw_no;
        // data.prizes1st = prizes1st;
        // data.prizes2nd = prizes2nd;
        // data.prizes3rd = prizes3rd;
        // data.special = specail1;
        // data.consolation = consolation1;
        // list[0] = data;
        // console.log(list);
    }

    //SaveSinSTC4D(list);
}


function SaveSinSTC4D_AC()
{
    var list = [];
    var txtday;
    var draw_no;
    var prizes1st;
    var prizes2nd;
    var prizes3rd;
    var specail;
    var specail1 = "";
    var specail2 = "";
    var consolation;
    var consolation1 = "";
    var consolation2 = "";
    var result = confirm("You want to save all ?");
    if(result){
        var data_stc4 = {};
        // end consolation
        txtday   = $("#s_date12").html();
        draw_no  = $("#s_draw1").html();
        prizes1st = $("#prize1").html();
        prizes2nd = $("#prize2").html();
        prizes3rd = $("#prize3").html();
        // special pize
        for(var i=1;i<=10;i+=2)
        {
            specail1 = specail1 + $("#Starter_" + i).html() + "|";
            specail2 = specail2 + $("#Starter_" + (i+1)).html() + "|";
        }
        specail = specail1 + specail2;

        for(var i=1;i<=10;i+=2)
        {
            consolation1 = consolation1 +$("#consolation_" + i).html() + "|";
            consolation2 = consolation2 + $("#consolation_" + (i+1)).html() + "|";
        }
        consolation = consolation1 + consolation2;
        // end special pize
        data_stc4.txtday = txtday;
        data_stc4.draw_no = draw_no;
        data_stc4.prizes1st = prizes1st;
        data_stc4.prizes2nd = prizes2nd;
        data_stc4.prizes3rd = prizes3rd;
        data_stc4.special = specail;
        data_stc4.consolation = consolation;
        list[0] = data_stc4;
        //console.log(list);
        SaveSinSTC4D(list,data_stc4);
    } 
}

function ClearSinSTC4D()
{
    $("#ContentConvert").val(" ");
}
/***** Page convert Sin pools 4 d ****/

function ConvertSin88()
{
    if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
        ConvertSin88_Chrome();
    }
    else
    {
        ConvertSin88_FireFox();
    }
}

function ConvertSin88_Chrome()
{
    var txtConvert = $('#ContentConvert').val();
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    //console.log(lines) ;
    //  console.log("So dong" + soDong);
    var Draw_no ;
    var draw;
    var Draw_date;
    var txtday;
    var lotto_DrawNo;
    var lotto = "";
    var loto_Drawdate;
    var prizes1st;
    var prizes2nd;
    var special;
    var special1="";
    var special2 = "";
    var consolation = "";
    var consolation1 = "";
    var consolation2 = "";
    var st1;
    var st11;
    var nd22;
    var rd32;
    var pos1;
    var pos2;
    var pos3;
    var nd2;
    var rd3;
    var dong;
    var cols;
    var list = [];
    if(soDong > 0)
    {
        var sin88 = {};
        dong    = lines[0];
        cols    = dong.split(' ');
        //console.log(cols);
        draw    = cols[cols.length-1];
        $("#s_DrawFist").html(draw);
        $("#s_DrawFistDate").html(cols[10]);
        $("#s_draw").html(draw);
        $("#s_drawday").html(cols[10]);
        $("#s_draw1").html(draw);
        $("#s_date12").html(cols[10]);
        dong     = lines[lines.length-5];
        cols    = dong.split('\t');
        var j = 0
        if(cols.length > 0)
        {
            for(var i=0;i<cols.length-1;i+=2)
            {
                $("#winner_" + j).html(cols[i]);
                j++;
            }
            $("#winner_6").html(cols[cols.length-1]);
        }

        dong = lines[lines.length-2];
        cols = dong.split('\t');
        console.log('Show cols jackpot' + dong);
        prizes1st = cols[0];
        prizes2nd = cols[2];
        $("#jackpot_1").html(prizes1st);
        $("#jackpot_2").html(prizes2nd);

        dong = lines[6];
        //console.log(dong);
        cols = dong.split('\t');
        j = 0;
        if(cols.length > 0)
        {
            for(var i=1;i < cols.length-1;i+=2)
            {
                j++;
                $("#s_prize" + j).html(cols[i]);
                //console.log(cols[i]);
            }
        }
        dong = lines[13];
        cols = dong.split('\t');
        j = 0;
        if(cols.length > 0)
        {
            for(var i=1;i < cols.length-1;i+=2)
            {
                j++;
                $("#prize" + j + j).html(cols[i]);
                //console.log(cols[i]);
            }
        }

        dong = lines[17];
        cols = dong.split('\t');
        j = 0;
        if(cols.length > 0)
        {
            for(var i=1;i < cols.length ;i+=2)
            {
                j++;
                //console.log(cols[i]);
                $("#Starter_0_" + j ).html(cols[i]);
            }
        }

        dong = lines[19];
        cols = dong.split('\t');
        j = 0;
        if(cols.length > 0)
        {
            for(var i=1;i < cols.length ; i++)
            {
                j++;
                //console.log(cols[i]);
                $("#Starter_1_" + j ).html(cols[i]);
            }
        }


        special = special1  + special2;

        dong = lines[23];
        cols = dong.split('\t');
        j = 0;
        if(cols.length > 0)
        {
            for(var i=1;i < cols.length ;i+=2)
            {
                j++;
                //console.log(cols[i]);
                $("#consolation_0_" + j ).html(cols[i]);
            }
        }

        dong = lines[25];
        cols = dong.split('\t');
        j = 0;
        if(cols.length > 0)
        {
            for(var i=1;i < cols.length ; i++)
            {
                j++;
                //console.log(cols[i]);
                $("#consolation_1_" + j ).html(cols[i]);
            }
        }


        //consolation = consolation1 + consolation2;
        $("#s_DrawFist").editable();
        $("#s_DrawFistDate").editable();
        $("strong[id*='winner_']" ).editable();
        $("strong[id*='jackpot_']" ).editable();
        $("#s_draw").editable();
        $("#s_drawday").editable();
        $("strong[id*='s_prize']" ).editable();
        $("strong[id*='prize']" ).editable();
        $("strong[id*='Starter_']" ).editable();
        $("strong[id*='consolation_']" ).editable();
    }
    //SaveSabah88(list);
    $('#ContentConvert').val(" ");
}

function ConvertSin88_FireFox()
{
    var txtConvert = $('#ContentConvert').val();
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    var Draw_no ;
    var draw;
    var Draw_date;
    var txtday;
    var lotto_DrawNo;
    var lotto = "";
    var loto_Drawdate;
    var prizes1st;
    var prizes2nd;
    var special = "";
    var special1= "";
    var special2 = "";
    var consolation = "";
    var consolation1 = "";
    var consolation2 = "";
    var st1;
    var st11;
    var nd22;
    var rd32;
    var pos1;
    var pos2;
    var pos3;
    var nd2;
    var rd3;
    var dong;
    var cols;
    var list = [];
    if(soDong > 0)
    {
        var sin88 = {};
        dong    = lines[0];
        cols    = dong.split('\t');
        Draw_no = cols[1];
        Draw_no = Draw_no.split(':');
        draw    = Draw_no[1];

        dong    = lines[1];
        cols    = dong.split(":");
        txtday  = cols[1];

        dong    = lines[2];
        cols    = dong.split('\t');
        lotto   =  cols[0] + "|" + cols[1] + "|" + cols[2] + "|" + cols[3] + "|" + cols[4] + "|" + cols[5] + "|" + "+" + cols[7];

        dong = lines[3];
        cols = dong.split('\t');
        prizes1st = cols[1];

        dong = lines[4];
        cols = dong.split('\t');
        prizes2nd = cols[1];

        dong    = lines[5];
        cols    = dong.split('\t');
        Draw_no = cols[1];
        Draw_no = Draw_no.split(':');
        lotto_DrawNo    = Draw_no[1];

        dong    = lines[6];
        cols    = dong.split(":");
        loto_Drawdate  = cols[1];

        dong = lines[8];
        cols = dong.split('\t');
        st1  = cols[0];
        nd2  =  cols[1];
        rd3  = cols[2];
        dong = lines[12];
        cols = dong.split('\t');
        st11 = cols[0];
        nd22 = cols[1];
        rd32 = cols[2]; 

        pos1 = st1 + "|" + st11;
        pos2 = nd2 + "|" + nd22;
        pos3 = rd3 + "|" + rd32;

        for(var i=14;i<=18;i++)
        {
            dong = lines[i];
            cols = dong.split('\t');
            special1 = special1 + cols[0] + "|" ;
            special2 = special2  + cols[1] + "|"; 

        }
        special = special1  + special2;


        for( var h=21;h<=25; h++)
        {
            dong = lines[h];
            cols = dong.split('\t');
            consolation1 = consolation1  + cols[0] + "|";
            consolation2 = consolation2  + cols[1] + "|" ;
        }
        consolation = consolation1 + consolation2;

        sin88.lotton_draw = draw;
        sin88.lotto_date  = txtday;
        sin88.consolation = consolation;
        sin88.prizes1st   = prizes1st;
        sin88.prizes2nd   = prizes2nd;
        sin88.pos1        = pos1;
        sin88.pos2        = pos2;
        sin88.pos3        = pos3;
        sin88.special     = special;
        sin88.lotto       = lotto;
        sin88.txtday      = txtday;
        sin88.draw_no     = draw;
        list[0] = sin88;
        console.log(list);
    }

    SaveSabah88(list);
    $('#ContentConvert').val(" ");

}

function SaveSin88_AC()
{
    var list = [];
    var draw;
    var Draw_date;
    var txtday;
    var lotto_DrawNo;
    var lotto = "";
    var loto_Drawdate;
    var prizes1st;
    var prizes2nd;
    var special;
    var special1="";
    var special2 = "";
    var consolation = "";
    var consolation1 = "";
    var consolation2 = "";
    var st1;
    var st11;
    var nd22;
    var rd32;
    var pos1;
    var pos2;
    var pos3;
    var nd2;
    var rd3;
    var result = confirm("You want to save all ?");
    if(result){
        var sin88 = {};

        lotto_DrawNo      = $("#s_DrawFist").html();
        loto_Drawdate     = $("#s_DrawFistDate").html();
        txtday            = $("#s_drawday").html();
        draw              = $("#s_draw").html();
        prizes1st   = $("#jackpot_1").html();
        prizes2nd   = $("#jackpot_2").html();

        pos1 = $("#s_prize1").html() + "|" + $("#prize11").html();
        pos2 = $("#s_prize2").html() + "|" + $("#prize22").html();
        pos3 = $("#s_prize3").html() + "|" + $("#prize33").html();

        // logo
        for(var i=0;i<6;i++)
        {
            lotto = lotto + $("#winner_" + i).html() + "|";
        }
        lotto = lotto + $("#winner_6").html(); 
        // end logo 

        // lucky
        for(var i=1;i<6;i++)
        {
            special1 = special1 + $("#Starter_0_" + i).html() + "|";
        }
        for(var i=1;i<6;i++)
        {
            special2 = special2 + $("#Starter_1_" + i).html() + "|";
        }
        special = special1 + special2;
        // end lucky
        // consolation
        for(var i=1;i<6;i++)
        {
            consolation1 = consolation1 + $("#consolation_0_" +i).html() + "|";
        }
        for(var i=1;i<6;i++)
        {
            consolation2 = consolation2 + $("#consolation_1_" +i).html() + "|";
        }
        consolation = consolation1+consolation2;
        // end consolation

        sin88.lotton_draw = lotto_DrawNo;
        sin88.lotto_date  = loto_Drawdate;
        sin88.consolation = consolation;
        sin88.prizes1st  = prizes1st;
        sin88.prizes2nd  = prizes2nd;
        sin88.pos1       = pos1;
        sin88.pos2       = pos2;
        sin88.pos3       = pos3;
        sin88.special    = special;
        sin88.lotto      = lotto;
        sin88.txtday     = loto_Drawdate;
        sin88.draw_no    = lotto_DrawNo;
        list[0] = sin88;
        //console.log(list);
        SaveSabah88(list,sin88);
    } 
}

function Clear()
{
    $('#ContentConvert').val(" ");
}

/********** end page convert ******/

/**** Page convert Sin to to ***/

function ConvertSinToTo()
{
    var txtConvert = $('#ContentConvert').val();
    var lines = txtConvert.split('\n');
    var soDong = lines.length;
    var list = [];
    var draw_no ;
    var txtday;
    var winner = "";
    var addnumber;
    var group1 = "";
    var group2 = "";
    var group3 = "";
    var group4 = "";
    var group5 = "";
    var group6 = "";
    var group7 = "";
    var dong;
    var cols;
    //console.log(lines);
    if(soDong > 0)
    {
        var toto = {};
        if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase()))
        {
            dong = lines[0];
            cols = dong.split(',');
            cols = cols[1];
            cols = cols.split('\t');
            $("#s_drawday").text(cols[0]);
            cols = cols[1];
            cols = cols.split(' ');
            draw_no = cols[cols.length-1];
            $("#s_drawno").text(draw_no);

            dong = lines[2];
            cols = dong.split('\t');
            for(var j=0;j<6;j++)
            {
                $("#winning_" + j).html(cols[j]);
            }

            addnumber = lines[4];
            $("#s_addNumber").html(addnumber);

            var amount_price = lines[6];
            //s_Amount
            $("#s_Amount").html(amount_price);
            dong = lines[9];
            cols = dong.split('\t');
            if(cols.length > 0)
            {
                for(var i=1;i<=cols.length;i++)
                {
                    $("#st_group1_" + (i-1)).html(cols[i]);
                }
            }

            dong = lines[10];
            cols = dong.split('\t');
            if(cols.length > 0)
            {
                for(var i=1;i<=cols.length;i++)
                {
                    $("#st_group2_" + (i-1)).html(cols[i]);
                }
            }

            dong = lines[11];
            cols = dong.split('\t');
            if(cols.length > 0)
            {
                for(var i=1;i<=cols.length;i++)
                {
                    $("#st_group3_" + (i-1)).html(cols[i]);
                }
            }

            dong = lines[12];
            cols = dong.split('\t');
            if(cols.length > 0)
            {
                for(var i=1;i<=cols.length;i++)
                {
                    $("#st_group4_" + (i-1)).html(cols[i]);
                }
            }

            dong = lines[13];
            cols = dong.split('\t');
            if(cols.length > 0)
            {
                for(var i=1;i<cols.length;i++)
                {
                    $("#st_group5_" + (i-1)).html(cols[i]);
                }
            }

            dong = lines[14];
            cols = dong.split('\t');
            if(cols.length > 0)
            {
                for(var i=1;i<=cols.length;i++)
                {
                    $("#st_group6_" + (i-1)).html(cols[i]);
                }
            }

            dong = lines[15];
            cols = dong.split('\t');
            if(cols.length > 0)
            {
                for(var i=1;i<=cols.length;i++)
                {
                    $("#st_group7_" + (i-1)).html(cols[i]);
                }
            }

        }


        $("#s_drawno").editable();
        $("#s_drawday").editable();
        $("#s_addNumber").editable();
        $("strong[id*='winning_']" ).editable();
        $("strong[id*='st_group']" ).editable();
    }
    //SaveSinToTo(list);
}

function SaveSinToTo_Ac()
{
    var list = [];
    var draw_no ;
    var txtday;
    var winner = "";
    var addnumber;
    var amount_price;
    var group1 = "";
    var group2 = "";
    var group3 = "";
    var group4 = "";
    var group5 = "";
    var group6 = "";
    var group7 = "";
    var result = confirm("You want to save all ?");
    if(result){
        var toto = {};

        txtday = $("#s_drawday").html();
        draw_no = $("#s_drawno").html();
        // winner 
        for(var i=0;i<6;i++)
        {

            winner = winner + $("#winning_" + i).html() + "|";
        }
        // end winner
        addnumber = $("#s_addNumber").html();

        amount_price = $("#s_Amount").html();
        // group 1
        group1 = group1 + $("#st_group1_0").html() + "|" + $("#st_group1_1").html();
        // end group 1

        // group 2
        group2 = group2 + $("#st_group2_0").html() + "|" + $("#st_group2_1").html();
        // end group 3
        group3 = group3 + $("#st_group3_0").html() + "|" + $("#st_group3_1").html();
        group4 = group4 + $("#st_group4_0").html() + "|" + $("#st_group4_1").html();
        group5 = group5 + $("#st_group5_0").html() + "|" + $("#st_group5_1").html();
        group6 = group6 + $("#st_group6_0").html() + "|" + $("#st_group6_1").html();
        group7 = group7 + $("#st_group7_0").html() + "|" + $("#st_group7_1").html();

        toto.txtday = txtday;
        toto.draw_no = draw_no;
        toto.winner = winner;
        toto.addnumber = addnumber;
        toto.amountprice = amount_price;
        toto.group1 = group1;
        toto.group2 = group2;
        toto.group3 = group3;
        toto.group4 = group4;
        toto.group5 = group5;
        toto.group6 = group6;
        toto.group7 = group7;
        list[0] = toto;
        console.log(list);
        SaveSinToTo(list,toto);
    } 
}

function ClearSinToTo()
{
    $("#ContentConvert").val(" ");
}

/*---- page convert singapore sweep */
function ConvertSweepSin_Chrome()
{
    var txtConvert = $('#ContentConvert').val();
    var lines = txtConvert.split('\n');
    console.log(lines);
    var soDong = lines.length;
    var list = [];
    var dong;
    var cols;
    var txtday;
    var draw_no;
    var jopok = "";
    var lucky1;
    var lucky2;
    var gift1;
    var gift2;
    var gift3;
    var gift4;
    var gift5;
    var gift6;
    var cons1;
    var cons2;
    var cons3;
    var cons4;
    var cons5;
    var cons6;

    var ddelight = "";

    if(soDong > 0)
    {
        var data = {};
        for(var i=0;i<soDong;i++)
        {
            dong = lines[0];
            cols = dong.split(',');
            cols = cols[1];
            cols = cols.split('\t');
            $("#spanDraw").text(cols[0]);
            cols = cols[1];
            cols = cols.split(' ');
            draw_no = cols[cols.length-1];
            $("#spanDrawNo").text(draw_no);

            dong = lines[1];
            cols = dong.split('\t');
            var prizes1st = cols[0];
            prizes1st = prizes1st.split(' ');
            $("#inpt11st").val(prizes1st[prizes1st.length-1]);
            var prize2nd  = cols[1];
            prize2nd  = prize2nd.split(' ');
            $("#inpt22st").val(prize2nd[prize2nd.length-1]);
            var prize3rd  = cols[2];
            prize3rd = prize3rd.split(' ');
            $("#inpt33st").val(prize3rd[prize3rd.length-1]);

            dong = lines[2];
            cols = dong.split('\t');
            $("#inpt1st").val(cols[0]);
            $("#inpt2st").val(cols[1]);
            $("#inpt3st").val(cols[2]);
            dong = lines[4];
            cols = dong.split('\t');
            dong = lines[5];
            cols1 = dong.split('\t');
            for(var j=0;j<5;j++)
            {
                $("#tbJackpotPrize tbody tr:eq(1) td:eq("+j+") input").val(cols[j]);
                $("#tbJackpotPrize tbody tr:eq(2) td:eq("+j+") input").val(cols1[j]);
            }

            dong = lines[7];
            lucky = dong.split('\t');
            dong = lines[8];
            lucky1 = dong.split('\t');
            for(var j=0;j<5;j++)
            {
                $("#tbLuckyPrizes tbody tr:eq(1) td:eq("+j+") input").val(lucky[j]);
                $("#tbLuckyPrizes tbody tr:eq(2) td:eq("+j+") input").val(lucky1[j]);
            }

            dong = lines[10];
            gift1 = dong.split('\t');
            dong = lines[11];
            gift2 = dong.split('\t');
            dong = lines[12];
            gift3 = dong.split('\t');
            dong = lines[13];
            gift4 = dong.split('\t');
            dong = lines[14];
            gift5 = dong.split('\t');
            dong  = lines[15];
            gift6 = dong.split('\t');

            for(var j=0;j<5;j++)
            {
                $("#tb30GiftPrize tbody tr:eq(1) td:eq("+j+") input").val(gift1[j]);
                $("#tb30GiftPrize tbody tr:eq(2) td:eq("+j+") input").val(gift2[j]);
                $("#tb30GiftPrize tbody tr:eq(3) td:eq("+j+") input").val(gift3[j]);
                $("#tb30GiftPrize tbody tr:eq(4) td:eq("+j+") input").val(gift4[j]);
                $("#tb30GiftPrize tbody tr:eq(5) td:eq("+j+") input").val(gift5[j]);
                $("#tb30GiftPrize tbody tr:eq(6) td:eq("+j+") input").val(gift6[j]);
            }

            dong = lines[17];
            cons1 = dong.split('\t');
            dong = lines[18];
            cons2 = dong.split('\t');
            dong = lines[19];
            cons3 = dong.split('\t');
            dong = lines[20];
            cons4 = dong.split('\t');
            dong = lines[21];
            cons5 = dong.split('\t');
            dong  = lines[22];
            cons6 = dong.split('\t');
            for(var j=0;j<5;j++)
            {
                $("#tbConsolation tbody tr:eq(1) td:eq("+j+") input").val(cons1[j]);
                $("#tbConsolation tbody tr:eq(2) td:eq("+j+") input").val(cons2[j]);
                $("#tbConsolation tbody tr:eq(3) td:eq("+j+") input").val(cons3[j]);
                $("#tbConsolation tbody tr:eq(4) td:eq("+j+") input").val(cons4[j]);
                $("#tbConsolation tbody tr:eq(5) td:eq("+j+") input").val(cons5[j]);
                $("#tbConsolation tbody tr:eq(6) td:eq("+j+") input").val(cons6[j]);
            }

            dong = lines[24];
            var parti1 = dong.split('\t');
            dong = lines[25];
            var parti2 = dong.split('\t');
            dong = lines[26];
            var parti3 = dong.split('\t');
            dong = lines[27];
            var parti4 = dong.split('\t');
            dong = lines[28];
            var parti5 = dong.split('\t');
            dong  = lines[29];
            var parti6 = dong.split('\t');
            dong  = lines[30];
            var parti7 = dong.split('\t');
            dong  = lines[31];
            var parti8 = dong.split('\t');
            dong  = lines[32];
            var parti9 = dong.split('\t');
            dong  = lines[33];
            var parti10 = dong.split('\t');

            for(var j=0;j<5;j++)
            {
                $("#tbParticipation tbody tr:eq(1) td:eq("+j+") input").val(parti1[j]);
                $("#tbParticipation tbody tr:eq(2) td:eq("+j+") input").val(parti2[j]);
                $("#tbParticipation tbody tr:eq(3) td:eq("+j+") input").val(parti3[j]);
                $("#tbParticipation tbody tr:eq(4) td:eq("+j+") input").val(parti4[j]);
                $("#tbParticipation tbody tr:eq(5) td:eq("+j+") input").val(parti5[j]);
                $("#tbParticipation tbody tr:eq(6) td:eq("+j+") input").val(parti6[j]);
                $("#tbParticipation tbody tr:eq(7) td:eq("+j+") input").val(parti7[j]);
                $("#tbParticipation tbody tr:eq(8) td:eq("+j+") input").val(parti8[j]);
                $("#tbParticipation tbody tr:eq(9) td:eq("+j+") input").val(parti9[j]);
                $("#tbParticipation tbody tr:eq(10) td:eq("+j+") input").val(parti10[j]);
            }
        }
        // 315,000 2D Delight pries 
        dong = lines[35];
        cols = dong.split('\t');
        dong = lines[36];
        var cols1 = dong.split('\t');
        dong  = lines[37];
        var cols2 = dong.split('\t');
        for(var j=0;j<3;j++)
        {
            $("#tbDelight tbody tr:eq(0) td:eq("+j+") input").val(cols[j]);
            $("#tbDelight tbody tr:eq(0) td:eq("+(j+3)+") input").val(cols1[j]);
            $("#tbDelight tbody tr:eq(0) td:eq("+(j+6)+") input").val(cols2[j]);
        }

        //console.log(list);
    }
    //SaveSinWeep(list);
    $('#ContentConvert').val("");   
}

function SaveSweepSin()
{
    var list = [];
    var txtday;
    var draw_no;
    var stprize11;
    var stprize12;
    var stprize21;
    var stprize22;
    var stprize31;
    var stprize32;
    var jopok = "";
    var lucky = "";
    var gift = "";
    var consolation = "";
    var participation = "";
    var ddelight = "";
    var result = confirm("You want to save all ?");
    if(result){
        var data_sweep = {};
        txtday = $("#spanDraw").text();
        draw_no = $("#spanDrawNo").text();
        stprize11 = $("#inpt1st").val();
        stprize12 = $("#inpt11st").val();
        stprize21 = $("#inpt2st").val();
        stprize22 = $("#inpt22st").val();
        stprize31 = $("#inpt3st").val();
        stprize32 = $("#inpt33st").val();
        data_sweep.txtday        = txtday;
        data_sweep.draw_no       = draw_no;
        data_sweep.stprize11     = stprize11;
        data_sweep.stprize12     = stprize12;
        data_sweep.stprize21     = stprize21;
        data_sweep.stprize22     = stprize22;
        data_sweep.stprize31     = stprize31;
        data_sweep.stprize32     = stprize32;

        // get data jackpot 
        for(var i=0;i<5;i++)
        {
            jopok = jopok + $("#tbJackpotPrize tbody tr:eq(1) td:eq("+ i+") input").val() + "|"; 
        }
        for(var i=0;i<5;i++)
        {  
            jopok = jopok + $("#tbJackpotPrize tbody tr:eq(2) td:eq("+ i+") input").val() + "|"; 
        }
        console.log(jopok);
        // end get data jackpot
        // get data lucky
        for(var i=0;i<5;i++)
        {
            lucky = lucky + $("#tbLuckyPrizes tbody tr:eq(1) td:eq("+ i+") input").val() + "|"; 
        }
        for(var i=0;i<5;i++)
        {  
            lucky = lucky + $("#tbLuckyPrizes tbody tr:eq(2) td:eq("+ i+") input").val() + "|"; 
        }
        // end data lucky
        console.log(lucky);
        for(var i=1;i<=6;i++)
        {
            for(var j=0;j<5;j++)
            {
                gift = gift + $("#tb30GiftPrize tbody tr:eq("+i+") td:eq("+j+") input").val() + "|"; 
            }
        }
        console.log(gift);
        for(var i=1;i<=6;i++)
        {
            for(var j=0;j<5;j++)
            {
                consolation = consolation + $("#tbConsolation tbody tr:eq("+i+") td:eq("+j+") input").val() + "|"; 
            }
        }
        console.log(consolation);
        for(var i=1;i<=10;i++)
        {
            for(var j=0;j<5;j++)
            {
                participation = participation + $("#tbParticipation tbody tr:eq("+i+") td:eq("+j+") input").val() + "|"; 
            }
        }
        console.log(participation);
        for(var i=0;i<9;i++)
        {
            ddelight = ddelight + $("#tbDelight tbody tr:eq(0) td:eq("+i+") input").val() + "|";
        }

        console.log(ddelight);
        data_sweep.jopok         = jopok;
        data_sweep.lucky         = lucky;
        data_sweep.gift          = gift;
        data_sweep.consolation   = consolation;
        data_sweep.participation = participation;
        data_sweep.ddelight      = ddelight;
        list[0] = data_sweep;

        $.ajax({
            type:"POST",
            url: "../admin/homelt_controller/SaveSinWeep",
            dataType:"text",
            data: {SinWeep: JSON.stringify(list),
                choosedate:$("#txtdate").val()
            },
            cache:false,
            success:function (data) {
                SaveSinSWeep_Complete(data,data_sweep);
                //socket.emit('SaveToteSin', "RefreshSin" );
            },
            error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
        });
    } 
}

function SaveSinSWeep_Complete(data,data_sweep)
{
    var sRes = JSON.parse(data);
    if(sRes.Rel == 1 || sRes.Rel == "1")
    {
        var trans = {};
        trans.message = 'LotSinSweep';
        trans.list    = data_sweep;
        $("#spantb").html("Successfuly");
        socket.emit('PageRefresh',trans);
    }
}

function ClearSweepSin()
{
    $("#ContentConvert").val(" ");
}

// function ConvertSweepSin_FireFox()
// {
//    var txtConvert = $('#ContentConvert').val();
//     var lines = txtConvert.split('\n');
//     var soDong = lines.length;
//     var list = [];
//     var dong;
//     var cols;
//     var txtday;
//     var draw_no;
//     var stprize11;
//     var stprize12;
//     var stprize21;
//     var stprize22;
//     var stprize31;
//     var stprize32;
//     var jopok = "";
//     var lucky = "";
//     var gift = "";
//     var consolation = "";
//     var participation = "";
//     var ddelight = "";
//     var dong1;
//     var dong2;
//     var dong3;
//     var dong4;
//     var dong5;
//     var dong6;
//     var count2;
//     var dem2;
//     var count21;
//     var count22;
//     var count23;
//     var count24;
//     var count1; 
//     var dem1;
//     var count;
//     var dem;
//     var count25;
//     var count26;
//     var count27;
//     var count28;

//     if(soDong > 0)
//     {
//         var data = {};
//         dong = lines[0];
//         cols = dong.split(' ');
//         txtday = cols[1];
//         $("#spanDraw").text(txtday);
//         draw_no = cols[cols.length-1];
//         $("#spanDrawNo").text(draw_no);

//         dong = lines[2];
//         stprize11 = dong;
//         $("#inpt1st").val(stprize11);

//         dong = lines[3];
//         stprize12 = dong;
//         $("#inpt11st").val(stprize12);

//         dong = lines[6];
//         stprize21 = dong;
//         $("#inpt2st").val(stprize21);

//         dong = lines[7];
//         stprize22 = dong;
//         $("#inpt22st").val(stprize22);

//         dong = lines[10];
//         stprize31 = dong;
//         $("#inpt3st").val(stprize31);

//         dong = lines[11];
//         stprize32 = dong;
//         $("#inpt33st").val(stprize32);

//         count = 0;
//         dem   = 0;
//         for(var j=14;j<= 27 ;j+=2)
//         {
//            dong = lines[j];
//            cols = dong.split('\t');
//            //console.log("Dong tren" + cols);
//            if(cols.length == 1)
//            {
//               count++;
//              $("#tbJackpotPrize tbody tr:eq(1) td:eq("+(count - 1)+") input").val(cols[0]);
//            }

//            dong = lines[j+1];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               dem++;
//              //console.log("Dong dươi" + cols[0]);
//               $("#tbJackpotPrize tbody tr:eq(2) td:eq("+(dem - 1)+") input").val(cols[0]);
//            }
//         }  
//         //console.log(jopok);
//          count1 = 0;
//          dem1   = 0;
//         for(var h=29;h<= 42;h+=2)
//         {
//            dong   = lines[h];
//            cols   = dong.split('\t');
//            if(cols.length == 1)
//            {
//              count1++;
//               //lucky = lucky + cols[0] + "|";
//               $("#tbLuckyPrizes tbody tr:eq(1) td:eq("+(count1 - 1)+") input").val(cols[0]);
//            }

//            dong = lines[h+1];
//            cols   = dong.split('\t');
//            if(cols.length == 1)
//            {
//               dem1++;
//               $("#tbLuckyPrizes tbody tr:eq(2) td:eq("+(dem1 - 1)+") input").val(cols[0]);
//            } 
//         }
//         //console.log(lucky);
//         // 30 Gift Prizes @ $3,000 each
//          count2   = 0;
//          dem2     = 0;
//          count21  = 0;
//          count22  = 0;
//          count23  = 0;
//          count24  = 0;
//         for(var l= 44;l<=77;l++)
//         { 
//           dong = lines[l];
//           cols = dong.split('\t');
//           console.log(cols);
//           if(cols.length == 1)
//           {
//             count2++;
//             //console.log(cols[0]);
//              //gift = gift + cols[0] + "|";
//              $("#tb30GiftPrize tbody tr:eq(1) td:eq("+(count2 - 1)+") input").val(cols[0]); 
//           }

//           dong = lines[l+1];
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//             dem2++;
//             $("#tb30GiftPrize tbody tr:eq(2) td:eq("+(dem2 - 1)+") input").val(cols[0]);
//           }
//           dong = lines[l+2]; 
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//             count21++;
//             $("#tb30GiftPrize tbody tr:eq(3) td:eq("+(count21 - 1)+") input").val(cols[0]);
//           }  
//           dong = lines[l+3];
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//             count22++;
//             $("#tb30GiftPrize tbody tr:eq(4) td:eq("+(count22 - 1)+") input").val(cols[0]);
//           }
//           dong = lines[l+4];
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//              count23++;
//             $("#tb30GiftPrize tbody tr:eq(5) td:eq("+(count23 - 1)+") input").val(cols[0]);
//           }
//           dong = lines[l+5];
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//             count24++;
//             $("#tb30GiftPrize tbody tr:eq(6) td:eq("+(count24 - 1)+") input").val(cols[0]);
//           }
//         }
//         //console.log(gift);

//         count2=0;
//         dem2=0;
//         count21=0;
//         count22=0;
//         count23=0;
//         count24=0;
//         for(var k=79;k<=112;k+=6)
//         {
//           dong = lines[k];
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//             //consolation = consolation + cols[0] + '|';
//             count2++;
//             $("#tbConsolation tbody tr:eq(1) td:eq("+(count2 - 1)+") input").val(cols[0]);
//           }
//           dong = lines[k+1];
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//             dem2++;
//             $("#tbConsolation tbody tr:eq(2) td:eq("+(dem2 - 1)+") input").val(cols[0]);
//           }
//           dong = lines[k+2]; 
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//             count21++;
//             $("#tbConsolation tbody tr:eq(3) td:eq("+(count21 - 1)+") input").val(cols[0]);
//           }

//           dong = lines[k+3];
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//             count22++;
//             $("#tbConsolation tbody tr:eq(4) td:eq("+(count22 - 1)+") input").val(cols[0]);
//           }
//           dong = lines[k+4];
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//             count23++;
//             $("#tbConsolation tbody tr:eq(5) td:eq("+(count23 - 1)+") input").val(cols[0]);
//           }
//           dong = lines[l+5];
//           cols = dong.split('\t');
//           if(cols.length == 1)
//           {
//             count24++;
//             $("#tbConsolation tbody tr:eq(6) td:eq("+(count24 - 1)+") input").val(cols[0]); 
//           }

//         }
//         //console.log(consolation);
//         // 30 consolation prize

//         // 50 pratiction

//         count2 = 0;
//         dem2 = 0;
//         count21 = 0;
//         count22 = 0;
//         count23 = 0;
//         count24 = 0;
//         count26 = 0;
//         count25 = 0;
//         count27 = 0;
//         count28 = 0;
//         for(var z=114;z<=167;z+=10)
//         {
//            // dong = lines[z];
//            // cols = dong.split('\t');
//            // //console.log(cols);
//            // if(cols.length == 1)
//            // {
//            //    participation = participation + cols[0] + "|";
//            // }           
//            dong = lines[z];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               count2++;
//               $("#tbParticipation tbody tr:eq(1) td:eq("+(count2 - 1)+") input").val(cols[0]);
//            }
//            dong = lines[z+1];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               dem2++;
//               $("#tbParticipation tbody tr:eq(2) td:eq("+(dem2 - 1)+") input").val(cols[0]);
//            }

//            dong = lines[z+2];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               count21++;
//               $("#tbParticipation tbody tr:eq(3) td:eq("+(count21 - 1)+") input").val(cols[0]);
//            }
//            dong = lines[z+3];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               count22++;
//               $("#tbParticipation tbody tr:eq(4) td:eq("+(count22 - 1)+") input").val(cols[0]);
//            }

//            dong = lines[z+4];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//                count23++;
//               $("#tbParticipation tbody tr:eq(5) td:eq("+(count23 - 1)+") input").val(cols[0]);
//            }

//            dong = lines[z+5];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               count24++;
//               $("#tbParticipation tbody tr:eq(6) td:eq("+(count24 - 1)+") input").val(cols[0]);
//            }

//            dong = lines[z+6];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               count25++;
//               $("#tbParticipation tbody tr:eq(7) td:eq("+(count25 - 1)+") input").val(cols[0]);
//            }

//            dong = lines[z+7];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               count26++;
//               $("#tbParticipation tbody tr:eq(8) td:eq("+(count26 - 1)+") input").val(cols[0]);
//            }

//            dong = lines[z+8];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               count27++;
//               $("#tbParticipation tbody tr:eq(9) td:eq("+(count27 - 1)+") input").val(cols[0]);
//            }

//            dong = lines[z+9];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               count28++;
//               $("#tbParticipation tbody tr:eq(10) td:eq("+(count28 - 1)+") input").val(cols[0]);
//            }

//         }
//         // end 30 consolation prize
//         // 315,000 2D Delight pries 
//         count2 = 0;
//         for(var y=169;y<=185;y++)
//         {  
//            dong = lines[y];
//            cols = dong.split('\t');
//            if(cols.length == 1)
//            {
//               count2++;
//               //ddelight = ddelight + cols[0] + "|";
//               $("#tbDelight tbody tr:eq(0) td:eq("+(count2 - 1)+") input").val(cols[0]);
//            }
//         }
//         // end 315,000 2D Delight pries

//         data.txtday       = txtday;
//         data.draw_no      = draw_no;
//         data.stprize11    = stprize11;
//         data.stprize12    = stprize12;
//         data.stprize21    = stprize21;
//         data.stprize22    = stprize22;
//         data.stprize32    = stprize32;
//         data.stprize31    = stprize31;
//         data.jopok        = jopok;
//         data.lucky        = lucky;
//         data.gift         = gift;
//         data.consolation  = consolation;
//         data.participation = participation;
//         data.ddelight      = ddelight;
//         list[0] = data;
//         //console.log(list);
//       }

//       //SaveSinWeep(list);
//       $('#ContentConvert').val("");   
// }


/*---- end page convert singapore sweep */
function ConvertPools4D()
{
    var txtConvert = $('#ContentConvert').val();
    //var len = txt_convert.length;
    var lines = txtConvert.split('\n');
    var soDong = lines.length; 
    var str = "";
    var list = [];
    var dong;
    var cols;
    var txday;
    var draw_no;
    var st1;
    var nd2;
    var rd3;
    var special1;
    var special2;
    var special3;
    var special4;
    var special5;
    var special;

    var consolation1;
    var consolation2;
    var consolation3;
    var consolation4;
    var consolation5;
    var consolation;
    var no;
    var NoDraw;
    if(soDong > 0)
    {
        //var Pools = {};

        dong = lines[0];
        cols = dong.split(',');
        cols = cols[1];
        cols = cols.split('\t');
        $("#s_drawday").text(cols[0]);
        cols = cols[1];
        cols = cols.split(' ');
        draw_no = cols[cols.length-1];
        $("#s_drawno").text(draw_no);

        dong = lines[1];
        cols = dong.split('\t');
        st1  = cols[1];
        $("#prs_1").html(st1);

        dong = lines[2];
        cols = dong.split('\t');
        nd2  = cols[1];
        $("#prs_2").html(nd2);

        dong = lines[3];
        cols = dong.split('\t');
        rd3  = cols[1];
        $("#prs_3").html(rd3);

        // starter prizes
        dong = lines[5];
        cols = dong.split('\t');

        $("#Starter_0_1").html(cols[0]);
        $("#Starter_0_2").html(cols[1]);
        dong = lines[6];
        cols = dong.split('\t');
        $("#Starter_1_1").html(cols[0]);
        $("#Starter_1_2").html(cols[1]);

        dong = lines[7];
        cols = dong.split('\t');
        $("#Starter_2_1").html(cols[0]);
        $("#Starter_2_2").html(cols[1]);

        dong = lines[8];
        cols = dong.split('\t');
        $("#Starter_3_1").html(cols[0]);
        $("#Starter_3_2").html(cols[1]);

        dong = lines[9];
        cols = dong.split('\t');
        $("#Starter_4_1").html(cols[0]);
        $("#Starter_4_2").html(cols[1]);

        // consolation prizes
        dong = lines[11];
        cols = dong.split('\t');
        $("#consolation_0_1").html(cols[0]);
        $("#consolation_0_2").html(cols[1]);

        dong = lines[12];
        cols = dong.split('\t');
        $("#consolation_1_1").html(cols[0]);
        $("#consolation_1_2").html(cols[1]);

        dong = lines[13];
        cols = dong.split('\t');
        $("#consolation_2_1").html(cols[0]);
        $("#consolation_2_2").html(cols[1]);

        dong = lines[14];
        cols = dong.split('\t');
        $("#consolation_3_1").html(cols[0]);
        $("#consolation_3_2").html(cols[1]);

        dong = lines[15];
        cols = dong.split('\t');
        $("#consolation_4_1").html(cols[0]);
        $("#consolation_4_2").html(cols[1]);


        $("#s_drawno").editable();
        $("#s_drawday").editable();
        $("#prs_1").editable();
        $("#prs_2").editable();
        $("#prs_3").editable();
        $("strong[id*='Starter_']" ).editable();
        $("strong[id*='consolation_']" ).editable();

    }

    //SavePools(list);
    $('#ContentConvert').val("");
}

function SavePools4D_AC()
{
    var list = [];
    var txday;
    var draw_no;
    var st1;
    var nd2;
    var rd3;
    var special1;
    var special2;
    var special3;
    var special4;
    var special5;
    var special;

    var consolation1;
    var consolation2;
    var consolation3;
    var consolation4;
    var consolation5;
    var consolation;
    var result = confirm("You want to save all ?");
    if(result){
        var Pools = {};

        txday = $("#s_drawday").html();
        draw_no = $("#s_drawno").html();
        st1 = $("#prs_1").html();
        nd2 = $("#prs_2").html();   
        rd3 = $("#prs_3").html();

        // specail 
        special1  = $("#Starter_0_1").html()  + "|" + $("#Starter_0_2").html();
        special2  = $("#Starter_1_1").html()  + "|" + $("#Starter_1_2").html();
        special3  = $("#Starter_2_1").html() + "|" + $("#Starter_2_2").html();
        special4  = $("#Starter_3_1").html() + "|" + $("#Starter_3_2").html();
        special5  = $("#Starter_4_1").html()  + "|" + $("#Starter_4_2").html();
        special   = special1  + "|" + special2 + "|" + special3 + "|" + special4 + "|" + special5;
        // end speacail

        // consolation
        consolation1 = $("#consolation_0_1").html() + "|" + $("#consolation_0_2").html();
        consolation2 = $("#consolation_1_1").html() + "|" + $("#consolation_1_2").html();
        consolation3 = $("#consolation_2_1").html() + "|" + $("#consolation_2_2").html();
        consolation4 = $("#consolation_3_1").html() + "|" + $("#consolation_3_2").html();
        consolation5 = $("#consolation_4_1").html() + "|" + $("#consolation_4_2").html();
        consolation = consolation1 +"|"+consolation2+"|"+consolation3+"|"+consolation4+"|"+consolation5;
        // end consolation

        Pools.draw_no = draw_no;
        Pools.txday   = txday;
        Pools.st1     = st1;
        Pools.nd2     = nd2;
        Pools.rd3     = rd3;
        Pools.consolation = consolation;
        Pools.special    = special;
        list[0] = Pools;
        console.log(list);
        SavePools(list,Pools);
    } 
}

function SavePools(list,Pools){
    //var RaceCardID = $("#RaceCard_ID").text();
    //var RaceNo     = $("#spanRaceNo").text();
    var choosedate = $("#txtdate").val(); 
    $.ajax({
        type:"POST",
        url: "../admin/homelt_controller/SavePools",
        dataType:"text",
        data: {Pools: JSON.stringify(list),
            choosedate:choosedate
        },
        cache:false,
        success:function (data) {
            SavePools_Complete(data,Pools);
            //socket.emit('SaveToteSin', "RefreshSin" );
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function SavePools_Complete(data,Pools){
    var sRes = JSON.parse(data);
    if(sRes.Rel == 1 || sRes.Rel == "1")
    {
        var trans = {};
        trans.message = 'LotSinpools';
        trans.list     = Pools
        socket.emit('PageRefresh', trans);
        $("#sptt").show(500);
        $("#spnott").hide();
    } 

    if(sRes.Rel == null || sRes.Rel == "")
    {
        $("#spnott").show(500);
        $("#sptt").hide();
    }   
}

function ClearPools4D()
{
    $("#ContentConvert").val(" ");
}
// end page convert Pools
function SaveSinWeep(list)
{
    $.ajax({
        type:"POST",
        url: "../admin/homelt_controller/SaveSinWeep",
        dataType:"text",
        data: {SinWeep: JSON.stringify(list)
        },
        cache:false,
        success:function (data) {
            SavePools_Complete(data);
            //socket.emit('SaveToteSin', "RefreshSin" );
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function SaveCashSweepSin(list,data_cashsweep)
{
    $.ajax({
        type:"POST",
        url: "../admin/homelt_controller/SaveCashSweepSin",
        dataType:"text",
        data: {
            CashSweep: JSON.stringify(list),
            choosedate:$("#txtdate").val()
        },
        cache:false,
        success:function (data) {
            SaveCashSweepSin_Complete(data,data_cashsweep);
            //socket.emit('SaveToteSin', "RefreshSin" );
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function SaveCashSweepSin_Complete(data,data_cashsweep){
    var sRes = JSON.parse(data);
    if(sRes.Rel == 1 || sRes.Rel == "1")
    {
        var trans = {};
        trans.message = 'LotCashsweep';
        trans.list    = data_cashsweep;
        $("#spantb").html("Successfuly");
        socket.emit('PageRefresh',trans);
    } 

    if(sRes.Rel == null || sRes.Rel == "")
    {
        $("#spantb").html("Not Successfuly");
    }   
}

function SaveSabah88(list,sin88)
{
    $.ajax({
        type:"POST",
        url: "../admin/homelt_controller/SaveSabah88",
        dataType:"text",
        data: {Sabah: JSON.stringify(list),
            choosedate:$("#txtdate").val()
        },
        cache:false,
        success:function (data) {
            SaveSabah88_Complete(data,sin88);
            //socket.emit('SaveToteSin', "RefreshSin" );
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function SaveSabah88_Complete(data,sin88){
    var sRes = JSON.parse(data);
    if(sRes.Rel == 1 || sRes.Rel == "1")
    {
        var trans = {};
        trans.message = "LotSabah";
        trans.list    = sin88;
        socket.emit('PageRefresh',trans);
        // $("#sptt").show(500);
        // $("#spnott").hide();
        $("#sptt").html("Successfuly");
    } 

    if(sRes.Rel == null || sRes.Rel == "")
    {
        // $("#spnott").show(500);
        // $("#sptt").hide();
        $("#sptt").html("Not Successfuly");
    }   
}

function SaveSinSTC4D(list,data_stc4)
{
    $.ajax({
        type:"POST",
        url: "../admin/homelt_controller/SaveSinSTC4D",
        dataType:"text",
        data: {stc4d: JSON.stringify(list),
            choosedate:$("#txtdate").val()
        },
        cache:false,
        success:function (data) {
            SaveSinSTC4D_Complete(data,data_stc4);
            //socket.emit('SaveToteSin', "RefreshSin" );
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function SaveSinSTC4D_Complete(data,data_stc4)
{
    var sRes = JSON.parse(data);
    if(sRes.Rel == 1 || sRes.Rel == "1")
    {
        var trans = {};
        trans.message = "LotSandakan";
        trans.list    = data_stc4;
        $("#spanTb").html("Successfuly");
        socket.emit('PageRefresh',trans);
    } 

    if(sRes.Rel == null || sRes.Rel == "")
    {
        $("#spanTb").html("Not Successfuly");
    }   
}

function SaveSinToTo(list,toto)
{

    var choosedate = $("#txtdate").val();
    $.ajax({
        type:"POST",
        url: "../admin/homelt_controller/SaveSinToTo",
        dataType:"text",
        data: {toto: JSON.stringify(list),
            choosedate:choosedate
        },
        cache:false,
        success:function (data) {
            SaveSinToTo_Complete(data,toto);
            //socket.emit('SaveToteSin', "RefreshSin" );
        },
        error: function () { alert("Có lỗi xảy ra!"); $("body").removeClass("loading");}
    });
}

function SaveSinToTo_Complete(data,toto)
{
    var sRes = JSON.parse(data);
    if(sRes.Rel == 1 || sRes.Rel == "1"){
        $("#span_suffcell").text("Successfuly");
        var trans = {};
        trans.message = 'LotSintoto';
        trans.list    = toto;

        socket.emit('PageRefresh',trans);
        $("#sptt").show(500);
        $("#spnott").hide();
    } 

    if(sRes.Rel == null || sRes.Rel == "")
    {
        $("#spnott").show(500);
        $("#sptt").hide();
    }   
}