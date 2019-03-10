<?php
    session_start();
    session_destroy();

    $url = $_SESSION['my_url'];
    header("Location: $url");
?>