<?php

require_once "config.php";
 

$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err ="";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
       
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = trim($_POST["username"]);
            
            
            if(mysqli_stmt_execute($stmt)){
               
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }
    
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
   
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
   
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        
        $sql = "INSERT INTO users (username,  email, password ) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);
            
            
            $param_username = $username;
            $param_email = trim($_POST["email"]);
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            
            if(mysqli_stmt_execute($stmt)){
               
                header("location: login.php");
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body> 

    <section class="contact" id="contact">
    
    <h1 class="heading">
        <span>r</span>
        <span>e</span>
        <span>g</span>
        <span>i</span>
        <span>s</span>
        <span>t</span>
        <span>e</span>
        <span>r</span>
    </h1>

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
                <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo $email; ?>">
            </div> 
            <span class="invalid-feedback"><?php echo $email_err; ?></span>


            <div class="inputBox">
                <input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
            </div>
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
            <div class="inputBox">
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
            </div>
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            </br>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>

    </div>
    
</section>

</body>
</html>