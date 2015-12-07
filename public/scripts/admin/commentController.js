(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('commentController', commentController);

    function commentController($http) {

        var vm = this;

        vm.comments;

        vm.error;

        vm.getComments = function() {

            // Este pedido vai bater o método do índice no AuthenticateController
            // no lado do Laravel e irá retornar a lista de
            $http.get('api/comments').success(function(comments) {
                vm.comments = comments;
            }).error(function(error) {
                vm.error = error;
            });
        }
    }

})();