<?php
include("connection.php");
$sel_tax=mysqli_query($con,"select * from village_tax where id='".$_GET['id']."'");
$r_tax=mysqli_fetch_row($sel_tax);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .tb td{
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        <table style="width: 50%">
            <tr>
                <td><center><b>ഒറിജിനൽ <br /> രസീത് </b><br />
            <?php echo $r_tax[5] ?> നമ്പർ തണ്ടപേര് അനുസരിച്ച് കരം ഒടുക്കിയത്തിനു രസീത്  <br />
            <?php echo $r_tax[4] ?> താലൂക്  <?php echo $r_tax[8] ?> വില്ലജ് 
            
            </center></td>
            </tr>
            <tr>
                <td><table class="tb">
                                <tr>
                                    <td rowspan="2">സർവേയും സബ് ഡിവിഷൻ ഉം നമ്പറും ലെറ്റർഉം </td>
                                    <td colspan="2">വിസ്തീർണം</td>
                                    <td rowspan="2">പട്ടദാരന്റെയോ പട്ടദാരന്മാരുടെയോ പേര് </td>
                                    <td rowspan="2">പണം ഒടുക്കിയ ആളിന്റെ പേര്</td>
                                    <td rowspan="2">ഏതു കാലതേക്കെന്നോ  ഏതു തവണത്തെക്കെന്നോ </td>
                                    <td rowspan="2">തുക</td>
                                </tr>
                                <tr>
                                    <td width="50">ഹെ</td>
                                    <td width="50">ആർ</td>
                                </tr>
                                <tr style="height: 200px;">
                                    <td><?php echo $r_tax[9] ?></td>
                                    <td><?php echo $r_tax[10] ?></td>
                                    <td><?php echo $r_tax[11] ?></td>
                                    <td><?php echo $r_tax[12] ?></td>
                                    <td><?php echo $r_tax[13] ?></td>
                                    <td><?php echo $r_tax[14] ?></td>
                                    <td><?php echo $r_tax[15] ?>/-</td>
                                </tr>
                                
                    </table></td>
            </tr>
            <tr>
                                    <td>
                                <?php
                                $sel_vil=mysqli_query($con,"select * from vil_info where pin='$r_tax[1]'");
                                $r_vil=mysqli_fetch_row($sel_vil);                                
                                $dt1=$r_tax[6];
                                $dt2=explode("-",$dt1);
                                ?>
                                        മേൽ വിവരിച്ച പ്രകാരം  <?php echo $r_tax[15] ?>/- രൂപ ............. പൈസ  
                                        <?php echo $dt2[0] ?> മാണ്ട് <?php echo $dt2[1] ?> മാസം <?php echo $dt2[2] ?> തീയതി ആയ ഇന്നേദിവസം സ്വീകരിച്ച് വില്ലജ് കണക്കിൽ മുതൽ വച്ചിരിക്കുന്നു.
                                        <div style="margin-top: 70px;">
                                        <img src="seal/<?php echo $r_vil[13] ?>" height="50" style="margin-left: 40%" />
                                        <img src="sign/<?php echo $r_vil[12] ?>" height="50" style="float: right;" />
                                        </div>
                                        സ്ഥലം <?php echo $r_tax[8] ?><br />
                                        തീയതി <?php echo $r_tax[8] ?>
                                    </td>
                                </tr>
                                
        </table>
    </body>
</html>
