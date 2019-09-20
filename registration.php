<?php
session_start();

// Redirect  logged in user to dashboard
if (!empty($_SESSION['user'])) {
    header("location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  require_once "functions.php";
  list($errors, $result) = register();

  // Save user to session and redirect to dashboard 
  // if login was successful
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
      <title>Team Olympus Users Registration Page</title>
      <link rel="stylesheet" href="reset.css">
      <link rel="stylesheet" href="Registration.css">
      <link href="https://fonts.googleapis.com/css?family=Chilanka|Montserrat|Quicksand&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="left">
          <h1>
              Hello from<br/>Team Olympus! Please Register
          </h1>
    </div>

    <section class="main-section">
          <div class="welcome">
              <h3>Hey there! Welcome</h3>
              <p> Please Sign up</p>
          </div>

        <article>
          <?php if (!empty($errors)): ?>
            <ul>
              <?php foreach ($errors as $error): ?>
                <li><?= $error ?> </li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
            <form method="post" class="Sign in" id="log in">
                <fieldset class="main-name">
                    <label for="Sign in email">Name</label>
                    <input class="email"
                          name="name" 
                           id="name"
                           type="text"
                           value="<?= $_POST['name'] ?? '' ?>" 
                           placeholder="your name"
                           required
                           data-content="Your name is required" />
                </fieldset>

                <fieldset class="main-email">
                    <label for="Sign in email">Email Address</label>
                    <input class="email"
                          name="email" 
                           id="email"
                           type="email"
                           value="<?= $_POST['email'] ?? '' ?>" 
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

                <!-- <div class="check">
                    <label>
                      <input
                      name="checkbox"
                      type="checkbox"/>Remember me
                    </label>
                </div> -->

                <fieldset class="main-submit">
                    <input class="submit"
                           id="email"
                           type="submit"
                           value="Sign up"/>
                </fieldset>
                <fieldset class="main-submit">
                        <a href="index.html"><input class="submit"
                               type="button"
                               value="Go to Sign In"/>
                               </a>
                    </fieldset>
            </form>
        </article>

    </section>
  </body>
</html>
