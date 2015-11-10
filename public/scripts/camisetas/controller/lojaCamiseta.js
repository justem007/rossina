app.controller('lojaCamisetaController',function ($scope,$http) {

    $scope.camisetas = [];

    $http.get("/api/camisetas").then(function(response){
        console.log(response);
        $scope.camisetas = response.data;
    },function(response){
        console.warn(response);
    });
});