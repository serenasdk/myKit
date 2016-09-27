<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define("DBHOST", "127.0.0.1");
define("DBNAME", "mykit");
define("DBUSER", "root");
define("DBPASS", "");

function getConnection() {
    static $dbb = null;

    try {
        if ($dbb === NULL) {
            $connectionString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
            $dbb = new PDO($connectionString, DBUSER, DBPASS);
            $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
    return $dbb;
}