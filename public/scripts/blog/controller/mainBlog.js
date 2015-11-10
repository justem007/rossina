app.controller('mainTecidoController',function ($scope,$http) {

    $scope.posts = [];

    $http.get("/api/posts").then(function(response){
        console.log(response);
        $scope.posts = response.data;
    },function(response){
        console.warn(response);
    });
});