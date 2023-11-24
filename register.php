<?php
        include('config.php');
        // register php
        if (isset($_POST["submit"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];

        $check = "SELECT * FROM user WHERE name = '$name' OR email = '$email' ";
        $duplicate = mysqli_query($conn, $check);
        if (mysqli_num_rows($duplicate) > 0) {
            echo "<script> alert('Username or email has already been registered'); </script>";
            die("okay");
        }
        else {
            if ($password != $confirmpassword) {
                echo "<script> alert('Password does not match'); </script>";

            }
            
            else {
                $query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
                $result = mysqli_query($conn, $query);
                
                if ($result) {
                    echo "Registration Successful";
                }
                else {
                    echo "Error";
                }
            }
        }
    }
    mysqli_close($conn);
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
        <form action="hp.php">
            <div class="form1">
                <input type="text" name="name" placeholder="Fullname">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" id="" placeholder="Password">
                <input type="password" name="confirmpassword" id="" placeholder="Confirm Password">
            </div>
            <div class="form2">
                <input type="checkbox">
                <p>I agree to the terms ans condition</p>
            </div>
            <button type="submit"> Submit </button>
        </form>
    </div>

</body>

</html>