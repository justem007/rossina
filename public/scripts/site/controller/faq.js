app.controller('faqController',function ($scope,$http) {

        $scope.categoria_faqs = [];

        $http.get("admin/api/categoria-faqs").then(function(response){
            console.log(response);
        //Atribui o response.data a variável posts
        $scope.categoria_faqs = response.data;
        },function(response){
            console.warn(response);
        });
});