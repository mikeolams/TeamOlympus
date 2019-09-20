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
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title> Team Olympus</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
      <main class='main-container'>
      <div class="svg left">
          <h1>
              Hello from<br/>Team Olympus!
          </h1>
    <!-- <img src="https://res.cloudinary.com/kai123/image/upload/v1568848018/HNG/HNG_task1_z4pzu9.png"/>  -->
  </div>
      <div class='login-container'>
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
            <label> Email Address: <input class="type1" name="email" type="text" value="email" placeholder="your email address" autofocus /> </label>
               <label> Password: <input class="type2" name= "password" type="password" placeholder="password" autofocus/> </label>
               <div class="lower">
                  <label> <input class="type3" name="checkbox" type="checkbox"/> Remember Me</label>
               <div class="button">
                        <input class="type4" type="submit" value="Sign In"/> </div>
                        <div class="lower2">
                            <div class="or">
                                <hr class="bar"/>
                                <span>or log in with</span>
                                <hr class="bar"/>
                        </div>
            
                        <div class="container-option">
                            <div class="facebook">
                                <a href="">
                                    <button>Facebook</button>
                                </a>
                            </div>
            
                            <div class="twitter">
                                <a href="">
                                    <button>Twitter</button>
                                </a>
                            </div>
            
                            <div class="google">
                                <a href="">
                                    <button>Google+</button>
                                </a>
                            </div>
                        </div>
                        </div>
                        
                    <div class="lower2">
                        <p class="lower3"> Don't have an account? <a href="registration.html">Sign up</a></p></div>
                    </div>
                   </form>
                  </div>
                </div>
           </main>
    </body>
</html>
