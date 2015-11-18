(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blocoUmDestaqueController', blocoUmDestaqueController);

    function blocoUmDestaqueController($http) {

        var vm = this;

        vm.bloco_um_destaques;

        vm.error;

        vm.getBlocoUmDestaques = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/bloco-um-destaques').success(function(bloco_um_destaques) {
                vm.bloco_um_destaques = bloco_um_destaques;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();