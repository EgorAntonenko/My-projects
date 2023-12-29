<?php

include'db.php';


$name = filter_var(@$_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var(@$_POST['email'], FILTER_VALIDATE_EMAIL);
$get_id = (@$_GET['id']);
$phone = filter_var(@$_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
$date = (@$_POST['date']);
$address = filter_var(@$_POST['address'], FILTER_SANITIZE_STRING);
$password = filter_var(@$_POST['password'], FILTER_SANITIZE_STRING);


//Create 

if (isset($_POST['add'])){
    $sql = ("INSERT INTO users (name, email, phone, date_of_birth, address, password) VALUES (?,?,?,?,?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $email, $phone, $date, $address, $password]);
    if ($query){
        header("Location: " .$_SERVER['HTTP_REFERER']);
    }
}

//Read
$sql = $pdo->prepare("SELECT * FROM users");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);



//Update
if(isset($_POST['edit'])){
    $sql = ("UPDATE users SET name=?, email=?, phone=?, date_of_birth=?, address=?, password=? WHERE User_id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $email, $phone, $date, $address, $password, $get_id]);
    if ($query){
        header("Location: " .$_SERVER['HTTP_REFERER']);
    }
}

//Delete
if(isset($_POST['delete'])){
$sql= ("DELETE FROM users WHERE User_id = ?");
$query = $pdo->prepare($sql);
$query->execute([$get_id]);
if ($query){
    header("Location: " .$_SERVER['HTTP_REFERER']);
}
}



?>