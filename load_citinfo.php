<?php
include("connection.php");
$uid=$_GET['uid'];
$sel_addr=mysqli_query($con,"select * from cit_info where id='$uid'");
$r_cit=mysqli_fetch_row($sel_addr);
?>
<h3>View Information</h3>

<table class="table table-bordered table-condensed table-hover table-responsive">
    <tr>
        <td>Citizen Name</td>
        <td><?php echo $r_cit[5] ?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo $r_cit[8] ?></td>
    </tr>
    <tr>
        <td>Ward & House No.</td>
        <td>Ward - <?php echo $r_cit[6] ?>(H.No: <?php echo $r_cit[7] ?>)</td>
    </tr>
    <?php
    if($r_cit[19]==0){
    ?>
    <tr>        
        <td colspan="2"><div class="alert-warning" style="padding: 10px;">The User Need to Update His Profile... No More Information Available</div></td>
    </tr>
    <?php
    }
    else
    {
    ?>
    
    <?php
    }
    ?>
</table>
