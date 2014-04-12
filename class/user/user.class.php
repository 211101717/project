<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author m
 */
class User {
    //put your code here
    var $u_id;
    var $u_mail;
    var $u_pass;
    var $u_role;
    var $u_fname;
    var $u_lname;
    public function register($u_mail, $u_pass, $u_fname, $u_lname){
        $db = new Database();
        $query = "insert into user values('$u_mail', '$u_pass', 'visitor','$u_lname','$u_fname',null,'complete')";
        if(!$this->isUserNameTaken($u_mail)){
            $db->execute($query);
        }
        else{
            throw new Exception("The e-mail you entered has been registered by another user");
        }
        if(mysql_affected_rows() > 0){
            $this->login($u_mail, $u_pass);
            return mysql_affected_rows();
        }
        else {
            throw new Exception ("Oops! Registration not successful, try again later.");
       }
    }
    public function activate_account($u_mail){
       $query = "update user set reg = 'complete' where u_mail = '$u_mail'";
       $db_man = new DBMan();
       $result = $db_man->send_query($query);
       if(mysql_affected_rows() > 0){
          echo "<div class='err'>Your account is  active you can now login with your username and password.</div>";
       }
    }
    public function login($u_mail, $u_pass){
       $query = "select * from user where u_mail = '$u_mail' and u_pass ='$u_pass' and reg = 'complete'";
       $db = new Database();
       $s_man = new Session();
       $result = $db->execute($query);
       if(mysql_affected_rows() > 0){
           $user = mysql_fetch_array($result);
           $s_man->set_session_user($user);
           header("location:dashboard.php");
       }
       else{
           $_SESSION['err'] = "<div class='err'>Invalid login details!</div>";
       }
    }
    function isUserLoged(){
        if(!isset ($_COOKIE['u_mail'])){
            header("location:login.php");
        }
        else {
            header("location:dashboard.php?logged");
        }
    }
    function isAdminLoged(){
        if($this->isUserLoged()){
            if($_COOKIE['u_role'] != "admin"){
                header("location:index.php");
            }
            else{
                return true;
            }
        }
    }
    public function logout(){
        $s_man = new Session();
        $s_man->unset_session_user();
        header("location:index.php");
    }
    public function editUser($lname,$fname,$pass,$email){
       $db = new Database();
       $query = "update user set u_lname ='$lname', u_fname='$fname' where u_mail = '$email'  and u_pass = '$pass'";
       $db->execute($query);
       if(mysql_affected_rows() > 0){
            $this->login($email, $pass);
       }else{
           throw new Exception("Oops! Could not update info, try again later.");
       }
    }
    private function isUserNameTaken($u_mail){
       $query = "select u_mail from user where u_mail = '$u_mail'";
       $db = new Database();
       $result = $db->execute($query);
       if(mysql_affected_rows() > 0){
           return true;
       }
       else{
           return false;
       }
    }
}
?>