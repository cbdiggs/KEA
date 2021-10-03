<?php
$name = "Cecilie";
$lastName = "Diggs";


function get_full_name(){
    return 'My name is Cecilie Diggs';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>
        <?= get_full_name(); ?>
    </h3>


    <h1>
        <?= $name; ?>
    </h1>
    <h2>
    <?= $lastName; ?>
    </h2>
</body>
</html>