<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include "db.php";

$genre = isset($_GET['genre']) ? $_GET['genre'] : '';


$sql = "SELECT s.show_id, m.movie_name, m.genre,
        t.theatre_name, s.show_time,
        s.available_seats, s.ticket_price
        FROM shows s
        JOIN movies m ON s.movie_id = m.movie_id
        JOIN theatres t ON s.theatre_id = t.theatre_id";

$conditions = [];

if($genre != ''){
    $conditions[] = "m.genre='$genre'";
}


if(count($conditions) > 0){
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>LUMIÈRE</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1 class="title">LUMIÈRE</h1>

<p class="tagline">
Experience movies. Book instantly. Enjoy effortlessly.
</p>

<div class="top-buttons">

    <a href="my_bookings.php" class="mybook-btn">
        My Bookings
    </a>

    <a href="logout.php" class="logout-btn">
        Logout
    </a>

    <a href="delete_account.php"
       class="delete-btn"
       onclick="return confirm('Are you sure?')">
       Delete Account
    </a>

</div>

<!-- Genre Filter -->
<form method="GET">

<select name="genre">
    <option value="">All Genres</option>
    <option value="Action">Action</option>
    <option value="Sci-Fi">Sci-Fi</option>
    <option value="Romance">Romance</option>
    <option value="Drama">Drama</option>
    <option value="Thriller">Thriller</option>
</select>

<button type="submit">Filter</button>

</form>


<table>

<tr>
    <th>Movie</th>
    <th>Genre</th>
    <th>Theatre</th>
    <th>Show Time</th>
    <th>Seats</th>
    <th>Price</th>
    <th>Book</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['movie_name']; ?></td>

<td><?php echo $row['genre']; ?></td>

<td><?php echo $row['theatre_name']; ?></td>

<td><?php echo $row['show_time']; ?></td>

<td><?php echo $row['available_seats']; ?></td>

<td>₹<?php echo $row['ticket_price']; ?></td>

<td>

<form method="POST" action="book.php">

<input type="hidden"
       name="show_id"
       value="<?php echo $row['show_id']; ?>">

<input type="number"
       name="seats"
       min="1"
       placeholder="Seats"
       required>

<button type="submit">
Book Ticket
</button>

</form>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>