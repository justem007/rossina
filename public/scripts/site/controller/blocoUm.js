app.controller('blocoUmController',function ($scope,$http) {
    $scope.bloco_ums = [];

    $http.get("admin/api/bloco-um").then(function(response){
        console.log(response);
        $scope.bloco_ums = response.data;
    },function(response){
        console.warn(response);
    });
});