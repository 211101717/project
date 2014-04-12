<?php
session_start();
include 'class/session.class.php';
include 'class/user/user.class.php';
include 'class/dbconn.class.php';
$user = new User();
if(isset($_POST['login'])){
	try{
	  $user->login($_POST['email'], $_POST['password']);
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
}
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/login.php'; ?>
<?php include 'include/footer.php';?>
