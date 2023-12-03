<?php

include('config.php');

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
} 

if (isset($_POST['apply'])) {
    // receive all input values from the form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $address3 = $_POST['address3'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ophone = $_POST['ophone'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $errors = array(); 
  
    if (count($errors) == 0) {
        $query = "INSERT INTO coordinator_details (applier_id, c_name, c_email, c_phone, office_phone, c_address, c_address2, c_address3, c_postcode, c_city, c_state, status) 
                  VALUES((SELECT applier_id FROM applier WHERE email='$_SESSION[email]'), '$name', '$email', '$phone', '$ophone', '$address', '$address2', '$address3', '$postcode', '$city', '$state', 'Pending...')";

        mysqli_query($con, $query);
           
        echo '<script language="javascript">';
        echo 'window.location.href="thank_you.php";';
        echo'</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Internship Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="Sec3(1).css">
</head>
<body>
    <div class="box">
        <div class="nav">
                    <img src="asset/logo.png" alt="deco" id="image" class="image"></img>
                
                    <ul class="navbar-nav ">
                        <li >
                            <a href="profile.php"><img src="icon/user.png" alt="icon" id="user" class="user" title="Profile"></a>
                        </li>
                        <li>
                            <a href="#" class="active"><img src="icon/google-forms.png" alt="icon" id="form" class="form" title="Form"></a>
                        </li>
                        <li>
                            <a href="history.php"><img src="icon/history.png" alt="icon" id="history" class="history" title="History"></a>
                        </li>
                        <li>
                            <a href="logout.php"><img src="icon/logout.png" alt="icon" id="logout" class="logout" title="Logout"></a>
                        </li>
                    </ul>
                </div>

    <div class="nav2">
        <p class="text">

            <script type="text/javascript">
                var myDate = new Date();

                // Display day.
                var myDay = myDate.getDay();
                var weekday = ['Sunday', 'Monday', 'Tuesday','Wednesday', 'Thursday', 'Friday', 'Saturday'];
                document.write(weekday[myDay]+", ");

                // Display date.
                var date = myDate.getDate();
                var myMonth = myDate.getMonth();
                var myYear = myDate.getFullYear();
                var eachMonth = ['January', 'February', 'March','April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                document.write(date + " " + eachMonth[myMonth] + " " + myYear + ", ");
            </script>
                    
            <span id="time">
                <script type="text/javascript">
                    function display_ct6() {
                        var x = new Date()
                        var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
                        var hour=x.getHours();
                        var minute=x.getMinutes();
                        var second=x.getSeconds();

                        if(hour <10 ){hour='0'+hour;}
                        if(minute <10 ) {minute='0' + minute; }
                        if(second<10){second='0' + second;}

                        var x3 = hour+':'+minute+':'+second + ampm;
                        document.getElementById('time').innerHTML = x3;
                        display_c6();
                    }

                    function display_c6(){
                        var refresh=100; // Refresh rate in milli seconds
                        mytime=setTimeout('display_ct6()',refresh)
                    }
                    
                    display_ct6()
                </script>
            </span>
                    
            <span class="name">
                <?php
                    $query = mysqli_query($con, "SELECT name FROM applier WHERE email='$_SESSION[email]'") or die(mysqli_error());
                    $fetch = mysqli_fetch_array($query);
                    echo $fetch['name'];
                ?>
            </span>
        </p>
    </div>

    <div class="box2">
        <div class="edit_form">
            <h1>COORDINATOR DETAILS</h1>

            <span class="section">3/3</span>
        </div>

        <hr>

        <form name="apply" method="POST" action="">
            <div class="form-login">
                <label>Coordinator Name <span class="mark">* </span>: </label><input type="text" id ="name" name="name" required>

                <label class="address">Address 1 <span class="mark">* </span>: </label><input type="text" id ="address" name="address" required>
            </div>

            <div class="form-login">
                <label>Email <span class="mark">* </span>: </label><input type="text" id ="email" name="email" required>

                <label class="address">Address 2 : </label><input type="text" id ="address2" name="address2">
            </div>

            <div class="form-login">
                <label>Phone No. <span class="mark">* </span>: </label><input type="text" id ="phone" name="phone" required>

                <label class="address">Address 3 : </label><input type="text" id ="address3" name="address3">
            </div>

            <div class="form-login">
                <label>Office Phone No. : </label><input type="text" id ="ophone" name="ophone">

                <label class="postcode">Postcode <span class="mark">* </span>: </label><input type="text" id ="postcode" name="postcode" required>
            </div>

            <div class="form-login2">
                <label>City <span class="mark">* </span>: </label><input type="text" id="city" name="city" required>
            </div>

            <div class="form-login2">
                <label>State <span class="mark">* </span>: </label><input type="text" id="state" name="state" required>
            </div>

            <div class="button-profile">
                <button type="submit" id="b_Apply" name="apply"  value="Apply">Apply</button>
            </div>
        </form>
    </div>
</body>
</html>



