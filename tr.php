<?php
ob_start();
error_reporting(0);
session_start();
include '../../connection.php';
$uid=$_SESSION['usr'];
$sel1=$con->query("select * from user_data where em='$uid'");
    if(mysqli_num_rows($sel1)>0)
        {
        $r1=mysqli_fetch_row($sel1);
        }
if(isset($_SESSION['usr']))
{
    $em=$_SESSION['usr'];
    $sel=$con->query("select * from user_data where em='$em'");
    $rdata=mysqli_fetch_row($sel);
}
 else {
header("location:../../index.php");    
}
if(isset($_GET['t']))
{
    if($_GET['t']=="1")
    {
        $sel1=$con->query("select * from emergecy_contact where uid='$em' and st='1'");
        $rc=mysqli_fetch_row($sel1);
        $item="$rc[2],$rc[3],$rc[4]";
        $t="Msg From BeSafe!! $rdata[1] in Trouble, Trace the User: http://trinitytechnology.in/auto_location/Auto_Location_Update/index.php?cid=123";
        echo "<script language='javascript'> var win = window.open('http://api.msg91.com/api/sendhttp.php?route=4&sender=TESTIN&mobiles=$item&authkey=269646AttiMOEtXITY5c9c472d&message=$t', '1366002941508',  'width=100,height=100,left=375,top=330','_blank');
           setTimeout(function(){
                win.close()
            }, 6000);</script>";
            header("Refresh: 15;url=index.php");
    }
    if($_GET['t']=="2")
    {
        $sel1=$con->query("select * from panic_num");
        $rc=mysqli_fetch_row($sel1);
        $item="$rc[1],$rc[2],$rc[3]";
        $t="Msg From BeSafe!! $rdata[1] in Trouble, Trace the User: http://trinitytechnology.in/auto_location/Auto_Location_Update/index.php?cid=123";
        echo "<script language='javascript'> var win = window.open('http://api.msg91.com/api/sendhttp.php?route=4&sender=TESTIN&mobiles=$item&authkey=269646AttiMOEtXITY5c9c472d&message=$t', '1366002941508',  'width=100,height=100,left=375,top=330','_blank');
           setTimeout(function(){
                win.close()
            }, 6000);</script>";
            header("Refresh: 15;url=index.php");
    }
    if($_GET['t']=="3")
    {
        $sel1=$con->query("select * from emergecy_contact where uid='$em' and st='2'");
        $rc=mysqli_fetch_row($sel1);
        $item="$rc[2],$rc[3],$rc[4]";
        $t="Trace $rdata[1]: http://trinitytechnology.in/auto_location/Auto_Location_Update/index.php?cid=123";
        echo "<script language='javascript'> var win = window.open('http://api.msg91.com/api/sendhttp.php?route=4&sender=TESTIN&mobiles=$item&authkey=269646AttiMOEtXITY5c9c472d&message=$t', '1366002941508',  'width=100,height=100,left=375,top=330','_blank');
           setTimeout(function(){
                win.close()
            }, 6000);</script>";
            header("Refresh: 15;url=index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    <script>            
        function getLocation() {          
        //alert();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);         
    } else { 
        document.getElementById("demo").innerHTML = "<span class='fa fa-map-marker' style='color:red; margin-top: 15px;'></span>";
    }
}

function showPosition(position) {
    //alert(position);
    document.getElementById("demo").innerHTML = "<span class='fa fa-map-marker' style='color:green; margin-top: 15px;'></span>";
    document.getElementById("lat").value=position.coords.latitude;
    document.getElementById("lng").value=position.coords.longitude;    
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDge58kDZRSDquz16IhEFQZMzHjMpFWwlw&callback=myMap"></script>
<script type="text/javascript">
        function loadmap1() {
            var mapOptions = {
                center: new google.maps.LatLng(8.493847519337761, 76.94791529854746),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
                //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                document.getElementById("la").value=e.latLng.lat();
                document.getElementById("lo").value=e.latLng.lng();
            });
        }
    </script>
        <title>BeSafe - Women Safety</title>

        <!-- Bootstrap Core CSS -->
        <link href="template/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="template/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="template/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="template/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="template/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="template/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <!-- Bootstrap -->
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="build/css/custom.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="img/pob3.png">
        <!--[endif]-->
    </head>
    <body  onload="getLocation();loadmap1();">

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">BeSafe</a><span id="demo"><span class='fa fa-map-marker' style='color:gray; margin-top: 15px;'></span></span>
                    <input type="hidden" id="lat" /><input type="hidden" id="lng" />
                    
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

               

                <ul class="nav navbar-right navbar-top-links">  
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $rdata[1] ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="../web/profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
                
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        
                          
                               
                                
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            
                            <li>
                                <a href="emergency.php"><i class="fa fa-map-marker fa-fw" style="color: red"></i> Configure Track Me!!</a>
                            </li>
                            <li>
                                <a href="family.php"><i class="fa fa-map-marker fa-fw" style="color: green"></i> Configure Near Once!!</a>
                            </li>
                            <li>
                                <a href="my_App/GetLattittude.apk"><i class="fa fa-download" style="color: blueviolet"></i> Download APK file</a>
                            </li>
                            
                            <li>
                                <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> LogOut</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header"></h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="icons/trkme.png" class="img img-responsive"style="height: 75px;" />
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <div class="huge"></div>
                                        <div>Pre configured Contacts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?t=1">
                                <div class="panel-footer">
                                    <span class="pull-left"><b>Track Me!</b></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="icons/panic.png" class="img img-responsive" style="height: 75px;" />
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <div class="huge"></div>
                                        <div>Managed by Administrator</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?t=2">
                                <div class="panel-footer">
                                    <span class="pull-left"><b>PANIC</b></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="icons/trkmefmly.png" class="img img-responsive" style="height: 75px;"/>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <div class="huge"></div>
                                        <div>You are tracked by Family</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?t=3">
                                <div class="panel-footer">
                                    <span class="pull-left"><b>Near Ones</b></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <a href="../web/index.php">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="icons/web.gif" class="img img-responsive"style="height: 75px;" />
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <div class="huge"></div>
                                        <div>Real Community for Public</div>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="panel-footer">
                                    <span class="pull-left"><b>Community Zone</b></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-lg-12">
                                <center><h3>
                            Choose Place to get User Post from that location<br /><br />
                            </h3></center>
                        <div class="col-lg-6">
                            <form method="post">
                            <table class="table table-bordered table-condensed table-hover table-responsive">
                                <tr>
                                    <td>Latitude</td>
                                    <td><input type="text" name="lat" id="la" class="form-control" required="required" /></td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td><input type="text" name="lng" id="lo" class="form-control" required="required" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><center>
                                        <input type="submit" name="sub" value="FIND NOW" class="btn btn-sm btn-danger" />
                                </center></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        
                                        <div id="dvMap" style="width: 100%; height: 650px"></div>
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            if(isset($_POST['sub']))
                            {
                                $lat=$_POST['lat'];
                                $lng=$_POST['lng'];
                                $p=0;$z=0;$i=0;$n=1;$j=0;$co=0;$q=0;$dq=0;$rep=0;
                                $sel_d1=$con->query("select eid ,SQRT(POW(69.1 * (lat -$lat), 2)+pow(69.1 * ($lng -lng ) * COS(lat / 57.3), 2)) AS distance from event_latlon HAVING distance<60 ORDER BY distance");
                                if(mysqli_num_rows($sel_d1)>0)
                                {
                                    ?>
                            <table class="table table-bordered table-condensed table-hover table-responsive">
                                <?php
                                while($rd1=mysqli_fetch_row($sel_d1))
                                {
                                    $sel_evt=$con->query("select * from event_data where st=1 and id='$rd1[0]'");
                                    if(mysqli_num_rows($sel_evt)>0)
                                    {
                                        $r_evt=mysqli_fetch_row($sel_evt);
                                        $p_by=$r_evt[6];
                                        $sel_usr=$con->query("select * from user_data where em='$p_by'");
                                        $r_usr=mysqli_fetch_row($sel_usr);
                                        $i++;$q++;$dq++;
                                        $j++;$co++;$rep++;
                                    ?>
                                <tr id="a<?php echo $z ?>" onclick="asd(this.id)">
                                  <td>
                                      <b><span><img src="../besafe/user_pic/<?php echo $r_usr[8] ?>" style="border-radius:20px; border:2px solid #2384bf; width: 35px; height: 35px" title="<?php echo $r_usr[1] ?>" /></span><span style="color:#2384bf;"> &nbsp; <?php echo $r_usr[1] ?></span></b><span style="float: right; color: #c1c1c1;"><center><?php echo date("d M Y (D)", strtotime($r_evt[5])); ?> <br/><?php echo $r_evt[12]; ?></center></span>
                                      <br/><br/>
                                      <h3 align="justify"><?php echo $r_evt[1] ?></h3>
                                      <center>

                                          <?php
                                          $ext1=strrpos($r_evt[3],".");
                                          $ext=substr($r_evt[3],$ext1);
                                          //echo $ext;
                                          if($ext=='.mp4')
                                            {
                                              if(file_exists("../web/event_pic/video/".$r_evt[3]))
                                              {
                                                  ?>
                                           <br/>
                                      <video width="320" height="240" controls>
                                          <source src="../web/event_pic/video/<?php echo $r_evt[3] ?>" type="video/mp4">
                                          Your browser does not support the <code>video</code> tag.
                                      </video>
                                         <br/>
                                          <?php
                                              }
                                              else
                                              {
                                                  ?>
                                        <br/>
                                      <video width="320" height="240" controls>
                                          <source src="../web/event_pic/<?php echo $r_evt[3] ?>" type="video/mp4">
                                          Your browser does not support the <code>video</code> tag.
                                      </video>
                                         <br/> 
                                         <?php
                                              }
                                          ?>

                                      <?php
                                            }
                                      else if($ext=='.mp3')
                                      {

                                          ?>

                                          

                                              <style>

                                              </style>
                                           <div id="vis" class="spinner btn-round " style="margin-top: -1px; width: 90px; height: 90px; border-radius: 75px 75px 1px; background-color: #c1c1c1">
                                            <div class="rect1" style="margin-top: 15px; width: 2px; height: 60px; background-color: white;"></div>
                                            <div class="rect2" style="margin-top: 15px; width: 2px; height: 60px; background-color: white;"></div>
                                            <div class="rect3" style="margin-top: 15px; width: 2px; height: 60px; background-color: white;"></div>
                                            <div class="rect4" style="margin-top: 15px; width: 2px; height: 60px; background-color: white;"></div>
                                            <div class="rect5" style="margin-top: 15px; width: 2px; height: 60px; background-color: white;"></div>
                                            <div class="rect6" style="margin-top: 15px; width: 2px; height: 60px; background-color: white;"></div>
                                            <div class="rect7" style="margin-top: 15px; width: 2px; height: 60px; background-color: white;"></div>
                                            </div>
                                              <br/>
                                              <style>
                                                  audio:hover, audio:focus, audio:active
    {
    -webkit-box-shadow: 5px 5px 10px rgb(26, 188, 156);
    -moz-box-shadow: 5px 5px 10px rgb(26, 188, 156);
    box-shadow: 5px 5px 10px rgb(26, 188, 156);
    -webkit-transform: scale(1.05);
    -moz-transform: scale(1.05);
    transform: scale(1.05);
    }
    audio
    {
    -webkit-transition:all 0.3s linear;
    -moz-transition:all 0.3s linear;
    -o-transition:all 0.3s linear;
    transition:all 0.3s linear;



    }


                                              </style>
                                              <?php
                                                   if(file_exists("../web/event_pic/audio/".$r_evt[3]))
                                              {
                                                  ?>
                                              <div style="margin-top: -90px">

                                                  <audio class="audio hover" style="width: 320px; height: 30px;" controls>   

                                          <source src="../web/event_pic/audio/<?php echo $r_evt[3] ?>" type="audio/mp3">
                                      Your browser does not support the audio element.
                                      </audio></div>


                                      <?php
                                              }
                                              else
                                              {
                                                  ?>
                                              <div style="margin-top: -90px">

                                                  <audio class="audio hover" style="width: 320px; height: 30px;" controls>   

                                          <source src="../web/event_pic/<?php echo $r_evt[3] ?>" type="audio/mp3">
                                      Your browser does not support the audio element.
                                      </audio></div>
                                              <?php

                                              }
                                      }

                                      else
                                      {
                                      ?> 
                                              <img class="grow img img-thumbnail" src="../web/event_pic/<?php echo $r_evt[3] ?>" width="320" height="240" style="border-radius: 3%;" /><center>
                                      <?php
                                      }
                                      ?>
                                     </center>
                                              <script>
                                              function descr(c)
                                    {
                                    $("#des"+c).fadeToggle(500);
                                    $("#arr"+c).hide();
                                    }
                                    function arro(y)
                                    {
                                    $("#arr"+y).fadeToggle(500);
                                    $("#des"+y).hide();
                                    }
                                    function comment(co)
                                    {
                                    $("#com"+co).fadeToggle(500);

                                    }
                                              </script>
                                           
                                        </center><br />

                                     <div id="des<?php echo $j ?>" style="">
                                         
                                         <center><font size=""><center><p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $r_evt[2] ?></p></center></font>
                                     <?php
                                              $lis=$con->query("select * from likes where pid='$r_evt[0]' and st='1'");

                                              $dis=$con->query("select * from likes where pid='$r_evt[0]' and st='0'");

                                              $com=$con->query("select * from post_cmnt where pid='$r_evt[0]' and st='1'");

                                              $sel_msg=$con->query("select * from post_cmnt where pid='$r_evt[0]' order by id desc");

                                              $linkd=$con->query("select distinct link_id from event_data where id='$r_evt[0]' and link_id='$r_evt[7]' and link_id!='no'");

                                              $abs=$con->query("select * from abuse_data where eid='$r_evt[0]'");
                                              ?>
                                     
                                     </div>


                                        <center><div style="font-size: 1.58em; width: 100%; padding: 5px; border-radius: 20px; letter-spacing: 10px;">

                                           

                        
                          <h1 class="fa fa-comments-o" style=" color:#2384bf; cursor: pointer;" onclick="comment(<?php echo $co; ?>)"></h1>
                                          <?php
                                          if($r_evt[6]==$em)
                                          {
                                          ?>
                                              
                                          <?php
                                          }
                                          ?>

                                            </div>  
                                            <?php
                                     if(mysqli_num_rows($lis)>0)
                                                 { ?>
                       <?php
                                                 }
                                             else
                                                 {}
                                             ?>
                                            <?php
                                     if(mysqli_num_rows($dis)>0)
                                                 { ?>
                       <?php
                                                 }
                                             else
                                                 {}
                                             ?>

                                            <?php
                                     if(mysqli_num_rows($abs)>0)
                                                 { ?>
                       <?php
                                                 }
                                             else
                                                 {}
                                             ?>

                                            <?php
                                     if(mysqli_num_rows($com)>0)
                                                 { ?>
                      <div id="cm<?php echo $cm; ?>" style="display: none;" class="modal fade bs-example-modal-sm3<?php echo $p; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                              </button>
                              <h4 class="modal-title" id="myModalLabel2" style="color:#2384bf;">Comments</h4>
                            </div>
                            <div class="modal-body" style="color:#999999">


                                             <div >
                                                <?php
                                                 while($com1=mysqli_fetch_row($com))
                                                         {
                                                 $comm1=$con->query("select * from user_data where em='$com1[3]'");
                                                 $comm2=mysqli_fetch_row($comm1);
                                                 echo $comm2[1]."<br/>";

                                                 }

                                                 ?>
                                              </div>

                            </div>
                            <div class="modal-footer" style="border: none;">
                                <center> <img src="img/pob3.png" alt="..." width="20" height="20" /><span style="color: #F0FCC7;">Be</span>Safe</center>
                            </div>

                          </div>
                        </div>
                      </div> <?php
                                                 }
                                             else
                                                 {}
                                             ?>
                                      </center>

                                        <div id="com<?php echo $co ?>" style="display: none;">     
                                         <div id="msg<?php echo $p ?>">
                                          <?php
                                      $sel_msg=$con->query("select * from post_cmnt where pid='$r_evt[0]' order by id desc");
            while($r_msg=mysqli_fetch_row($sel_msg))
            {
                ?>

    <div style="width: 88%; padding: 5px; box-shadow:1px 1px 2px graytext; border-radius: 20px 20px 1px ; margin-left: 20px;">
    <div style="float: right"> 
        </div>
    <div><?php
        $dp=$con->query("select pic from user_data where em='$r_msg[3]'");
            $dp1=mysqli_fetch_row($dp);
            ?>
        <span style="color: #2384bf; margin-left: 10px;"><img src="../besafe/user_pic/<?php echo $dp1[0]; ?>" style="border-radius: 40px 40px 10px; border:2px solid #F0FCC7; width: 20px; height: 20px"><?php echo " "; echo $r_msg[4] ?> </span>: <?php echo $r_msg[2] ?> 
    </div>
    </div>
    <?php

        }

    ?>
                                          </div></div>
                                  </td>
                              </tr>
                                <?php
                                $p++;$z++;
                                    }
                                }
                                ?>
                            </table>
                            <?php
                                }
                            }
                            else
                            {
                                ?>
                            
                            <?php
                            }
                            ?>
                        </div>
                    
                <!-- /.row -->
                <div class="row" style="display: none;">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                                data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="#">Action</a>
                                            </li>
                                            <li><a href="#">Another action</a>
                                            </li>
                                            <li><a href="#">Something else here</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                        <div class="panel panel-default" style="display: none;">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                                data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="#">Action</a>
                                            </li>
                                            <li><a href="#">Another action</a>
                                            </li>
                                            <li><a href="#">Something else here</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>3326</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:29 PM</td>
                                                    <td>$321.33</td>
                                                </tr>
                                                <tr>
                                                    <td>3325</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:20 PM</td>
                                                    <td>$234.34</td>
                                                </tr>
                                                <tr>
                                                    <td>3324</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:03 PM</td>
                                                    <td>$724.17</td>
                                                </tr>
                                                <tr>
                                                    <td>3323</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:00 PM</td>
                                                    <td>$23.71</td>
                                                </tr>
                                                <tr>
                                                    <td>3322</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:49 PM</td>
                                                    <td>$8345.23</td>
                                                </tr>
                                                <tr>
                                                    <td>3321</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:23 PM</td>
                                                    <td>$245.12</td>
                                                </tr>
                                                <tr>
                                                    <td>3320</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:15 PM</td>
                                                    <td>$5663.54</td>
                                                </tr>
                                                <tr>
                                                    <td>3319</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:13 PM</td>
                                                    <td>$943.45</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.col-lg-4 (nested) -->
                                    <div class="col-lg-8">
                                        <div id="morris-bar-chart"></div>
                                    </div>
                                    <!-- /.col-lg-8 (nested) -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                        
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> Notifications Panel
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                            <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                            </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                            </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                            <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                            </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                            <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                            </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small"><em>11:32 AM</em>
                                            </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                            <span class="pull-right text-muted small"><em>11:13 AM</em>
                                            </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                            <span class="pull-right text-muted small"><em>10:57 AM</em>
                                            </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                            <span class="pull-right text-muted small"><em>9:49 AM</em>
                                            </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-money fa-fw"></i> Payment Received
                                            <span class="pull-right text-muted small"><em>Yesterday</em>
                                            </span>
                                    </a>
                                </div>
                                <!-- /.list-group -->
                                <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                                <a href="#" class="btn btn-default btn-block">View Details</a>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                        <div class="chat-panel panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-comments fa-fw"></i>
                                Chat
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                            data-toggle="dropdown">
                                        <i class="fa fa-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu slidedown">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-refresh fa-fw"></i> Refresh
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-check-circle fa-fw"></i> Available
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-times fa-fw"></i> Busy
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-clock-o fa-fw"></i> Away
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <ul class="chat">
                                    <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar"
                                                     class="img-circle"/>
                                            </span>

                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">Jack Sparrow</strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                                </small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                            <span class="chat-img pull-right">
                                                <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar"
                                                     class="img-circle"/>
                                            </span>

                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> 13 mins ago
                                                </small>
                                                <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar"
                                                     class="img-circle"/>
                                            </span>

                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">Jack Sparrow</strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> 14 mins ago
                                                </small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                            <span class="chat-img pull-right">
                                                <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar"
                                                     class="img-circle"/>
                                            </span>

                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> 15 mins ago
                                                </small>
                                                <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.panel-body -->
                            <div class="panel-footer">
                                <div class="input-group">
                                    <input id="btn-input" type="text" class="form-control input-sm"
                                           placeholder="Type your message here..."/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                                Send
                                            </button>
                                        </span>
                                </div>
                            </div>
                            <!-- /.panel-footer -->
                        </div>
                        <!-- /.panel .chat-panel -->
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="template/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="template/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="template/js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="template/js/raphael.min.js"></script>
        <script src="template/js/morris.min.js"></script>
        <script src="template/js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="template/js/startmin.js"></script>

    </body>
</html>
