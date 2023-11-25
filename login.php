<?php
    include("config.php");

    if(isset($_POST["submit"])){

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){

            $row = mysqli_fetch_assoc($result);
            if($row['password'] === $password){
                echo "<script> alert('Login Sucessful'); </script>";
                header("Location: home.html");
            }
            else{
                echo "<script> alert('Incorrect password LOL');</script>";
            } 
        }
        else{
            echo "<script> alert('User not registered !!!'); </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend</title>
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <div class="container">
        <h1>Login !</h1>
        <form action="" method="POST">
            <div class="form1">
                <input type="text" name="name" placeholder="Fullname" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" id="" placeholder="Password" required>
            </div>
            <div class="form2">
                <input type="checkbox">
                <p>I agree to the terms ans condition</p>
            </div>
            <button type="submit" name="submit"> Submit </button>
            <p>Don't have an account ??</p><a href="register.php">Clik Here to register</a>
        </form>
    </div>
</body>
</html>