<?php
session_start();
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
if(isset($_POST['login'])){
	try{
	  $user->login($_POST['email'], $_POST['password']);
	}
	catch(Exception $ex){
		$_SESSION['err'] = "<div class='message'>".$ex->getMessage()."</div>";
	}
}
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/login.php'; ?>
<?php include 'include/footer.php';?>
