app.controller('blocoCamisetaController',function ($scope,$http) {

    $scope.bloco_camisetas = [];

    $http.get("/api/bloco-camisetas").then(function(response){
        console.log(response);
        $scope.bloco_camisetas = response.data;
    },function(response){
        notifyError(response);
    });
});