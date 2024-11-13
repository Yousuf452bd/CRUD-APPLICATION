<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crud Application</title>
  </head>
  <body>

  <?php


  include 'Connection.php';

  if(isset($_POST['submit-btn'])=="POST"){

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$country = $_POST ['country'];


$insert = "INSERT INTO `user-info`(`name`, `email`, `gender`, `country`) VALUES ('$name','$email','$gender','$country')";

  $query = mysqli_query($conn,$insert);
  if($query){
    echo "<script>alert('Data Insert Success')</script>";
  }else{
    echo "<script>alert('Data Insert Faild')</script>";
  }

  }
   ?>


    <div class="container">
        <h3 class="text-center bg-info text-danger">Crud Application Api</h3>
        <div class="row py-5">
            <div class="col-12 col-md-6 col-ls-6">
                <form action="" method="POST">
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  placeholder="Enter Name" name="name" required>
             </div>
             <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email" name="email" required>
             </div>
             <label for="">Gender</label><br>
             Male <input type="radio" name="gender" value="1"required>
             Female <input type="radio" name="gender" value="2" required> 
             <br>
             <label for="exampleFormControlInput1" class="form-label">Conntry Location:</label>
            <select name="country" class="form-select" aria-label="Default select example">
                    <option selected>Select</option>
                    <option value="0">Bangladesh</option>
                    <option value="1">USA</option>
                    <option value="2">India</option>
                   <option value="3">Indonesia</option>
                   <option value="4">South Korea</option>
                   <option value="5">Japan</option>
                   <option value="6">pakistan</option>
                   <option value="7">Afghanistan </option>
              </select>
              <br>
              <button class="btn btn-success p-2" name="submit-btn">Submit</button>
              </form>
           </div>
            
            <div class="col-12 col-md-6 col-ls-6">
                <style>
                    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
                </style>
 
            <table class="table">
  
 
             <thead>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Gender</th>
                     <th>Country</th>
                     <th colspan="2">Action</th>
                     
                  </thead>
                  <tbody>

                  <?php
                  $genderArray = ["","Male","Female"];
                  $countryArray = ["Bangladesh","USA","India","Indonesia","South Korea","Japan","pakistan","Afghanistan"];
                   $sql= "SELECT * FROM `user-info`";
                    
                   $quer = mysqli_query($conn,$sql);
                   $i=1;
                   while($row = mysqli_fetch_array($quer))
                   {
                     ?>
                          <tr>




                        <td><?php echo $i;?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['email']?> </td>
                        <td><?php echo $genderArray[$row['gender']];?></td>
                        <td><?php echo $countryArray[$row['country']];?></td>
 
                        <td rowspan="1"> <a href="Updete.php?id=<?php echo $row['id']?>"><button class="btn btn-info">Update</button></a></td>
                        <td rowspan="1"> <a href="Delete.php?id=<?php echo $row['id']?>"><button class="btn btn-danger">Delete</button></a></td>
                 
                    </tr> 

                     <?php
                     $i++;
                   }
                  
                  ?>
              
              </tbody>
            </table>
            </div>
        </div>
    </div>

     

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
  </body>
</html>