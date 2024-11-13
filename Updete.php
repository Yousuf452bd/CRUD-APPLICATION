<?php
include'Connection.php';
 
 $updetedId = $_GET['id'];

 $sql = "SELECT * FROM `user-info` where id=  $updetedId";
 $query =mysqli_query($conn,$sql);
 $data = mysqli_fetch_array($query);
 

 $gender_id = $data['gender'];
 $cheked = "";

 if(isset($_POST['update-btn'])){

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$country = $_POST ['country'];

$upDate =" UPDATE `user-info` SET `name`='$name',`email`='$email',`gender`='$gender',`country`='$country' WHERE id= '$updetedId' ";
$query = mysqli_query($conn,$upDate);

if($query){
    header('location:index.php');
  }else{
    echo "<script>alert('Data Updated Faild')</script>";
  }

 }

?>


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
   <div class="container">
        <h3 class="text-center bg-info text-danger">Crud Application Updete Api</h3>
        <div class="row py-5">
            <div class="col-12 col-md-6 col-ls-6">
                <form action="" method="POST">
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data['name']?>" placeholder="Enter Name" name="name" required>
             </div>
             <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"value="<?php echo $data['email']?>" placeholder="Enter Email" name="email" required>
             </div>
             <label for="">Gender</label><br>
             Male <input type="radio" <?php if($gender_id==1) { $cheked = "checked";}else{$cheked=""; } echo $cheked; ?> name="gender" value="1">
              
            Female <input type="radio" <?php if($gender_id==2) { $cheked = "checked";}else{$cheked=""; } echo $cheked; ?> name="gender" value="2">
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
              <button class="btn btn-success p-2" name="update-btn">Update</button>
              </form>
           </div>
             
    </div>

     

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
  </body>
</html>