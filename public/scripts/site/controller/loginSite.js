       app.controller('loginSiteController',function ($scope,$http) {

       $scope.tags = [];

        //$scope.$on('$viewContentLoaded', function(){
        $http.get("/api/tags").then(function(response){
            console.log(response);
        //Atribui o response.data a variável posts
        $scope.tags = response.data;
        },function(response){
            console.warn(response);
        });
        //});
});
// app.controller('loginSiteController', function ($auth, $state) {
//
//           var vm = this;
//
//           vm.login = function() {
//
//               var credentials = {
//                   email: vm.email,
//                   password: vm.password
//               }
//
//               // Use Satellizer's $auth service to login
//               $auth.login(credentials).then(function(data) {
//
//                   // If login is successful, redirect to the users state
//                   $state.go('users', {});
//               });
//           }
// });
