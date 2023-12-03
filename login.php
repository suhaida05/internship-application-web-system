<?php
    include "config.php";

    if(isset($_POST['b_Submit'])){
        $email= mysqli_real_escape_string($con,$_POST['email']);
        $password= mysqli_real_escape_string($con,$_POST['password']);

        if ($email != "" && $password != ""){
            $sql_query = "select count(*) as cntUser from applier where email='".$email."' and password='".$password."'";
            $result = mysqli_query($con,$sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];

            if($count > 0){
                $_SESSION['email'] = $email; 
                           
                echo '<script>alert("Berjaya log masuk")</script>';
                
                echo '<script language="javascript">';
                echo 'window.location.href="profile.php";';
                echo'</script>';
            }
            else{
                echo '<script>alert("Nama pengguna dan kata laluan tidak sah")</script>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Internship Website</title>
        <link rel="stylesheet" href="login2.css">
    </head>
    <body>
        <div class="container">
            <div class="image">
                <img src="asset/login.png" alt="deco" id="image">
            </div>

            <div class="login">  
                <div class="logo" id="logo"></div>
                <div class="header">
                <h1>Log Masuk!</h1>
                </div>

                <form name="f_login" method="POST" action="">
                    <div class="form-login">
                        <input type="email" id ="email" name="email" placeholder="Masukkan alamat e-mel...">
                    </div>
            
                    <div class="form-login">
                        <input type="password" id ="password" name="password" placeholder="Kata laluan...">
                    </div>

                    <div class="button-login">
                        <button type="submit" id="b_Submit" name="b_Submit"  value="Login">Log Masuk</button>
                    </div>
                </form>

                <hr>

                <div class="text">
                    <div class="update">
                    <a href="update_password.php" id="update">Lupa kata laluan?</a>
                    </div>

                    <div class="register">
                    <a href="register.php" id="register">Buat akaun!</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>