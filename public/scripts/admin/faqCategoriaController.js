//(function() {
//
//    'use strict';
//
//    angular
//        .module('app')
//        .controller('faqController', faqController);
//
//    function faqController($http) {
//
//        var vm = this;
//
//        vm.categoria_faqs;
//
//        vm.error;
//
//        vm.getFaqs = function() {
//
//            // Este pedido vai bater o método do índice no AuthenticateController
//            // no lado do Laravel e irá retornar a lista de
//            $http.get('api/categoria-faqs').success(function(categoria_faqs) {
//                vm.faqs = categoria_faqs;
//            }).error(function(error) {
//                vm.error = error;
//            });
//        }
//    }
//
//})();

app.controller('faqsCategoriaController',function ($scope,$http) {

    $scope.categoria_faqs = [];

    $http.get("admin/api/categoria-faqs").then(function(response){
        //console.log(response);
        $scope.categoria_faqs = response.data;
    },function(response){
        notifyError(response)
    })
});