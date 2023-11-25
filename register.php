<?php
        include('config.php');

        if(isset($_POST["submit"])){

            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];

            $sql = "SELECT * FROM user WHERE email = '$email'";
            $duplicate = mysqli_query($conn,$sql);

            if(mysqli_num_rows($duplicate) >0){
                echo "<script> alert('This email has already been registered.');</script>";
            }
            else{
                if($password != $confirmpassword){
                    echo "<script> alert('Password does not match.');</script>";
                }

                else{
                    $query = "INSERT INTO user (name , email, password) VALUES ('$name' , '$email' , '$password')";
                    $result = mysqli_query($conn , $query);

                    if($result){
                        echo "<script> alert('Registration Successsful.'); </script>";
                        header("Location: home.html");
                    }
                    else{
                        echo"Error";
                    }
                }
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
            <h1>Register !</h1>
            <form action="" method="POST">
                <div class="form1">
                    <input type="text" name="name" placeholder="Fullname" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" id="" placeholder="Password" required>
                    <input type="password" name="confirmpassword" id="" placeholder="Confirm Password" required>
                </div>
                <div class="form2">
                    <input type="checkbox">
                    <p>I agree to the terms ans condition</p>
                </div>
                <button type="submit" name="submit"> Submit </button>
            </form>
        </div>
    </body>
</html>