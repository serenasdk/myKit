<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'connection.php';



function isUserValid($userName, $pwd){
    $co = getConnection();
    $req = $co->prepare('SELECT * FROM `users` where userPseudo like :username');
    $req->bindParam(':username', $userName, PDO::PARAM_STR);
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);
    
    if (count($result) > 0){
        if (sha1($pwd) === $result["userPwd"]) {
            return $result["idUser"];
        }
        else{
            return "Le mot de passe est incorrecte";
        }
    }
    else{
        return "L'utilisateur n'existe pas";
    }
}

function getRecipe($idRecipe){
    
}

function getRecipeByUser($idUser){
    $co = getConnection();
    
}
