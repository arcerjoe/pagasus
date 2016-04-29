/**
 * 
 * @author lijun@cncn.com
 * @date    2016-04-12 10:02:08
 * @version 
 */

var app = angular.module('app',[]);
app.controller('list_div', function($scope){
    $scope.lists = data;
    $scope.a = function(i){
        document.getElementsByTagName('iframe')[0].setAttribute('src',i);
    };
    $scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent){
        var e = document.createEvent('MouseEvent');
        e.initEvent('click', false, false);
        document.getElementsByClassName('sidebar')[0].getElementsByTagName('li')[3].dispatchEvent(e);

     /*   var sidebar = document.getElementById('J_sidebar'),
        li = sidebar.getElementsByTagName('li');
        for(var i = 0; i < li.length; i++){
            li[i].onclick = function(){
                // removeClass2(li,'cur')
                addClass(this,'cur')
            }
        }*/
    });
});
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
(function(){
    var iframe = document.getElementsByTagName('iframe')[0],
        container = document.getElementsByClassName('container')[0],
        clientHeight = document.documentElement.clientHeight;
    container.style.height = clientHeight - 4 + 'px';
})();

/*function addClass(ele,className){
    console.log(ele.parentNode.childNodes && ele.nodeType == 1)
      ele.className += " " + className;
  };*/
  function removeClass2(ele,className){
     var tmpClassName = ele.className;
     ele.className = null;
     ele.className = tmpClassName.split(new RegExp(" " + className + "|" + className + " " + "|" + "^" + className + "$","ig")).join("");
 };

 $(function(){
    $('#J_sidebar').find('li').click(function(){
        $(this).siblings().removeClass('cur').end().addClass('cur');
    })
 })