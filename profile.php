<?php 

require 'includes/database connect.php';
session_start();
$student_name = $_SESSION['student-username'];

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="flickity/flickity.css">
	<script type="text/javascript" src="flickity/flickity.js"></script>
	<title>Library Management</title>

</head>
<body>
<div class="container">
<!-- navbar begins -->
 <?php include "includes/home 2.php"; ?>
	</div>

 <div class="container " style="margin-top: 50px">
 		<div><br>
            <div>
            	<h2>Student Profile</h2>
            </div>
         </div>
            <div>
               <table class="table table-bordered">
                    <?php 
                    $sql = "SELECT * from students where username = '$student_name'";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($query)) { ?>
                                 
                  <tbody> 
                    <tr> 
                    
                     <td>Name : </td>
                     <td><?php echo $row['name']; ?></td>
                     
                    </tr> 
                    <tr> 
                     
                     
                     <td>Email : </td>
                     <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                     <tr> 
                    
                    
                     <td>Username : </td>
                     <td><?php echo $row['username']; ?></td>
                    </tr> 
                    <tr>
                     
                     <td>Password : </td>
                     <td><?php echo $row['password']; ?></td>
                    </tr>  
                   
                 </tbody> 
                 <?php } ?>
           </table>
         
        	</div>
        </div>
</body>
</html>

<style>
body {

  
  background-image: url("./images/32.jpg");


  
    background-size: cover;
    
    
    
    height: 100vh;
    padding:0;
    margin:0;

}
</style>