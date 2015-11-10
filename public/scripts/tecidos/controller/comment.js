       app.controller('commentController',function ($scope,$http) {

            $scope.comments = [];

        $scope.$on('$viewContentLoaded', function(){
        $http.get("/api/comments/").then(function(response){
            console.log(response);
        //Atribui o response.data a variável posts
        $scope.comments = response.data;
        },function(response){
            console.warn(response);
        });
        });
});