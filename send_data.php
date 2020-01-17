<?php


require('config_mysqli.php');


extract($_POST);


$sql = "INSERT into contact (username,email,message,created_at) VALUES('" . $name . "','" . $email . "','" . $message . "','" . date('Y-m-d') . "')";


$success = $mysqli->query($sql);


if (!$success) {
    die("Erreur de transmission".$mysqli->error);
}


echo "Merci de votre message ";
header('Refresh: 2; URL = home_admin.php');

$conn->close();


?>
