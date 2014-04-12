<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$user = new User()
?>
<b class="title">Register</b>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<table border='0' width='250px'>
    <tr>
        <td align='left'>
                <p><label>Last Name:</label><br/><input id="input-text" type="text" placeholder="Last name" required="" name="lname" value="<?php if(isset($_POST['register'])){echo $_POST['lname']; } ?>"></p>
                <p><label>First Name:</label><br/><input id="input-text" type="text" placeholder="First name" required="" name="fname" value="<?php if(isset($_POST['register'])){echo $_POST['fname']; } ?>"></></p>
                <p><label>E-mail:</label><br/><input id="input-text" type="email" placeholder="E-mail or Username" required="" name ="email" value="<?php if(isset($_POST['register'])){echo $_POST['email']; } ?>"></></p>
                <p><label>Password:</label><br/><input id="input-text" type="password" placeholder="Password" required="" name="password"></></p>
                <p><label>Confirm Password:</label><br/><input id="input-text" type="password" placeholder="Confirm password" required="" name="cpassword"></p>
                <?php 
                ?>
        </td>
    </tr>
    <tr>
        <td align='right'>
                <input id="input-submit" type="submit" value="Register" name="register">
        </td>
    </tr>
</table>
</form>
