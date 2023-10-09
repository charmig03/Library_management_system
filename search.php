<!-- <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    

    <div class="container">
        <div class="row">
            <div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">search filter with id </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-nd-6">

                                <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="id" class="form-control" placeholder="Enter ID" required>
                                </div><br>
                                <button type="submit" name="bookId" class="btn btn-primary">Search</button> 
                                </form>

                            </div>
                        </div>
                        <?php
                        $conn = mysqli_connect("localhost", "root",  "", "libraryict");
                        if(isset($_POST['bookId']))
                        {
                            $id = $_POST['bookId'];
                            $query = "SELECT * FROM books WHERE bookId ='$id'";
                            $query_run = mysqli_query($conn, $query);

                        ?>
                        <div class="table-responsive">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                <th scope="col">bookId </th>
                                <th scope="col">bookTitle</th>
                                <th scope="col">author</th>
                                <th scope="col">bookCopies</th>
                                <th scope="col">publisherName</th>
                                <th scope="col">available</th>
                                <th scope="col">memberName</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                     if(mysqli_num_rows($query_run) > 0)
                                     {
                                         while($row = mysqli_fetch_array($query_run))
                                         {
                                ?>
                                <tr>
                                <th scope="row"></th>
                                <td><?php  echo $row['bookId ']; ?></td>
                                <td><?php  echo $row['bookTitle']; ?></td>
                                <td><?php  echo $row['author']; ?></td>
                                <td><?php  echo $row['bookCopies']; ?></td>
                                <td><?php  echo $row['publisherName']; ?></td>
                                <td><?php  echo $row['available']; ?></td>
                                <td><?php  echo $row['memberName']; ?></td>
                                
                                </tr>
                                <tr>
                                <?php
                                        }
                                    }
                                    else 
                                    {
                                        ?>
                                        <tr>
                                            <td colspan='6'>No Data Avaliable</td>
                                    </tr>
                                        <?php

                                    }
                                ?>
                            </tbody>
                        </table>        
                        </div>
                        <?php
                         }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html> 



