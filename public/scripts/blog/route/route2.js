app.config(['$routeProvider',function($routeProvider){
    $routeProvider.
        when('/',{controller:'mainController',
            templateUrl:'pages/main.html'}).
        when('/usuarios',{controller:'userController',
            templateUrl:'pages/user.html'}).
        when('/comentarios',{controller:'commentController',
            templateUrl:'pages/comment.html'}).
        when('/tags',{controller:'tagController',
            templateUrl:'pages/tag.html'}).
        when('/login',{controller:'loginController',
            templateUrl:'pages/login.html'}).
        otherwise({redirectTo:'/'});
}])