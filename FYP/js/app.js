console.log("app.js");

var app = angular.module("app", ["ngRoute"]);

app.config(function ($routeProvider) {
    $routeProvider
    .when("/chat", {
        templateUrl : "views/chat.html",
        controller : "ChatController"
    })
    .when("/", {
        templateUrl : "views/map.html",
        controller : "MainController"
    });
});