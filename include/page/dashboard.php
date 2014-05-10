<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<b class="title"><?php echo $_COOKIE['u_lname']." ".$_COOKIE['u_fname'] ?>'s Dashboard</b>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table width="343px">
        <tr>
            <td>
                <?php if(!isset($_GET['edit'])){ ?>
                <p><b>Last name:</b> <?php echo $_COOKIE['u_lname'] ?></p>
                <p><b>First name:</b> <?php echo $_COOKIE['u_fname'] ?></p>
                <p><b>E-mail or Username:</b> <?php echo $_COOKIE['u_mail'] ?></p>
                <p><b>Password:</b> *******</p>
                <?php }else{ ?>
                <p><b>Last name:</b> <input id="input-text" type="text" placeholder="Last name" required="" name="lname" value="<?php echo $_COOKIE['u_lname'] ?>"></p>
                <p><b>First name:</b> <input id="input-text" type="text" placeholder="First name" required="" name="fname" value="<?php echo $_COOKIE['u_fname'] ?>"></></p>
                <p><b>E-mail or Username:</b> <input id="input-text" type="email" placeholder="E-mail or Username" required="" name ="email" value="<?php echo $_COOKIE['u_mail'] ?>" disabled=""style="width: 190px"></p>
                <p><b>Password:</b> <input id="input-text" type="password" placeholder="Enter your password" required="" name="password" value='' style="width:255px"></></p>
                <?php }?>
				<?php
                echo $_SESSION['err'];
                ?>
            </td>
        </tr>
        <tr>
            <td align='left'>
                 <?php if(!isset($_GET['edit'])){ ?>
                <p><a href="?edit" id="input-submit">Edit</a></p>
                <?php }else{ ?>
                <input id="input-submit" type="submit" name="save" value="Save"/>
                <?php }?>
            </td>
        </tr>
   </table>
</form>
