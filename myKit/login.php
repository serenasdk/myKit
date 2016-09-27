<?php
session_start();

require_once 'dbRelation.php';

if (isset($_REQUEST["connect"])) {
    try {
        $validity = isUserValid($_REQUEST["userName"], $_REQUEST["pwd"]);

        if (is_numeric($validity)) {
            $_SESSION["idUser"] = $validity;
        } else {
            $msgConnect = $validity;
        }
    } catch (Exception $ex) {
        $msgConnect = $ex;
    }
}
if (isset($_SESSION["idUser"])) {
    header("location: index.php");
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
        <meta name="viewport" content="width=device-width, initial-scale=1"  charset="UTF-8">
        <link href="ressources/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="loginStyle.css" rel="stylesheet" type="text/css"/>
        <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>MyKit</h1>
                <p>MyKit est un cookbook portable, interactif et intelligent.</p>
            </div>
        </div>
        <div class="container">
            <form action="login.php" method="post" class="form-group, col-lg-3, cadre">
                <legend>Connection</legend>
                <input type="text" name="userName" class="form-control" placeholder="Nom d'utilisateur"><br>
                <input type="password" name="pwd" class="form-control" placeholder="Mot de passe"><br>
                <input type="submit" class="btn-primary" name="connect" value="Connection">
                <?php
                if (isset($msgConnect)) {
                    echo '<div class="alert alert-danger" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <span class="sr-only">Error:</span>
                                            ' . $msgConnect . '
                                          </div>';
                }
                ?>
            </form>
        </div>
        <div class="container">
            <form action="register.php" method="post" class="form-group, col-lg-3, cadre">
                <legend>S'inscrire</legend>
                <input type="text" name="userName" class="form-control" placeholder="Nom d'utilisateur"><br>
                <input type="password" name="pwd" class="form-control" placeholder="Mot de passe"><br>
                <input type="password" name="pwd-conf" class="form-control" placeholder="Confirmation"><br>
                <input type="submit" class="btn-primary" name="register" value="S'inscrire">
            </form>
        </div>
    </body>
</html>
