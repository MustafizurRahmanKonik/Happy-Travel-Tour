<?php
    session_start();
    
    require_once "config.php";
    

    $place_name = $_POST['place_name'];
    $number_of_guests = $_POST['number_of_guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $username = htmlspecialchars($_SESSION["username"]);

    $sql = "CREATE TABLE book (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        place_name VARCHAR(30) NOT NULL,
        number_of_guests INT(10) NOT NULL,
        arrivals VARCHAR(20),
        leaving VARCHAR(20),
        username VARCHAR(20),
        booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

    $sql = "INSERT INTO book (place_name, number_of_guests, arrivals, leaving, username)
    VALUES ('$place_name','$number_of_guests','$arrivals','$leaving','$username')";

    if ($link->query($sql) === TRUE) {
        $book_message = '
            <span>b</span>
            <span>o</span>
            <span>o</span>
            <span>k</span>
            <span>i</span>
            <span>n</span>
            <span>g</span>
            <span class="space"></span>
            <span>s</span>
            <span>u</span>
            <span>c</span>
            <span>e</span>
            <span>s</span>
            <span>s</span>
            <span>f</span>
            <span>u</span>
            <span>l</span>
        ';
        header("refresh:2, url=index.php");
        
    } else {
        $book_message = '
            <span>b</span>
            <span>o</span>
            <span>o</span>
            <span>k</span>
            <span>i</span>
            <span>n</span>
            <span>g</span>
            <span class="space"></span>
            <span>f</span>
            <span>a</span>
            <span>i</span>
            <span>l</span>
            <span>e</span>
            <span>d</span>
        ';
        header("refresh:2, url=index.php");
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    

<!-- book section starts  -->

    <section class="book" id="book">

        <h1 class="heading">
            <?php echo $book_message; ?>
        </h1>

    </section>

<!-- book section ends -->


</body>
</html>