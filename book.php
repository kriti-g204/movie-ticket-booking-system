<?php
include "db.php";
session_start();

/* Check login */
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$show_id = $_POST['show_id'];
$seats = $_POST['seats'];

/* Get ticket price from shows table */
$price_query = mysqli_query($conn,
    "SELECT ticket_price FROM shows WHERE show_id = $show_id");

$price_row = mysqli_fetch_assoc($price_query);
$ticket_price = $price_row['ticket_price'];

/* Calculate total amount */
$total_amount = $ticket_price * $seats;

/* Insert booking */
$sql = "INSERT INTO bookings 
        (user_id, show_id, seats_booked, total_amount)
        VALUES 
        ($user_id, $show_id, $seats, $total_amount)";

if(mysqli_query($conn, $sql)){
    echo "<script>
        alert('🎉 Booking Successful!');
        window.location.href='index.php';
    </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>