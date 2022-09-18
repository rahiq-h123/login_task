<?php include'config.php' ?>

<?php


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashpassword =password_hash($password, PASSWORD_DEFAULT);
 //Insert 
 $sql = "INSERT INTO users (name, email, password)
 VALUES ('$name', '$email', '$hashpassword')";

if ($conn->query($sql) === TRUE) {
 echo "registration succeeded";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}


?>

