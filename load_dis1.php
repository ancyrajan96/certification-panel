<?php
include("connection.php");
$sid=$_GET['sid'];

?>
<select name="dt" id="dt" data-rel="chosen" class="form-control" onchange="loadtk(this.value)">
<option>Choose</option>
<?php
$sel_st=  mysqli_query($con,"select * from dis_info where s_id='$sid'");
while($r_st= mysqli_fetch_row($sel_st)){
    ?>
<option value="<?php echo $r_st[0] ?>"><?php echo $r_st[2] ?></option>
<?php
}
?>
</select>