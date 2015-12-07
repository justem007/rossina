(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('blocoDoisDestaqueController', blocoDoisDestaqueController);

    function blocoDoisDestaqueController($http) {

        var vm = this;

        vm.bloco_dois_destaques;

        vm.error;

        vm.getBlocoDoisDestaques = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/bloco-dois-destaques').success(function(bloco_dois_destaques) {
                vm.bloco_dois_destaques = bloco_dois_destaques;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();