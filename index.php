<?php session_start();
if (empty($_SESSION['user'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
    <h2>
        Hello <?= $_SESSION['user']['email'] ?>
    </h2>
    <a href="logout.php">Logout</a>
</body>
</html>