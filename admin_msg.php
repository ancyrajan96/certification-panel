<?php
include("connection.php");
include './encode_decode.php';
session_start();
ob_start();
if(isset($_SESSION['admin'])){
    
}
else{
    header("location:index.php");
}
if(isset($_POST['post_msg'])){
    $pto=$_POST['pto'];
    $mt=encrypt_url($_POST['mt']);
    $msg=$_POST['msg'];
    $e_msg=encrypt_url($msg);
    $dt=date('Y-m-d');
    $ins_msg=mysqli_query($con,"insert into msg_tovil values('','admin','admin','$pto','$mt','$e_msg','$dt','1')");
    if($ins_msg>0){
        header("location:admin_msg.php");
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<a href=""></a>
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
                <span>Secure certification panel </span></a>

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
                xmlhttp.open("GET","load_vil2.php?sid="+s+"&did="+d+"&tid="+x,true);
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
                    
                                
                            </table>
                
                      
                    <span id="vg1"></span>
                    
                    <?php
                    if(isset($_GET['t']))
                    {
                    ?>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <tr>
                            <td colspan="2" style="background-color: blueviolet; color:white"><center><b>POST MESSAGE HERE</b><span style="float: right"><a href="admin_msg.php"><img src="logo/close_button5.gif" /></a></span></center></td>
                        </tr>
                        <tr>
                            <td>Message Posted To</td>
                            <td><input type="text" name="pto" value="<?php echo $_GET['vid'] ?>" class="form-control" readonly="readonly" /></td>
                        </tr>
                        <tr>
                            <td>Message Title</td>
                            <td><input type="text" name="mt" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td><textarea name="msg" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="post_msg" value="Post Message" class="btn btn-success" /></td>
                        </tr>
                    </table>
                    </div>
                    <?php
                    }
                    else
                    {
                    ?>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <?php
                        $sel_msg=mysqli_query($con,"select * from msg_tovil where msg_frmid='admin'");
                        if(mysqli_num_rows($sel_msg)>0){
                            $i=1;
                            ?>
                        <center><h3>Message Posted By You</h3></center><hr />
                        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-condensed table-striped table-wrapper">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Title</td>
                                        <td>Message</td>
                                        <td>Posted To</td>
                                    </tr>
                                </thead>
                        <?php
                            while($r_msg=mysqli_fetch_row($sel_msg)){
                              ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo decrypt_url($r_msg[4])?></td>
                                    <td><?php echo decrypt_url($r_msg[5]) ?></td>
                                    <td>
                                        <?php 
                                        $sel_vn=mysqli_query($con,"select v_nme from vil_info where pin='$r_msg[3]'");
                                        $r_vn=mysqli_fetch_row($sel_vn);
                                        echo $r_vn[0];
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </table>
                                <?php
                        }
                        else{
                            echo "No Message Posted";
                        }
                        ?>
                        
                    </div>
                    <?php
                    }
                    ?>
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
