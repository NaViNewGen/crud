<?php

require_once 'db_connect.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    db();
    global $link;
    $query = "SELECT todoTitle, todoDescription FROM todo WHERE id = '$id'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
        if($row){
            $title = $row['todoTitle'];
            $description = $row['todoDescription'];

            echo "
                <h2>Modifier la tâche</h2>
                
            <form action='edit.php?id=$id' method='post'>
            <p>Nom</p>
             <input type='text' name='title' value='$title'>
             <p>Description</p>
             <input type='text' name='description' value='$description'>
             <br>
             <input type='submit' name='submit' value='Modifier'>
            </form>
            ";
        }
    }else{
        echo "Alors oui je comprends que tu veuilles modifier la tâche, mais tu viens de la supprimer...";
    }


    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        db();
        $query = "UPDATE todo SET todoTitle = '$title', todoDescription = '$description'  WHERE id = '$id'";
        $insertEdited = mysqli_query($link, $query);
        if($insertEdited){
            echo "Tâche modifiée !";
        }
        else{
            echo mysqli_error($link);
        }
    }


}

