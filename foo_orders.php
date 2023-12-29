<?php

include'db.php';


$user = filter_var(@$_POST['user'], FILTER_SANITIZE_STRING);
$good = filter_var(@$_POST['good'], FILTER_SANITIZE_STRING);
$quantity = filter_var(@$_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
$full_price = filter_var(@$_POST['full_price'], FILTER_SANITIZE_NUMBER_INT);
$date = @$_POST['date'];

$get_id = @$_GET['id'];

//Create 

if (isset($_POST['add'])){
    $sql = ("INSERT INTO orders (User_id, Good_id, Quantity, Full_Price, Date) VALUES (?,?,?,?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$user, $good, $quantity, $full_price, $date]);
    if ($query){
        header("Location: " .$_SERVER['HTTP_REFERER']);
    }
}

//Read
$sql = $pdo->prepare("SELECT * FROM orders");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);



//Update
if(isset($_POST['edit'])){
    $sql = ("UPDATE orders SET User_id=?, Good_id=?, Quantity=?, Full_Price=?, Date=? WHERE Order_id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$user, $good, $quantity, $full_price, $date, $get_id]);
    if ($query){
        header("Location: " .$_SERVER['HTTP_REFERER']);
    }
}

//Delete
if(isset($_POST['delete'])){
$sql= ("DELETE FROM orders WHERE Order_id = ?");
$query = $pdo->prepare($sql);
$query->execute([$get_id]);
if ($query){
    header("Location: " .$_SERVER['HTTP_REFERER']);
}
}


//Users
// Выбираем уникальные значения Category_id из таблицы orders
$select_user = "SELECT DISTINCT User_id, Name FROM users";
$user_result = $pdo->query($select_user)->fetchAll(PDO::FETCH_ASSOC);


//good
$select_good = "SELECT DISTINCT Good_id, Name FROM goods";
$good_result = $pdo->query($select_good)->fetchAll(PDO::FETCH_ASSOC);


$sql = $pdo->prepare("SELECT o.*, u.Name AS UserName, g.Name AS GoodName FROM orders o
                      INNER JOIN users u ON o.User_id = u.User_id
                      INNER JOIN goods g ON o.Good_id = g.Good_id");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);



?>