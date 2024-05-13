<?php
include('./components/connect.php');
session_start(); 
$user_id = isset($_SESSION['user-id']) ? $_SESSION['user-id'] : null;

// Function to get the count of items in the cart
function getCartItemCount($user_id, $con) {
    $count_query = mysqli_query($con, "SELECT COUNT(*) AS count FROM cart WHERE user_id = '$user_id'");
    $count_row = mysqli_fetch_assoc($count_query);
    return $count_row['count'];
}
function getWishListItemCount($user_id, $con) {
    $count_query = mysqli_query($con, "SELECT COUNT(*) AS count FROM wishlist WHERE user_id = '$user_id'");
    $count_row = mysqli_fetch_assoc($count_query);
    return $count_row['count'];
}

if(isset($_GET['logout'])){
    unset($_SESSION['user-id']); // Make sure to unset the session variable correctly
    session_destroy();
    header('location:login.php');
}
?>


<header>
  <section class="flex">
          <div class="header-container">
            <div class="header-content">
              <a href="./home.php" class="header-logo"><img src="./img/Logo.png" alt="" width="300px" height="auto" /></a>
              <nav>
                <a href="./home.php">Home</a>
                <a href="./products.php">Shop All</a>
                <a href="./order.php">Order</a>
                <a href="./contact.php">Contact</a>
              </nav>
              <div class="header-btn">
                <?php if (!isset($user_id)): ?>
                <div class="login-register-btn">
                    <a href="./login.php"><button>Login</button></a>
                    <div>|</div>
                    <a href="./register.php"><button>Register</button></a>
                </div>
                <?php endif; ?>
                <div class="header-icons">
                    <a href="./wishlist.php" style="text-decoration: none; color: black;"><img src="./img/heart.svg" alt=""><span style="font-size: 12px;"> <?php if (isset($user_id)): ?>(<?php echo getWishListItemCount($user_id, $con) ?>)<?php endif; ?></span></a>
                    <a href="./cart.php" style="text-decoration: none; color: black;"><img src="./img/shopping-cart.svg" alt=""><span style="font-size: 12px;"><?php if (isset($user_id)): ?>(<?php echo getCartItemCount($user_id, $con); ?>)<?php endif; ?></span></a>
                    <img src="./img/user.svg" onclick="togglePopup()" alt="" style="cursor: pointer;">

                    <!-- Pop up -->
                    <div id="popupForm" class="pop-container">
                      <?php
                          if(isset($user_id)) {
                              $select_user = mysqli_query($con, "SELECT * FROM grace_user WHERE id = '$user_id'") or die("query failed");
                              if(mysqli_num_rows($select_user) > 0){
                                $fetch_user = mysqli_fetch_assoc($select_user);
                              }
                              echo '<div class="pop-content" style="text-align: center;">
                                      <h2>Welcome<br><span>' . $fetch_user['username'] . '</span></h2>
                                      <a href="./update_profile.php"><button onclick="updateProfile()">Update Profile</button></a>
                                      <a href="home.php?logout=' . $user_id . '" onclick="return confirm(\'Are you sure you want to logout?\')"><button class="logBtn">Log out</button></a>
                                    </div>';
                          } else {
                              echo '<div class="pop-content" style="text-align: center;">
                                      
                                      <a href="./login.php"><button style="cursor: pointer; width: 25vh; border: none; border-radius: 5px; padding: 10px 30px; background-color: black; color: white;">Login</button></a>
                                      <a href="./register.php"><button style="cursor: pointer; width: 25vh; border: none; border-radius: 5px; padding: 10px 30px; background-color: black; color: white;">Register</button></a>
                                    </div>';
                          }
                      ?>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </section>

  <script>
    function togglePopup() {
      var popup = document.getElementById("popupForm");
      if (popup.style.display === "none" || popup.style.display === "") {
        popup.style.display = "block";
      } else {
        popup.style.display = "none";
      }
    }
  </script>
  <script src="../js/script.js"></script>
</header>
