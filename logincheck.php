<?php include 'config.php' ?>

<?php

$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM users  where email=' $email'";
 echo $sql;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
    if (count($row)) {
        $verify = password_verify($password, $row['password']);
        if ($verify) {
            $cookie_name = 'name';
            $cookie_val = $row['email'];
            setcookie($cookie_name, $cookie_val, time() + 48600 * 3);
            header('location:home.php');
            $conn->close();
        }
    }
/*
$email = $_POST['email'];
$password = $_POST['password'];
$hashpassword =password_hash($password, PASSWORD_DEFAULT);

$sql= "SELECT email , password from users where email = $email ";

$result = $conn->query($sql);


if($result->num_rows == 1){
   
  // Verify the hash against the password entered
 if(password_verify($password, $hashpassword)){
    echo "logged in";
 } else {
    echo "Wrong password";
 }
}
  */
  
//$sql= "SELECT email , password from users where email = $email and password = $hashpassword";

//echo $result;


?>