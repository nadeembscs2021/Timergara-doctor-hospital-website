
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background: red;
          width:200px;
          height:200px;
          margin-left:300px;
          font-size:20px;
        }
        form{
            font-size:20px;
           
            margin-top:200px;
        }
      
    </style>
</head>
<body>

    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="">Username</label>
        <input type="text" name="username"><br>
        <label for="">age:</label>
        <input type="number" name="number" id=""><br>
        <label for="">Email:</label>
        <input type="email" name="email">
        
        <input type="submit" name="login">
    </form>
</body>
</html>
<?php
session_start();
include="";

$conn=mysqli_connect("localhost","root","","hospital_db");
$username= $_POST['username'];
$password= $_POST['password'];
$sql = "insert into(username, password)values
                    ($username, $password)";


try{
$result = mysqli_query($conn, $sql);
echo"The connection is successful";
}
catch(){
    echo"could not register";
}

include("database/config.php");
$sql = "select * from talble name";
$result = mysqli_qurey($conn,$sql);
if(mysql-_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo $row["id"];
        echo $row["name"];
        echo $row["password"];
    }
}
// if(isset($_POST['login'])){
//     $username = filter_input(INPUT_POST,"email", INPUT_VALIDATE_EMAIL);
//     if(empty($username)){
//         echo"that email is not valid";
//     }
//     else{
//         echo'that is your{$username}';
//     }

// }
/*
$password ='anwar';
$hash = password_hash($password,PASSWORD_DEFAULT);
echo $hash .'<br>';

if(password_verify("assd", $hash)){
    echo"You are login successfuly ";
}
else{
    echo"YOUR login is incorrect!.<br>";
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    echo"Hello";
}

session_unset();
session_destroy();
echo"session is destory ";
*/
/*
function is_even($number){
    $result = $number % 2;
   
    echo $result;
}
is_even(21);
*/


/*
if (isset($_POST["login"])){
    
    $foods = $_POST['foods'];
foreach($foods as $food){
echo $food;
}

} 


/*
if(isset($_POST["comfim"])){
    $cridt_card = null;

    if(isset($_POST["cridt_card"])){
        $cridt_card = $_POST["cridt_card"]; 
        
    }
    if($cridt_card == "Visa"){
        echo'You select Visa';
    }

    elseif($cridt_card == 'MasterCard'){
        echo"You selected MasterCard";
    }
    elseif($cridt_card == 'Pay_Pale'){
        echo"You selected Pay_pal";

    }

    else{
        echo"you don't select button";
    }
    
   

}*/




/*
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(empty($username)){
        echo"The username is empty";
    }
    elseif(empty($password)){
        echo'The password is missing ';
    }

    else{
        echo"Hello {$username}<br>";
        echo"{$password}";
    }

}
*/


// isset() is a function which is used to declear a variable when it value is true of we don't assign value to a variable it become null so it give falus value
// Empty() is a funtion which give us true value when varibale is not declared and null l
/*
$username = ;
if(empty($username)){
echo"the user name is not set ";
}
else {
    echo"The username is set ";
}*/




// $capitals = array("USA"=> "Washington D.C",
//                    "Pakistan"=> "Karachi",
//                    "Afghanistan"=> "Kabul");
//                    $capitals ["Pakistan"]= "Islamabad";
//                     $capitals["china"] ="Being";
           
// $capatial = $capitals[ $_POST["counter"]];
// echo $capatial;


// session_start();
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: login.php");
//     exit;
// }






?>
