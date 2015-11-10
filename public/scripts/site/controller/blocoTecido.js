app.controller('blocoTecidoController',function ($scope,$http) {

    $scope.bloco_tecidos = [];

    $http.get("/api/bloco-tecidos").then(function(response){
        console.log(response);
        $scope.bloco_tecidos = response.data;
    },function(response){
        console.warn(response);
    });
});