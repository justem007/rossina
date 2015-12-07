(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blocoDoisDestaqueDoisController', blocoDoisDestaqueDoisController);

    function blocoDoisDestaqueDoisController($http) {

        var vm = this;

        vm.bloco_dois_destaque_ums;

        vm.error;

        vm.getBlocoDoisDestaqueDois = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/bloco-dois-destaque-um').success(function(bloco_dois_destaque_ums) {
                vm.bloco_dois_destaque_ums = bloco_dois_destaque_ums;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();