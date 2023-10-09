<?php 
require 'includes/snippet.php';
require 'includes/database connect.php';
include "includes/header.php";

if(isset($_POST['submit'])){

    $title = sanitize(trim($_POST['title']));
    $memberName = sanitize(trim($_POST['memberName']));
    $author = sanitize(trim($_POST['author']));
    $bookCopies = sanitize(trim($_POST['bookCopies']));
    $publisher = sanitize(trim($_POST['publisher']));
    $select = sanitize(trim($_POST['select']));

$sql = "INSERT INTO books(bookTitle, memberName, author, bookCopies, publisherName, available)
                 values ('$title', '$memberName','$author','$bookCopies','$publisher','$select')";

    $query = mysqli_query($conn, $sql);

    if($query){
        echo "<script>alert('New Book has been added ');
					location.href ='bookstable.php';
					</script>";
    }
    else {
        echo "<script>alert('Book not added!');
					</script>";	
    }

}

?>


<div>
    <?php include "includes/home.php"; ?>
    
    <div style="margin-top: 20px">
        <div>
       <br>
       <br>
       <br>
            <h2 style="text-align: center">ADD BOOK</h2>
<center>
            <div>
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="addbook.php" method="post">
                    <div>
                        <label for="Title"></label>
                        <div>
                           BOOK TITLE:  <input type="text"  name="title" placeholder="BOOK TITLE" id="password" required><br>
                        </div>      
                    </div>
                    <div >

                    <label for="memberName"></label>
                        <div>
                           Member Name:  <input type="text"  name="memberName" placeholder="MEMBER NAME" id="password" required><br>
                        </div>      
                    </div>
                    <div >

                        <label for="Author" ></label>
                        <div >
                        AUTHOR NAME: <input type="text"  name="author" placeholder="AUTHOR NAME" id="password" required><br>
                        </div>      
                    </div>
                    </div>
                    <div >
                        <label for="Book Copies"></label>
                        <div >
                        BOOK COPIES:  <input type="text"  name="bookCopies" placeholder="BOOK COPIES" id="password" required> <br>
                        </div>     
                    </div>
                    <div>
                        <label for="Publisher" ></label>
                        <div >
                        PUBLISHER: <input type="text" name="publisher" placeholder="PUBLISHER" id="password" required> <br>
                        </div>      
                    </div>
                    <div>
                      <label for="Password"></label>
                        <div>
                        AVAILABLE:  <select custom-select custom-select-lg name="select" required>
                            <option>SELECT</option>
                            <option>YES</option>
                            <option>NO</option>
                          </select>
                        </div>      
                    </div>
                    <br>
                        <div >
                            <button  name="submit" data-toggle="modal" data-target="#info">
                                ADD BOOK
                            </button>
                            
</div>

                    
                </form>
            </div>
        </div>
        
    </div>

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