app.controller('categoriaCamisetaController',function ($scope,$http) {

    $scope.categorias = [];

    $http.get("admin/api/categorias").then(function(response){
        console.log(response);
        $scope.categorias = response.data;
    },function(response){
        notifyError(response)
    });
});