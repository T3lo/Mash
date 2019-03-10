console.log("ChatController");

app.controller("ChatController", ["$scope", "$http", function ($scope, $http) {
    // pool the server
    setInterval(function () {
        console.log("Pooling...");
        $http.get("backend/fetch_people.php")
            .then(function (res) {
                $scope.names = res.data;
        });

        $http.get("backend/fetch_msg.php")
        .then(function (res) {
            if (res.data == "") {
                //console.log("Nothing");
                $scope.msg = {'err' : 'Nothing found'};
            }
            else {
                $scope.msgs = res.data;
                //console.log($scope.msgs);
            }            
        });
    }, 10000);
    $scope.sendText = function () {
        let txt = $scope.talk;
        txt = txt.split(' ').join('%20');
        $http.get("backend/send_msg.php?msg=" + txt)
        .then(function (res) {
            console.log("sent : " + txt.split('%20').join(' '));
        })
        while (txt == "" ) {}
        $scope.talk = "";
        
    };
}]);