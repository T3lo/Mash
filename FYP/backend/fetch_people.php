<?php
    // gives the list of people in the same area code
    session_start();
    $login = $_SESSION["user_data"]->login;

    require('connect.php');

    $q = "
        SELECT * FROM Users WHERE login='$login'
    ";
    $r = mysqli_query($dbc, $q);
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $code = $row["code"];

    // Using this code query the table for the other users

    $q = "
        SELECT * FROM $code
    ";
    $r = mysqli_query($dbc, $q);

    $arr = array();
    while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $arr[] = array('login' => $row["login"]);
    }

    echo json_encode($arr);

    mysqli_close($dbc);
?>