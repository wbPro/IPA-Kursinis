<?php
    session_start();

    if(isset($_POST['login']))
    {
//        include_once("Database.php");
//
//        $nickname = strip_tags($_POST['nickname']);
//        $password = strip_tags($_POST['password']);
//
//        $nickname = stripslashes($nickname);
//        $password = stripslashes($password);
//
//        $nickname = mysqli_real_escape_string($dataBaseConnectionVariable, $nickname);
//        $password = mysqli_real_escape_string($dataBaseConnectionVariable, $password);
//
//        $password = md5($password);
//
//        $sql = "SELECT iduser, nickname, password FROM testUser WHERE nickname = '$nickname' LIMIT 1";
//        $query = mysqli_query($dataBaseConnectionVariable, $sql);
//
//        $row = mysqli_fetch_array($query);
//        $id = $row['iduser'];
//        $db_password = $row['password'];
//
//        if($password == $db_password)
//        {
//            $_SESSION['nickname'] = $nickname;
//            $_SESSION['iduser'] = $id;
            header("Location: LoggedInPage.php");
//        }
//        else{
//            echo "You didn't enter the correct username or password.";
//        }
    }


//?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<style>
    form{
        display: inline;
    }
</style>
<body>
<h1>Login</h1>
<form action="LoginScreen.php" method="POST">
    <input type="text" name="nickname" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" value="Login">
</form>
<form action = "RegistrationPage.php">
    <input type="submit" value="Sign Up">
</form>

</body>
</html>
