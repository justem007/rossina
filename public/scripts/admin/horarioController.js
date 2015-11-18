(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('horarioController', horarioController);

    function horarioController($http) {

        var vm = this;

        vm.horarios;

        vm.error;

        vm.getHorarios = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de usuários
            $http.get('api/horarios').success(function(horarios) {
                vm.horarios = horarios;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();