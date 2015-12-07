app.controller('blocoDoisDestaqueUmController',function ($scope,$http) {

    $scope.bloco_dois_destaque_ums = [];

    $http.get("admin/api/bloco-dois-destaque-um").then(function(response){
        console.log(response);
        $scope.bloco_dois_destaque_ums = response.data;
    },function(response){
        console.warn(response);
    });
});