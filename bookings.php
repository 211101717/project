<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'class/user/user.class.php';
include 'class/dbconn.class.php';
include 'class/session.class.php';
include 'class/booking.class.php';
$user = new User();
if(!isset($_COOKIE['u_mail'])){
    $user->isUserLoged();
}
$booking = new Booking();
if(isset($_GET['remove'])){
	$booking->remove_cart_item($_COOKIE['u_mail'],$_GET['remove'],$_GET['in'],$_GET['out']);
}
if(isset($_GET['empty'])){
	$booking->empty_cart($_COOKIE['u_mail']);
}
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/bookings.php'; ?>
<?php include 'include/footer.php';?>
