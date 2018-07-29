<?php
/**
* Created by PhpStorm.
* User: Malan
* Date: 28-Jul-18
* Time: 1:39 PM
*/

//index.php

session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>AngularJS Register Login Script using PHP Mysql</title>
        <link href="styles/bootstrap.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <link href='styles/main.css' rel='stylesheet' type="text/css">
        <script src="vendor/angular.min.js"></script>
        <style>
            .form_style
            {
                width: 600px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <br />
        <h3 align="center">Green Gain Login landing page</h3>
        <br />

        <div ng-app="login_register_app" ng-controller="login_register_controller" class="container form_style">
            <div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
                <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
                {{alertMessage}}
            </div>

            <div class="panel panel-default" ng-show="login_form">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form method="post" ng-submit="submitLogin()">
                        <div class="form-group">
                            <label>Enter Your Email</label>
                            <input type="text" name="email" ng-model="loginData.email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Your Password</label>
                            <input type="password" name="password" ng-model="loginData.password" class="form-control" />
                        </div>
                        <div class="form-group" align="center">
                            <input type="submit" name="login" class="btn btn-primary" value="Login" />
                            <br />
                            <input type="button" name="register_link" class="btn btn-primary btn-link" ng-click="showRegister()" value="Register" />
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default" ng-show="register_form">
                <div class="panel-heading">
                    <h3 class="panel-title">Register</h3>
                </div>
                <div class="panel-body">
                    <form method="post" ng-submit="submitRegister()">
                        <div class="form-group">
                            <label>Enter Your Name</label>
                            <input type="text" name="name" ng-model="registerData.name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Your Email</label>
                            <input type="text" name="email" ng-model="registerData.email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Your Password</label>
                            <input type="password" name="password" ng-model="registerData.password" class="form-control" />
                        </div>
                        <div class="form-group" align="center">
                            <input type="submit" name="register" class="btn btn-primary" value="Register" />
                            <br />
                            <input type="button" name="login_link" class="btn btn-primary btn-link" ng-click="showLogin()" value="Login" />
                        </div>
                    </form>
                    <h5 style="color:red">Please Register before adding a profile image</h5>
                </div>
                <div class = "row">
                    <div class = "col-md-12">
                        <h3 class = "text-primary">Upload Profile Picture</h3>
                        <hr style = "boreder-top:1px dotted #000;"/>
                        <form ng-submit="submit()" name="form" role="form">
                            <div class = "form-inline">
                                <input ng-model="form.image" class = "form-control" type="file" accept="image/*" onchange="angular.element(this).scope().uploadedFile(this)" style="width:400px; height:40px" >
                                <button class = "btn btn-primary">Upload</button>
                            </div>
                            <br/>
                            <center><img ng-src="{{image_source}}" style="width:600px;"></center>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <script src="scripts/loginRegister.js"></script>
    </body>
</html>

