<?php
    include('./components/connect.php');
    session_start();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = sha1($_POST['pass']);
        $cpass = sha1($_POST['cpass']);

        // Check if username or email already exists
        $select = mysqli_query($con, "SELECT * FROM grace_user WHERE username = '$name' OR email = '$email'") or die('Query failed');

        if (mysqli_num_rows($select) > 0) {
            echo "<script>alert('User already exists');</script>";
        } else {
            mysqli_query($con, "INSERT INTO grace_user (username, email, password) VALUES ('$name', '$email', '$pass')") or die('Query failed');

            // Alert and redirect using JavaScript
            echo "<script>alert('Registered successfully, login now please!'); window.location.href = 'login.php';</script>";
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- css connection -->
    <link rel="stylesheet" href="Css/style.css">

    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<style>
    
</style>
<body>
    <?php include 'additional/loginheader.php'; ?>
    <section>
        <div class="registeruser-container">
        <form action="" method="post">
            <h1 style="text-align: center;">Register now</h1>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="name" required placeholder="Enter your username" maxlength="20" class="box">
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="pass" required placeholder="Enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="cpass" required placeholder="Confirm your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            
            <input type="submit" value="Register now" class="btn" name="submit">
            
            <p style="text-align: center;">Already have an account? <a href="login.php">Login</a></p>
        </form>

        </div>
    </section>
    <?php include 'additional/footer.php'; ?>
</body>
</html>
