app.controller('comprasController',function ($scope,$http) {

    $scope.generos = [];

    $http.get("/api/camisetas/genero").then(function(response){
        console.log(response);
        $scope.generos = response.data;
    },function(response){
        console.warn(response);
    });
});