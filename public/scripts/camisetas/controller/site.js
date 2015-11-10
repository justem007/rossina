app.controller('mainController',function ($scope,$http) {

    $scope.users = [];

    $scope.$on('$viewContentLoaded', function() {
            $http.get("/api/users/").then(function(response){
                console.log(response);
                //Atribui o response.data a variável posts
                $scope.users = response.data;
            },function(response){
                console.warn(response);
            });
        });
});