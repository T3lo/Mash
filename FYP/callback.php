<?php
    session_start();
    
    $url = $_SESSION["my_url"];
    $code = $_GET['code'];

    if ($code == "") {
        header("Location: $url");
    }
    
    $CLIENT_ID = "a69665ed8ead3904ef49";
    $CLIENT_SECRET = "a00621f7252ccb79498ec8bfad61187c8ba4899c";
    $URL = "https://github.com/login/oauth/access_token";
    $post_para = [
            'client_id' => $CLIENT_ID,
            'client_secret' => $CLIENT_SECRET,
            'code' => $code
        ];
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_para);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    $response = curl_exec($ch);
    curl_close($ch);
    
    $data = json_decode($response);
    //var_dump($data);
    
    if ($data->access_token != "") {
        $_SESSION['my_access_token'] = $data->access_token;
        
        //echo $url;
        header("Location: $url/user.php");
        exit;
    }
    else {
        echo $data->error_description;  
    } 
?>