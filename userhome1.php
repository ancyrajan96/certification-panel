<?php
include("connection.php");
ob_start();
session_start();
if(isset($_SESSION['usr'])){
    $usr=$_SESSION['usr'];
    $sel_usr=mysqli_query($con,"select * from cit_info where uid='$usr'");
    $r_usr=mysqli_fetch_row($sel_usr);
    
}
else{
    header("location:../index.php");
}
if(isset($_POST['up_rc'])){
    $rc=$_FILES['rc']['name'];
    $pextn=  strrpos($rc, ".");
    $ext=substr($rc,$pextn);
    $nfn="$usr$ext";
    move_uploaded_file($_FILES['rc']['tmp_name'], getcwd()."\\r_card\\$nfn");
    $ins_rc=mysqli_query($con,"insert into r_card values('','$usr','$nfn','1')");
    if($ins_rc>0){
        $up_rc=mysqli_query($con,"update cit_info set ration_status=1 where uid='$usr'");
        if($up_rc>0){
            
                header("location:userhome1.php");
                        
        }
    }
}
if(isset($_POST['up_ac'])){
    $rc=$_FILES['ac']['name'];
    $pextn=  strrpos($rc, ".");
    $ext=substr($rc,$pextn);
    $nfn="$usr$ext";
    move_uploaded_file($_FILES['ac']['tmp_name'], getcwd()."\\a_card\\$nfn");
    $ins_rc=mysqli_query($con,"insert into a_card values('','$usr','$nfn','1')");
    if($ins_rc>0){
        $up_rc=mysqli_query($con,"update cit_info set adhar_status=1 where uid='$usr'");
        if($up_rc>0){
            
                header("location:userhome1.php");
                     
        }
    }
}
if(isset($_POST['up_ec'])){
    $rc=$_FILES['ec']['name'];
    $pextn=  strrpos($rc, ".");
    $ext=substr($rc,$pextn);
    $nfn="$usr$ext";
    move_uploaded_file($_FILES['ec']['tmp_name'], getcwd()."\\e_card\\$nfn");
    $ins_rc=mysqli_query($con,"insert into id_card values('','$usr','$nfn','1')");
    if($ins_rc>0){
        $up_rc=mysqli_query($con,"update cit_info set eid_status=1 where uid='$usr'");
        if($up_rc>0){
            
                header("location:userhome1.php");
                 
        }
    }
}
if(isset($_POST['up_sslc'])){
    $rc=$_FILES['sslc']['name'];
    $pextn=  strrpos($rc, ".");
    $ext=substr($rc,$pextn);
    $nfn="$usr$ext";
    move_uploaded_file($_FILES['sslc']['tmp_name'], getcwd()."\\sslc_card\\$nfn");
    $ins_rc=mysqli_query($con,"insert into sslc_card values('','$usr','$nfn','1')");
    if($ins_rc>0){
        $up_rc=mysqli_query($con,"update cit_info set sslc_st=1 where uid='$usr'");
        if($up_rc>0){
            header("location:userhome1.php");                        
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
                <span>secure certifation<span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $r_usr[5] ?></span>
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
                        <li><a class="ajax-link" href="userhome1.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <li><a class="ajax-link" href="userhome1.php"><i class="glyphicon glyphicon-bookmark "></i><span> My Profile</span></a>
                        </li>
                        <li><a class="ajax-link" href="userhome1.php"><i class="glyphicon glyphicon-search "></i><span> Search Village</span></a>
                        </li>
                        <li><a class="ajax-link" href="userhome1.php"><i class="glyphicon glyphicon-file "></i><span> Request Certificate</span></a>
                        </li>
                        <li><a class="ajax-link" href="userhome1.php"><i class="glyphicon glyphicon-zoom-in"></i><span> Certificate Status</span></a>
                        </li>
                        <li><a class="ajax-link" href="userhome1.php"><i class="glyphicon glyphicon-warning-sign"></i><span> Post Feedback</span></a>
                        </li>
                        <li><a class="ajax-link" href="userhome1.php"><i class="glyphicon glyphicon-arrow-down"></i><span> Post Complaints</span></a>
                        </li>
                        <li><a class="ajax-link" href="userhome1.php"><i class="glyphicon glyphicon-bullhorn"></i><span> Admin Alerts</span></a>
                        </li>
                        <li><a class="ajax-link" href="userhome1.php"><i class="glyphicon glyphicon-cog"></i><span> Account Settings</span></a>
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
            <a href="userhome1.php">Home</a>
        </li>
        <li>
            <a href="userhome1.php">Dashboard</a>
        </li>
    </ul>
</div>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="userhome1.php">
            <i class="glyphicon glyphicon-bookmark blue"></i>

            <div>My Profile</div>
            <div></div>
            <span class="notification"></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="userhome1.php">
            <i class="glyphicon glyphicon-search green"></i>

            <div>Search Village</div>
            <div></div>
            <span class="notification green"></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="userhome1.php">
            <i class="glyphicon glyphicon-file yellow"></i>

            <div>Request Certificate</div>
            <div></div>
            <span class="notification yellow"></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="userhome1.php">
            <i class="glyphicon glyphicon-zoom-in red"></i>

            <div>Certificate Status</div>
            <div></div>
            <span class="notification red"></span>
        </a>
    </div>
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="userhome1.php">
            <i class="glyphicon glyphicon-warning-sign blue"></i>

            <div>Post Feedback</div>
            <div></div>
            <span class="notification red"></span>
        </a>
    </div>
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="userhome1.php">
            <i class="glyphicon glyphicon-arrow-down green"></i>

            <div>Post Complaints</div>
            <div></div>
            <span class="notification yellow"></span>
        </a>
    </div>
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="userhome1.php">
            <i class="glyphicon glyphicon-bullhorn yellow"></i>

            <div>Admin Alerts</div>
            <div></div>
            <span class="notification green"></span>
        </a>
    </div>
    
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="userhome1.php">
            <i class="glyphicon glyphicon-cog red"></i>

            <div>Account Settings</div>
            <div></div>
            <span class="notification red"></span>
        </a>
    </div>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> User Home :: Please Upload Your Identity Proof for Access the Web Portal</h2>

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
                        <div class="col-lg-2">
                            
                        </div>
                        <div class="col-lg-6">
                            <?php
                            $sel_r=mysqli_query($con,"select * from r_card where uid='$usr'");
                            if(mysqli_num_rows($sel_r)>0){
                                $r_r=mysqli_fetch_row($sel_r);
                                ?>
                            <form method="post" enctype="multipart/form-data">
                            <table class="table table-bordered table-condensed table-hover table-responsive">
                    <tr>
                        <td colspan="2" onclick="show_r()" style="cursor: pointer; background-color: green; color: white"><center><b>Your Ration Card is Here</b></center></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span id="rid" style="display: none;">
                                <img src="r_card/<?php echo $r_r[2] ?>" class="img img-responsive" />
                            </span></td>
                    </tr>
                            </table>
                            </form>
                            <script type="text/javascript">
                            function show_r(){
                                $("#rid").toggle(1000);
                            }
                            </script>
                            <?php
                            }
                            else{
                            ?>
                        <table class="table table-bordered table-condensed table-hover table-responsive">
                            <tr>
                                <td colspan="2" style="background-color: red; color: white"><center><b>Upload Your Ration Card </b></center></td>
                            </tr>
                            <tr>
                                <td>Upload File</td>
                                <td><input type="file" name="rc" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><center><input type="submit" class="btn btn-primary" value="Upload Ration Card" name="up_rc" /></center></td>
                            </tr>
                        </table>
                            <?php
                            }
                            $sel_adr=mysqli_query($con,"select * from a_card where uid='$usr'");
                            if(mysqli_num_rows($sel_adr)>0){
                                $r_adr=mysqli_fetch_row($sel_adr);
                                ?>
                            <table class="table table-bordered table-condensed table-hover table-responsive">
                    <tr>
                        <td colspan="2" onclick="show_adr()" style="cursor: pointer; background-color: green; color: white"><center><b>Your Aadhar Card is Here</b></center></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span id="adrid" style="display: none;">
                                <img src="a_card/<?php echo $r_adr[2] ?>" class="img img-responsive" />
                            </span></td>
                    </tr>
                            </table>
                            <script type="text/javascript">
                            function show_adr(){
                                $("#adrid").toggle(1000);
                            }
                            </script>
                            <?php
                            }
                            else{
                            ?>
                            <table class="table table-bordered table-condensed table-hover table-responsive">
                            <tr>
                                <td colspan="2" style="background-color: red; color: white"><center><b>Upload Your Aadhar Card </b></center></td>
                            </tr>
                            <tr>
                                <td>Upload File</td>
                                <td><input type="file" name="ac" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><center><input type="submit" class="btn btn-primary" value="Upload Aadhar Card" name="up_ac" /></center></td>
                            </tr>
                        </table>
                        <?php
                            }
                            $sel_id=mysqli_query($con,"select * from id_card where uid='$usr'");
                            if(mysqli_num_rows($sel_id)>0){
                                $r_id=mysqli_fetch_row($sel_id);
                                ?>
                            <table class="table table-bordered table-condensed table-hover table-responsive">
                    <tr>
                        <td colspan="2" onclick="show_id()" style="cursor: pointer; background-color: green; color: white"><center><b>Your Election ID is Here</b></center></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span id="idid" style="display: none;">
                                <img src="e_card/<?php echo $r_id[2] ?>" class="img img-responsive" />
                            </span></td>
                    </tr>
                            </table>
                            <script type="text/javascript">
                            function show_id(){
                                $("#idid").toggle(1000);
                            }
                            </script>
                            <?php
                            }
                            else{
                            ?>
                        <table class="table table-bordered table-condensed table-hover table-responsive">
                        <tr>
                            <td colspan="2" style="background-color: red; color: white"><center><b>Upload Your Election ID Card </b></center></td>
                        </tr>
                        <tr>
                            <td>Upload File</td>
                            <td><input type="file" name="ec" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><center><input type="submit" class="btn btn-primary" value="Upload ID Card" name="up_ec" /></center></td>
                        </tr>
                    </table>
                            <?php
                            }
                            $sel_sslc=mysqli_query($con,"select * from sslc_card where uid='$usr'");
                            if(mysqli_num_rows($sel_sslc)>0){
                                $r_sslc=mysqli_fetch_row($sel_sslc);
                                ?>
                            <table class="table table-bordered table-condensed table-hover table-responsive">
                    <tr>
                        <td colspan="2" onclick="show_sslc()" style="cursor: pointer; background-color: green; color: white"><center><b>Your SSLC Certificate is Here</b></center></td>
                    </tr>
                    <tr>
                        <td colspan="2"><span id="sslcid" style="display: none;">
                                <img src="sslc_card/<?php echo $r_sslc[2] ?>" class="img img-responsive" />
                            </span></td>
                    </tr>
                            </table>
                            <script type="text/javascript">
                            function show_sslc(){
                                $("#sslcid").toggle(1000);
                            }
                            </script>
                            <?php
                            }
                            else{
                            ?>
                    <table class="table table-bordered table-condensed table-hover table-responsive">
                    <tr>
                        <td colspan="2" style="background-color: red; color: white"><center><b>Upload Your SSLC Certificate </b></center></td>
                    </tr>
                    <tr>
                        <td>Upload File</td>
                        <td><input type="file" name="sslc" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><center><input type="submit" class="btn btn-primary" value="Upload SSLC Certificate" name="up_sslc" /></center></td>
                    </tr>
                </table>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-4">
                            <?php
                             $sel_usr=mysqli_query($con,"select * from cit_info where uid='$usr'");
                            $r_usr=mysqli_fetch_row($sel_usr);
                            if($r_usr[13]==0 || $r_usr[14]==0 || $r_usr[15]==0){

                           }
                           else{
                                ?>
                            <div class="alert-info">
                                <img src="logo/congratulation-043.gif" class="img img-responsive" />
                                You are Successfully Upload your Identity Proof. Now <a href="userhome.php">Click here</a>
                                to Enter Home Page
                            
                            </div>
                            <?php
                                } 
                            ?>
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
