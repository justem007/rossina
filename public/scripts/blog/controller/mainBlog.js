app.controller('mainBlogController',function ($scope,$http) {

    $scope.categoria_blogs = [];

    $http.get("/api/categoria-blogs").then(function(response){
        console.log(response);
        $scope.categoria_blogs = response.data;
    },function(response){
        console.warn(response);
    });
});