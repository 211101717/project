<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'class/dbconn.class.php';
include 'class/user/user.class.php';
include 'class/session.class.php';
include 'class/booking.class.php';
include 'class/exception/userexception.class.php';
$user = new User();
$ex = new UserException();
$err = Array();
if(isset($_COOKIE['u_mail'])){
    $user->isUserLoged();
}
if(isset($_POST['register'])){
	try{
	 $ex->required_inputs_exception($_REQUEST);
	 $ex->is_name_valid($_REQUEST['lname']);
	 $ex->is_name_valid($_REQUEST['fname']);
	 $ex->is_email_valid($_REQUEST['email']);
	 $ex->is_input_range_valid($_REQUEST['password'],"Password",6,20,"characters");
	 $ex->are_inputs_match($_REQUEST['password'], $_REQUEST['cpassword'], "Password","Confirm Password");
	 $msg = $user->register($_REQUEST['email'], $_REQUEST['password'], $_REQUEST['fname'], $_REQUEST['lname']);
	 array_push($err,$msg);
	}
	catch(Exception $ex){
	 $msg = $ex->getMessage();
	 array_push($err,$msg);
	}
}
$_SESSION['err'] = $err;
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/register.php'; ?>
<?php include 'include/footer.php';?>
