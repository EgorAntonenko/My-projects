<?php

include'db.php';

$category = filter_var(@$_POST['category'], FILTER_SANITIZE_STRING);
$name = filter_var(@$_POST['name'], FILTER_SANITIZE_STRING);
$info = filter_var(@$_POST['info'], FILTER_SANITIZE_STRING);
$manufactory = filter_var(@$_POST['manufactory'], FILTER_SANITIZE_STRING);
$image = filter_var(@$_POST['image'], FILTER_SANITIZE_STRING);
$price = filter_var(@$_POST['price'], FILTER_SANITIZE_NUMBER_INT);
$quantity = filter_var(@$_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);

$get_id = @$_GET['id'];

//Create 

if (isset($_POST['add'])){
    $sql = ("INSERT INTO goods (Category_id, name, info, Manufactory_id, image, price, quantity) VALUES (?,?,?,?,?,?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$category, $name, $info, $manufactory, $image, $price, $quantity]);
    if ($query){
        header("Location: " .$_SERVER['HTTP_REFERER']);
    }
}

//Read
$sql = $pdo->prepare("SELECT * FROM goods");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);



//Update
if(isset($_POST['edit'])){
    $sql = ("UPDATE goods SET Category_id=?, name=?, info=?, Manufactory_id=?, image=?, price=?, quantity=? WHERE Good_id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$category, $name, $info, $manufactory, $image, $price, $quantity, $get_id]);
    if ($query){
        header("Location: " .$_SERVER['HTTP_REFERER']);
    }
}

//Delete
if(isset($_POST['delete'])){
$sql= ("DELETE FROM goods WHERE Good_id = ?");
$query = $pdo->prepare($sql);
$query->execute([$get_id]);
if ($query){
    header("Location: " .$_SERVER['HTTP_REFERER']);
}
}


//Category
// Выбираем уникальные значения Category_id из таблицы goods
$select_category = "SELECT DISTINCT Category_id, Name FROM categories";
$category_result = $pdo->query($select_category)->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare("SELECT g.*, c.Name AS CategoryName, m.Name AS ManufacturerName FROM goods g
                      INNER JOIN categories c ON g.Category_id = c.Category_id
                      INNER JOIN manufactures m ON g.Manufactory_id = m.Manufactory_id");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

//Manufactory
$select_manufactory = "SELECT DISTINCT Manufactory_id, Name FROM manufactures";
$manufactory_result = $pdo->query($select_manufactory)->fetchAll(PDO::FETCH_ASSOC);



?>