(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('contatoController', contatoController);

    function contatoController($http) {

        var vm = this;

        vm.silks;

        vm.error;

        vm.getSilks = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/silks').success(function(silks) {
                vm.silks = silks;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();