<?php

    require('connect.php');
    session_start();
    
    $login = $_SESSION['user_data']->login;
    $code = $_GET["code"];
    $msg = $_GET["msg"];
    echo " := $code : $msg";

    $q = "
        CREATE TABLE IF NOT EXISTS `id7339202_site_db`.`$code`(
            login VARCHAR(40) NOT NULL
        )
    ";
    //echo $q;
    $r = mysqli_query($dbc, $q);

    $q = "
        CREATE TABLE IF NOT EXISTS `id7339202_site_db`.`C$code`(
            id INT(5) PRIMARY KEY AUTO_INCREMENT,
            login VARCHAR(40) NOT NULL,
            msg VARCHAR(100) NOT NULL,
            _time datetime NOT NULL
        )
    ";
    //echo $q;
    $r = mysqli_query($dbc, $q);

    echo "<br>C$code";

    $q = "
        INSERT INTO $code VALUES ('$login')
    ";
    //echo $q;
    $r = mysqli_query($dbc, $q);

    mysqli_close($dbc);
?>