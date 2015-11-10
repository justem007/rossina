app.controller('tagscommentController',function ($scope,$http) {

    $scope.tags = [];

    $http.get("/api/tags").then(function(response){
        console.log(response);
        $scope.tags = response.data;
    },function(response){
        console.warn(response);
    });
});