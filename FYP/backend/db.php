<?php
    session_start();

    $url = $_SESSION["my_url"];
    $login = $_SESSION["user_data"]->login;
    if(!isset($_SESSION['user_data'])) {
        echo "not logged in";
        exit;
        //header("Location: $url");
    }

    $lat = $_GET["lat"];
    $long = $_GET["long"];
    $lat0 = $lat;
    $long0 = $long;

    $lat = floor($lat*1000);
    $lat = $lat - $lat % 3;
    $long = floor($long*1000);
    $long = $long - $long % 3;
    $code = "T_".$lat."_".$long;

    require('connect.php');

    $q = "
        INSERT INTO Locations(login, latitude, longitude, _time) VALUES
        ('$login',$lat0,$long0,NOW())
    ";
    $r = mysqli_query($dbc, $q);

    // Is User there in db
    $q = "
        select * from Users where login='$login'
    ";
    $r = mysqli_query($dbc, $q);
    $num_row = mysqli_num_rows($r);
    //echo $num_row;

    if ($num_row == 0) {
        // new user
        $q = "
            INSERT INTO Users(login, latitude, longitude, code) VALUES
            ('$login',$lat0,$long0,'$code')
        ";
        $r = mysqli_query($dbc, $q);
        
        mysqli_close($dbc);
        // put it in a code table
        header("Location: $url/backend/add_to_table.php?code=$code&msg=new");
        exit;
    }

    //echo "old user";
    // Now time to process the old user
    // 1. is the code changed
    // => [.] yes : ( update Users table lat, long, code )
    //          then ( delete user from old code ) + ( add user to new code )
    // => [x] no : ( update Users table lat, long )

    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    if ($row['code'] == $code) {
        // Same code
        echo " <br>$row[code]<br>$code";
        $q = "
            UPDATE Users
            SET latitude=$lat0, longitude=$long0
            WHERE
            login='$login'
        ";
        $r = mysqli_query($dbc, $q);
        mysqli_close($dbc);
    }
    else {
        // code has changed
        $old_code = $row['code'];
        $q = "
            UPDATE Users
            SET latitude=$lat0, longitude=$long0, code='$code'
            WHERE
            login='$login'
        ";
        $r = mysqli_query($dbc, $q);

        $q = "
            DELETE FROM $old_code
            WHERE
            login='$login'
        ";
        $r = mysqli_query($dbc, $q);

        mysqli_close($dbc);
        header("Location: $url/backend/add_to_table.php?code=$code&msg=change");
    }
?>