<?php
<<<<<<< HEAD

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'class/dbconn.class.php';
include 'class/user/user.class.php';
include 'class/session.class.php';
include 'class/booking.class.php';
$user = new User();
if(isset($_COOKIE['u_mail'])){
    $user->isUserLoged();
}
if(isset($_POST['register'])){
	try{
	 $_SESSION['err'] = $user->register($_REQUEST['email'], $_REQUEST['password'], $_REQUEST['fname'], $_REQUEST['lname']);
	}
	catch(Exception $ex){
		 $_SESSION['err'] = "<div class='message'>".$ex->getMessage()."</div>";
	}
=======
include 'class/dbconn.class.php';
include 'class/user/user.class.php';
include 'class/session.class.php';
$user = new User();
 if(isset($_POST['register'])){
	try{
	  $user->register($_REQUEST['email'], $_REQUEST['password'], $_REQUEST['fname'], $_REQUEST['lname']);
	}
	catch(Exception $ex){
		echo "<div class='message'>".$ex->getMessage()."</div>";
	}
	}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_COOKIE['u_mail'])){
    $user->isUserLoged();
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
}
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/register.php'; ?>
<?php include 'include/footer.php';?>
