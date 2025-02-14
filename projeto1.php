<?php
$users = [
  ["login" => "defaultuser", "password" => "1234"],
  ["login" => "user2", "password" => "54321"],
];

$sales = [];

function login(&$users) 
{
  $login_input = readline("Login: ");
  $password_input = readline("Password: ");
  
  foreach ($users as $info) {
    if ($info["login"] == $login_input && $info["password"] == $password_input) {
      return $login_input;
    }
  }
  return false;
}

function new_user(&$users)
{
  $new_user = readline("Username: ");
  $new_password = readline("Password: ");
  
  $users[] = ["login" => $new_user, "password" => $new_password];
  echo "User registered successfully!\n\n";
}

$logged_user = login($users);

while (true) {
  if ($logged_user) {
    $choice = readline("Sale - Type 1 \n Logout - Type 2 \n Log - Type 3\n");

    switch ($choice) {
      case 1:
        $product = readline("Enter product: ");
        $sale_value = readline("Enter value: ");
        $sales[] = ["user" => $logged_user,  "product" => $product, "sale_value" => $sale_value, "date" => date("Y-m-d H:i:s")];
        echo "Sale recorded successfully!\n";
        break;

      case 2:
        echo "Logging out\n";
        $logged_user = login($users);
        break;

      case 3:
        print_r($sales);
        break;



      default:
        echo "Invalid option. Try again.\n";
        break;
    }
  } else {
    $attempt = readline("Login or password incorrect!\nTry again - Type 1\nRegister a new user - Type 2\n");

    switch ($attempt) {
      case 1:
        $logged_user = login($users);
        break;
      case 2:
        new_user($users);
        $logged_user = login($users);
        break;
      default:
        echo "Exiting...\n";
        exit();
    }
  }
}
