<?php
//APIs almost never reply with HTML
//API's almost always reply with JSON and HTTP status codes
//20x meas ok. We will use 200
//30x means redirect - in API's hardly used
//40x means client error - We will use 400
//50x means server error- We will use 500
// POST data to sign up
//http_response_code(400);
//the dot . means concatenation


//Validate the data
/*
if( ! isset( $_POST['name'] ) ){
    http_response_code(400);
    echo "name is required";
    exit(); //This stop the page from loading more if something is missing
}


// Count/Sizeof is used to get the number of elements in an array
if( strlen( $_POST['name'] ) < 2 ){
    http_response_code(400);
    echo "name must be at least 2 characters";
    exit();
}

if( strlen( $_POST['name'] ) > 5 ){
    http_response_code(400);
    echo "name cannot be more than 5 characters";
    exit();
}
*/

//Cleaning up the code with a function
//Validate Name
if( ! isset( $_POST['name'] ) ){ send_400('Name is required'); }
if( strlen( $_POST['name'] ) < 2 ){ send_400('Name must be at least 2 characters'); }
if( strlen( $_POST['name'] ) > 5 ){ send_400('Name cannot be more than 5 characters'); }


//Validate last_name
if( ! isset( $_POST['last_name'] ) ){ send_400('Last_name is required'); }
if( strlen( $_POST['last_name'] ) < 2 ){ send_400('Last_name must be at least 2 characters'); }
if( strlen( $_POST['last_name'] ) > 5 ){ send_400('Last_name cannot be more than 5 characters'); }

//Validate email
if( ! isset ( $_POST ['email'] )){ send_400('email is required');}
if( ! filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ){send_400('email is invalid');}

//Connect to DB
// include = selvom filen ikke er der forsætter den/ require = hvis filen ikke er der vil den ikke forsætte

$db = require_once('db.php');
try{

//insert data in the DB
$q = $db->prepare('INSERT INTO users VALUES(:user_id, :user_name, :user_lastname, :user_email)');
$q->bindValue(":user_id", null); //The db will give this automatic.
$q->bindValue(":user_name", $_POST['name']);
$q->bindValue(":user_lastname", $_POST['last_name']);
$q->bindValue(":user_email", $_POST['email']);
$q->execute();
$user_id = $db->lastinsertid();
// Success
header('Content-Type: application/json');
//echo '{"info":"user created" , "user_id":"'.$user_id.'"}';
$response = ["info"=>"user created", "user_id"=>$user_id];
echo json_encode($response);
// json_encode converts an code into 'english'


}catch(Exception $ex){
    http_response_code(500);
    echo 'System under manintainance';
    exit();
}

//function to manage responding in ase of an error 
function send_400($error_message){
    header('Content_type: application/json');
    http_response_code(400);
    $response = ["info"=>$error_message];
    echo json_encode($response);
    exit();
}