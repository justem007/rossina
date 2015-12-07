app.controller('registrarController',function ($scope,$http) {

    $scope.cors = [];

    $http.get("admin/api/camisetas/cor").then(function(response){
        console.log(response);
        $scope.cors = response.data;
    },function(response){
        console.warn(response);
    });
});