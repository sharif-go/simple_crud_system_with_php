<?php 
     $dbHostName  = "localhost";
     $dbUserName  = "root";
     $dbPassword    ="";
     $dbName          ="crud";
     $con = mysqli_connect($dbHostName, $dbUserName, $dbPassword, $dbName);

if(isset($_REQUEST['idu'])){
    
    $id     = $_REQUEST['idu'];
    $qur   = "SELECT * FROM `users` WHERE id='$id'";
     $data =mysqli_query($con, $qur);
      $data = mysqli_fetch_assoc($data);
}
if(isset($_POST['update'])){
    $u_name  = $_POST['u_name'];
    $u_email  = $_POST['u_email'];
echo $u_email;
    $sql    =  "UPDATE `users` SET `name`='$u_name', `email`= '$u_email' WHERE  id= '$id'";
    mysqli_query($con, $sql);
    header('location: index.php');
}

?>

<form action="" method="post">
            <table>
                    <tr>
                            <td>Name:</td>
                            <td><input type="text" name= "u_name" value="<?php echo $data['name'];?>"></td>
                    </tr>

                    <tr>
                            <td>Email:</td>
                         <td>   <input type="email" name= "u_email"  value="<?php echo $data['email'];?>" ></td>
                    </tr>

                
                    <tr>
                            <td></td>
                         <td>   <input type="submit" value="Update" name= "update"></td>
                    </tr>
            </table>
    </form>

