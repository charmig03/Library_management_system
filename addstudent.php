<?php 
require 'includes/snippet.php';
    require 'includes/database connect.php';
include "includes/header.php"; 

if(isset($_POST['submit'])) {

    $password = sanitize(trim($_POST['password']));
    $password2 = sanitize(trim($_POST['password2']));
    $username = sanitize(trim($_POST['username']));
    $email = sanitize(trim($_POST['email']));
    $name = sanitize(trim($_POST['name']));
    $filename =''; 


   if ($password == $password2) {
      $sql = "INSERT INTO students( password, username, email, name)
 VALUES ( '$password', '$username', '$email', '$name' ) ";

      $query = mysqli_query($conn, $sql);
      $error = false;
      if($query){
       $error = true;
      }
      else{
        echo "<script>alert('Not Registered');
                    </script>"; 
      }
   }
   else {
    echo  "<script>alert('Password mismatched!')</script>";
   }
    

}

?>


<div>
    <?php include "includes/home.php"; ?>
    <br>
    <br>
    <div style="margin-top: 20px">
        <div class=" col-lg-10 ">
        
            <h2 style="text-align: center">ADD STUDENTS</h2>
<center>
            <div>
                <form role="form" action="addstudent.php" method="post" >
                    <div>
                        <label for="Username" ></label>
                        <div >
                        Name:   <input type="text" name="name" placeholder="Name" id="name" required>
                        </div> </div>     
                         
                   
                    <div>
                        <label for="Password"></label>
                        <div >
                        Email:  <input type="email"  name="email" placeholder="Email" id="password" required>
                        </div> </div>     
                   
                    <div>
                        <label for="Password"></label>
                        <div>
                        Username:   <input type="text"name="username" placeholder="Username" id="password" required>
                        </div>      
                    </div>
                    
                    <div>
                        <label for="Password"></label>
                        <div>
                        Password:   <input type="password"  name="password" placeholder="password" id="password" required>
                        </div>      
                    </div>

                    <div>
                        <label for="Password" ></label>
                        <div>
                        Confirm Password:   <input type="password" name="password2" placeholder="Confirm password" id="password" required>
                        </div>      
                    </div>
                     
    
                    <br>
                    <div>
                        <div >
                            <button  name="submit"> ADD MEMBER</button>
                            
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>
        
    </div>
</div>  
</center>

 </script>
</body>
</html>

<style>
body {

  
  background-image: url("./images/33.jpg");


  
    background-size: cover;
    
    
    
    height: 100vh;
    padding:0;
    margin:0;

}
</style>