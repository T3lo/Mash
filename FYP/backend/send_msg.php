<?php
    session_start();
    require('connect.php');

    $msg = $_GET["msg"];
    $msg = explode("%20", $msg);
    $msg = implode(" ", $msg);
    
    $login = $_SESSION['user_data']->login;
    $q = "
        SELECT * FROM Users WHERE login='$login'
    ";
    $r = mysqli_query($dbc, $q);
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $code = $row["code"];

    $q = "
        INSERT INTO C$code(login,msg,_time)
        VALUES
        ('$login', '$msg', NOW())
    ";
    $r = mysqli_query($dbc, $q);

    mysqli_close($dbc);
?>