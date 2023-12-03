<?php
    include "config.php";

    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
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
    <link rel="stylesheet" href="history.css">

</head>
<body>
        <div class="box">
            <div class="nav">
                    <img src="asset/logo.png" alt="deco" id="image" class="image"></img>
                
                    <ul class="navbar-nav ">
                        <li >
                            <a href="profile.php"><img src="icon/user.png" alt="icon" id="user" class="user" title="Profil"></a>
                        </li>
                        <li>
                            <a href="apply.php"><img src="icon/google-forms.png" alt="icon" id="form" class="form" title="Borang"></a>
                        </li>
                        <li>
                            <a href="#"  class="active"><img src="icon/history.png" alt="icon" id="history" class="history" title="Senarai Permohonan"></a>
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
                        <h1>SENARAI PERMOHONAN</h1>
                    </div>

                    <?php
                        $sql = "SELECT a.applier_id, a.email, s.s_id, s.pic, s.department, i.i_id, c.c_id, c.a_date, c.a_time, c.status FROM applier a CROSS JOIN student_details s, intern_details i, coordinator_details c WHERE a.email='$_SESSION[email]' AND a.applier_id=s.applier_id AND s.s_id=i.s_id AND i.i_id=c.i_id;";
                        $x = 1;  

                            if ($result = $con->query($sql)) {
                                echo "<table>";
                                    echo "<tr>";
                                        echo "<th>No.</th>";
                                        echo "<th>Gambar</th>";
                                        echo "<th>Maklumat Penuh</th>";
                                        echo "<th>Tarikh</th>";
                                        echo "<th>Masa</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Jabatan</th>";
                                echo "</tr>";

                                while ($row = $result->fetch_assoc()) {
                                    $field1name = $row["pic"];
                                    $field2name = $row["applier_id"];
                                    $field3name = $row["a_date"];
                                    $field4name = $row["a_time"];
                                    $field5name = $row["status"]; 
                                    $field6name = $row["department"]; 
                                    $field7name = $row["c_id"]; 
                                    $field8name = $row["s_id"]; 
                                    $field9name = $row["i_id"]; 
                                    $old_date_format = $field3name;
                                    $new_data_format = date("d-m-Y", strtotime($old_date_format));
                            
                                    echo '<tr> 
                                              <td>'. $x++ .'</td>
                                              <td><a href="adminPic.php?applier_id='.$field2name.'&s_id='. $field8name .'"><img src="profile_pic/'.$row['pic'].'"></a></td> 
                                              <td><button type="button" id="view"><a href="view.php?applier_id='. $field2name .'&s_id='. $field8name .'&i_id='. $field9name .'&c_id='. $field7name .'">Paparan</a></button></td> 
                                              <td>'.$new_data_format.'</td> 
                                              <td>'.$field4name.'</td> 
                                              <td>'.$field5name.'</td> 
                                              <td>'.$field6name.'</td> 
                                          </tr>';
                                }
                                $result->free();
                            } 
                    ?>
                
            
                </div>
        </div> 
</body>
</html>