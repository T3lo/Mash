<?php
    session_start();
    
    $access_token = "";
    $_SESSION['my_url'] = "http://mrgnomehax.000webhostapp.com/test_login";
    
    if(isset($_SESSION['my_access_token'])) {
        $access_token = $_SESSION['my_access_token'];
        echo "<a href='logout.php'>bye</a>";

        $data = $_SESSION["user_data"];
    }
?>

<html>
    <head>
        <title>TEST</title>
    </head>
    <body>
<?php
    echo '<p>Access Token : </p>';
    
    if($access_token != "") {
        echo "<code>$access_token</code>";
        echo "Logged in";

        echo json_encode($data);
        echo "<a href='home.php'>HOME</a>";
    }
    else {
        echo "<a href='https://github.com/login/oauth/authorize?client_id=a69665ed8ead3904ef49'>signup</a>";
    }
?>
    </body>
</html>