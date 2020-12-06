<?php
     $dbHostName  = "localhost";
     $dbUserName  = "root";
     $dbPassword    ="";
     $dbName          ="crud";
     $con = mysqli_connect($dbHostName, $dbUserName, $dbPassword, $dbName);


if(isset($_POST['submit'])){
    $name              = $_POST['name'];
    $email              = $_POST['email'];
    $password        = md5($_POST['password']);


  //CHECK DATABASE CONNECTION

     if(!$con){
         echo "Something went wrong.....";
         exit();
    
     //INSERT DATA IN DATABASE    
         
     }else{
         $sql        = "INSERT INTO `users` (`name`,`email`,`password`) VALUES ('$name', '$email', '$password')";
         $inserted= mysqli_query($con, $sql);
         if($inserted){
             echo "Data insert seccessfully!";
         }else{
             echo "Somehitng went wrong!";
         }
     }
}

//DATA SELECT FROM DATABASE

$query ="SELECT * FROM `users`";
$data    = mysqli_query($con, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <style>
    body{
        margin: 0 auto;
        padding-left: 8%;
        padding-top: 5%;
    }
    </style>
</head>
<body>

        <!-- SIMPLE FORM  START FOR DATA INSERT -->

    <form action="" method="post">
            <table>
                    <tr>
                            <td>Name:</td>
                            <td><input type="text" name= "name" placeholder="Enter your name"></td>
                    </tr>

                    <tr>
                            <td>Email:</td>
                         <td>   <input type="email" name= "email" placeholder="Enter your email"></td>
                    </tr>

                    <tr>
                            <td>Password:</td>
                            <td><input type="password" name= "password" placeholder="Enter your password"></td>
                    </tr>

                    <tr>
                            <td></td>
                         <td>   <input type="submit" name= "submit"></td>
                    </tr>
            </table>
    </form>

            <!-- SIMPLE FORM  END FOR DATA INSERT -->
             
<br><br>
             <!-- SIMPLE TABLE START FOR SHOW DATA -->
             <table border>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>

                    <?php $id=0; while($row = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $row['name'];  ?></td>
                            <td><?php echo $row['email'];  ?></td>
                            <td>
                            <a href="edit.php?idu=<?php echo $row['id']; ?>">Edit</a>|| <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                            
                    </tr>
                    <?php $id++; } ?>
             </table>

                          <!-- SIMPLE TABLE END FOR SHOW DATA -->

</body>
</html>