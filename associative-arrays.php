<?php
//Multidimensional array
$users = [
    ['name' => 'A', 'email' => '@a', 'password' => 'passA'],
    ['name' => 'B', 'email' => '@b', 'password' => 'passB']
];

//Associative array
//$person = ['name' => 'Cecilie' , 'last_name' => 'Diggs'];
//echo $person['name'].' '.$person['last_name'];
//or
//echo "{$person['name']} {$person['last_name']}";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet.css">
    <title>Document</title>
</head>

<body>
    <div id="users">
    <?php
    foreach($users as $user){
      echo "<div class='user'>
              <div>{$user['name']}</div>
              <div>{$user['email']}</div>
              <div>{$user['password']}</div>
              <button>block user</button>
            </div>";
    }
    ?>

<!--  
<div id="users">
    <?php
    foreach($users as $user){
    ?>
      <div class='user'>
        <div><?= $user['name'] ?></div>
        <div><?= $user['email'] ?></div>
        <div><?= $user['password'] ?></div>
        <button>block user</button>
      </div>
    <?php
    }
    ?> 
-->

</div>
</body>
</html>

