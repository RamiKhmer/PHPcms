<?php 

function comfirmDB($query){

    global $connection;

    if(!$query){
        die("QUERY Failed ".mysqli_error($connection));
    }

}

function checkEmty($check, $Message){
    global $connection;

    if($check == "" || empty($check)){
        echo "<div class='alert alert-danger' role='alert'>Please Enter the ".$Message."!</div>";
        
    }

}


?>