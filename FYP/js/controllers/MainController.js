console.log("MainController.js");

app.controller("MainController", ["$scope", "$http", function($scope, $http) {

    $http.get("backend/send_user_data.php")
    .then(function (res) {
        $scope.name = res.data.login;        
        console.log("got");
        $scope.getLocation();
    });
    
    $scope.getLocation = function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition($scope.showPosition, $scope.showError);            
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    };

    $scope.showPosition = function (position) {
        $scope.x = position.coords.latitude;
        $scope.y = position.coords.longitude;

        $scope.map = new MapmyIndia.Map("map", { center: [$scope.x, $scope.y], zoomControl: true, hybrid: true });
        $scope.my_marker = L.marker([$scope.x, $scope.y]).addTo($scope.map);
        
        $http.get("backend/db.php?lat=" + $scope.x + "&long=" + $scope.y)
        .then(function (res) {
            $scope.my_marker.bindPopup($scope.name + "<br>" + "Response : " + res.data);
            console.log("Response : " + res.data);
        });

        console.log("X: " + $scope.x + "\nY: " + $scope.y);
        console.log($scope.name);
    };

    $scope.showError = function (msg) {
        console.log(msg);
    };
}]);