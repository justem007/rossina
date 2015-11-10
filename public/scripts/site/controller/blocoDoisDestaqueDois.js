app.controller('blocoDoisDestaqueDoisController',function ($scope,$http) {

    $scope.bloco_dois_destaque_dois = [];

    $http.get("/api/bloco-dois-destaque-dois").then(function(response){
        console.log(response);
        $scope.bloco_dois_destaque_dois = response.data;
    },function(response){
        console.warn(response);
    });
});