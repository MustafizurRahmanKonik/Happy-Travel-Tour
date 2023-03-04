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
    <link rel="icon" type="image/png" href="images/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<!-- header section starts  -->

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
        
        <?php 
        if(htmlspecialchars($_SESSION["username"]) == "admin") {
            echo '<a href="adminpanel.php"><i class="fas fa-user" id="login-btn"></i></a>';
        }
        ?>
        

        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
        
        
    </div>

    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search here...">
        <label for="search-bar" class="fas fa-search"></label>
    </form>

</header>

<!-- header section ends -->



<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>adventure is worthwhile</h3>
        <p>dicover new places with us, adventure awaits</p>
        <a href="#packages" class="btn">discover more</a>
    </div>

    <div class="controls">
        <span class="vid-btn active" data-src="images/vid-1.mp4"></span>
        <span class="vid-btn" data-src="images/vid-2.mp4"></span>
        <span class="vid-btn" data-src="images/vid-3.mp4"></span>
        <span class="vid-btn" data-src="images/vid-4.mp4"></span>
        <span class="vid-btn" data-src="images/vid-5.mp4"></span>
    </div>

    <div class="video-container">
        <video src="images/vid-1.mp4" id="video-slider" loop autoplay muted></video>
    </div>

</section>

<!-- home section ends -->


<!-- packages section starts  -->

<section class="packages" id="packages">

    <h1 class="heading">
        <span>p</span>
        <span>a</span>
        <span>c</span>
        <span>k</span>
        <span>a</span>
        <span>g</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <?php
        $sql = "SELECT image_path, title, descriptions, price, offer_price FROM packages";
        $result = $link->query($sql);

        ?>


    <div class="box-container">
    <?php
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) { 
        
            ?>
          <div class="box">
            <img src="<?php echo $row["image_path"]?>" alt="">
            <div class="content">
                <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $row["title"]?> </h3>
                <p><?php echo $row["descriptions"]?></p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="price"> <?php echo $row["price"]?> <span><?php echo $row["offer_price"]?></span> </div>
                <a href="#book" class="btn">book now</a>
            </div>
            </div>
        <?php
        }
      } else {
        echo "0 results";
      }
      $link->close();
    ?>

    </div>

</section>

<!-- packages section ends -->

<!-- book section starts  -->

<section class="book" id="book">

    <h1 class="heading">
        <span>b</span>
        <span>o</span>
        <span>o</span>
        <span>k</span>
        <span class="space"></span>
        <span>n</span>
        <span>o</span>
        <span>w</span>
    </h1>

    <div class="row">

        <div class="image">
            <img src="images/book-img.svg" alt="">
        </div>

        <form action="book.php" method="POST">
            <div class="inputBox">
                <h3>where to</h3>
                <input type="text" placeholder="place name" name="place_name">
            </div>
            <div class="inputBox">
                <h3>how many</h3>
                <input type="number" placeholder="number of guests" name="number_of_guests">
            </div>
            <div class="inputBox">
                <h3>arrivals</h3>
                <input type="date" name="arrivals">
            </div>
            <div class="inputBox">
                <h3>leaving</h3>
                <input type="date" name="leaving">
            </div>

            <input type="submit" class="btn" value="book now">
        </form>

    </div>

</section>

<!-- book section ends -->
<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading">
        <span>s</span>
        <span>e</span>
        <span>r</span>
        <span>v</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-hotel"></i>
            <h3>affordable hotels</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
        </div>
        <div class="box">
            <i class="fas fa-utensils"></i>
            <h3>food and drinks</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
        </div>
        <div class="box">
            <i class="fas fa-bullhorn"></i>
            <h3>safty guide</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
        </div>
        <div class="box">
            <i class="fas fa-globe-asia"></i>
            <h3>around the world</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
        </div>
        <div class="box">
            <i class="fas fa-plane"></i>
            <h3>fastest travel</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
        </div>
        <div class="box">
            <i class="fas fa-hiking"></i>
            <h3>adventures</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
        </div>

    </div>

</section>

<!-- services section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

    <h1 class="heading">
        <span>g</span>
        <span>a</span>
        <span>l</span>
        <span>l</span>
        <span>e</span>
        <span>r</span>
        <span>y</span>
    </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/p1.jpg" alt="">
            <div class="content">
                <h3>Cox's Bazar</h3>
                <p>Cox's Bazar is consists of miles of golden sands, towering cliffs...</p>
                <a href="file/place1.html" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/p2.jpg" alt="">
            <div class="content">
                <h3>Sonargaon</h3>
                <p>Sonargaon is one of the best touristic places...</p>
                <a href="file/place2.html" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/p3.jpg" alt="">
            <div class="content">
                <h3>Sundarbans</h3>
                <p>Sundarbans, The biggest single square of flowing halophytic...</p>
                <a href="file/place3.html" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/p4.jpg" alt="">
            <div class="content">
                <h3>Saint Martins </h3>
                <p>St. Martin's Island is a small island (area only 8 sq. km) in the...</p>
                <a href="file/place4.html" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/p5.jpg" alt="">
            <div class="content">
                <h3>Kuakata Sea Beach</h3>
                <p>The name Kuakata originated from the word Kua English ...</p>
                <a href="file/place5.html" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/p6.jpg" alt="">
            <div class="content">
                <h3>Malnichhara</h3>
                <p>Malnichhara Tea Garden is the largest and first established tea...</p>
                <a href="file/place6.html" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/p7.jpg" alt="">
            <div class="content">
                <h3>Nilgiri</h3>
                <p>Nilgiri or Nil Giri is one of the tallest peaks and beautiful...</p>
                <a href="file/place7.html" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/p8.jpg" alt="">
            <div class="content">
                <h3>Sajek Valley</h3>
                <p>Sajek valley is 2000 feet above sea level. Sajek valley is known...</p>
                <a href="file/place8.html" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-9.jpg" alt="">
            <div class="content">
                <h3>amazing places</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>

    </div>

</section>

<!-- gallery section ends -->

<!-- review section starts  -->


<!-- review section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">
    
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>

    <div class="row">

        <div class="image">
            <img src="images/contact-img.svg" alt="">
        </div>

        <form action="contact.php" method="POST">
            <div class="inputBox">
                <input type="text" placeholder="name" name="name">
                <input type="email" placeholder="email" name="email">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="number" name="number">
                <input type="text" placeholder="subject" name="subject">
            </div>
            <textarea placeholder="message" name="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" class="btn" value="send message">
        </form>

    </div>
    
</section>

<!-- contact section ends -->

<!-- brand section  -->


<!-- footer section  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>about us</h3>
            <p>This is tourism site.People who want to visit any place of country then usage this site to his own fixed date.</p>
        </div>
        <div class="box">
            <h3>branch locations</h3>
            <a href="#">india</a>
            <a href="#">USA</a>
            <a href="#">japan</a>
            <a href="#">france</a>
        </div>
        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">book</a>
            <a href="#">packages</a>
            <a href="#">services</a>
            <a href="#">gallery</a>
            <a href="#">review</a>
            <a href="#">contact</a>
        </div>
        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">twitter</a>
            <a href="#">linkedin</a>
        </div>

    </div>

    <h1 class="credit"> Developed By <span> Konik Rahman </span> | all rights reserved! </h1>

</section>


















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>