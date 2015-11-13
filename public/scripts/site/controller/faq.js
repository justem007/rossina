app.controller('faqController',function ($scope,$http) {

        $scope.faqs = [];

        $scope.$on('$viewContentLoaded', function(){
        $http.get("/api/faqs").then(function(response){
            console.log(response);
        //Atribui o response.data a variável posts
        $scope.faqs = response.data;
        },function(response){
            console.warn(response);
        });
    });
});