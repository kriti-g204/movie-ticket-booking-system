<?php
include "db.php";
session_start();

if(isset($_POST['login'])){
    $name = $_POST['name'];

    // insert user into DB
    $sql = "INSERT INTO users(name) VALUES('$name')";
    mysqli_query($conn, $sql);

    // get user id
    $user_id = mysqli_insert_id($conn);

    // store in session
    $_SESSION['user_id'] = $user_id;
    $_SESSION['name'] = $name;

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 style="text-align:center;">Login to LUMIÈRE</h2>

<form method="POST" style="text-align:center;">
    <input type="text" name="name" placeholder="Enter your name" required>
    <button name="login">Login</button>
</form>

</body>
</html>