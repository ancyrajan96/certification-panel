<?php
include("connection.php");
ob_start();
$temp=null;
if(isset($_POST['sub'])){
    $st=$_POST['st'];
    $dt=$_POST['dt'];
    $tk=$_POST['tk'];
    $vg=$_POST['vg'];
    $wn=$_POST['wn'];
    $hn=$_POST['hn'];
    $chk_info=mysqli_query($con,"select * from cit_info where sid='$st' and did='$dt' and tid='$tk' and v_pin='$vg' and w_num='$wn' and h_num='$hn'");
    if(mysqli_num_rows($chk_info)>0){
        $temp=1;
        header('refresh: 3;new_user1.php?v='.$vg.'&hn='.$hn);
        
    }
    else{
        $temp=1;
        header('refresh: 3;new_user.php?t=1');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Public Utility Cell</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Register Your Self</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            
            <form class="form-horizontal" method="post" action="new_user.php">
                <script type="text/javascript">
                function load_dis(x){
                xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","load_dis1.php?sid="+x,true);
                xmlhttp.send();

                xmlhttp.onreadystatechange=function()
                 {
                   if(xmlhttp.readyState==4 && xmlhttp.status==200)
                   {
                       document.getElementById("dt1").innerHTML=xmlhttp.responseText;
                   }
                 }  
                }
                function loadtk(x){
                    var s=document.getElementById("st").value;
                    xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","load_tlk.php?sid="+s+"&did="+x,true);
                xmlhttp.send();

                xmlhttp.onreadystatechange=function()
                 {
                   if(xmlhttp.readyState==4 && xmlhttp.status==200)
                   {
                       document.getElementById("tk1").innerHTML=xmlhttp.responseText;
                   }
                 }  
                }
                function loadvil(x){
                   
                     var s=document.getElementById("st").value;
                     var d=document.getElementById("dt").value;
                    xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET","load_vil.php?sid="+s+"&did="+d+"&tid="+x,true);
                xmlhttp.send();

                xmlhttp.onreadystatechange=function()
                 {
                   if(xmlhttp.readyState==4 && xmlhttp.status==200)
                   {
                       document.getElementById("vg1").innerHTML=xmlhttp.responseText;
                   }
                 }  
                }
                </script>
                <table class="table table-bordered table-condensed table-hover table-responsive">
                    <tr>
                        <td style="padding-top: 12px;">Choose State</td>
                        <td><select name="st" id="st" class="form-control" onchange="load_dis(this.value)">
                                <option>Choose..</option>
                                <?php
                                $sel_st=mysqli_query($con,"select * from stat_info");
                                while($r_st=mysqli_fetch_row($sel_st)){
                                ?>
                                <option value="<?php echo $r_st[0] ?>"><?php echo $r_st[1] ?></option> 
                                <?php
                                }
                                ?>
                            </select></td>
                    </tr>
                    
                    <tr>
                        <td style="padding-top: 12px;">Choose District</td>
                        <td><span id="dt1"><select name="dt" id="dt" class="form-control">
                                <option>Choose..</option>                                
                                </select></span></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 12px;">Choose Taluk</td>
                        <td><span id="tk1"><select name="tk" id="tk" class="form-control">
                                <option>Choose..</option>                                
                                </select></span></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 12px;">Choose Village</td>
                        <td><span id="vg1"><select name="vg" id="vg" class="form-control">
                                <option>Choose..</option>                                
                                </select></span></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 12px;">Enter Ward /House Number</td>
                        <td><input type="text" name="wn" class="form-control" placeholder="Ward-Number" /><input type="text" name="hn" class="form-control" placeholder="House-Number" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php
                            if(isset($temp))
                            {
                            ?>
                            <img src="logo/loading.gif" width="40" style="padding-top: 7px;" />
                            Please Wait... We are Collecting Your Data...
                            <?php
                            }
                            if(isset($_GET['t'])){
                                ?>
                            <div class="alert-danger" style="padding: 10px; text-align: justify;"><center>
                                Sorry!!! The information You entered is Not match with our database...<br />
                                Please Verify the details you are given or Contact your Village Office for Update Your data...
                                <br />
                                Thank You!!!</center>
                            </div>
                            <?php
                            }
                            ?>
                            <input type="submit" name="sub" value="Continue" class=" btn-lg btn-success" style="float: right" /></td>
                    </tr>
                </table>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>
