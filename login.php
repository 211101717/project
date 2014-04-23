<?php
session_start();
<<<<<<< HEAD
<<<<<<< HEAD
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'class/session.class.php';
include 'class/user/user.class.php';
include 'class/dbconn.class.php';
include 'class/booking.class.php';
$user = new User();
if(isset($_COOKIE['u_mail'])){
    $user->isUserLoged();
}
=======
include 'class/session.class.php';
include 'class/user/user.class.php';
include 'class/dbconn.class.php';
$user = new User();
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
=======
include 'class/session.class.php';
include 'class/user/user.class.php';
include 'class/dbconn.class.php';
$user = new User();
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
if(isset($_POST['login'])){
	try{
	  $user->login($_POST['email'], $_POST['password']);
	}
	catch(Exception $ex){
<<<<<<< HEAD
<<<<<<< HEAD
		$_SESSION['err'] = "<div class='message'>".$ex->getMessage()."</div>";
	}
}
=======
=======
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
		echo "<div class='message'>".$ex->getMessage()."</div>";
	}
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_COOKIE['u_mail'])){
    $user->isUserLoged();
}
<<<<<<< HEAD
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
=======
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/login.php'; ?>
<?php include 'include/footer.php';?>
