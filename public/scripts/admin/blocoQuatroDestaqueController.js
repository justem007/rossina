(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blocoQuatroDestaqueController', blocoQuatroDestaqueController);

    function blocoQuatroDestaqueController($http) {

        var vm = this;

        vm.bloco_tecido_destaques;

        vm.error;

        vm.getBlocoTecidoDestaque = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/bloco-tecido-destaques').success(function(bloco_tecido_destaques) {
                vm.bloco_tecido_destaques = bloco_tecido_destaques;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();