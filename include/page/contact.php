<b class="title" >Contact Us</b> 
<br/>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<table width="200px">
    <tr>
        <td align='left'>
			<?php 
				if($_SESSION['err'] != ""){
					echo "<div class='message'>".$_SESSION['err']."</div>";
				}
			?>
			<p><label>E-mail:</label><br/><input id="input-text" type="email" placeholder="Your e-mail address" required="" name ="email" value="<?php if(isset($_POST['login'])){echo $_POST['email']; } ?>"></></p>
			<p><label>Message:</label><br/><textarea id="input-text"  placeholder="Your message" required="" name="message" style='min-height:100px; min-width:250px;max-height:100px; max-width:250px;'></textarea></p>
        </td>
    </tr>
    <tr>
        <td align='right'>
                <input id="input-submit" type="submit" value="Send" name="login">
        </td>
    </tr>
</table>
</form>