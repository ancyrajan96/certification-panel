<?php
include("connection.php");
session_start();
ob_start();
if(isset($_SESSION['deo'])){
    $usr=$_SESSION['deo'];
    $sel_log1=mysqli_query($con,"select * from deo_info where lid='$usr'");
    $r_log1=mysqli_fetch_row($sel_log1);
    $un=$r_log1[1];
    $sel_log=mysqli_query($con,"select * from vil_info where pin='$r_log1[8]'");
    $r_log=mysqli_fetch_row($sel_log);
    $pin=$r_log[6];
    $sid=$r_log[1];
    $did=$r_log[2];
    $tid=$r_log[3];
    $vid=$r_log[0];
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
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $un ?></span>
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
                        <li><a class="ajax-link" href="deohome.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                       
                        <li><a class="ajax-link" href="deoadd_people.php"><i class="glyphicon glyphicon-search "></i><span> Add Peoples</span></a>
                        </li>
                        <li><a class="ajax-link" href="deosearch_prople.php"><i class="glyphicon glyphicon-star-empty "></i><span> Search People</span></a>
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
        <li><b>Welcome <u><?php echo $un ?></u>, Welcome to <?php echo $r_log[4] ?></b></li>
    </ul>
</div>
<div class=" row">
   <!--   <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="" class="well top-block" href="deo_manage.php">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>My Profile</div>
            <div>6</div>
            <span class="notification">6</span>
        </a>
    </div> -->

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="4 new pro members." class="well top-block" href="deoadd_people.php">
            <i class="glyphicon glyphicon-search green"></i>

            <div>ADD People</div>
            <div>228</div>
            <span class="notification green">4</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="deosearch_prople.php">
            <i class="glyphicon glyphicon-star-empty yellow"></i>

            <div>Search People</div>
            <div>$13320</div>
            <span class="notification yellow">$34</span>
        </a>
    </div>

   <!--   <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="deo_msg.php">
            <i class="glyphicon glyphicon-flag red"></i>

            <div>Settings</div>
            <div>25</div>
            <span class="notification red">12</span>
        </a>
    </div>    -->
    
   
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Add People Here</h2>

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
                        
                        <div class="col-lg-7">
                            <h4>Citizen List</h4>
                            <?php
                            $sel_cit=mysqli_query($con,"select * from cit_info where v_pin='$pin'");
                            if(mysqli_num_rows($sel_cit)>0){
                                $j=1;
                                ?>
                            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-condensed table-striped table-wrapper">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>House Number</td>
                                <td>Ration ID</td>
                                <td>Aadhar Card</td>
                                <td>Election ID</td>
                                <td>SSLC</td>
                                <td>More</td>
                            </tr>
                            </thead> 
                            <?php
                                while($r_cit=mysqli_fetch_row($sel_cit)){
                                   ?>
                            <tr>
                                <td><?php echo $j ?></td>
                                <td><?php echo $r_cit[5] ?></td>
                                <td><?php echo $r_cit[7] ?></td>
                                <td><center>
                                    <?php
                                    if($r_cit[13]==0){
                                        ?>
                                    <img src="logo/closeIcon.jpg" />
                                    <?php
                                    }
                                    else{
                                        ?>
                                    <img src="logo/tick_button.png" />
                                    <?php
                                    }
                                    ?>
                                </center></td>
                                <td><center>
                                    <?php
                                    if($r_cit[14]==0){
                                        ?>
                                    <img src="logo/closeIcon.jpg" />
                                    <?php
                                    }
                                    else{
                                        ?>
                                    <img src="logo/tick_button.png" />
                                    <?php
                                    }
                                    ?>
                                </center></td>
                                <td>
                                    <center>
                                    <?php
                                    if($r_cit[15]==0){
                                        ?>
                                    <img src="logo/closeIcon.jpg" />
                                    <?php
                                    }
                                    else{
                                        ?>
                                    <img src="logo/tick_button.png" />
                                    <?php
                                    }
                                    ?>
                                </center>
                                </td>
                                <td>
                                    <center>
                                    <?php
                                    if($r_cit[20]==0){
                                        ?>
                                    <img src="logo/closeIcon.jpg" />
                                    <?php
                                    }
                                    else{
                                        ?>
                                    <img src="logo/tick_button.png" />
                                    <?php
                                    }
                                    ?>
                                </center>
                                </td>
                                <td>
                                    <img src="logo/more_icon.gif" style="cursor: pointer" onclick="loadinfo('<?php echo $r_cit[0] ?>')" />
                                </td>
                            </tr>
                            <?php
                            $j++;
                                }
                                ?>
                            </table>
                            <?php
                            }
                            else{
                                echo"No Citizen Information Found";
                            }
                            ?>
                        </div>
                        <div class="col-lg-5">
                            <script type="text/javascript">
                            function loadinfo(x){
                                xmlhttp=new XMLHttpRequest();
                                xmlhttp.open("GET","load_citinfo.php?uid="+x,true);
                                xmlhttp.send();

                                xmlhttp.onreadystatechange=function()
                                 {
                                   if(xmlhttp.readyState==4 && xmlhttp.status==200)
                                   {
                                       document.getElementById("uinfo").innerHTML=xmlhttp.responseText;
                                   }
                                 }  
                            }
                            </script>
                            <span id="uinfo">
                                
                            </span>
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
