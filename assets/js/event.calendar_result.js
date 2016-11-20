// call this from the developer console and you can control both instances
var calendars = {};

$(document).ready( function() {

    // here's some magic to make sure the dates are happening this month.
    var thisMonth = moment().format('YYYY-MM');

    var eventArray = [
        { startDate: thisMonth + '-10', endDate: thisMonth + '-14', title: 'Multi-Day Event' },
        { startDate: thisMonth + '-21', endDate: thisMonth + '-23', title: 'Another Multi-Day Event' }
    ];

    // the order of the click handlers is predictable.
    // direct click action callbacks come first: click, nextMonth, previousMonth, nextYear, previousYear, or today.
    // then onMonthChange (if the month changed).
    // finally onYearChange (if the year changed).

    calendars.clndr1 = $('.cal1').clndr({
        events: eventArray,
        // constraints: {
        //   startDate: '2013-11-01',
        //   endDate: '2013-11-15'
        // },
        clickEvents: {
            click: function(target) {
                console.log(target);
                // if you turn the `constraints` option on, try this out:
                // if($(target.element).hasClass('inactive')) {
                //   console.log('not a valid datepicker date.');
                // } else {
                //   console.log('VALID datepicker date.');
                // }
            },
            nextMonth: function() {
                console.log('next month.');
				clickday();
            },
            previousMonth: function() {
                console.log('previous month.');
				clickday();
            },
            onMonthChange: function() {
                console.log('month changed.');
				clickday();
            },
            nextYear: function() {
                console.log('next year.');
				clickday();
            },
            previousYear: function() {
                console.log('previous year.');
				clickday();
            },
            onYearChange: function() {
                console.log('year changed.');
				clickday();
            }
        },
        multiDayEvents: {
            startDate: 'startDate',
            endDate: 'endDate'
        },
        showAdjacentMonths: true,
        adjacentDaysChangeMonth: false
    });

    calendars.clndr2 = $('.cal2').clndr({
        template: $('#template-calendar').html(),
        events: eventArray,
        startWithMonth: moment().add('month', 1),
        clickEvents: {
            click: function(target) {
                console.log(target);
            }
        },
        forceSixRows: true
    });

    // bind both clndrs to the left and right arrow keys
    $(document).keydown( function(e) {
        if(e.keyCode == 37) {
            // left arrow
            calendars.clndr1.back();
            calendars.clndr2.back();
        }
        if(e.keyCode == 39) {
            // right arrow
            calendars.clndr1.forward();
            calendars.clndr2.forward();
        }
    });
    
	clickday();
	//getevent();

    // $("#cmb_lang" ).bind("change",function()
    // {
    //     var sechoose        =   $(this).val();
    //     choose_function(sechoose);
    // });
});

//click day
function clickday()
{ 
    getevent();  
    $('.day-contents').bind("click",function()
    {      
            getevent();
            var day = $(this).html();
            if(parseFloat(day)<10)
                day = "0"+day;
            //alert(day); return;
            var stryear = $('.month').html();           
            var year = stryear.split('</span>')[1];
            year = year.substring(1);
            var month = stryear.split('</span>')[0];
            month = month.substring(6);
            //alert(month);
            var arr_month = { January : "01", February : "02", March : "03", April : "04", May : "05", June : "06", July : "07", August :"08", September : "09", October : "10", November : "11", December : "12" };
            //alert (arr_month['first']);
            //alert (arr_month[month]);
            var date = day + "-" + arr_month[month] + "-" + year;
            //alert(date);
            var divdate = year + "-" + arr_month[month] + "-" + day;
            //alert(divdate); return;
            var getdate = year + arr_month[month] + day;
            
            $('.day-contents').attr({
                                      style: "background: #FFF; color:#797979"
                                    });
            $('.day-contents').removeAttr("id" );
            $('.calendar-day-' + divdate + ' .day-contents').attr({
                                                                  style: "background: #1FB0AB; color:#FFF; border-radius: 3px; cursor: pointer; width: 30px;"
                                                                });
            $('.calendar-day-' + divdate + ' .day-contents').attr({
                                                                  id: "active"
                                                                });
            $("#txtdate").val(date);

            load_listResult();
            
     });
}
//end click day

function getevent()
{
       var day = $('.day-contents').html();
        if(parseFloat(day)<10)
            day = "0"+day;
        //alert(day); return;
        var stryear = $('.month').html();           
        var year = stryear.split('</span>')[1];
        year = year.substring(1);
        var month = stryear.split('</span>')[0];
        month = month.substring(6);
        //alert(month);
        var arr_month = { January : "01", February : "02", March : "03", April : "04", May : "05", June : "06", July : "07", August :"08", September : "09", October : "10", November : "11", December : "12" };
        console.log(arr_month[month]);
            //test event day
        ShowResultDay(arr_month[month]);        
}

function ShowResultDay(chossemonth)
{
    var lang = $("#cmb_lang").val();
        $.ajax({
                    type:"POST",
                    url: "../admin/home_controller/l_ResultDay",
                    dataType:"text",
                    data: { lang: lang},
                    cache:false,
                    success:function (data) 
                    {     
                      var sRes = JSON.parse(data);
                        if(sRes.Date_U != null || sRes.Date_U !="")
                        {
                            var info_date = sRes.Date_U;
                            var strday = "";
                            var strmonty = "";
                            var stryear  = "";
                            var date_com = "";
                            $('.day-contents').attr({style: ""});
                            if(info_date.length >0)
                            {
                                for(var i=0;i<info_date.length;i++){
                                     var txtday = info_date[i].txtday;
                                      stryear      =  txtday.substring(0,4);
                                      strmonty     =  txtday.substring(4,6);
                                      strday       =  txtday.substring(6);
                                      date_com     =  stryear + '-' + strmonty + '-' + strday;
                                      //alert(date_com);
                                      if(chossemonth == strmonty)
                                      {
                                          $('.calendar-day-'+ date_com + ' .day-contents').attr({
                                                style: "background: #CCC; color:#FFF; text-decoration:underline;",
                                                id: "dayevent_" + date_com
                                          });
                                      }
                                }
                            }
                            else
                            {
                               $('.day-contents').attr({style: ""});
                            }
                        }
                        $("#tblrace").css("display","none");
                    }
        });
}

function load_listResult()
{
    var txtday = $("#txtdate").val();
    var lang   = $("#cmb_lang").val();
    $.ajax({
            type:"POST",
            url: "../admin/home_controller/l_ResultSoccer",
            dataType:"json",
            data: {
                     seday: txtday,
                     lang :lang
                  },
            cache:false,
            success:function (data) {
                load_result_view_Complete(data);
            },
            error: function () { alert("Error!");}
   });
}

function load_result_view_Complete(data)
{
    var lst = data.l_result;
    console.log(lst);
    var str = "";
    if(lst.length > 0)
    {
        str = str  + '<table width="100%" id="ShowResult" cellspacing="0" cellpadding="1"  style="border: 1px solid #fff;border-collapse: collapse;font: 700 11px Tahoma;margin: 1px; text-align: center;">';
        str = str  + '<tr style="background-color:#4c69b8;color: #fff"><th style="line-height: 16px;4c69b8;border: 1px solid #fff;line-height: 16px;">Date & Time</th>';
        str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">Event</th>';
        str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">First Half Score</th>';
        str = str  + '<th  style="line-height: 16px;border: 1px solid #fff;line-height: 16px;">Full Time Score</th></tr>';
        for(var i=0;i<lst.length;i++)
        {
          str+='<tr >';
           str+='<td colspan="4" style="background-color: #2d4694;border-bottom: 1px solid #fff !important;color: #fff;height: 20px;line-height: 20px;padding-left: 154px;vertical-align: middle;">';
           str+= lst[i]['_event'];
           str+='</td></tr>';
           var match = lst[i]['_match'];
           if(match.length > 0)
           {
              for(var j=0;j<match.length;j++)
              {
                 str+= '<tr style="background-color: #cdf;">';
                 str+= '<td style="border: 1px solid #fff;"><span>'+match[j]['_time']+'</span><span class="id_team" style="display:none;">'+match[j]['_id']+'</span></td>';
                 str+= '<td style="margin: 0 3px 0 0;padding: 0;border: 1px solid #fff;color:blue;text-align:left"><span>'+match[j]['_teamA']+'</span>';
                 str+= '<br><span>'+match[j]['_teamB']+'</span>';
                 str+= '</td>';
                 str+= '<td style="border: 1px solid #fff;"><span id=HalfFirst_'+match[j]['_id']+'>'+match[j]['_firsthalf']+'</span></td>';
                 str+= '<td style="border: 1px solid #fff;"><span id=FullScore_'+match[j]['_id']+'>'+match[j]['_fulltime']+'</span></td>';
                 str+= '</tr>';
              }
           }
        }
        str+= "</table>";
    }
    $("#divshowdata").html(" ");
    $("#divshowdata").html(str);
    $("[id*=HalfFirst_]" ).editable();
    $("[id*=FullScore_]" ).editable();
}












