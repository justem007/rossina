(function() {

    'use strict';

    angular
        .module('appAdmin')
        .controller('redirectController', redirectController);

    function redirectController($scope,$http,$rootScope,$location) {

            $scope.$on('$viewContentLoaded', function(){
//Verifica se usuário está logado.
                $http.get("/login").then(function(response){
                    if (response.data.id){
                        $rootScope.authuser = response.data;
                    }else{
                        window.location.assign('index.html');
                    }
                },function(response){
                    notifyError(response);
                });
            });

        }s

})();
