<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="renderer" content="webkit" />
    <link type="text/css" rel="stylesheet" href="assets/lib/syntaxhighlighter_3.0.83/styles/shCoreFadeToGrey.css" />
    <script type="text/javascript"src="assets/lib/syntaxhighlighter_3.0.83/scripts/shCore.js"></script>  
    <script type="text/javascript"src="assets/lib/syntaxhighlighter_3.0.83/scripts/shBrushXml.js"></script>
    <script type="text/javascript"src="assets/lib/syntaxhighlighter_3.0.83/scripts/shBrushJScript.js"></script>
    <script type="text/javascript"src="assets/lib/syntaxhighlighter_3.0.83/scripts/shBrushCss.js"></script>
    <script type="text/javascript"src="assets/lib/syntaxhighlighter_3.0.83/scripts/shBrushSass.js"></script>
    <link href="assets/css/css.less" type="text/less" rel="stylesheet" />
    <script src="assets/js/less.min.js"></script>
    <script src="assets/js/angular.js"></script>
    <script src="//cdn.bootcss.com/angular.js/1.3.5/angular-route.min.js"></script>
    <base target="_blank" />
</head>
<body class="body_modules_index">
<div class="sidebar" id="J_sidebar" ng-controller="list_div">
    <ul>
        <li>编码规范</li>
        <li ng-repeat="item in lists" ng-if="item.type === 0" on-finish-render-filters>
            <a href="#/demo/{{item.src}}">{{item.title}}</a>
        </li>
    </ul>
    <ul>
        <li>HTML结构模块</li>
        <li ng-repeat="item in lists" ng-if="item.type === 1" on-finish-render-filters>
            <a href="#/demo/{{item.src}}">{{item.title}}</a>
        </li>
    </ul>
    <ul>
        <li>JS组件模块</li>
        <li ng-repeat="item in lists" ng-if="item.type === 2" on-finish-render-filters>
            <a href="#/demo/{{item.src}}">{{item.title}}</a>
        </li>
    </ul>
</div>
<div class="container" ng-view>
</div>
<script src="assets/js/jquery1.10.2.js"></script>
<script src="assets/js/data.json"></script>
<script src="assets/js/js.js"></script>

</body>
</html>