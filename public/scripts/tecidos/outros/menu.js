app = new angular.module('app',['ui.bootstrap', 'ngAnimate'])
    .controller("HeaderNavController", function ($scope) {
        $scope.isCollapsed = true;
    });