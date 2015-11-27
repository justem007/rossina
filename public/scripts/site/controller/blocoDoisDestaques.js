app.controller('blocoDoisDestaqueController',function ($scope,$http) {

    $scope.bloco_dois_destaques = [];

    //$scope.$on('$viewContentLoaded', function(){
    $http.get("/api/bloco-dois-destaques").then(function(response){
        //console.log(response);
        $scope.bloco_dois_destaques = response.data;
    },function(response){
        notifyError(response)
    });
    //});
});