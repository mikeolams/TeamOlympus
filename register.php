<?php
session_start();

if (!empty($_SESSION['user'])) {
  header("location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once "functions.php";

  list($errors, $result) = register();

  if (empty($errors) && !empty($result)) {
      $_SESSION['user'] = $result;
      header("location: index.php");
  }
}

?>
<!DOCTYPE html>

<html lang="en-US">
  <head>
      <meta charset="utf-8">
      <title>Team Olympus</title>
      <link rel="stylesheet" href="reset.css">
      <link rel="stylesheet" href="index.css">
      <link href="https://fonts.googleapis.com/css?family=Chilanka|Montserrat|Quicksand&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="left">
          <h1>
              Hello from<br/>Team Olympus!
          </h1>
    </div>

    <section class="main-section">
          <div class="welcome">
              <h3>Hey there!</h3>
              <p>Sign up</p>
          </div>

        <article>
          <?php if (!empty($errors)): ?>
            <ul class="errors">
            <?php foreach ($errors as $error): ?>
              <li> <?= $error ?> </li>
            <?php endforeach ?>
            </ul>
          <?php endif ?>
            <form class="Sign in" id="log in" method="post">
                <fieldset class="main-email">
                    <label for="Sign in email">Email Address</label>
                    <input class="email"
                          name="email" 
                           id="email"
                           type="email"
                           placeholder="your email address"
                           required
                           data-content="An email address is required" />
                </fieldset>

                <fieldset class="main-password">
                  <label for="Sign in password">Password</label>
                          <input class="password"
                          name="password"
                          type="password"
                          placeholder="password"
                          required
                          minlength="6"
                          data-content="A password is required. The password must be a series of alpha-numeric characters only."
                          data-role="validate"/>
                </fieldset>

                <div class="check">
                    <label>
                      <input
                      name="checkbox"
                      type="checkbox"/>Remember me
                    </label>
                </div>

                <fieldset class="main-submit">
                    <input class="submit"
                           id="email"
                           type="submit"
                           value="Sign up"/>
                </fieldset>
            </form>
        </article>
            <div class="or">
                    <hr class="bar"/>
                    <span>or continue with</span>
                    <hr class="bar"/>
            </div>

            <div class="container">
                <div class="facebook">
                    <a href="#">
                        <button>Facebook</button>
                    </a>
                </div>

                <div class="twitter">
                    <a href="#">
                        <button>Twitter</button>
                    </a>
                </div>

                <div class="google">
                    <a href="">
                        <button>Google+</button>
                    </a>
                </div>
            </div>


    </section>
  </body>
</html>
