app.controller('sobreController',function ($scope,$http) {

    $scope.sobre_nos = [];

    $http.get("/api/sobre-nos").then(function(response){
        console.log(response);
        $scope.sobre_nos = response.data;
    },function(response){
        console.warn(response);
    });
});