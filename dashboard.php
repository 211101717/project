<?php
include 'class/user/user.class.php';
include 'class/dbconn.class.php';
include 'class/session.class.php';
$user = new User();
if(isset($_POST['save'])){
	try{
		$user = new User();
		$user->editUser($_REQUEST['lname'], $_REQUEST['fname'], $_REQUEST['password'], $_COOKIE['u_mail']);
	}catch(Exception $ex){
		echo "<div class='message'>".$ex->getMessage()."</div>";
	}
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(!isset($_GET['logged']) && !isset($_GET['edit']) && !isset($_POST['save']) ){
    $user->isUserLoged();
}
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/dashboard.php'; ?>
<?php include 'include/footer.php';?>