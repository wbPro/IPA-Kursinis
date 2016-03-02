<?php
    if(isset($_SESSION['userid']))
    {
        header("Location: LoginScreen.php");
    }

    if(isset($_POST['register']))
    {
        include_once("Database.php");

        $name = strip_tags($_POST['name']);
        $surname = strip_tags($_POST['surname']);
        $phonenr = strip_tags($_POST['phonenr']);
        $nickname = strip_tags($_POST['nickname']);
        $password = strip_tags($_POST['password']);
        $confirm_password = strip_tags($_POST['confirm_password']);
        $email = strip_tags($_POST['email']);

        $name = stripslashes($name);
        $surname = stripslashes($surname);
        $phonenr = stripslashes($phonenr);
        $nickname = stripslashes($nickname);
        $password = stripslashes($password);
        $confirm_password = stripslashes($confirm_password);
        $email = stripslashes($email);

        $name = mysqli_real_escape_string($dataBaseConnectionVariable, $name);
        $surname = mysqli_real_escape_string($dataBaseConnectionVariable, $surname);
        $phonenr = mysqli_real_escape_string($dataBaseConnectionVariable, $phonenr);
        $nickname = mysqli_real_escape_string($dataBaseConnectionVariable, $nickname);
        $password = mysqli_real_escape_string($dataBaseConnectionVariable, $password);
        $confirm_password = mysqli_real_escape_string($dataBaseConnectionVariable, $confirm_password);
        $email = mysqli_real_escape_string($dataBaseConnectionVariable, $email);

        $password = md5($password);
        $confirm_password = md5($confirm_password);

        $sql_storage = "INSERT into testUser (name, surname, nickname, email, phone, password)
                        VALUES ('$name', '$surname', '$nickname', '$email', '$phonenr', '$password')";

        $sql_check_username = "SELECT username FROM testUser WHERE username = '$nickname'";
        $sql_check_email = "SELECT email FROM testUser WHERE email = '$email'";

        $query_nickname = mysqli_query($dataBaseConnectionVariable, $sql_check_username);
        $query_email = mysqli_query($dataBaseConnectionVariable, $sql_check_email);

        if(mysqli_num_rows($query_nickname))
        {
            echo "There is already a user with that name!";
            return;
        }

        if($nickname == "")
        {
            echo "Please insert a user name!";
            return;
        }

        if($password == "" || $confirm_password == "")
        {
            echo "Please insert your password!";
            return;
        }

        if($password != $confirm_password)
        {
            echo "Passwords do not match!";
            return;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == "")
        {
            echo "This email is not valid";
            return;
        }

        if(mysqli_num_rows($query_email))
        {
            echo "Email is already in use!";
            return;
        }

        mysqli_query($dataBaseConnectionVariable, $sql_storage);

        header("Location: LoginScreen.php");


    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<style>
    form{
        display: inline;
    }
</style>
<body>
<h1>Registration</h1>
<form action="RegistrationPage.php" method="post" enctype="multipart/form-data" >
    <input type="text" name="name" placeholder="Name" autofocus>
    <input type="text" name="surname" placeholder="Surname">
    <input type="text" name="nickname" placeholder="User name">
    <input type="email" name="email" placeholder="E-mail Address">
    <input type="number" name="phonenr" placeholder="Phone number">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="confirm_password" placeholder="Confirm password">
    <input type="submit" name="register" value="Register">
</form>

<form action="LoginScreen.php">
    <input type="submit" name="back" value="< Back">
</form>

</body>
</html>
