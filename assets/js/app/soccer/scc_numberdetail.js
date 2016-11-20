$(document).ready(function(){
    load_Number_Detail();
});

function load_Number_Detail()
{
    var g_todayID = getUrlParameter("todayID");
    var g_type      = getUrlParameter("type");
    $.ajax({
            url: "../home_controller/loadNumberDetail",
            type:"POST",
            data:{ todayID:g_todayID,
                   type:g_type
                  },
            dataType:"text",
            success:function(data){
                Load_Number_Detail_Complete(data);
            },

    });
}

function Load_Number_Detail_Complete(data)
{
    var sRes                = JSON.parse(data);
    var str_1X2             = sRes.scc_1X2;
    var str_FH1X2           = sRes.scc_FH1X2;
    var str_FG_LG           = sRes.scc_FG_LG;
    var str_Asian           = sRes.scc_asian;
    var str_correct_score   = sRes.scc_correct_score;
    var str_double_chance   = sRes.scc_double_chance;
    var str_fh_correct      = sRes.scc_fh_correct;
    var str_ht_ft           = sRes.scc_ht_ft;
    var str_oe              = sRes.scc_oe;
    var str_total_goal      = sRes.scc_total;
    var  home_team          = sRes.scc_home_team;
    var away_team           = sRes.scc_away_team;
    var st_1X2 = "";
    var st_FH1X2 = "";
    var st_FG_LG = "";
    var st_Asian = "";
    var st_Correct_Score = "";
    var st_doubleChance = "";
    var st_fh_correct = "";
    var st_ht_ft = "";
    var st_oe = "";
    var st_total_goal = "";
    var str_home_team = "";
    var str_away_team = "";
    $("#td_1X2").html("");
    if(str_1X2.length > 0)
    {
        for(var i=0; i<str_1X2.length; i++)
        {
            st_1X2 = st_1X2 + "<tr><th colspan=\"3\" style=\"background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;\">1X2</th></tr>";
            st_1X2 = st_1X2 + "<tr style=\"background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;\"><td>1</td><td>X</td><td>2</td></tr>";
            st_1X2 = st_1X2 + "<tr style=\"background-color:#ffdfcf;border:1px solid #ffdfcf;color:#b64531;padding:0 8px;\">";
            st_1X2 = st_1X2 + "<td>"+str_1X2[i]['col_1']+"</td>";
            st_1X2 = st_1X2 + "<td>"+str_1X2[i]['col_X']+"</td>";
            st_1X2 = st_1X2 + "<td>"+str_1X2[i]['col_2']+"</td>";
            st_1X2 = st_1X2 + "</tr>";
        }
        $("#td_1X2").append(st_1X2);
    }
    
    $("#td_FH12").html("");
    if(str_FH1X2.length > 0)
    {
        for(var i=0; i<str_FH1X2.length;i++)
        {
            st_FH1X2 = st_FH1X2 + "<tr ><th colspan=\"3\">1X2</th></tr>";
            st_FH1X2 = st_FH1X2 + "<tr><td>1X</td><td>12</td><td>X2</td></tr>";
            st_FH1X2 = st_FH1X2 + "<tr>";
            st_FH1X2 = st_FH1X2 + "<td>"+str_FH1X2[i]['col_1']+"</td>";
            st_FH1X2 = st_FH1X2 + "<td>"+str_FH1X2[i]['col_X']+"</td>";
            st_FH1X2 = st_FH1X2 + "<td>"+str_FH1X2[i]['col_2']+"</td>";
            st_FH1X2 = st_FH1X2 + "</tr>";
        }
        $("#td_FH12").append(st_FH1X2);
    }
 
    $("#td_FG_LG").html("");
    if(str_FG_LG.length > 0)
    {
        for(var i=0; i<str_FG_LG.length;i++)
        {
            st_FG_LG = st_FG_LG + "<tr><th colspan=\"5\">FG / LG</th></tr>";
            st_FG_LG = st_FG_LG + "<tr><td>HF</td><td>HL</td><td>AF</td><td>AL</td><td>No Goal</td></tr>";
            st_FG_LG = st_FG_LG + "<tr>";
            st_FG_LG = st_FG_LG + "<td>"+str_FG_LG[i]['col_HF']+"</td>";
            st_FG_LG = st_FG_LG + "<td>"+str_FG_LG[i]['col_HL']+"</td>";
            st_FG_LG = st_FG_LG + "<td>"+str_FG_LG[i]['col_AF']+"</td>";
            st_FG_LG = st_FG_LG + "<td>"+str_FG_LG[i]['col_AL']+"</td>";
            st_FG_LG = st_FG_LG + "<td>"+str_FG_LG[i]['col_NoGoal']+"</td>";
            st_FG_LG = st_FG_LG + "</tr>";   
        }
        $("#td_FG_LG").append(st_FG_LG);
    }
    $("#td_OE").html("");
    if(str_oe.length > 0)
    {
        for(var i=0;i<str_oe.length;i++)
        {
            str_oe = str_oe + "<tr><th colspan=\"2\">OE</th></tr>";
            str_oe = str_oe + "<tr><td>Odd</td><td>Even</td></tr>";
            str_oe = str_oe + "<tr>";
            str_oe = str_oe + "<td>"+str_oe[i]['Odd']+"</td>";
            str_oe = str_oe + "<td>"+str_oe[i]['Even']+"</td>";
            str_oe = str_oe + "</tr>";
        }
        $("#td_OE").append(str_oe);
    }

    $("#td_DoubleChance").html("");
    if(str_double_chance.length > 0)
    {
        for(var i=0; i<str_double_chance.length;i++)
        {
            st_doubleChance = st_doubleChance + "<tr><th colspan=\"3\">Double Chance</th></tr>";
            st_doubleChance = st_doubleChance + "<tr><td>1X</td><td>12</td><td>X2</td></tr>";
            st_doubleChance = st_doubleChance + "<tr>";
            st_doubleChance = st_doubleChance + "<td>"+str_double_chance[i]['col_1X']+"</td>";
            st_doubleChance = st_doubleChance + "<td>"+str_double_chance[i]['col_12']+"</td>";
            st_doubleChance = st_doubleChance + "<td>"+str_double_chance[i]['col_X2']+"</td>";
            st_doubleChance = st_doubleChance + "</tr>";
        }
        $("#td_DoubleChance").html("st_doubleChance");
    }

    $("#td_HT_FT").html("");
    if(str_ht_ft.length > 0)
    {
        for(var i=0; i < str_ht_ft.length;i++)
        {

            str_ht_ft = str_ht_ft + "<tr><th colspan=\"5\">HT / FT</th></tr>";
            st_ht_ft = st_ht_ft + "<tr><td>HH</td><td>HD</td><td>HA</td><td>DH</td><td>DD</td><td>DA</td><td>AH</td><td>AD</td><td>AA</td></tr>";
            st_ht_ft = st_ht_ft + "<tr>";
            st_ht_ft = st_ht_ft + "<td>"+str_ht_ft[i]['col_HH']+"</td>";
            st_ht_ft = st_ht_ft + "<td>"+str_ht_ft[i]['col_HD']+"</td>";
            st_ht_ft = st_ht_ft + "<td>"+str_ht_ft[i]['col_HA']+"</td>";
            st_ht_ft = st_ht_ft + "<td>"+str_ht_ft[i]['col_DH']+"</td>";
            st_ht_ft = st_ht_ft + "<td>"+str_ht_ft[i]['col_DD']+"</td>";
            st_ht_ft = st_ht_ft + "<td>"+str_ht_ft[i]['col_DA']+"</td>";
            st_ht_ft = st_ht_ft + "<td>"+str_ht_ft[i]['col_AH']+"</td>";
            st_ht_ft = st_ht_ft + "<td>"+str_ht_ft[i]['col_AD']+"</td>";
             st_ht_ft = st_ht_ft + "<td>"+str_ht_ft[i]['col_AA']+"</td>";
            st_ht_ft = st_ht_ft + "</tr>";    
        }
        $("#td_HT_FT").append(st_ht_ft);
    }

    $("#td_CorrectScore").html("");
    if(str_correct_score.length > 0)
    {
        for(var i=0; i < str_correct_score.length; i++)
        {
            st_Correct_Score = st_Correct_Score + "<tr><th colspan=\"5\">Correct Score</th></tr>";
            st_Correct_Score = st_Correct_Score + "<tr>";
            st_Correct_Score = st_Correct_Score + "<td>0:0</td><td>0:1</td><td>0:2</td><td>0:3</td><td>0:4</td><td>1:0</td>";
            st_Correct_Score = st_Correct_Score + "<td>1:1</td><td>1:2</td><td>1:3</td><td>1:4</td><td>2:0</td><td>2:1</td><td>2:2</td>";
            st_Correct_Score = st_Correct_Score + "</tr>";

            st_Correct_Score = st_Correct_Score + "<tr>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_00']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_01']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_02']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_03']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_04']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_10']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_11']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_12']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_13']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_14']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_20']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_21']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_22']+"</td>";
            st_Correct_Score = st_Correct_Score + "</tr>";

            st_Correct_Score = st_Correct_Score + "<tr>";
            st_Correct_Score = st_Correct_Score + "<td>2:3</td><td>2:4</td><td>3:0</td><td>3:1</td><td>3:2</td><td>3:3</td><td>3:4</td><td>4:1</td>";
            st_Correct_Score = st_Correct_Score + "<td>4:2</td><td>4:3</td><td>4:4</td><td>AOS</td>";
            st_Correct_Score = st_Correct_Score + "</tr>";

            st_Correct_Score = st_Correct_Score + "<tr>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_23']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_24']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_30']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_31']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_32']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_33']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_34']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_40']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_41']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_42']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_43']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_44']+"</td>";
            st_Correct_Score = st_Correct_Score + "<td>"+str_correct_score[i]['col_AOS']+"</td>";
            st_Correct_Score = st_Correct_Score + "</tr>";  
        }
        $("#td_CorrectScore").append(st_Correct_Score);
    }

    $("#td_FHCorrectScore").html("");
    if(str_fh_correct.length > 0)
    {
        for(var i =0 ;i< str_fh_correct.length;i++)
        {
            st_fh_correct = st_fh_correct + "<tr><th colspan=\"5\">FH Correct Score</th></tr>";
            st_fh_correct = st_fh_correct + "<tr>";
            st_fh_correct = st_fh_correct + "<td>0:0</td><td>0:1</td><td>0:2</td><td>0:3</td><td>1:0</td>";
            st_fh_correct = st_fh_correct + "<td>1:1</td><td>1:2</td><td>1:3</td><td>2:0</td>";
            st_fh_correct = st_fh_correct + "</tr>";

            st_fh_correct = st_fh_correct + "<tr>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_00']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_01']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_02']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_03']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_10']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_11']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_12']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_13']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_20']+"</td>";
           
            st_fh_correct = st_fh_correct + "</tr>";
            st_fh_correct = st_fh_correct + "<tr>";
            st_fh_correct = st_fh_correct + "<td>2:1</td><td>2:2</td><td>2:3</td><td>3:1</td><td>3:2</td><td>3:3</td><td>AOS</td>";
            st_fh_correct = st_fh_correct + "</tr>";

            st_fh_correct = st_fh_correct + "<tr>";
            st_fh_correct = st_fh_correct +"<td>"+str_fh_correct[i]['col_21']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_22']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_23']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_30']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_31']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_32']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_33']+"</td>";
            st_fh_correct = st_fh_correct + "<td>"+str_fh_correct[i]['col_AOS']+"</td>";
            st_fh_correct = st_fh_correct + "</tr>";
            $("#td_FHCorrectScore").append(st_fh_correct);
        }
    }

    $("#td_TotalGoal").html("");
    if(str_total_goal.length > 0)
    {
        for(var i=0; i < str_total_goal.length;i++)
        {
            st_total_goal  = st_total_goal  + "<tr><th colspan=\"4\">Total Goal</th></tr>";
            st_total_goal  = st_total_goal + "<tr><td>0~1</td><td>2~3</td><td>4~6</td><td>7~Over</td></tr>";
            st_total_goal = st_total_goal + "<tr>";
            st_total_goal = st_total_goal + "<td>"+str_total_goal[i]['col_01']+"</td>";
            st_total_goal = st_total_goal + "<td>"+str_total_goal[i]['col_23']+"</td>";
            st_total_goal = st_total_goal + "<td>"+str_total_goal[i]['col_46']+"</td>";
            st_total_goal = st_total_goal + "<td>"+str_total_goal[i]['col_7Over']+"</td>";
            st_total_goal = st_total_goal + "</tr>";
        }
        $("#td_TotalGoal").append(st_total_goal);
    }

    $("#td_Home_Team").html("");
    if(home_team.length > 0)
    {
        for(var i=0; i < home_team.length;i++)
        {
            str_home_team = str_home_team + "<tr colspan=\"3\">Home Team Total Goals<td></td></tr>";
            str_home_team = str_home_team + "<tr><td>Event</td><td colspan=\"2\">OU</td><td colspan=\"2\">FH.OU</td></tr>";
            str_home_team = str_home_team + "<tr>";
            str_home_team = str_home_team +  "<td>"+home_team[i]['TeamA']+"</td>";
            str_home_team = str_home_team +  "<td>"+home_team[i]['TeamA_OU1']+"</td>";
            str_home_team = str_home_team +  "<td>"+home_team[i]['TeamA_OU2']+"</td>";
            str_home_team = str_home_team +  "<td>"+home_team[i]['TeamA_FHOU1']+"</td>";
            str_home_team = str_home_team +  "<td>"+home_team[i]['TeamA_FHOU2']+"</td>";
            str_home_team = str_home_team +  "</tr>";
            str_home_team = str_home_team + "<tr>";
            str_home_team = str_home_team +  "<td>"+home_team[i]['TeamA']+"</td>";
            str_home_team = str_home_team +  "<td></td>";
            str_home_team = str_home_team +  "<td>"+home_team[i]['TeamA_OU3']+"</td>";
            str_home_team = str_home_team +  "<td></td>";
            str_home_team = str_home_team +  "<td>"+home_team[i]['TeamA_FHOU3']+"</td>";
            str_home_team = str_home_team +  "</tr>";
        }
        $("#td_Home_Team").append(str_home_team);
    }

    $("#td_Away_Team").html("");
    if(away_team.length > 0)
    {
        for(var i=0; i<away_team.length;i++)
        {
            str_away_team = str_away_team + "<tr colspan=\"3\">Away Team Total Goals<td></td></tr>";
            str_away_team = str_away_team + "<tr><td>Event</td><td colspan=\"2\">OU</td><td colspan=\"2\">FH.OU</td></tr>";
            str_away_team = str_away_team + "<tr>";
            str_away_team = str_away_team +  "<td>"+away_team[i]['TeamB']+"</td>";
            str_away_team = str_away_team +  "<td>"+away_team[i]['TeamB_OU1']+"</td>";
            str_away_team = str_away_team +  "<td>"+away_team[i]['TeamB_OU2']+"</td>";
            str_away_team = str_away_team +  "<td>"+away_team[i]['TeamB_FHOU1']+"</td>";
            str_away_team = str_away_team +  "<td>"+away_team[i]['TeamB_FHOU2']+"</td>";
            str_away_team = str_away_team +  "</tr>";
            str_away_team = str_away_team + "<tr>";
            str_away_team = str_away_team +  "<td>"+away_team[i]['TeamB']+"</td>";
            str_away_team = str_away_team +  "<td></td>";
            str_away_team = str_away_team +  "<td>"+away_team[i]['TeamB_OU3']+"</td>";
            str_away_team = str_away_team +  "<td></td>";
            str_away_team = str_away_team +  "<td>"+away_team[i]['TeamB_FHOU3']+"</td>";
            str_away_team = str_away_team +  "</tr>";
        }

        $("#td_Away_Team").append(str_away_team);
    }

}

function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}