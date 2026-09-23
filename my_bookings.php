<?php
include "db.php";
session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT b.booking_id, m.movie_name, b.seats_booked, s.show_time, b.total_amount
        FROM bookings b
        JOIN shows s ON b.show_id = s.show_id
        JOIN movies m ON s.movie_id = m.movie_id
        WHERE b.user_id = $user_id";

$result = mysqli_query($conn, $sql);
?>

<h2 style="text-align:center;">My Bookings</h2>

<table border="1" style="width:80%; margin:auto; text-align:center;">
<tr>
    <th>Movie</th>
    <th>Seats</th>
    <th>Show Time</th>
    <th>Total</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
    <td><?php echo $row['movie_name']; ?></td>
    <td><?php echo $row['seats_booked']; ?></td>
    <td><?php echo $row['show_time']; ?></td>
    <td><?php echo $row['total_amount']; ?></td>
</tr>
<?php } ?>

</table>