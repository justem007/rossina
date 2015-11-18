(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('faqController', faqController);

    function faqController($http) {

        var vm = this;

        vm.faqs;

        vm.error;

        vm.getFaqs = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/faqs').success(function(faqs) {
                vm.faqs = faqs;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();