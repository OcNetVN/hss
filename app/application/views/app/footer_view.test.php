                </tr>
            </tbody>
        </table> 
    </div>
    <!--node js -->
    <!--<script src="http://occbuu.ddns.net:1810/socket.io/socket.io.js"></script>-->
    <!--<script src="http://localhost:1810/socket.io/socket.io.js"></script>-->
    <script src="http://test.netmobile.me:1810/socket.io/socket.io.js"></script>
    <script src="http://test.netmobile.me:1819/socket.io/socket.io.js"></script>
    <!--<script src="http://localhost:1819/socket.io/socket.io.js"></script>-->
    <!--<script src="http://code.jquery.com/jquery-1.11.1.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script src="http://test.netmobile.me/assets/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    <script>
        //var socket = io.connect('http://occbuu.ddns.net:1810');
        //var socket = io.connect('http://localhost:1810');
        var socket      = io.connect('http://test.netmobile.me:1810');
        // tach riêng Racing Board không ảnh hướng tới AutoRace
        var socket_race = io.connect('http://test.netmobile.me:1819');
        //var socket_race = io.connect('http://localhost:1819');
    </script>

    <style type="text/css" media="screen">
        .counter1{
            width:44px;
            height:31px;
            border:1px solid #000;
            overflow:hidden;
            position:relative;
            background-color:#f00;
        }
    </style>

    <!--end node js -->
    <script>
        window.odometerOptions = {
          format: ''
        };
    </script>
    <script src="<?php echo base_url("assets/js/odometer.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jquery.shuffleLetters.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jquery.jodometer.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/effects.js"); ?>"></script>
    <?php 
        echo isset($p_custom_js) ? $p_custom_js : "";
    ?>
    
  </body>
</html>