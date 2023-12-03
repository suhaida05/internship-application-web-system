<?php
include('config.php');

if (isset($_POST['reg_user'])) {
    $name = $_POST['name'];
    $ic = $_POST['ic'];
    $phone = $_POST['tel_no'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $bdate = $_POST['bdate'];
    $password = $_POST['psw'];
    $errors = array(); 
  
    $user_check_query = "SELECT * FROM applier WHERE email='$email'";
    $sql=mysqli_query($con,"SELECT * FROM applier where email='$email'");

    if(mysqli_num_rows($sql)>0){
        echo('<script>alert("E-Mel sudah wujud!")</script>');
        echo '<script language="javascript">';
        echo 'window.location.href="register.php";';
        echo'</script>';
        die;
    }
  
    if (count($errors) == 0) {
        $query = "INSERT INTO applier (name, ic, phone, gender, email, password, bdate) 
        VALUES('$name', '$ic', '$phone', '$gender', '$email', '$password', '$bdate')";
        mysqli_query($con, $query);
        $_SESSION['email'] = $email;

        echo '<script>alert("Daftar akaun telah berjaya")</script>';        
        echo '<script language="javascript">';
        echo 'window.location.href="profile.php";';
        echo'</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Internship Website</title>
        <link rel="stylesheet" href="register2.css">
    </head>
    <body>
        <div class="container">
            <div class="image">
                <img src="asset/signup.png" alt="deco" id="image">
            </div>

            <div class="register">  
                <div class="logo" id="logo"></div>
                
                <div class="header">
                <h1>Daftar!</h1>
                </div>

                <form name="register" method="POST" action="">
                    <input type="hidden" id="id" name="id"></input>

                    <div class="form-login">
                        <input type="text" id ="name" name="name" placeholder="Nama Penuh" required>
                    </div>

                    <div class="form-login">
                        <input type="email" id ="email" name="email" placeholder="Alamat E-Mel" required>
                    </div>
                    
                    <div class="form-login2">
                        <input type="text" id ="ic" name="ic" placeholder="No. IC/Pasport" required>
                        
                        <input type="text" id ="phone" name="tel_no" placeholder="No. Telefon" required>
                    </div>
        
                    <div class="form-login3">
                        <span class="text">Jantina:</span>
                        <select id="gender" name="gender" required>
                            <option value="Perempuan">Perempuan
                            <option value="Lelaki">Lelaki
                        </select>

                        <span class="text2">Tarikh Lahir:</span>
                        <input type="date" id ="bdate" name="bdate" required>
                    </div>
                
                    <div class="form-login">
                        <input type="password" id ="password" name="psw" placeholder="Kata Laluan" required> 
                    </div>

                    <div class="button-register">
                        <button type="submit" id="b_Register" name="reg_user"  value="Register">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
