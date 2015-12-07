app.controller('tamanhosController',function ($scope,$http) {

    $scope.tamanhos = [];

    $http.get("admin/api/camisetas/tamanhos").then(function(response){
        console.log(response);
        $scope.tamanhos = response.data;
    },function(response){
        console.warn(response);
    });
});