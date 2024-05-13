<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>

    <!-- css connection -->
    <link rel="stylesheet" href="Css/style.css">

    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <?php include 'additional/header.php'; ?>

    
<?php
    include('./components/connect.php');

    if(isset($_POST['submit'])){
        $email = $_SESSION['user-email'];
        $old_pass = sha1($_POST['old_password']);
        $new_pass = sha1($_POST['new_pass']);
        $confirm_pass = sha1($_POST['cpass']);

        $select = mysqli_query($con, "SELECT * FROM grace_user WHERE email = '$email' AND password = '$old_pass'") or die('Query failed');
        
        if(mysqli_num_rows($select) > 0){
            if($new_pass === $confirm_pass){
                mysqli_query($con, "UPDATE grace_user SET password = '$new_pass' WHERE email = '$email'") or die('Query failed');

                echo "<script>alert('Password updated successfully!');</script>";
                echo "<script>window.location.href = 'update_profile.php';</script>";
                exit();
            } else {
                echo "<script>alert('New password and confirm password do not match!');</script>";
            }
        } else {
            echo "<script>alert('Old password is incorrect!');</script>";
        }
    }
?>

    <section>
        <div class="update-container">
            <form action="" method="post">
                <h1 style="text-align: center;">Update profile</h1>

                <label for="username">Username</label>
                <input type="text" id="username" name="name" required placeholder="Enter your username" maxlength="20" class="box" value="<?= $fetch_user["username"]; ?>">

                <input type="hidden" id="email" name="email" required placeholder="Enter your email" maxlength="50" class="box" value="<?= $fetch_user["email"]; ?>" oninput="this.value = this.value.replace(/\s/g, '')">

                <input type="hidden" name="prev_pass" value="<?= $fetch_user["password"]; ?>">

                <label for="old_password">Old Password</label>
                <input type="password" id="old_password" name="old_password" required placeholder="Enter your old password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_pass" required placeholder="Enter your new password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="cpass" required placeholder="Confirm your password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">

                <input type="submit" value="Update Profile" class="btn" name="submit">

            </form>

        </div>
    </section>
    <?php include 'additional/footer.php'; ?>
</body>

</html>
