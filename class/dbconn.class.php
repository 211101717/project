<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Database{
    private $password="";
    private $username="root";
    private $host="localhost";
    private $database="gae_db";
    function establishConnection(){
       $connection = mysql_connect($this->host, $this->username, $this->password);
       return $connection;
    }
    function selectDatabse(){
		if($this->establishConnection()){
			return mysql_selectdb($this->database, $this->establishConnection());
		}else{
			throw new Exception("Oops! Could not connect to ".$this->database.". Try again later.");
		}
    }
    function execute($query){
        if($this->selectDatabse()){
			$results=mysql_query($query);  
			return $results;
		}else{
			throw new Exception("Oops! Could not access ".$this->database.". Try again later.");
		}
    }
}
?>
