<?php include 'config.php' ?>
<?php


$name = $_POST['email'];
$password = $_POST['password'];


$sql = " SELECT name, password FROM users  where name= '$name' ";
$result = $conn->query($sql);
if ($result->num_rows  == 1 ) {
    $hashpassword = password_hash($password , PASSWORD_DEFAULT);

    if (password_verify($password, $hashpassword)) {


       $userData = mysqli_fetch_array($result);
       $name = $userData['name'];
       $cookie_name ='userinfo';
       $cookie_value = $name;
       setcookie($cookie_name,$cookie_value,time()+86400*30);
       header('location:home.php');
       
    }
}


?>
