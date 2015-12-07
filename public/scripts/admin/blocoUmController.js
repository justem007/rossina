(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blocoUmController', blocoUmController);

    function blocoUmController($http) {

        var vm = this;

        vm.bloco_ums;

        vm.error;

        vm.getBlocoUms = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('admin/api/bloco-um').success(function(bloco_ums) {
                vm.bloco_ums = bloco_ums;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();