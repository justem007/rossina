(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blocoTresController', blocoTresController);

    function blocoTresController($http) {

        var vm = this;

        vm.bloco_camisetas;

        vm.error;

        vm.getBlocoTres = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/bloco-camisetas').success(function(bloco_camisetas) {
                vm.bloco_camisetas = bloco_camisetas;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();