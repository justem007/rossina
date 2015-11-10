app.controller('blocoUmDestaqueController',function ($scope,$http) {
    $scope.bloco_um_destaques = [];

    $http.get("/api/bloco-um-destaques").then(function(response){
        console.log(response);
        $scope.bloco_um_destaques = response.data;
    },function(response){
        console.warn(response);
    });
});