<?php
    session_start();
    require('connect.php');

    $login = $_SESSION['user_data']->login;
    $q = "
        SELECT * FROM Users WHERE login='$login'
    ";
    $r = mysqli_query($dbc, $q);
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $code = $row["code"];
    
    $q = "
        SELECT * FROM C$code
    ";
    $r = mysqli_query($dbc, $q);
    $arr = array();
    if (mysqli_num_rows($r) != 0) {
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            $arr[] = array(
                'id' => $row["id"], 
                'login' => $row["login"], 
                'msg' => $row["msg"],
                'time' => $row["_time"]
            );
        }
        echo json_encode($arr);
    }
    
    mysqli_close($dbc);
?>