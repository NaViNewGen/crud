<?php
require_once("db_connect.php");
?>

<html>
<head>
    <title>ToDoList CRUD</title>
</head>
<body>
<h2>
    Ma liste :
</h2>
<p><a href="create.php">Ajouter une tâche</a></p>
<?php
db();
global $link;
$query  = "SELECT id, todoTitle, todoDescription, date FROM todo";
$result = mysqli_query($link, $query);
//On vérifie si il y'a des données dans la table
if(mysqli_num_rows($result) >= 1){
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $title = $row['todoTitle'];
        $date = $row['date'];

        ?>

    <ul>
        <li><a href="detail.php?id=<?php echo $id?>"><?php echo $title ?></a></li> <?php echo "[[$date]]";?>
        <button type="button"><a href="edit.php?id=<?php echo $id?>">Edit</a></button>
        <button type="button"><a href="delete.php?id=<?php echo $id?>">Delete</a></button>
    </ul>
<?php
    }
}

?>


</body>
</html>
