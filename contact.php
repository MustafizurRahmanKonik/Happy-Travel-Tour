<?php
    
    require_once "config.php";
    

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $sql = "INSERT INTO contact (c_name, c_email, c_mobile_no, c_subject, c_message) VALUES ('$name','$email','$number','$subject','$message')";

    if ($link->query($sql) === TRUE) {
    {
            echo 'Message Sent Successfully.';
    }header("refresh:2, url=index.php");
    } else {
        echo "Booking Failed!";
    }



    
    


?>