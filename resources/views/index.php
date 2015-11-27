<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Angular-Laravel Authentication</title>
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.css">
</head>
<body ng-app="app">

<div class="container-fluid">
    <div ui-view="painelContent"></div>
 </div>

</body>

<!-- Application Dependencies -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/bower_components/angular/angular.js"></script>
<script src="/bower_components/angular-messages/angular-messages.min.js"></script>
<script src="/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
<script src="/bower_components/satellizer/satellizer.js"></script>
<!--<script src="/bower_components/angular-permission/dist/angular-permission.js"></script>-->

<!-- Application Scripts -->
<script src="token/appUser.js"></script>
<script src="token/authController.js"></script>
<script src="token/userController.js"></script>
</html>