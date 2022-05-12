<?php

include 'config.php';

error_reporting(0);

// session_start();

// if (isset($_SESSION['username'])) {
//     header("Location: homePage.php");
// }

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: homePage.php");
    } else {
        echo "<script>alert('Your email or password is incorrect. Please try again.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Batik - Login Page</title>
</head>

<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error'] ?>
    </div>
    <h1 class="title">
        Batik is Cool Database
    </h1>
    <div class="login-container">
        <form action="" method="POST" class="login-email">
            <h2 class="login-text">Login</h2>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="login-btn">Login</button>
            </div>
            <p class="login-bottom-text">Don't have an account? <a href="registrationPage.php">Register Here</a>.</p>
        </form>
    </div>
</body>

</html>