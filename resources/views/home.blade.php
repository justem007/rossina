@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Área restrita</div>

                    <div class="panel-body">
                        Você esta logado no sistema !

                        <div class="row" ng-controller="MyCtrl">
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
                                        {{picFile.size / 1000000|number:1}}MB: max 2M</i>
                                    <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb">
                                    <button ng-click="picFile = null" ng-show="picFile">Remove</button>
                                    <br>
                                    <button ng-disabled="!myForm.$valid"
                                            ng-click="uploadPic(picFile)">Submit
                                    </button>
                                          <span class="progress" ng-show="picFile.progress >= 0">
                                            <div style="width:@{{ picFile.progress }}%"
                                                 ng-bind="picFile.progress + '%'"></div>
                                          </span>
                                    <span ng-show="picFile.result">Upload Successful</span>
                                    <span class="err" ng-show="errorMsg">{{errorMsg}}</span>
                                </fieldset>
                                <br>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        </div>

    </div>


@endsection