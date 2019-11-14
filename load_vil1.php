<?php
include("connection.php");
$sid=$_GET['sid'];
$did=$_GET['did'];
$tid=$_GET['tid'];

?>

<?php
$sel_st=  mysqli_query($con,"select * from vil_info where sid='$sid' and did='$did' and tid='$tid'");
if(mysqli_num_rows($sel_st)>0)
{
    $i=1;
    ?>
<table class="table table-striped table-bordered bootstrap-datatable datatable responsive table-condensed table-striped table-wrapper">
    <thead>
    <tr>
        <td>#</td>
        <td>Village Name</td>
        <td>Address</td>
        <td>Village Officer</td>
        <td>Contact Number</td>        
        <td>Email</td>
        <td>Pin</td>
    </tr>
    </thead>
<?php
while($r_st= mysqli_fetch_row($sel_st)){
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $r_st[4] ?></td>
        <td><?php echo $r_st[5] ?></td>
        <td><?php echo $r_st[9] ?></td>
        <td><?php echo $r_st[7] ?></td>
        <td><?php echo $r_st[8] ?></td>
        <td><?php echo $r_st[6] ?></td>
    </tr>
<?php
$i++;
}
?>
    </table>
<?php
}
?>
