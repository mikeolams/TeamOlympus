<?php
function login() {
    $errors = [];

    $input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    

    // If email is not set, or invalid
    if (! $input['email']) {
        $errors[] = "Please provide a valid email address";
    }

    // Since an invalid email ws provided, 
    // then we need do nothing futher


    if (empty($_POST['password'])) {

        // password was not filled, we have nothing else to do
        $errors[] = "The password field is required";
    }

    // If $errors is not empty, stop here
    if (! empty($errors)) {
        return [
            $errors, []
        ];
    }


    $users = get_users();
    $found  = false;

    foreach ($users as $user) {
        if ($user['email'] == $input['email']) {
            $found = true;
            $user_data = $user;
            break;
        }
    }

    if (! $found) {
        $errors[] = "Email not registered";
        return [
            $errors, []
        ];
    }


    // Do the passwords match?
    if (! password_verify($_POST['password'], $user_data['password'])) {
        $errors[] = "The password is invalid";
        return [$errors, []];
    }

    // At this point everything is okay
    // and $errors should be an empty array
    return [$errors, $user_data];

            
}

function register() {
    $errors = [];

   if (empty($_POST['name']) || strlen($_POST['name']) < 4) {
       $errors[] = "Please provide a Name, of at less 4 characters.";
   } else {
        // Sanitise the name
        $input['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
   }

    $input['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (empty($input['email'])) {
        $errors[] = "Please provide a valid email.";
    }

    $input['password'] = $_POST['password'];
    if (strlen($input['password']) < 4) {
        $errors[] = "Please provide a password not less than 4 characters";
    }

    if (!empty($errors)) {
        return [
            $errors, []
        ];
    }

    $users = get_users();

    foreach ($users as $user) {
        if ($user['email'] == $input['email']) {
            $errors[] = "Email already in use";
            break;
        }
    }
    if (!empty($errors)) {
        return [$errors, []];
    }

    $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);

    // Merge new users with old
    $users[] = $input;
   
   file_put_contents('users.json', json_encode($users));
  
  return [
    [], $input,
  ];
}



function get_users() {
    $file = @file_get_contents('users.json');
    //If file does not exist, or is empty 
    // $file will be NULL
    // so we should explicitly cast it to array
    return (array) json_decode($file, true);
}