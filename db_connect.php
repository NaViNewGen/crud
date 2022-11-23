<?php

// On se connecte à la base de données
function db(){
    global $link;
    $link = mysqli_connect("localhost", "root", "root", "todolist") or die("Echec de la connexion à la DB");
    return $link;
}
