app.controller('blocoDoisDestaqueController',function ($scope,$http) {

    $scope.bloco_dois_destaques = [];

    $http.get("/api/bloco-dois-destaques").then(function(response){
        console.log(response);
        $scope.bloco_dois_destaques = response.data;
    },function(response){
        console.warn(response);
    });
});