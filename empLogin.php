<?php
    include "config.php";

    if(isset($_POST['b_Submit'])){
        $id= mysqli_real_escape_string($con,$_POST['id']);
        $password= mysqli_real_escape_string($con,$_POST['password']);

        if ($id != "" && $password != ""){
            $sql_query = "select count(*) as cntUser from admin where admin_id='".$id."' and password='".$password."'";
            $result = mysqli_query($con,$sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];

            if($count > 0){
                $_SESSION['id'] = $id;                
                echo '<script>alert("Anda telah berjaya log masuk")</script>';
                
                echo '<script language="javascript">';
                echo 'window.location.href="dashboard.php";';
                echo'</script>';
            }
            else{
                echo '<script>alert("ID dan kata laluan tidak sah")</script>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="empLogin2.css">
</head>
<body>
        <div class="login">  
            <div class="logo" id="logo"></div>
            <div class="header">
               <h1>Log Masuk!</h1>
            </div>

            <form name="f_login" method="POST" action="">
                <div class="form-login">
                    <input type="text" id ="id" name="id" placeholder="ID">
                </div>
        
                <div class="form-login">
                    <input type="password" id ="password" name="password" placeholder="Kata Laluan">
                </div>

                <div class="button-login">
                    <button type="submit" id="b_Submit" name="b_Submit"  value="Login">Log Masuk</button>
                </div>
            </form>
</div>
</body>
</html>