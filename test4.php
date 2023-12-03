<?php
    include "config.php";
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Internship Website</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="intern3.css">
<!-- jQuery -->
<script type="text/javascript"
	src="https://code.jquery.com/jquery-3.5.1.js">
</script>

<!-- DataTables CSS-->
<link rel="stylesheet"
		href=
"https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> 

<!-- DataTables JS -->
<script src=
"https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
</script>
<script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#intern #list").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

  // Initialize the DataTable
</script>   
<style>
	/*th {
	text-align:left;
	}*/
</style>
</head>

<body>
<div class="box">
<div class="nav"><img src="asset/logo.png" alt="deco" id="image">
                
                <ul class="navbar-nav ">
                    <li >
                        <a href="dashboard.php" class="dashboard">Dashboard</a>
                    </li>
                    <li>
                        <a class="manage" href="manage_intern.php">Senarai Permohonan</a>
                    </li>
                    <li>
                        <a class="active" href="#">Pelajar Praktikal</a>
                    </li>
                    <li>
                        <a  class="finished" href="finished.php">Alumni</a>
                    </li>
                    <li>
                        <a href="logout.php"><img src="icon/logout.png" alt="icon" id="logout" class="logout" title="Log Keluar"></a>
                    </li>
                </ul>
            </div>
                <div class="box2"></div>
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
                                $query = mysqli_query($con, "SELECT * FROM admin WHERE admin_id='$_SESSION[id]'") or die(mysqli_error());
                                $fetch = mysqli_fetch_array($query);
                                echo $fetch['a_name'];
                            ?></p>
                        </span>
                        </div>
                        <p class="title">Senarai Pelajar Praktikal</p>
                        <div class="box3">  
                         <!--   <div class="search"><label class="search">Carian: </label><input type="text" id="myInput" onkeyup="myFunction()" title="Type in a name"></div>
 HTML table with random data -->
<?php
                            //SELECT a.applier_id, a.email, s.s_id, s.pic, s.department, i.i_id, c.c_id, c.a_date, c.a_time, c.status FROM applier a CROSS JOIN student_details s, intern_details i, coordinator_details c WHERE a.email='$_SESSION[email]' AND a.applier_id=s.applier_id AND s.s_id=i.s_id AND i.i_id=c.i_id;
                            $sql = "SELECT DISTINCT a.applier_id, a.name, s.pic, s.s_id, s.programme, i.i_id, i.start_date, i.end_date, i.confirm_letter, i.resume, i.transcript, s.department, c.c_id FROM applier a CROSS JOIN student_details s, intern_details i, coordinator_details c WHERE c.status = 'Diluluskan' AND a.applier_id=s.applier_id and s.s_id=i.s_id AND i.i_id=c.i_id and i.end_date >= CURDATE() ORDER BY i.start_date;";

                           // $sql = "SELECT a.* , s.*, i.*, c.* FROM applier a,student_details s, intern_details i, coordinator_details c WHERE i.end_date > CURDATE() and c.status = 'Approved' and a.applier_id=s.applier_id and s.applier_id=i.applier_id and s.applier_id=c.applier_id";
                            $x = 1;  
                           
                           if($result = mysqli_query($con, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    echo "<table id='tableID' class='display nowrap'>";
                                    //echo " <tbody id='intern'>";
                                    echo"<thead>";
                                        echo "<tr>";
                                            echo "<th>No.</th>";
                                            echo "<th>Nama</th>";
                                            echo "<th>Gambar</th>";
                                            echo "<th>Program</th>";
                                            echo "<th>Mula</th>";
                                            echo "<th>Tamat</th>";
                                            echo "<th>Maklumat Penuh</th>";
                                            echo "<th>Surat Pengesahan</th>";
                                            echo "<th>Resume</th>";
                                            echo "<th>Transkrip</th>";
                                            echo "<th>Jabatan</th>";
                                            echo "<th>Padam</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tbody>";
                                        echo "<tr>";
                                            echo"<td>" . $x++ ."</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            //echo "<td><a href='adminPic.php?applier_id=". $row['applier_id'] ."'>" . $row['pic'] . "</a></td>";
                                            echo "<td><a href='adminPic.php?applier_id=". $row['applier_id'] ."&s_id=". $row['s_id'] ."'><img src='profile_pic/".$row['pic']."'></a></td>";  
                                            echo "<td>" . $row['programme'] . "</td>";
                                            $old_date_format = $row['start_date'];
                                            $new_data_format = date("d-m-Y", strtotime($old_date_format));
                                            echo "<td>" . $new_data_format . "</td>";
                                            $odf = $row['end_date'];
                                            $ndf = date("d-m-Y", strtotime($odf));
                                            echo "<td>" . $ndf . "</td>";
                                            echo "<td> <button type='button' id='view'><a href='view.php?applier_id=". $row['applier_id'] ."&s_id=". $row['s_id'] ."&i_id=". $row['i_id'] ."&c_id=". $row['c_id'] ."'>Paparan</a></button> </td>";
                                            echo "<td><a href='adminView.php?applier_id=". $row['applier_id'] ."&i_id=". $row['i_id'] ."'>" . $row['confirm_letter'] . "</a></td>";
                                            echo "<td><a href='adminResume.php?applier_id=". $row['applier_id'] ."&i_id=". $row['i_id'] ."'>" . $row['resume'] . "</a>  </td>";
                                            echo "<td><a href='adminTranscript.php?applier_id=". $row['applier_id'] ."&i_id=". $row['i_id'] ."'>" . $row['transcript'] . "</a>  </td>";
                                            echo "<td>" . $row['department'] . "</td>";
                                            echo "<td> <button type='button' id='delete'><a href='delete.php?applier_id=". $row['applier_id'] ."&s_id=". $row['s_id'] ."&i_id=". $row['i_id'] ."&c_id=". $row['c_id'] ."'>Padam</a></button> </td>";
                                        echo "</tr>";
                                    }
                                    echo " </tbody>";
                                    echo "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                } }
                            ?>
<script>
$('#tableID').DataTable( {
    language: { search: "Carian: " },
    pageLength: 5
} );



</script>
</body>

</html>
