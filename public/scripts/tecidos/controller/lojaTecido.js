app.controller('lojaTecidoController',function ($scope,$http) {

    $scope.tecidos = [];

    $http.get("/api/tecidos").then(function(response){
        console.log(response);
        $scope.tecidos = response.data;
    },function(response){
        console.warn(response);
    });
});