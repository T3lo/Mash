<?php
    session_start();

    $data = $_SESSION["user_data"];
    /*
    $req = $_GET["q"];
    foreach($data as $key => $value) {
        if (gettype($value) == "object" || gettype($value) == "array"){
            
        }
        else{
            if($key == $req) {
                echo $value;
            }
        }        
    }*/

    echo json_encode($data);
?>