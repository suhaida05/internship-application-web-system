<?php
    include "config.php";

    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
    } 

    if(isset($_POST['pro_user'])){
        $name =$_POST['name'];
        $ic =$_POST['ic'];
        $phone = $_POST["tel_no"];
        $bdate = $_POST["bdate"];
        $psw = $_POST["psw"];
        
        if(!empty($_POST['gender'])) {
            $gender = $_POST["gender"];
            $update="UPDATE applier
            
            SET name='$name', phone='$phone', gender='$gender', ic='$ic', bdate='$bdate', password='$psw' WHERE email='$_SESSION[email]' ";

            mysqli_query($con, $update) or die(mysqli_error());

            echo '<script>alert("Mengemas kini profil telah berjaya")</script>';
            echo '<script language="javascript">';
            echo'</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <title>Internship Website</title>
        <link rel="stylesheet" href="profile.css">
    </head>
    <body>
        <div class="box">
            <div class="nav">
                <img src="asset/logo.png" alt="deco" id="image" class="image"></img>
                    
                <ul class="navbar-nav ">
                    <li >
                        <a href="#" class="active"><img src="icon/user.png" alt="icon" id="user" class="user" title="Profil"></a>
                    </li>
                    <li>
                        <a href="apply.php"><img src="icon/google-forms.png" alt="icon" id="form" class="form" title="Borang"></a>
                    </li>
                    <li>
                        <a href="history.php"><img src="icon/history.png" alt="icon" id="history" class="history" title="Senarai Permohonan"></a>
                    </li>
                    <li>
                        <a href="logout.php"><img src="icon/logout.png" alt="icon" id="logout" class="logout" title="Log Keluar"></a>
                    </li>
                </ul>
            </div>

            <div class="nav2">        
                <p class="text">
                    <script type="text/javascript">
                        var myDate = new Date();

                        // Display day.
                        var myDay = myDate.getDay();
                        var weekday = ['Ahad', 'Isnin', 'Selasa','Rabu', 'Khamis', 'Jumaat', 'Sabtu'];
                        document.write(weekday[myDay]+", ");

                        // Display date.
                        var date = myDate.getDate();
                        var myMonth = myDate.getMonth();
                        var myYear = myDate.getFullYear();
                        var eachMonth = ['Januari', 'Februari', 'Mac','April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember'];
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
                        ?></p>
                    </span>
            </div>
                    
                <div class="box2">
                    <div class="edit_form">
                        <h1>PROFIL</h1>
                    </div>
                    
                    <hr> 

                    <?php
                        $query = mysqli_query($con, "SELECT * FROM applier WHERE email='$_SESSION[email]'") or die(mysqli_error());
                        $row = mysqli_fetch_array($query);
                    ?>
            
                    <form name="profile" method="POST" action="">       
                        <div class="form-login">
                            <table>
                                <tr>
                                    <td class="form_name">
                                        Nama
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td colspan="4">
                                        <input type="text" id ="name" name="name" value="<?php echo $row['name'];?>" > 
                                    </td>
                                </tr>

                                <tr>
                                    <td class="form_mail">
                                        E-Mel
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td colspan="4">
                                        <input type="email" id ="email" name="email" value="<?php echo $row['email'];?>" disabled>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="form_ic">
                                        No. IC/Pasport
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td width="22%">
                                        <input type="text" id ="ic" name="ic" value="<?php echo $row['ic'];?>" >
                                    </td>
                            
                                    <td class="form_phone">
                                        No. Telefon
                                    </td>
                                    <td width="1px" class="dot">
                                        :
                                    </td>
                                    <td width="38%">
                                        <input type="text" id ="phone" name="tel_no" value="<?php echo $row['phone'];?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td class="form_gender">
                                        Jantina
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <select id="gender" name="gender">
                                            <option value="<?php echo $row['gender'];?>" hidden><?php echo $row['gender'];?></option>
                                            <option value="Perempuan">Perempuan
                                            <option value="Lelaki">Lelaki
                                        </select>
                                    </td>
                                    <td class="form_bdate">
                                        Tarikh Lahir
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="date" id ="bdate" name="bdate" value="<?php echo $row['bdate'];?>" >
                                    </td>
                                </tr>

                                <tr>
                                    <td class="form_password">
                                        Kata Laluan
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td colspan="3">
                                        <input type="password" id ="password" name="psw" value="<?php echo $row['password'];?>"> 
                                    </td>
                                    <td>
                                        <div class="check">
                                            <input class="show" type="checkbox" onclick="myFunction()"> &nbsp;Papar Kata Laluan</span>  
                                        </div>    
                                    </td>
                                </tr>       
                            </table>

                            <div class="button-profile">
                                <button type="submit" id="b_Profile" name="pro_user"  value="Save">Simpan</button>
                            </div>

                            <script type="text/javascript">
                                function myFunction() {
                                    var x = document.getElementById("password"); 
                                    
                                    if (x.type === "password"){
                                        x.type = "text";
                                    } else {
                                        x.type = "password";
                                    }
                                }
                            </script>
                        </div>
                    </form>
                </div>
        </div> 
    </body>
</html>