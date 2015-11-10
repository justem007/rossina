app.controller('horarioController',function ($scope,$http) {

    $scope.horarios = [];

    $http.get("/api/horarios").then(function(response){
        console.log(response);
        $scope.horarios = response.data;
    },function(response){
        console.warn(response);
    });
});