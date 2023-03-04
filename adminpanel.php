<?php
// Initialize the session
session_start();
require_once "config.php";
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit the world with us!</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin-style.css">
</head>
<body>
    <header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="index.php" class="logo"><span>T</span>ravel</a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#book">book</a>
        <a href="#packages">packages</a>
        <a href="#services">services</a>
        <a href="#gallery">gallery</a>
        <a href="#contact">contact</a>
    </nav>

    <div class="icons">
        
        <i class="fas fa-search" id="search-btn"></i>
        <span class="username"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
        <i class="fas fa-user" id="login-btn"></i>
        
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
        
        
    </div>

    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search here...">
        <label for="search-bar" class="fas fa-search"></label>
    </form>

    </header>
    
    <section class="packages wrapper" id="packages">


        <div class="box-container">
            <div class="box">
                <h1>Add Tour Package</h1>
                <form action="packages.php" method="POST">
                    <h3>Image Path</h3>
                    <input class="input" type="text" name="image_path" placeholder="image location">
                    <h3>Title</h3>
                    <input class="input" type="text" name="title" placeholder="package title">
                    <h3>Descriptions</h3>
                    <input class="input" type="text" name="descriptions" placeholder="package descriptions">
                    <h3>Price</h3>
                    <input class="input" type="text" name="price" placeholder="regular price ">
                    <h3>Offer Price</h3>
                    <input class="input" type="text" name="offer_price" placeholder="special price">
                    <input type="submit" class="btn" value="update">
                </form>
            </div>

            <div class="box">
                <h1>Users</h1>
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                    </tr>
                    <?php 
                    $sql = "SELECT id, username, email FROM users";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {?>
                             <tr>
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["username"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                            </tr>  
                      <?php  }
                      } else {
                        echo "0 results";
                      } 
                      
                    ?>
                        
                                                     
                            
                                          
                    
                </table>
            </div>

            <div class="box">
                <h1>Messages</h1>
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>subject</th>
                    </tr>
                    <?php 
                    $sql = "SELECT id, c_name, c_subject FROM contact";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {?>
                    <tr>
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["c_name"] ?></td>
                                <td><?php echo $row["c_subject"] ?></td>
                        
                    </tr>
                    <?php  }
                      } else {
                        echo "0 results";
                      } 
                      $link->close();
                    ?>
                </table>
            </div>

        </div>

    </section>


</body>
</html>