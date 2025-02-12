<?php
$users = [
  ["login" => "defaultuser", "password" => "1234"],
  ["login" => "user2", "password" => "54321"],
];

function login($users)
{
  $login_input = readline("Login: ");
  $password_input = readline("Password: ");
  foreach ($users as $info) {
    if ($info["login"] == $login_input && $info["password"] == $password_input) {
      return true;
    }
  }
  return false;
}

function new_user($users){
  $new_user = readline("Username: ");
  $new_password = readline("Password: ");
  $users[] = ["login" => $new_user, "password" => $new_password];
  return $users;
}

$logged = login($users);

while (true) {
  if ($logged) {
    echo "Login successful!\n";
    break;
  } else {
    $attempts = readline("Login or Password is incorrect!\n Try again - Type 1\n Register a new user - Type 2 \n");
    switch ($attempts) {
      case 1:
        $logged = login($users);
        break;
      case 2:
        $users = new_user($users);
        echo "Registered user, ";
        $logged = true;
        break;
      default:
        exit();
    }
  }
}
