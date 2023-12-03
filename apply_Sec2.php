<?php
    include "config.php";
    
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
    } 

    if(isset ($_POST ['apply'])){
        $start = $_POST['sdate'];
        $end = $_POST['edate'];
 
        $files = array_filter($_FILES['letter']['name']); //Use something similar before processing files.
        // Count the number of uploaded files in array
       $total_count = count($_FILES['letter']['name']);
        // Loop through every file
        for( $i=0 ; $i < $total_count ; $i++ ) {
            //The temp file path is obtained
            $tmpFilePath = $_FILES['letter']['tmp_name'][$i];
            //A file path needs to be present
           if ($tmpFilePath != ""){
                //Setup our new file path
                    $newFilePath = "file/" . $_FILES['letter']['name'][$i];
                //File is uploaded to temp dir
            }                
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $letter_name = $_FILES['letter']['name'][0];
                        $resume_name = $_FILES['letter']['name'][1];
                        $transcript_name = $_FILES['letter']['name'][2];
                        
                }
        }  $query = "INSERT INTO intern_details (applier_id, start_date, end_date, confirm_letter, resume, transcript) 
                        VALUES((SELECT applier_id FROM applier WHERE email='$_SESSION[email]'), '$start', '$end', '$letter_name', '$resume_name', '$transcript_name')";
                        mysqli_query($con, $query);
                        
                        echo '<script language="javascript">';
                        echo 'window.location.href="apply_Sec3.php";';
                        echo'</script>';
      
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
    <link rel="stylesheet" href="Sec2.css">
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
            <h1>INTERNSHIP DETAILS</h1>

            <span class="section">2/3</span>
        </div>

        <hr>

        <form name="apply" method="POST" action="" enctype="multipart/form-data">
            <div class="form-login">
                <label>Start <span class="mark">* </span>: </label><input type="date" id ="sdate" name="sdate" required>

                <label class="date">End <span class="mark">* </span>: </label><input type="date" id ="edate" name="edate" required>
            </div>

            <div class="form-login2">
                <label class="file">University / College Confirmation Letter <span class="mark">* </span>: <input type="file" id="letter" name="letter[]" required/>   
            </div>

            <div class="form-login2">
                <label class="file">Resume (include IC/Passport picture) <span class="mark">* </span>: <input type="file" id="resume" name="letter[]" required/>   
            </div>

            <div class="form-login2">
                <label class="file">Transcript (sem 1 until the latest) <span class="mark">* </span>: <input type="file" id="transcript" name="letter[]" required/>   
            </div>

            <div class="button-profile">
                <button type="submit" id="b_Apply" name="apply"  value="Next">Next</button>
            </div>
        </form>
    </div>
</body>
</html>



