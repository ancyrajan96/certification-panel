<?php
include("connection.php");
ob_start();
session_start();
if(isset($_SESSION['usr'])){
    $usr=$_SESSION['usr'];
    $sel_usr=mysqli_query($con,"select * from cit_info where uid='$usr'");
    $r_usr=mysqli_fetch_row($sel_usr);
    $w_num=$r_usr[6];
    $h_num=$r_usr[7];
    $v_pin=$r_usr[9];
    $v_id=$r_usr[4];
    $t_id=$r_usr[3];
    $d_id=$r_usr[2];
    
}
else{
    header("location:../index.php");
}
if(isset($_POST['app_cst'])){
    $nme=$_POST['nme'];
    $uid=$_POST['uid'];
    $addr=$_POST['addr'];
    $fn=$_POST['fn'];
    $dt=date('Y-m-d');
    $ins_cst=mysqli_query($con,"insert into caste_cert values('','$uid','$nme','$addr','$fn','$v_id','$t_id','$d_id','no','no','$dt','0','$v_pin','0','no','no','0')");
    if($ins_cst>0){
        header("location:u_reqcert.php");
    }
}
if(isset($_POST['app_inc'])){
    $nme1=$_POST['nme1'];
    $uid1=$_POST['uid1'];
    $addr1=$_POST['addr1'];
    $fn1=$_POST['fn1'];
    $ai=$_POST['ai'];
    $dt=date('Y-m-d');
    $ins_sal=mysqli_query($con,"insert into sal_cert values('','$uid1','$nme1','$addr1','$fn1','$v_id','$t_id','$d_id','$ai','$dt','0','$v_pin','no','no','no','no','0')");
    if($ins_sal>0){
        header("location:u_reqcert.php");
    }
}
if(isset($_POST['app_nat'])){
    $nme2=$_POST['nme2'];
    $uid2=$_POST['uid2'];
    $addr2=$_POST['addr2'];
    $fn2=$_POST['fn2'];
    $rsn=$_POST['rsn'];
    $loc=$_POST['loc'];
    $dt=date('Y-m-d');
    $ins_nativ=mysqli_query($con,"insert into nat_cert values('','$uid2','$nme2','$addr2','$fn2','$v_id','$t_id','$d_id','$rsn','$dt','0','$v_pin','$loc','no','no','no',0)");
    if($ins_nativ>0){
         header("location:u_reqcert.php");
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
    <title>User Home</title>
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
    <form method="post">
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="width: 250px;" href="userhome.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>secure certification</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $r_usr[5] ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="user_profile.php">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="userhome.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <li><a class="ajax-link" href="user_profile.php"><i class="glyphicon glyphicon-bookmark "></i><span> My Profile</span></a>
                        </li>
                        <li><a class="ajax-link" href="u_srchvillage.php"><i class="glyphicon glyphicon-search "></i><span> Search Village</span></a>
                        </li>
                        <li><a class="ajax-link" href="u_reqcert.php"><i class="glyphicon glyphicon-file "></i><span> Request Certificate</span></a>
                        </li>
                        <li><a class="ajax-link" href="u_certstatus.php"><i class="glyphicon glyphicon-zoom-in"></i><span> Certificate Status</span></a>
                        </li>
                        <li><a class="ajax-link" href="u_feedback.php"><i class="glyphicon glyphicon-warning-sign"></i><span> Post Feedback</span></a>
                        </li>
                        <li><a class="ajax-link" href="u_cmplnt.php"><i class="glyphicon glyphicon-arrow-down"></i><span> Post Complaints</span></a>
                        </li>
                        <li><a class="ajax-link" href="admin_alerts.php"><i class="glyphicon glyphicon-bullhorn"></i><span> Admin Alerts</span></a>
                        </li>
                        <li><a class="ajax-link" href="u_account.php"><i class="glyphicon glyphicon-cog"></i><span> Account Settings</span></a>
                        </li>
                        
                    </ul>
                    
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Request Online Certificate Here</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"><center>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <table class="table table-bordered table-condensed table-hover table-responsive">
                                <tr>
                                    <td width="145" rowspan="3"><img src="user_pic/<?php echo $r_usr[12] ?>" class="img img-responsive" width="140" /></td>
                                    <td><h5><?php echo $r_usr[5] ?></h5></td>
                                </tr>
                                <tr>
                                    <td><?php echo $r_usr[8] ?></td>
                                </tr>
                                <tr>
                                    <td>Ward : <?php echo $r_usr[6] ?>, House No. : <?php echo $r_usr[7] ?> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>CHOOSE CERTIFICATE</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-bordered table-condensed table-hover table-responsive">
                                            <tr>
                                                <td><center><b>CASTE CERTIFICATE</b><br /><img src="logo/caste.jpg" class="img img-responsive" onclick="sho_cast()"/></center></td>
                                        <td><center><b>INCOME CERTIFICATE</b><br /><img src="logo/salary.jpg" class="img img-responsive" onclick="sho_inc()"/></center></td>
                                        <td><center><b>NATIVITY CERTIFICATE</b><br /><img src="logo/nativity.jpg" width="250" class="img img-responsive" onclick="sho_mar()"/></center></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <script type="text/javascript">
                                        function sho_cast(){
                                            $("#cct").show();
                                            $("#inc").hide();
                                            $("#mar").hide();
                                        }    
                                        function sho_inc(){
                                            $("#cct").hide();
                                            $("#inc").show();
                                            $("#mar").hide();
                                        }
                                        function sho_mar(){
                                            $("#cct").hide();
                                            $("#inc").hide();
                                            $("#mar").show();
                                        }
                                        </script>
                                        <span id="cct" style="display: none;">
                                            
                                             <table class="table table-bordered table-condensed table-hover table-responsive">
                                                 <tr>
                                                     <td colspan="2"><center><b>Apply Cast Certificate</b></center></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Name</td>
                                                     <td><input type="text" name="nme" value="<?php echo $r_usr[5] ?>" readonly="readonly" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td>User ID</td>
                                                     <td><input type="text" name="uid" value="<?php echo $usr ?>" readonly="readonly" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Address</td>
                                                     <td><textarea name="addr" readonly="readonly" class="form-control"><?php echo $r_usr[8] ?></textarea></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Enter Fathers Name</td>
                                                     <td><input type="text" name="fn" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="2"><input type="submit" name="app_cst" value="Post Request" class="btn btn-success" /></td>
                                                 </tr>
                                             </table>
                                          
                                        </span>
                                        <span id="inc" style="display: none;">
                                            <table class="table table-bordered table-condensed table-hover table-responsive">
                                                 <tr>
                                                     <td colspan="2"><center><b>Apply Income Certificate</b></center></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Name</td>
                                                     <td><input type="text" name="nme1" value="<?php echo $r_usr[5] ?>" readonly="readonly" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td>User ID</td>
                                                     <td><input type="text" name="uid1" value="<?php echo $usr ?>" readonly="readonly" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Address</td>
                                                     <td><textarea name="addr1" readonly="readonly" class="form-control"><?php echo $r_usr[8] ?></textarea></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Enter Fathers Name</td>
                                                     <td><input type="text" name="fn1" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Enter Anual Income</td>
                                                     <td><input type="text" name="ai" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="2"><input type="submit" name="app_inc" value="Post Request" class="btn btn-success" /></td>
                                                 </tr>
                                            </table>
                                        </span>
                                        <span id="mar" style="display: none;">
                                            <table class="table table-bordered table-condensed table-hover table-responsive">
                                                 <tr>
                                                     <td colspan="2"><center><b>Apply Nativity Certificate</b></center></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Requester Name</td>
                                                     <td><input type="text" name="nme2" value="<?php echo $r_usr[5] ?>" readonly="readonly" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Requester User ID</td>
                                                     <td><input type="text" name="uid2" value="<?php echo $usr ?>" readonly="readonly" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Address</td>
                                                     <td><textarea name="addr2" readonly="readonly" class="form-control"><?php echo $r_usr[8] ?></textarea></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Enter Fathers Name</td>
                                                     <td><input type="text" name="fn2" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Enter Local Area</td>
                                                     <td><input type="text" name="loc" class="form-control"/></td>
                                                 </tr>
                                                 <tr>
                                                     <td>Reason</td>
                                                     <td><textarea name="rsn" class="form-control"></textarea></td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="2"><input type="submit" name="app_nat" value="Post Request" class="btn btn-success" /></td>
                                                 </tr>
                                                                                            </table>
                                        </span>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </center>
                    
                </div>
                <!-- Ads, you can remove these -->
                

                
                <!-- Ads end -->

            </div>
        </div>
    </div>
</div>

<div class="row">
    
    <!--/span-->

    
    <!--/span-->

    
    <!--/span-->
</div><!--/row-->


    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    <div class="row">
       
        

    </div>
    <!-- Ad ends -->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="#" target="_blank">Trinity Technologies</a> 2015 - 2016</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="#">Trinity</a></p>
    </footer>

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

</form>
</body>
</html>
