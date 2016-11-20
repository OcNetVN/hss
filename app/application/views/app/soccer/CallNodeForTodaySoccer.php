<html>
    <head>
        <!--   <script src="http://netmobile.me/socket.io/socket.io.js"></script>   
        <script src="http://127.0.0.1:1810/socket.io/socket.io.js"></script>
        -->
        <script src="http://netmobile.me:1810/socket.io/socket.io.js"></script>

        <script src="http://netmobile.me:1819/socket.io/socket.io.js"></script>  

        <!--   <script src="http://127.0.0.1:1819/socket.io/socket.io.js"></script>          -->

        <!-- <script src="http://netmobile.me:1810/socket.io/socket.io.js"></script>

        <script src="http://netmobile.me:1819/socket.io/socket.io.js"></script>  -->

        <!--<script src="http://localhost:1819/socket.io/socket.io.js"></script>-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>


        <script>

            // var socket = io.connect('http://occbuu.ddns.net:1810');

            //var socket = io.connect('http://127.0.0.1:1810');

            var socket      = io.connect('http://netmobile.me:1810');

            // tach riêng Racing Board không ảnh hướng tới AutoRace

            var socket_race = io.connect('http://netmobile.me:1819');

            //var socket_race = io.connect('http://localhost:1819');

            $(document).ready(function(){
                AutoBind();
                AutoBindCN();             
            });    

            function AutoBind()
            {
                $.ajax({
                    type : "POST",
                    url  : "../home_controller/ReadFileHtml",
                    data : {
                        FileName:"soccer_today.html",
                        lang:"EN"
                    },
                    dataType: "json",
                    success: function(data)
                    { 
                        var trans       = {};
                        trans._type = "today";
                        trans._lang = data.lang;
                        trans.send  = data.data;
                       // console.log(trans) ;
                        socket.emit('SoccerTODAY',trans);
                        //$("#div_show_Result").html(str); 
                    },
                    async: false
                });
                setTimeout(function(){AutoBind(); },60000 );
            }
             function AutoBindCN()
            {
                $.ajax({
                    type : "POST",
                    url  : "../home_controller/ReadFileHtml",
                    data : {
                        FileName:"soccer_today.html",
                        lang:"CN"
                    },
                    dataType: "json",
                    success: function(data)
                    { 
                        var trans       = {};
                        trans._type = "today";
                        trans._lang = data.lang;
                        trans.send  = data.data;
                        socket.emit('SoccerTODAY',trans);
                       // console.log(trans) ;
                        //$("#div_show_Result").html(str); 
                    },
                    async: false
                });
                setTimeout(function(){AutoBindCN(); },60000 );
            }                               
        </script>
    </head>
</html>