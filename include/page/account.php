<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$admin = new Admin();
$accounts = $admin->getAccounts($_COOKIE['u_mail']);
?>
<b class="title"><?php echo mysql_affected_rows(); ?> User Accounts</b>
<?php
if(mysql_affected_rows() > 0){
    echo "<table width='60%'><tr align='left'><th align='left'>Fisrt name</th><th align='left'>Last name</th><th align='left'>E-mail</th></tr>";
    while($account = mysql_fetch_array($accounts)){
        echo "<tr>
             <td>".$account['u_lname']."</td>
             <td>".$account['u_fname']."</td>
             <td>".$account['u_mail']."</td></tr>";
    }
    echo "</table>";
}
?>