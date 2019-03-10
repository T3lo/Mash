<?php
    require("connect.php");

    function run($q, $dbc) {
        echo "<br>".gettype($q);
        $r = mysqli_query($dbc, $q);
        var_dump($r);
    }
    /*
    run ("
        DROP DATABASE id7339202_site_db;
    ", $dbc);

    run ("
        CREATE DATABASE id7339202_site_db;
    ", $dbc);
*/
    run ("
        CREATE TABLE IF NOT EXISTS `id7339202_site_db`.`Locations`(
            id INT(5) PRIMARY KEY AUTO_INCREMENT,
            login VARCHAR(40) NOT NULL,
            latitude DOUBLE(14,10) NOT NULL,
            longitude DOUBLE(14,10) NOT NULL,
            _time DATETIME NOT NULL
        )
    ", $dbc);
    
    run ("
        CREATE TABLE IF NOT EXISTS `id7339202_site_db`.`Users`(
            id INT(5) PRIMARY KEY AUTO_INCREMENT,
            login VARCHAR(40) NOT NULL,
            latitude DOUBLE(14,10) NOT NULL,
            longitude DOUBLE(14,10) NOT NULL,
            code VARCHAR(14) NOT NULL
        )
    ", $dbc);

    mysqli_close($dbc);
?>