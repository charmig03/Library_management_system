<?php 
    // require_once('database connect.php');
    session_start();
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library_db";
    $ran = random_int(2355,7676);
    $_SESSION['ran'] = $ran;

    $conn = mysqli_connect($server, $username, $password, $dbname);
    // this is the email part
    

    
    
    // echo gettype($_SESSION['otp']) . "<br>";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_SESSION['otp'] = $_SESSION['ran'];

        if(isset($_POST['otp'], $_POST['newpassword'], $_POST['new2password'])){

            echo ' ' . $_POST['otp'] . ' ' . $_POST['newpassword'] . ' ' . $_POST['new2password'];
            $x = intval($_POST['otp']);
            echo gettype($x);

            if($_SESSION['otp'] == $x && $_POST['newpassword'] == $_POST['new2password']){
                echo 'same';
                $sql = "UPDATE account SET password = '" . $_POST['newpassword'] . "' WHERE name = '" . $_SESSION['name'] . "'";
                echo $sql;
                if(mysqli_query($conn, $sql)){
                    // echo '<br>' . 'success';
                    header('Location: login.php');
                }
            }
            else if($_SESSION['otp'] != $_POST['otp']){
                echo 'wrong otp or it is ' . gettype($x);
            }
            else if($_POST['newpassword'] != $_POST['new2password']){
                echo 'password did not match';
            }
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>forgot password</h3>

    <?php
        if(!isset($_POST['name'])){

            ?>

            <form action="EmailOTP.php" method='POST'>
                    <label for="name">User name</label> <br>
                    <input type="text" name="name"> <br><br>
                    <label for="e-mail">Email address</label> <br>
                    <input type="email" name="email" require> <br><br>
                    <button value='submit'>get otp</button>
                </form>

            <?php
            $_SESSION['ran'] = $ran;            
        }
    ?>

    <?php
    require_once ('./includes/PHPMailer.php');
    require_once ('./includes/SMTP.php');
        if(isset($_POST['name']) && isset($_POST['email'])){
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];
            echo $_SESSION['ran'];


            // this is the email part

            $mail = new PHPMailer(true);

           
            $mail->SMTPDebug = 3;                               
            
            $mail->isSMTP();            
                                 
            $mail->Host = "smtp.gmail.com";
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;                          
            //Provide username and password     
                                      
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                           
            
            $mail->Port = 587;             
            $mail->Username = "charmig3801@gmail.com";                 
            $mail->Password = "@gcharmi038";      

            $mail->setFrom = "charmig3801@gmail.com";
            

            $mail->addAddress($_SESSION['email'], "charmi");

            $mail->isHTML(true);

            $mail->Subject = "This is to test the communicatin";
            $mail->Body = "<h3 style='color:red;'>Forgot password</h3><p>your OTP is " . $_SESSION['ran'] . " keep this as a secret. Do not share</p>";
            $mail->AltBody = "This is the plain text version of the email content";

            try {
                $mail->send();
                echo "Message has been sent successfully";
                
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
            // echo 'hi';
            
       ?>
    <form action="EmailOTP.php" method='POST'>
        <input type="text" placeholder='username' name="name"><br><br>
        <input type="text" placeholder='OTP' name='otp'> <br><br>
        <input type="text" placeholder='new password' name='newpassword'><br><br>
        <input type="text" placeholder='re-enter password' name='new2password' ><br><br>
        <input type="submit"><br>
    </form>

    <?php 
    }
    
    ?>
    
</body>
</html>