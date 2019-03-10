<?php
    session_start();

    if(!isset($_SESSION['user_data'])) {
        echo "no";
        echo "<a href='.'>HOME</a>";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>

    <!-- MapMyIndia -->
    <script src="https://apis.mapmyindia.com/advancedmaps/v1/fbve46si1fcjndow2wvq41rr4d8b5s4k/map_load?v=01."></script>

    <style>
        html,
        body,
        #map {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        #my_view {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            border: 5px solid;
        }

        #msg {
            background-color: lightblue;
            width: 80%;
            height: 40%;
            overflow: auto;
        }
    </style>
</head>
<body ng-app="app">
    <div id="menu" class="border">
        <a href="#!/">Map</a> |
        <a href="#!/chat">Chat</a>
    </div>

    <div id="my_view" ng-view></div>

    <!-- app.js -->
    <script src="js/app.js"></script>
    
    <!-- controllers -->
    <script src="js/controllers/MainController.js"></script>
    <script src="js/controllers/ChatController.js"></script>
</body>
</html>