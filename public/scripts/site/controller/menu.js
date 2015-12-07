    app.controller('menuController',function ($scope, $sce ,$http) {

        $scope.dynamicTooltip = 'Hello, World!';
        $scope.dynamicTooltipText = 'dynamic';
        $scope.htmlTooltip = $sce.trustAsHtml('I\'ve been made <b>bold</b>!');

        $scope.name = 'World';
        $scope.isCollapsed = true;

        $scope.menus = [];

        $http.get("admin/api/menus").then(function(response){
            console.log(response);
            $scope.menus = response.data;
        },function(response){
            console.warn(response);
        });

               //app.controller('menuController', function ($scope, $sce) {
        //    $scope.dynamicTooltip = 'Hello, World!';
        //    $scope.dynamicTooltipText = 'dynamic';
        //    $scope.htmlTooltip = $sce.trustAsHtml('I\'ve been made <b>bold</b>!');
        //});

    });