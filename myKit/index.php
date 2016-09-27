<?php
session_start();

if (!isset($_SESSION["idUser"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="ressources/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
        <script src="ressources/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <link href="loginStyle.css" rel="stylesheet" type="text/css"/>
        <title>Accueil</title>
    </head>
    <body >
        <script>
            "use strict";
            var monApp = angular.module('monApp', ['navCtrl', 'recipeCtrl']);

            var navCtrl = angular.module('navCtrl', []);
            navCtrl.controller('navCtrl', ['$scope', function ($scope){
            $('#menu a').click(function (e) {
            e.preventDefault()
                    $(this).tab('show')
            }]);
                    var recipeCtrl = angular.module('recipeCtrl', []);
                    recipeCtrl.controller('navCtrl', ['$scope', function ($scope){
                    $scope.list = <?php getRecipeByUser($_SESSION["idUser"]) ?> ;
                    }]);
        </script>
        <div class="container" id="menu" >
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Accueil</a></li>
                <li role="presentation"><a href="#recipes" aria-controls="recipes" role="tab" data-toggle="tab">Recettes</a></li>
                <li role="presentation"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">Liste de Courses</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Espace personnel</a></li>
                <li role="presentation" class="pull-right"><a href="#deco" aria-controls="deco" role="tab" data-toggle="tab">Déconnection</a></li>
            </ul>
            
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <h1>Home</h1>
                </div>
                <div role="tabpanel" class="tab-pane" id="recipes">
                    <h1>Recettes</h1>
                    
                </div>
                <div role="tabpanel" class="tab-pane" id="list">

                </div>
                <div role="tabpanel" class="tab-pane" id="settings">

                </div>
            </div>

        </div>
    </body>
</html>
