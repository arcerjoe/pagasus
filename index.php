<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <link href="assets/css/css.less" type="text/less" rel="stylesheet" />
    <script src="assets/js/less.min.js"></script>
    <script src="assets/js/angular.js"></script>
</head>
<body class="body_modules_index">
<div class="sidebar" id="J_sidebar" ng-controller="list_div">
    <ul>
        <li ng-repeat="item in lists" on-finish-render-filters ng-click="a(item.src)">{{item.tit}}</li>
    </ul>
</div>
<div class="container">
    <iframe src="" frameborder="no"></iframe>
</div>
<script src="assets/js/jquery1.10.2.js"></script>
<script src="assets/js/data.json"></script>
<script src="assets/js/js.js"></script>
</body>
</html>