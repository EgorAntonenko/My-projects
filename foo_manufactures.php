<?php

include'db.php';

$name = filter_var(@$_POST['name'], FILTER_SANITIZE_STRING);
$get_id = @$_GET['id'];


//Create 

if (isset($_POST['add'])){
    $sql = ("INSERT INTO manufactures (name) VALUES (?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name]);
    if ($query){
        header("Location: " .$_SERVER['HTTP_REFERER']);
    }
}

//Read
$sql = $pdo->prepare("SELECT * FROM manufactures");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);



//Update
if(isset($_POST['edit'])){
    $sql = ("UPDATE manufactures SET name=? WHERE Manufactory_id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $get_id]);
    if ($query){
        header("Location: " .$_SERVER['HTTP_REFERER']);
    }
}

//Delete
if(isset($_POST['delete'])){
$sql= ("DELETE FROM manufactures WHERE Manufactory_id = ?");
$query = $pdo->prepare($sql);
$query->execute([$get_id]);
if ($query){
    header("Location: " .$_SERVER['HTTP_REFERER']);
}
}



?>