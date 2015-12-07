app.controller('blocoTecidoDestaqueController',function ($scope,$http) {

    $scope.bloco_tecido_destaques = [];

    $http.get("admin/api/bloco-tecido-destaques").then(function(response){
        console.log(response);
        $scope.bloco_tecido_destaques = response.data;
    },function(response){
        console.warn(response);
    });
});