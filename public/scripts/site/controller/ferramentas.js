app.controller('ferramentaController',function ($scope,$http) {

    $scope.ferramentas = [];

    $http.get("admin/api/ferramentas").then(function(response){
        console.log(response);
        $scope.ferramentas = response.data;
    },function(response){
        console.warn(response);
    });
});