<?php
include("connection.php");
session_start();
ob_start();
$con=mysqli_connect("localhost","root","","public_utility1");
if(isset($_SESSION['admin'])){
    
}
else{
    header("location:index.php");
}
if(isset($_POST['add_village'])){
    $sid=$_POST['sid'];
    $did=$_POST['did'];
    $tid=$_POST['tid'];
    $vn=$_POST['vn'];
    $addr=$_POST['addr'];
    $pin=$_POST['pin'];
    $conn=$_POST['con'];
    $em=$_POST['em'];
    $vo=$_POST['vo'];
    $lid=$_POST['lid'];
    $pwd=$_POST['pwd'];
    $sign=$_FILES['sig']['name'];
    $sinextp=strrpos($sign,".");
    $sinext=  substr($sign, $sinextp);
    $new_sign="$pin$sinext";
    move_uploaded_file($_FILES['sig']['tmp_name'], getcwd()."\\sign\\$new_sign");
    $seal=$_FILES['seal']['name'];
    $sealextp=strrpos($seal,".");
    $sealext=  substr($seal, $sealextp);
    $new_seal="$pin$sealext";
    move_uploaded_file($_FILES['seal']['tmp_name'], getcwd()."//seal//$new_seal");
    $ins_vil=mysqli_query($con,"insert into vil_info values('','$sid','$did','$tid','$vn','$addr','$pin','$conn','$em','$vo','$lid','$pwd','$new_sign','$new_seal','1')");
    if($ins_vil>0){
        $ins_log=mysqli_query($con,"insert into usr_log values('','$lid','$pwd','vil','1')");
        if($ins_log>0){
            header("location:vil_manage.php?t=1&tid=".$_GET['tid']);
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
    <meta charset="utf-8">v
    <title>Admin Home</title>
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
    <form method="post" enctype="multipart/form-data">
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="width: 250px;" href="adminhome.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>secure certification </span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
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
                        <li><a class="ajax-link" href="adminhome.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <li><a class="ajax-link" href="loc_manage.php"><i class="glyphicon glyphicon-globe "></i><span> Manage Location</span></a>
                        </li>
                        <li><a class="ajax-link" href="tal_manage.php"><i class="glyphicon glyphicon-star "></i><span> Manage Taluk</span></a>
                        </li>
                        <li><a class="ajax-link" href="vil_manage.php"><i class="glyphicon glyphicon-star-empty "></i><span> Manage Village</span></a>
                        </li>
                        <li><a class="ajax-link" href="admin_inbox.php"><i class="glyphicon glyphicon-envelope"></i><span> Inbox</span></a>
                        </li>
                        <li><a class="ajax-link" href="p_msg.php"><i class="glyphicon glyphicon-warning-sign"></i><span> Msg to Public</span></a>
                        </li>
                        <li><a class="ajax-link" href="admin_cmplnt.php"><i class="glyphicon glyphicon-arrow-down"></i><span> Complaints</span></a>
                        </li>
                        <li><a class="ajax-link" href="admin_fdbk.php"><i class="glyphicon glyphicon-folder-open"></i><span> FeedBacks</span></a>
                        </li>
                        <li><a class="ajax-link" href="admin_msg.php"><i class="glyphicon glyphicon-file"></i><span> Msg to Village</span></a>
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
        <li>
            <a href="adminhome.php">Home</a>
        </li>
        <li>
            <a href="adminhome.php">Dashboard</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Manage Village</h2>

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
                <div class="col-lg-12 col-md-12">
                    <div class="col-lg-6">
                        <h4>Taluk Informations</h4>
                        <?php 
                        $sel_tal=mysqli_query($con,"select * from tal_info,dis_info,stat_info where dis_info.id=tal_info.d_id and stat_info.id=tal_info.s_id");
                        if(mysqli_num_rows($sel_tal)>0){
                            $i=1;
                            ?>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-condensed table-striped table-wrapper">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>State Name</td>
                                <td>District</td>
                                <td>Taluk</td>
                                <td>More</td>
                            </tr>
                            </thead>
                        <?php
                            while($r_tal=mysqli_fetch_row($sel_tal)){
                                ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $r_tal[10] ?></td>
                                <td><?php echo $r_tal[7] ?></td>
                                <td><?php echo $r_tal[3] ?></td>
                                <td><a href="vil_manage.php?t=1&tid=<?php echo $r_tal[0] ?>" title="Add Village"><i class="glyphicon glyphicon-plus-sign green"></i></a> <a href="vil_manage.php?t=2&tid=<?php echo $r_tal[0] ?>" title="Add Village"><i class="glyphicon glyphicon-eye-open blue"></i></a></td>
                            </tr>
                        <?php
                        $i++;
                            }
                            
                            ?>
                        </table>
                            <?php
                        }
                        else{
                            echo "No Information Found";
                        }
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <?php
                        if(isset($_GET['t']))
                        {
                            $tid=$_GET['tid'];
                            $sel_tal1=mysqli_query($con,"select * from tal_info,dis_info,stat_info where dis_info.id=tal_info.d_id and stat_info.id=tal_info.s_id and tal_info.id=$tid");
                            $r_tal1=mysqli_fetch_row($sel_tal1);
                            if($_GET['t']==1)
                            {
                        ?>
                        <h4>Create Village Office</h4>
                        <table class="table table-bordered table-condensed table-hover table-responsive">
                            <tr>
                                <td colspan="2"><center>Create Village office in <b><?php echo $r_tal1[10] ?></b> State, <b><?php echo $r_tal1[7] ?></b> District, <b><?php echo $r_tal1[3] ?></b> Taluk </center>
                            <input type="hidden" name="sid" value="<?php echo $r_tal1[9] ?>" /><input type="hidden" name="did" value="<?php echo $r_tal1[5] ?>" /><input type="hidden" name="tid" value="<?php echo $r_tal1[0] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>Village Office Name</td>
                                <td><input type="text" name="vn" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><textarea name="addr" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <td>Location PIN</td>
                                <td><input type="text" name="pin" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td><input type="text" name="con" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="em" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Village Officer</td>
                                <td><input type="text" name="vo" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Login ID</td>
                                <td><input type="text" name="lid" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="text" name="pwd" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Digital Signature</td>
                                <td><input type="file" name="sig" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Upload Seal</td>
                                <td><input type="file" name="seal" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><center><input type="submit" name="add_village" value="Add Village" class="btn btn-success" /></center></td>
                            </tr>
                        </table>
                        <?php
                            }
                            if($_GET['t']==2){
                                ?>
                        <div class="alert-info" style="padding:10px; text-align: center; box-shadow: 3px 3px 5px black;">
                        Village office lists in<br /> <b><?php echo $r_tal1[10] ?></b> State, <b><?php echo $r_tal1[7] ?></b> District, <b><?php echo $r_tal1[3] ?></b> Taluk 
                        </div>
                        <?php
                        $sel_vil10=mysqli_query($con,"select * from vil_info where tid=".$_GET['tid']);
                        $i=1;
                        if(mysqli_num_rows($sel_vil10)>0){
                            
                            ?>
                        <br /><table class="table table-bordered table-condensed table-hover table-responsive">
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Village Officer</td>
                                <td>Contact</td>
                                <td>More</td>
                            </tr>
                        <?php
                            while($r_vil10=mysqli_fetch_row($sel_vil10)){
                                ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $r_vil10[4] ?></td>
                                <td><?php echo $r_vil10[9] ?></td>
                                <td><?php echo $r_vil10[7] ?></td>
                                <td><a href="vil_manage.php?t=3&tid=<?php echo $tid ?>&vid=<?php echo $r_vil10[0] ?>"><i class="glyphicon glyphicon-arrow-right green"></i></a></td>
                            </tr>
                        <?php
                        $i++;
                            }
                            ?>
                        </table>
                        
                            <?php
                        }
                        else{
                            echo "<h5 style='color:red'>No Village Office Created</h5>";                            
                        }
                        ?>
                        <?php
                            }
                            if($_GET['t']==3){
                                $vid=$_GET['vid'];
                                $sel_v1=mysqli_query($con,"select * from vil_info where id='$vid'");
                                $r_v1=mysqli_fetch_row($sel_v1);
                                ?>
                        <a href="vil_manage.php?t=2&tid=<?php echo $_GET['tid'] ?>"><i class="glyphicon glyphicon-arrow-left"></i></a>
                        <h4><u><?php echo $r_v1[4] ?> Details</u></h4>
                        <table class="table table-bordered table-condensed table-hover table-responsive">
                            <tr>
                                <td>Village Officer</td>
                                <td><?php echo $r_v1[9] ?></td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td><?php echo $r_v1[7] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $r_v1[8] ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo $r_v1[5] ?></td>
                            </tr>
                            <tr>
                                <td>Official Seal</td>
                                <td><img src="seal/<?php echo $r_v1[13] ?>" width="100" /></td>
                            </tr>
                            <tr>
                                <td>Signature</td>
                                <td><img src="sign/<?php echo $r_v1[12] ?>" height="75" /></td>
                            </tr>
                        </table>
                        <?php                                
                            }
                        }
                        ?>
                    </div>
                    
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
