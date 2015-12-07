(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blocoQuatroController', blocoQuatroController);

    function blocoQuatroController($http) {

        var vm = this;

        vm.bloco_tecidos;

        vm.error;

        vm.getBlocoTecidos = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/bloco-tecidos').success(function(bloco_tecidos) {
                vm.bloco_tecidos = bloco_tecidos;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();