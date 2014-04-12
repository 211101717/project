<?php
    include 'class/user/user.class.php';
    include 'class/session.class.php';
    include 'class/room.class.php';
    include 'class/dbconn.class.php';
    $user = new User();
    if(isset($_GET['q'])){
        if($_GET['q']=='logout'){
            $user->logout();
        }
    }
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/room.php'; ?>
<?php include 'include/footer.php';?>