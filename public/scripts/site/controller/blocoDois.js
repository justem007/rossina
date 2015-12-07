app.controller('blocoDoisController',function ($scope,$http) {

    $scope.bloco_dois = [];

    $http.get("admin/api/bloco-dois").then(function(response){
        console.log(response);
        $scope.bloco_dois = response.data;
    },function(response){
        console.warn(response);
    });
});