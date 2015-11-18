(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blocoTresDestaqueController', blocoTresDestaqueController);

    function blocoTresDestaqueController($http) {

        var vm = this;

        vm.bloco_camiseta_destaques;

        vm.error;

        vm.getBlocoTresDestaque = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/bloco-camiseta-destaques').success(function(bloco_camiseta_destaques) {
                vm.bloco_camiseta_destaques = bloco_camiseta_destaques;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();