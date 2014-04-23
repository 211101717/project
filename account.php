<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'class/user/user.class.php';
include 'class/dbconn.class.php';
include 'class/session.class.php';
include 'class/user/admin/admin.class.php';
<<<<<<< HEAD
<<<<<<< HEAD
include 'class/booking.class.php';
=======
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
=======
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
$user = new User();
if(!isset($_COOKIE['u_mail'])){
    $user->isUserLoged();
}
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/account.php'; ?>
<?php include 'include/footer.php';?>
