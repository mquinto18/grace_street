<?php

include('./components/connect.php');
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);

  
    $select = mysqli_query($con, "SELECT * FROM grace_user WHERE email = '$email' AND password = '$pass'") or die('query failed');
    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user-id'] = $row['id'];
        $_SESSION['user-email'] = $email;
        if ($row['role'] === 'admin') {
            header('Location: ./admin/dashboard.php');
            exit(); 
        }else if($row['role'] === 'employee'){
            header('Location: ./admin_employee/dashboard.php');
            exit(); 
        } else {
            header('Location: home.php');
            exit(); 
        }
    }else{
        echo "<script>alert('Incorrect password or email');</script>";
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
<body>
    <?php include 'additional/loginheader.php'; ?>
    <section>
        <div class="loginuser-container">
            <form action="" method="post">
                <h1 style="text-align: center;">Login Now</h1>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="pass" required placeholder="Enter your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                
                <input type="submit" value="Login Now" class="btn" name="submit">
                
                <p style="text-align: center;">Don't have an account? <a href="register.php">Register</a></p>
            </form>

        </div>
    </section>
    <?php include 'additional/footer.php'; ?>
</body>
</html>
