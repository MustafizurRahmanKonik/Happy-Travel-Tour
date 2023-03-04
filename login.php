<?php

session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 

require_once "config.php";
 

$username = $password = "";
$username_err = $password_err = $login_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    if(empty($username_err) && empty($password_err)){
        
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = $username;
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
               
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            
                            session_start();
                            
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                           
                            header("location: index.php");
                        } else{
                            
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }
    
    
    mysqli_close($link);
}
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Travel</title>
    <link rel="icon" type="image/png" href="images/favicon.ico"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <section class="contact" id="contact">
        
        <h1 class="heading">
            <span>l</span>
            <span>o</span>
            <span>g</span>
            <span>i</span>
            <span>n</span>
        </h1>

        <?php 
        if(!empty($login_err)){
            
            $username_err = $login_err;
            $password_err = $login_err;

        }        
        ?>

        <div class="row">

            <div class="image">
                <img src="images/contact-img.svg" alt="">
            </div>

            

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="inputBox">
                    <input type="text" name="username" placeholder="Username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                </div>   
                <span class="invalid-feedback"><?php echo $username_err; ?></span> 
                <div class="inputBox">
                    <input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                </div>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </br>
                <input type="submit" class="btn" value="Login">
                </br>
                </br>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </form>


        </div>
        
    </section>


    
</body>
</html>