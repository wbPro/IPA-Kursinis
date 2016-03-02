<?php

session_start();
//
//if(!isset($_SESSION['iduser']))
//{
//    header("Location: LoginScreen.php");
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged In</title>
</head>
<body>
<h1>You have succesfully logged in!</h1>
<form action="LogoutPage.php">
    <input type="submit" name="logout" value="Logout">
</form>
</body>
</html>

