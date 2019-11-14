<?php
include("connection.php");
ob_start();
$temp=null;
if(isset($_POST['sub'])){
    $un=$_POST['un'];
    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];
    $conn=$_POST['con'];
    $pic=$_FILES['up']['name'];
    $pextn=  strrpos($pic, ".");
    $ext=substr($pic,$pextn);
    $nfn="$uid$ext";
    move_uploaded_file($_FILES['up']['tmp_name'],getcwd()."\\user_pic\\$nfn");
    $gn=$_POST['gn'];
    $dob=$_POST['dob'];
    $up_data=mysqli_query($con,"update cit_info set uid='$uid',pas='$pwd',pic='$nfn',gndr='$gn',dob='$dob',con='$conn' where id='$un'");
    if($up_data>0){
        $ins_log=mysqli_query($con,"insert into usr_log values('','$uid','$pwd','user','1')");
        if($ins_log>0){
            header("location:index.php");
        }
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
            
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <a href="../index.php" class="btn- btn-danger" style="float: right">Exit Now</a>
                <table class="table table-bordered table-condensed table-hover table-responsive">
                    <tr>
                        <td style="padding-top: 12px">
                            Choose Your Name
                        </td>
                        <td>
                            <select name="un" class="form-control">
                                <option>Choose</option>
                                <?php
                                $sel_usr=mysqli_query($con,"select * from cit_info where v_pin=".$_GET['v']." and h_num=".$_GET['hn']);
                                while($r_usr=  mysqli_fetch_row($sel_usr))
                                {
                                    if($r_usr[19]==0)
                                    {
                                ?>
                                <option value="<?php echo $r_usr[0] ?>"><?php echo $r_usr[5] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 10px;">User ID / Email</td>
                        <td><input type="text" name="uid" class="form-control" placeholder="Your Valid Email" /></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 10px;">Password</td>
                        <td><input type="password" name="pwd" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 10px;">Contact Number</td>
                        <td><input type="text" name="con" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 10px;">Upload Photo</td>
                        <td><input type="file" name="up" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td style="padding-top: 10px;">Gender</td>
                        <td><input type="radio" name="gn" value="Male" /> Male <input type="radio" name="gn" value="Female" /> Female</td>
                    </tr>
                    <tr>
                        <td style="padding-top: 10px;">Date of Birth</td>
                        <td><input type="date" name="dob" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">                           
                            <input type="submit" name="sub" value="Register Now" class=" btn-lg btn-success" style="float: right" /></td>
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
