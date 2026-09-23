<?php
include "db.php";
session_start();

/* Check login */
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* Check if user has bookings */
$check_booking = mysqli_query(
    $conn,
    "SELECT * FROM bookings WHERE user_id = $user_id"
);

/* If bookings exist → block delete */
if(mysqli_num_rows($check_booking) > 0){

    echo "<script>
        alert('You have already booked tickets. You cannot delete your account.');
        window.location.href='index.php';
    </script>";

    exit();
}

/* No bookings → allow delete */
$sql = "DELETE FROM users WHERE user_id = $user_id";

if(mysqli_query($conn, $sql)){

    session_destroy();

    echo "<script>
        alert('Account deleted successfully!');
        window.location.href='login.php';
    </script>";

} else {

    echo "Error: " . mysqli_error($conn);

}
?>