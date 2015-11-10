app.controller('tecidosDetalhesController',function ($scope,$http) {

    $scope.tags = [];

    $scope.$on('$viewContentLoaded', function(){
        $http.get("/api/tags").then(function(response){
            console.log(response);
            //Atribui o response.data a variável posts
            $scope.tags = response.data;
        },function(response){
            console.warn(response);
        });
    });
});