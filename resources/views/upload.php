<!DOCTYPE html>
<html>
<head lang="pt-br">
    <meta charset="UTF-8">
    <title></title>

    <link href="/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

</head>
<body ng-app="fileUpload" ng-controller="MyCtrl">
<form name="myForm">
    <fieldset>
        <legend>Upload on form submit</legend>
        Username:
        <input type="text" name="userName" ng-model="username" size="31" required>

        <i ng-show="myForm.userName.$error.required">*required</i>

        <br>Photo:
        <input type="file" ngf-select ng-model="picFile" name="file"
               accept="image/*" ngf-max-size="2MB" required>
        <i ng-show="myForm.file.$error.required">*required</i><br>
        <i ng-show="myForm.file.$error.maxSize">File too large
            {{picFile.size / 50000000|number:1}}MB: max 50M</i>
        <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb">
        <button ng-click="picFile = null" ng-show="picFile">Remove</button>
        <br>
        <button ng-disabled="!myForm.$valid"
                ng-click="uploadPic(picFile)">Submit</button>
      <span class="progress" ng-show="picFile.progress >= 0">
        <div style="width:{{picFile.progress}}%"
             ng-bind="picFile.progress + '%'"></div>
      </span>
        <span ng-show="picFile.result">Upload Successful</span>
        <span class="err" ng-show="errorMsg">{{errorMsg}}</span>
    </fieldset>
    <br>
</form>

<script src="/bower_components/angular/angular.min.js"></script>
<script src="/bower_components/angular-animate/angular-animate.min.js"></script>
<script src="/bower_components/ng-file-upload/ng-file-upload-all.min.js"></script>
<script src="/js/upload.js"></script>
<script src="/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>


</body>
</html>