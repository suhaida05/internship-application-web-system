<?php
   include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="dist/sweetalert2.min.js"></script> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Internship Website</title>
        <link rel="stylesheet" href="update_password.css">
    </head>
    <body>
        <div class="update">  
            <div class="logo" id="logo"></div>

            <div class="header">
                <h1>Lupa Kata Laluan?</h1>
            </div>

            <form name="f_update" method="POST" action="update_password_process.php">
                <div class="text">
                    Sila masukkan e-mel anda dan kami akan hantar kata laluan anda.
                </div>
                
                <div class="form-update">
                    <input type="email" id ="email" name="email" placeholder="E-Mel">
                </div>

                <div class="button-update">
                    <button type="submit" id="submit" name="submit"  value="Submit" onclick="showAlert()">Hantar</button>
                </div>

                <script>
                    function showAlert() {
                        var myText = "Sila tunggu sebentar sehingga mesej 'Selesai' dipaparkan.";
                        alert(myText);
                    }
                </script>
            </form>

            <hr>

            <div class="register">
                <a href="register.php" id="register">Buat akaun baru</a>
            </div>
        </div>
    </body>
</html>