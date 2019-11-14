<?php
include("connection.php");
session_start();
ob_start();
if(isset($_SESSION['vadmin'])){
    $usr=$_SESSION['vadmin'];
    $sel_log=mysqli_query($con,"select * from vil_info where lid='$usr'");
    $r_log=mysqli_fetch_row($sel_log);
    $pin=$r_log[6];
}
else{
    header("location:index.php");
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
    <title>Village Home</title>
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
            <a class="navbar-brand" style="width: 250px;" href="adminhome.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>secure certification</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $r_log[9] ?></span>
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
                        <li><a class="ajax-link" href="villagehome.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <li><a class="ajax-link" href="deo_manage.php"><i class="glyphicon glyphicon-user "></i><span> Manage DEO</span></a>
                        </li>
                        <li><a class="ajax-link" href="search_people.php"><i class="glyphicon glyphicon-search "></i><span> Search Peoples</span></a>
                        </li>
                        <li><a class="ajax-link" href="p_req.php"><i class="glyphicon glyphicon-star-empty "></i><span> Pending Request</span></a>
                        </li>
                        <li><a class="ajax-link" href="app_cert.php"><i class="glyphicon glyphicon-flag"></i><span> Approved Certificates</span></a>
                        </li>
                        <li><a class="ajax-link" href="village_inbox.php"><i class="glyphicon glyphicon-envelope"></i><span> Inbox</span></a>
                        </li>
                        <li><a class="ajax-link" href="msg_toadmin.php"><i class="glyphicon glyphicon-bullhorn"></i><span> Msg to Admin</span></a>
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
        <li><b>Welcome <u><?php echo $r_log[9] ?></u>, Welcome to <?php echo $r_log[4] ?></b></li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Approved Certificates</h2>

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
                        <div class="col-lg-1">
                            
                        </div>
                        <div class="col-lg-10">
                            <script type="text/javascript">
                            function load_cst(){
                                $("#creq").toggle(1000);
                            }
                            function load_cst1(){
                                $("#creq1").toggle(1000);
                            }
                            function load_cst2(){
                                $("#creq2").toggle(1000);
                            }
                            </script>
                            <table class="table table-bordered table-condensed table-hover table-hover table-responsive">
                                <tr style="background-color: #2a62bc; color: white; cursor: pointer" onclick="load_cst()">
                                    <?php 
                                    $count_cst=mysqli_query($con,"select * from caste_cert where req_to='$pin' and sts=1");
                                    $c_count=mysqli_num_rows($count_cst);
                                    ?>
                                    <td>Caste Certificate ::(<?php echo $c_count ?> Approved) </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="creq" style="display: none">
                                        <?php 
                                        $sel_cst=mysqli_query($con,"select * from caste_cert where req_to='$pin' and sts=1");
                                        if(mysqli_num_rows($sel_cst)>0){
                                            $i=1;
                                            ?>
                                        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-condensed table-striped table-wrapper">
                                            <tr>
                                                <td>#</td>
                                                <td>Request From</td>
                                                <td>Requested Date</td>
                                                <td>Approved Date</td>
                                                <td>More</td>
                                            </tr>
                                        <?php
                                            while($r_cst=mysqli_fetch_row($sel_cst)){
                                                ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $r_cst[2] ?></td>
                                                <td><?php echo $r_cst[10] ?></td>
                                                <td><?php echo $r_cst[11] ?></td>                                                
                                                <td><a href="cast_print.php?id=<?php echo $r_cst[0] ?>"><img src="logo/print.png" /></a></td>
                                            </tr>
                                            <?php
                                            $i++;
                                            }
                                            ?>
                                        </table>
                                            <?php
                                        }
                                        else{
                                            echo"No Certificate Request";
                                        }
                                        ?>
                                            </span>
                                    </td>
                                </tr>
                                <?php 
                                    $count_sal=mysqli_query($con,"select * from sal_cert where req_to='$pin' and sts=1");
                                    $c_sal=mysqli_num_rows($count_sal);
                                    ?>
                                <tr style="background-color: brown; color: white; cursor: pointer"  onclick="load_cst1()">
                                    <td>Income Certificate Request :: (<?php echo $c_sal ?> Approved)</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="creq1" style="display: none">
                                            <?php 
                                        $sel_cst=mysqli_query($con,"select * from sal_cert where req_to='$pin' and sts=1");
                                        if(mysqli_num_rows($sel_cst)>0){
                                            $i=1;
                                            ?>
                                        <table class="table table-bordered table-condensed table-hover table-responsive">
                                            <tr>
                                                <td>#</td>
                                                <td>Request From</td>
                                                <td>Requested Date</td>
                                                <td>Approved Date</td>
                                                <td>More</td>
                                            </tr>
                                        <?php
                                            while($r_cst=mysqli_fetch_row($sel_cst)){
                                                ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $r_cst[2] ?></td>
                                                <td><?php echo $r_cst[9] ?></td>
                                                <td><?php echo $r_cst[10] ?></td>
                                                <td><a href="income_print.php?id=<?php echo $r_cst[0] ?>" title="Print"><img src="logo/print.png" /></a> </td>
                                            </tr>
                                            <?php
                                            $i++;
                                            }
                                            ?>
                                        </table>
                                            <?php
                                        }
                                        else{
                                            echo"No Certificate Approved";
                                        }
                                        ?>
                                        </span>
                                    </td>
                                </tr>
                                 <?php 
                                    $count_sal=mysqli_query($con,"select * from nat_cert where req_to='$pin' and sts=1");
                                    $c_sal=mysqli_num_rows($count_sal);
                                    ?>
                                <tr style="background-color: green; color: white; cursor: pointer"  onclick="load_cst2()">
                                    <td>Nativity Certificate Request :: (<?php echo $c_sal ?> Approved)</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="creq2" style="display: none">
                                            <?php 
                                        $sel_cst=mysqli_query($con,"select * from nat_cert where req_to='$pin' and sts=1");
                                        if(mysqli_num_rows($sel_cst)>0){
                                            $i=1;
                                            ?>
                                        <table class="table table-bordered table-condensed table-hover table-responsive">
                                            <tr>
                                                <td>#</td>
                                                <td>Request From</td>
                                                <td>Requested Date</td>
                                                <td>Approved Date</td>
                                                <td>More</td>
                                            </tr>
                                        <?php
                                            while($r_cst=mysqli_fetch_row($sel_cst)){
                                                ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $r_cst[2] ?></td>
                                                <td><?php echo $r_cst[9] ?></td>
                                                <td><?php echo $r_cst[10] ?></td>
                                                <td><a href="nat_print.php?id=<?php echo $r_cst[0] ?>" title="Print"><img src="logo/print.png" /></a></td>
                                            </tr>
                                            <?php
                                            $i++;
                                            }
                                            ?>
                                        </table>
                                            <?php
                                        }
                                        else{
                                            echo"No Certificate Request";
                                        }
                                        ?>
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
