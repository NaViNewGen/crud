<?php

require_once 'db_connect.php';
if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription'];

    // Vérifier les strings
    function check($string){
        $string  = htmlspecialchars($string);
        $string = strip_tags($string);
        $string = trim($string);
        $string = stripslashes($string);
        return $string;
    }

    // Vérifier si le titre n'est pas vide
    if(empty($title)){
        $error  = true;
        $titleErrorMsg = "T'as oublié le titre !";
    }
    // Vérifier si la description n'est pas vide
    if(empty($description)){
        $error = true;
        $descriptionErrorMsg = "T'as oublié la description de la tâche !";
    }

    // Connexion à la DB
    db();
    global $link;
    $query = "INSERT INTO todo(todoTitle, todoDescription, date) VALUES ('$title', '$description', now() )";
    $insertTodo = mysqli_query($link, $query);
    if($insertTodo){
        echo "Vous avez bien ajouté une nouvelle tâche !";
    }else{
        echo mysqli_error($link);
    }

}
?>

<html>
<head>
    <title>Créer une To do list</title>
</head>
<body>
<h1>Créer une To do list</h1>
<button type="submit"><a href="index.php">Voir toutes les tâches</a></button>
<form method="post" action="create.php">
    <p>Titre : </p>
    <input name="todoTitle" type="text">
    <p>Description : </p>
    <input name="todoDescription" type="text">
    <br>
    <input type="submit" name="submit" value="Créer">
</form>
</body>
</html>

