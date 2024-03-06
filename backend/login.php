<?php
session_start();

// Clear any existing session data
session_unset();
session_destroy();

// Initialize a new session
session_start();

$dbhost = "127.0.0.1";
$dbname = "capstone";
$dbuser = "root";
$dbpass = "";

try {
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT ID FROM user WHERE username=:username AND password=:password";
$stmt = $db->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

$rowCount = $stmt->rowCount();

if ($rowCount > 0) {
    $row = $stmt->fetch();
    $id = $row["ID"];
    $_SESSION["user_id"] = $id; // Changed 'id' to 'user_id' to match later checks
    $_SESSION["username"] = $username;
    // if ($username=="admin"){
    //     header("location:../BE/admin.php");
    // }
    
        header("location:../frontend/ppp.html");

    
} else {
    header("location:../index.php");
}

// Setting the language cookie
setcookie("language", "en", time() + 3600);
?>