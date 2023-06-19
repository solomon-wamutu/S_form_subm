<?php
session_start();
include('config.php');
if(isset($_POST['login'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$pass = md5(sha1($_POST['pass']));

$sel = "SELECT * FROM form WHERE name = ?";
$stmt = $mysqli->prepare($sel);
$stmt ->bind_param("s", $name);
$stmt ->execute();
$res = $stmt ->get_result();
 if($res -> num_rows > 0){
    $error = "Dublicate username and password";
    $del = "DELETE FROM form WHERE name = ?";
    $stmt = $mysqli -> prepare($del);
    $stmt ->bind_param("s",$name);
    $name = "solomon Wamutu";
    $stmt -> execute();

 }

 else{
$ins = "INSERT INTO `form` (name, email, pass) VALUES (?,?,?)";
$stmt=$mysqli->prepare($ins);
$rs = $stmt->bind_param('sss',$name,$email,$pass);
$stmt->execute(); 

// if($stmt){
    $success = "Successfully logged in";
// }
// else {
//     $error = "failed to login";
// }
 }

// $conn = mysqli_connect('localhost','root','','tests');
// if($conn == true){
//     $stmt = $conn->prepare("insert into registration(name,email,pass) values(?,?,?)");
//     $stmt->bind_param("sss",$name,$email,$pass);
//     $stmt->execute();
//     echo "Connection established";
    // $stmt->close();
    // $conn->close();
// }
// }
// else {
//     die("Connection failed" . mysqli_connect_error());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php include ("head.php"); ?>
    <!-- <title>Document</title>
</head> -->
<body>

    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="index.php" method="post">
                    <h2>Login</h2>
                    <div class="input-box">
                        
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name = "name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email"name = "email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name= "pass" required>
                        <label for="pass">Password</label>
                    </div>
                    
                        <div class="forget">
                            <label for=""><input type="checkbox">Remember me</label><a href="#">Forgot Password</a>
                            
                        </div>
                        <input type="submit" value="Login" name = "login">
                        <div class="register">
                            <p>Don't have an account <a href="#">Register</a></p>
                        </div>
                </form>
            </div>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>