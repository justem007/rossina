app.controller('lojaTecidoController',function ($scope,$http) {

    $scope.categoria_tecidos = [];

    $http.get("admin/api/categoria-tecidos/todos").then(function(response){
        console.log(response);
        $scope.categoria_tecidos = response.data;
    },function(response){
        console.warn(response);
    });
});