app.controller('blocoCamisetaDestaqueController',function ($scope,$http) {

    $scope.bloco_camiseta_destaques = [];

    $http.get("admin/api/bloco-camiseta-destaques").then(function(response){
        console.log(response);
        $scope.bloco_camiseta_destaques = response.data;
    },function(response){
        notifyError(response)
    });
});