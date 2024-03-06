<?php

function VarExist($var){
    if (isset($var)){
        return $var;
    }else{
        header("location:../index.html");
    }
}

$user=new stdClass();
$user->fullname=VarExist($_POST["fullname"]);
$user->username=VarExist($_POST["username"]);
$user->pass=VarExist($_POST["pass"]);
$user->sex=VarExist($_POST["gender"]);
$user->birthdate=VarExist($_POST["birthdate"]);


if (InsertUserToFilefromObject($user)) {
    header("location:../index.php");
    echo "Signup successful!";
} else {
    echo "Signup failed!";
}

function InsertUserToFilefromObject($user){
    $usersfile= file_get_contents('users.json');
    $userarray = json_decode($usersfile, true);

    $userarray[] = array(
        "fullname" => $user->fullname,
        "username" => $user->username,
        "password" => $user->pass,
        "sex" => $user->sex,
        "birthdate" => $user->birthdate,
        // "language" => $user->language
    );
    //print_r($userarray);

    $newuser = json_encode($userarray, JSON_PRETTY_PRINT);

    if (file_put_contents('users.json', $newuser)) {
        return true; //signup successful
    } else {
        return false; //signup failed
    }
}

?>