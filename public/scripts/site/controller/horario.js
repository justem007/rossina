app.controller('horarioController',function ($scope,$http) {

    $scope.horarios = [];

    $scope.myPromise = $http.get("admin/api/horarios").then(function(response){
        console.log(response);
        $scope.horarios = response.data;
    },function(response){
        console.warn(response);
    });
});