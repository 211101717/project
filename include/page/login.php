<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$user = new User()
?>
<b class="title">Log In</b>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<table width="200px">
    <tr>
        <td align='left'>
			<?php 
				if($_SESSION['err'] != ""){
					echo "<div class='message'>".$_SESSION['err']."</div>";
				}
			?>
			<p><label>E-mail or Username:</label><br/><input id="input-text" type="email" placeholder="E-mail or Username" required="" name ="email" value="<?php if(isset($_POST['login'])){echo $_POST['email']; } ?>"></></p>
			<p><label>Password:</label><br/><input id="input-text" type="password" placeholder="Password" required="" name="password"></p>
        </td>
    </tr>
    <tr>
        <td align='right'>
                <input id="input-submit" type="submit" value="Log In" name="login">
        </td>
    </tr>
</table>
</form>
