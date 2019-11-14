<?php
include("connection.php");
$sid=$_GET['sid'];
$did=$_GET['did'];
?>
<select name="tk" id="tk" data-rel="chosen" class="form-control" onchange="loadvil(this.value)">
<option>Choose</option>
<?php
$sel_st=  mysqli_query($con,"select * from tal_info where s_id='$sid' and d_id='$did'");
while($r_st= mysqli_fetch_row($sel_st)){
    ?>
<option value="<?php echo $r_st[0] ?>"><?php echo $r_st[3] ?></option>
<?php
}
?>
</select>