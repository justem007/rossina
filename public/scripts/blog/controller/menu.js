    app.controller('menuController',function ($scope,$http) {
        $scope.comments = [];

        $http.get("/api/comments").then(function(response){
            console.log(response);
            $scope.comments = response.data;
        },function(response){
            console.warn(response);
        });
    });