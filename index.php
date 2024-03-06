<?php
session_start();
session_unset();
session_destroy();

if (isset($_SESSION['user_id'])) {
    // header("Location: home.php");
    exit;
}

setcookie("language", "en", time() + 3600);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./frontend/styles/stylej.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">   
<title>Login</title>
</head>

<body>
    <div class="text">
        <h2>Welcome Back!</h2>
        

    </div>


    <div class="form-container">
        <div class="paragraph">
            <h2 class = "header">SIGN IN</h2>
            <form action="backend/login.php" method="POST" id="login-form">
                <label for="un">Username</label>
                <br>
                <input type="text" name="username" id="un" class="txtfield" onkeypress="checkEnter(event, 'pass')">
                <br>
                <label for="pass">Password</label>
                <br>
                <input type="password" name="password" id="pass" class="txtfield"
                    onkeypress="checkEnter(event, 'login-form')">
                <!-- <br> -->
                <h3 class ="header">FORGOT PASSWORD?</h3>
                <!-- <br> -->
                <input type="button" value="LOG IN" onclick="login()" class ="abutton">
                <!-- <input type="button" value="Cancel" onclick="ClearForm()"> -->
            </form>

            <a class ="header" style="text-decoration: none" href="./frontend/pages/signup.html">DON'T HAVE AN ACCOUNT? SIGN UP!</a>
        </div>
    </div>
    <div class="text">
    <img src= "./frontend/images/first.jpeg" class="img">

    </div>


    <script>
        function login() {
            var un = document.getElementById("un").value;
            var pass = document.getElementById("pass").value;
            if (un === "" || pass === "") {
                alert("You must fill in the username and the password!");
            } else {
                document.getElementById("login-form").submit();
            }
        }

        function ClearForm() {
            document.getElementById("un").value = "";
            document.getElementById("pass").value = "";
        }
        function checkEnter(event, nextField) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById(nextField).focus();

                if (nextField === 'login-form') {
                    login();
                }
            }
        }
    </script>
</body>

</html>