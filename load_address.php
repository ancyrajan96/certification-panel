<?php
include("connection.php");
$hn=$_GET['hn'];
$vpin=$_GET['vpin'];
$wd=$_GET['wd'];
$sel_addr=mysqli_query($con,"select addr from cit_info where h_num='$hn' and v_pin='$vpin' and w_num='$wd'");
if(mysqli_num_rows($sel_addr)>0){
    $r_addr=mysqli_fetch_row($sel_addr);
    echo $r_addr[0];
}
else{
    
}
?>