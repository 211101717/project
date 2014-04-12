<?php
$_SESSION['err']='';
class Session{
    function set_session_user($user){
        $_SESSION['u_mail'] = $user['u_mail'];
        $_SESSION['u_pass'] = $user['u_pass'];
        $_SESSION['u_fname'] = ucfirst(strtolower($user['u_fname']));
        $_SESSION['u_lname'] = ucfirst(strtolower($user['u_lname']));
        $_SESSION['u_role'] = $user['u_type'];
        $_SESSION['id'] = $user['id'];
        setcookie('u_mail',$_SESSION['u_mail']);
        setcookie('u_pass',$_SESSION['u_pass']);
        setcookie('u_lname',$_SESSION['u_lname']);
        setcookie('u_fname',$_SESSION['u_fname']);
        setcookie('u_role',$_SESSION['u_role']);
        setcookie('id',$_SESSION['id']);
   }
   function  unset_session_user()
   {
       unset ($_SESSION['u_mail']);
       setcookie('u_mail','',time()-3600);
   }
}
?>