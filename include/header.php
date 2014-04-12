<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gae Hotel</title>
        <link href='style/style.css' rel="stylesheet" type="text/css">
    </head>
    <body>
        <table align="center">
            <tr>
                <td>
                    <div class="header">
						<img src='img/logo.png' id="logo">
                        <div class="main-menu">
                              <a href="room.php">Rooms</a> <a href="#">Contact Us</a> <a href="#">About Us</a> 
                             <?php if(!isset($_COOKIE['u_mail'])){?>
                             <a href="register.php">Register</a>  <a href="login.php" id="main-last">Log In</a>
                             <?php //echo $_SESSION['u_mail']; ?>
                             <?php }else{ ?>
                             <?php if($_COOKIE['u_role'] == 'admin'){ ?>
                             <a href="newroom.php">Add Room</a>
                             <a href="account.php">Accounts</a> 
                             <?php } ?>
                             <a href="dashboard.php">Dashboard</a>  <a href="index.php?q=logout" id="main-last">Log Out</a>
                             <?php } ?>
                        </div>
                    </div>
                        <div class="content">