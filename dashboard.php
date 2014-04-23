<?php
<<<<<<< HEAD

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'class/user/user.class.php';
include 'class/dbconn.class.php';
include 'class/session.class.php';
include 'class/booking.class.php';
$user = new User();
=======
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
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
if(!isset($_GET['logged']) && !isset($_GET['edit']) && !isset($_POST['save']) ){
    $user->isUserLoged();
}
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/dashboard.php'; ?>
<<<<<<< HEAD
<?php include 'include/footer.php';?>
=======
<?php include 'include/footer.php';?>
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
