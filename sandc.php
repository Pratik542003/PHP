<?php
session_start();

if(isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

if(isset($_POST["login"])) {
    $username = "pratik";
    $password = "12110432";

    if($_POST["username"] == $username && $_POST["password"] == $password) {
        $_SESSION["username"] = $username;
        $_SESSION["logged_in"] = true;

        $loginToken = "hijklm987654";
        setcookie("login_token", $loginToken, time() + (86400 * 30), "/");
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="sandc.css">
</head>
<body>
    <h1>Login Page</h1>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php if(isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
</body>
</html>
