<?php
session_start();

// we should redirect an already logged in user
if (!empty($_SESSION['user'])) {
    header("location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "functions.php";

    list($errors, $result) = login();
    if (empty($errors)) {
        $_SESSION['user'] = $result;
        header("location: index.php");
    }
} 
?>
<!Doctype html>
<html>
    <head>
        <title> Team Olympus</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
      <div class="svg"> <img src="undraw.svg"/> </div>
      <div class="firstParagraph">
          <p class="paragraph1">Welcome Back!</p
            ></div>
      <div class="secondParagraph"><p class="paragraph2">Sign in to your account</p></div>
      <div class="container">
        <?php if(!empty($errors)): ?>
            <ul class="errors">
                <h4>Correct the following errors:</h4>
            <?php foreach($errors as $errors): ?>
                <li><?= $errors ?></li>
            <?php endforeach ?>
            </ul>
        <?php endif ?>
        <form method="post">
          <label> Email Address: <input class="type1" name="email" type="text" value="<?= $_POST['email'] ?? '' ?>" placeholder="Your email address" autofocus /> </label>
              <label> Password: <input class="type2" name= "password" type="password" placeholder="Password" autofocus/> </label>
              <div class="lower">
                <label> <input class="type3" name="checkbox" type="checkbox"/> Remember Me</label>
              <div class="button">
                <input class="type4" type="submit" value="Sign In"/> 
              </div>
                <div class="lower2">
                  <p class="lower3"> Don't have an account? <a href="#">Sign up</a></p>
                </div>
              </div>
          </form>
           
      </div>
    </body>
</html>
