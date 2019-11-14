<?php
include("connection.php");
ob_start();
$temp=null;
if(isset($_POST['login'])){
   $uid=$_POST['uid'];
   $pas=$_POST['pas'];
   $sel_login=mysqli_query($con,"select * from usr_log where uid='$uid' and pas='$pas'");
   if(mysqli_num_rows($sel_login)>0){
       session_start();
       $r_log=mysqli_fetch_row($sel_login);
       $u_typ=$r_log[3];
       if($u_typ=="admin"){
           $_SESSION['admin']=$uid;
           header("location:adminhome.php");
       }
       if($u_typ=="vil"){
           $_SESSION['vadmin']=$uid;
           header("location:villagehome.php");
       }
       if($u_typ=="deo"){
           $_SESSION['deo']=$uid;
           header("location:deohome.php");
       }
       if($u_typ=="user"){           
            $_SESSION['usr']=$uid;
            $sel_usr=mysqli_query($con,"select * from cit_info where uid='$uid'");
            $r_usr=mysqli_fetch_row($sel_usr);
            $n=rand('1000','9999');
            $ins_cat=mysqli_query($con,"insert into otp values('','$uid','$n','')");
    if($ins_cat>0)
        {
    
            
            if($r_usr[13]==0 || $r_usr[14]==0 || $r_usr[15]==0)
             {
                $item="$r_usr[19]";
        $t="Your OTP is $n";
        echo "<script language='javascript'> var win = window.open('http://api.msg91.com/api/sendhttp.php?route=4&sender=TESTIN&mobiles=$item&authkey=269646AttiMOEtXITY5c9c472d&message=$t', '1366002941508',  'width=100,height=100,left=375,top=330','_blank');
           setTimeout(function(){
                win.close()
            }, 6000);</script>";
            header("Refresh: 7;url=otp1.php");
           }
           else{
                $item="$r_usr[19]";
        $t="Your OTP is $n";
        echo "<script language='javascript'> var win = window.open('http://api.msg91.com/api/sendhttp.php?route=4&sender=TESTIN&mobiles=$item&authkey=269646AttiMOEtXITY5c9c472d&message=$t', '1366002941508',  'width=100,height=100,left=375,top=330','_blank');
           setTimeout(function(){
                win.close()
            }, 6000);</script>";
            header("Refresh: 7;url=otp.php");
           }
       }
       }
   }
   else{       
       $temp=1;
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
            <h2>WELCOME TO  SECURE CERTIFICATION PANEL</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <form class="form-horizontal" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Username" name="uid">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="pas">
                    </div>
                    <div class="clearfix"></div>

                    <div ><br />
                        <div class="alert-danger" style="padding: 10px">Hi User, if you are new to this portal please click <a href="new_user.php">Here</a> to Register</div>
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <input type="submit" class="btn btn-primary" value="Login" name="login" />
                        <?php
                        if(isset($temp)){
                            echo"<font color='red'><br />Invalid Credentials</font>";                            
                        }
                        ?>
                    </p>
                </fieldset>
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
