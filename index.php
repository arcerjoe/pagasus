<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <link href="assets/css/css.less" type="text/less" rel="stylesheet" />
    <script src="assets/js/less.min.js"></script>
    <script src="assets/js/angular.js"></script>
</head>
<body>
<div class="sidebar" ng-controller="list_div">
    <ul>
        <li ng-repeat="item in lists" ng-click="a(item.src)">{{item.src}}</li>
    </ul>
</div>
<div class="container">
    <iframe src="" frameborder="no"></iframe>
</div>
<script src="assets/js/data.json"></script>
<script>
var app = angular.module('app',[]);
app.controller('list_div', function($scope){
    $scope.lists = data;
    $scope.a = function(i){
        document.getElementsByTagName('iframe')[0].setAttribute('src',i);
    }

})
</script>
</body>
</html>