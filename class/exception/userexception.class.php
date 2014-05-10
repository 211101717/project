<?php
class UserException{
    function is_name_valid($var){
        if($this->no_char_in_string($var, "A name")){
            if($this->no_space_in_string($var,"A name")){
                if($this->is_input_range_valid($var, "A name", 3, 20, "letters")){
                    if($this->invalid_string_input($var, "A name")){
                        return true;
                    }
                }
            }
        }
    }
    function is_email_valid($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            throw new Exception("Please enter a valid e-mail");
        }
    }
    function are_inputs_match($var1, $var2, $name1,$name2){
        if($var1 != $var2){
            throw new Exception("$name1 must match $name2");
        }
        else{
            return true;
        }
    }
    function null_int_string($var,$name)
    {
        $bool = false;
        
        $strlen = strlen($var);
        
        for($i = 0; $i < $strlen; $i++)
        {
            if(filter_var($va[$i], FILTER_VALIDATE_INT))
            {
                $bool = true;

                $i = $strlen;
            }
        }
        if(!$bool)
        {
            throw new Exception("<div class='exception'><b>$name Error:</b> $name must contain a number</div>");
        }
        else
        {
            return $bool;
        }
        
    }
    function no_char_in_string($var,$name)
    {
        $bool = true;
        
        $strlen = strlen($var);

        $char = array("~","`","!","@","#","$","%","^","&","*","(",")","_","-","+",
                      "=","{","}","[","]","|","'\'",";",":","'",",",'"',"<",">",",",".","?","/");
   
        for($i = 0; $i < $strlen; $i++)
        {
            if(in_array($var[$i], $char))
            {
                echo $var[$i];
                throw new Exception("$name must not contain special charcters");
            }
        }
        return true;
    }
    function no_space_in_string($var,$name)
    {
        $bool = true;
        
        $words = explode(" ", $var);
        
        if(sizeof($words) > 1 && $bool == true)
        {
            $bool = false; 
        }
        if($bool == false)
        {
            throw new Exception("$name Error:</b> $name must not contain spaces");
        }
        else
        {
            return $bool;
        }
    }
    function invalid_string_input($var,$name)
    {
        for($i = 0; $i < strlen($var); $i++){
            if(filter_var($var[$i], FILTER_VALIDATE_FLOAT))
            {
                throw new Exception("<div class='exception'><b>$name must contain letters only</b></div>");
            }
        }
        return true;
    }
    function invalid_int_input_exception($var,$name)
    {
        if(!filter_var($var, FILTER_VALIDATE_FLOAT))
        {
             throw new Exception("<div class='exception'><b>$name Error:</b> $name must be numeric</div>");
        }
        else
        {
            return true;
        }
    }
    function invalid_input_length_exception($var,$name,$length,$type)
    {
        $int = strlen($var);

        if($length != $int)
        {
            throw new Exception("<div class='exception'><b>$name must be $length $type long</b></div>");
        }
        else
        {
            return true;
        }
    }
    function is_input_range_valid($var,$name,$num1,$num2,$type)
    {
        $length = strlen($var);
        if($length < $num1 || $length > $num2){
            throw new Exception("$name must be $num1 to $num2 $type long");
        }
        return true;
    }
    function required_inputs_exception($inputs){
        $i = 0;
        foreach ($inputs as $input){
            if(!filter_var($input)){
                $i++;
            }
        }
        if($i > 0){
            throw new Exception("Please enter all required form fields!");
        }
        else{
            return true;
        }
    }
    function is_input_dflt($inputs){
        $i = 0;
        $dflt = array('u_lname'=>"Last name",'u_fname'=>"First name",'u_mail'=>"E-mail",'u_pass'=>"Password",
                    'u_cpass'=>"Confirm password");
        foreach ($dflt as $index=>$val){
            if($inputs[$index] == $val ){
                
                throw new Exception("Please enter all required form fields!");
            }
        }
        return true;
    }
}
?>
