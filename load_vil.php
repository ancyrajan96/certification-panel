<?php
include("connection.php");
$sid=$_GET['sid'];
$did=$_GET['did'];
$tid=$_GET['tid'];
?>
<select name="vg" id="vg" data-rel="chosen" class="form-control">
<option>Choose</option>
<?php
$sel_st=  mysqli_query($con,"select * from vil_info where sid='$sid' and did='$did' and tid='$tid'");
while($r_st= mysqli_fetch_row($sel_st)){
    ?>
<option value="<?php echo $r_st[6] ?>"><?php echo $r_st[4] ?></option>
<?php
}
?>
</select>