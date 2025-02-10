<?php
  $users = [
    ["login" => "defaultuser", "password" => "1234"],
    ["login" => "user2", "password" => "54321"],
  ];

  function login($users) {
    $login_input = readline("Login: ");
    $password_input = readline("Password: ");
      foreach ($users as $info) {
        if ($info["login"] == $login_input && $info["password"] == $password_input) {
          return true; 
        }
      }
      return false; 
    }

  $logged = login($users);

  if ($logged) {
      echo "Login successful!\n";
  } else {
      $attempts = readline("Login or Password is incorrect!\n Try again - Type 1\n Register a new user - Type 2 \n");
        switch ($attempts) {
          case 1:
            login($users);
            $logged = true;
              if ($logged) {
                echo "Login successful!\n";
                break;
            }           

          case 2:
            echo  "n fiz ainda";
            break;
          default:
        }

  }
?>
