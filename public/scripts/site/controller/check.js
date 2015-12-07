app.controller('checkController',function ($scope,$http) {

    $scope.users = [];

    $scope.$on('$viewContentLoaded', function() {
            $http.get("admin/api/users/").then(function(response){
                console.log(response);
                //Atribui o response.data a variável posts
                $scope.users = response.data;
            },function(response){
                console.warn(response);
            });
        });
});