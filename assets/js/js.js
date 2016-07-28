/**
 * 
 * @author lijun@cncn.com
 * @date    2016-04-12 10:02:08
 * @version 
 */

var app = angular.module('app',['ngRoute']);
app.controller('list_div', function($scope){
    $scope.lists = listData;
    $scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent){
        var e = document.createEvent('MouseEvent');
        e.initEvent('click', false, false);
        document.getElementsByClassName('sidebar')[0].getElementsByTagName('li')[0].dispatchEvent(e);
        $('#J_sidebar').find('ul').each(function(){
            $(this).find('li').eq(0).on('click', function(){
                $(this).parent().siblings().removeClass('cur').end().addClass('cur');
            });
        }).eq(0).find('li').eq(0).trigger('click');
     /*   var sidebar = document.getElementById('J_sidebar'),
        li = sidebar.getElementsByTagName('li');
        for(var i = 0; i < li.length; i++){
            l;i[i].onclick = function(){
                // removeClass2(li,'cur')
                addClass(this,'cur')
            }
        }*/
    });

});
function routeConfig($routeProvider){
    $routeProvider.
    /*when('/', {
        controller: detailController,
        templateUrl: 'detail.html'
    }).*/
    when('/demo/:src', {
        controller: detailController,
        templateUrl: function($routeParams){
            return 'detail/' + $routeParams.src + '.html'
        }
    }).
    otherwise({
        redirectTo: 'demo/gulpfile'
    });
}
app.config(routeConfig);
function detailController($scope, $routeParams){
    SyntaxHighlighter.highlight()
}

app.directive('onFinishRenderFilters', function($timeout){
    return{
        restrict: 'A',
        link: function(scope, element, attr){
            if(scope.$last === true){
                $timeout(function(){
                    scope.$emit('ngRepeatFinished')
                });
            }
        }
    };
});
function containerHeight(){
    var container = document.getElementsByClassName('container')[0],
        clientHeight = document.documentElement.clientHeight;
    container.style.height = clientHeight - 10 + 'px';
};
containerHeight();
$(window).on('resize', function(){
    containerHeight();
});
