(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('sobreController', sobreController);

    function sobreController($http) {

        var vm = this;

        vm.sobre_nos;

        vm.error;

        vm.getSobreNos = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/sobre-nos').success(function(sobre_nos) {
                vm.sobre_nos = sobre_nos;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();