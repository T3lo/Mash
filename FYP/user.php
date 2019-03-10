<?php
    session_start();
    
    if(!isset($_SESSION['my_access_token'])) {
        die("Err : Token ?");
    }

    $url = $_SESSION["my_url"];
    $accessToken = $_SESSION['my_access_token'];
    $URL = "https://api.github.com/user";
    
    $ch = curl_init();
    $authHeader = 'Authorization: token '.$accessToken;
    $userAgentHeader = 'User-Agent: Panckae';
    
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', $authHeader, $userAgentHeader));
    $response = curl_exec($ch);
    curl_close($ch);
    
    $data = json_decode($response);
    $_SESSION['user_data'] = $data;
    header("Location: $url/home.php");
    //var_dump($data);

    echo $data->email;
?>