<?php
require_once('config.php');
 
$sql = "SELECT a.* , s.*, i.*, c.* FROM applier a CROSS JOIN student_details s, intern_details i, coordinator_details c WHERE i.end_date < CURDATE() and c.status = 'Diluluskan' AND a.applier_id=s.applier_id AND s.s_id=i.s_id AND i.i_id=c.i_id ORDER BY end_date";
$x = 1;
$result = $con->query($sql);
$arr_users = [];
if ($result->num_rows > 0) {
    $arr_users = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internship Website</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="test6.css">

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
                        <a class="intern" href="intern.php">Pelajar Praktikal</a>
                    </li>
                    <li>
                        <a  class="active" href="#">Alumni</a>
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
                            <div class="table">
    <table id="userTable" class="display" style="width:100%">
        <thead>
            <th id="no">No.</th>
            <th>Nama</th>
           <!--<th >Gambar</th>-->
            <th>Program</th>
            <th>Mula</th>
            <th>Tamat</th>
            <th>Maklumat Penuh</th>
            <th>Surat Pengesahan</th>
            <th>Resume</th>
            <th>Transkrip</th>
            <th>Jabatan</th>
        </thead>
        <tbody>
            <?php if(!empty($arr_users)) { ?>
                <?php foreach($arr_users as $row) { ?>
                    <tr>
                        <td><?php echo $x++; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <!--<td><a href='adminPic.php?applier_id=<?php echo $row['applier_id']; ?>&s_id=<?php echo $row['s_id']; ?>'><img src='profile_pic/<?php echo $row['pic']?>'></a></td>-->
                        <td><?php echo $row['programme']; ?></td>
                        <td><?php $old_date_format = $row['start_date'];
                                    $new_data_format = date("d-m-Y", strtotime($old_date_format));
                                    echo $new_data_format; ?></td>
                         <td><?php $odf = $row['end_date'];
                                            $ndf = date("d-m-Y", strtotime($odf));
                                    echo $ndf; ?></td>
                        <td id="view"><button type="button" id="view"><a href='internView.php?applier_id=<?php echo $row['applier_id']; ?>&s_id=<?php echo $row['s_id']; ?>&i_id=<?php echo $row['i_id']; ?>&c_id=<?php echo $row['c_id']; ?>'>Paparan</a></button> </td>
                        <td><a href='adminView.php?applier_id=<?php echo $row['applier_id']; ?>&i_id=<?php echo $row['i_id']; ?>'><?php echo $row['confirm_letter']?></a></td>
                        <td><a href='adminResume.php?applier_id=<?php echo $row['applier_id']; ?>&i_id=<?php echo $row['i_id']; ?>'><?php echo $row['resume']?></a></td>
                        <td><a href='adminTranscript.php?applier_id=<?php echo $row['applier_id']; ?>&i_id=<?php echo $row['i_id']; ?>'><?php echo $row['transcript']?></a></td>
                        <td><?php echo $row['department']; ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
                </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    /*$(document).ready(function() {
        $('#userTable').DataTable();
    });*/

    $(document).ready(function() {
    $('#userTable').DataTable( {
        "language": {
            "search": "Carian: ",
            "lengthMenu": "Papar _MENU_ rekod setiap halaman",
            "zeroRecords": "Tiada rekod dijumpai",
            "info": "Memaparkan halaman _PAGE_ daripada _PAGES_",
            "infoEmpty": "Tiada rekod dijumpai",
            "infoFiltered": "",
            "oPaginate": {
            "sNext":    "Seterusnya",
            "sPrevious": "Sebelum"
        },
     
        },   
        pageLength: 3, 
        "bLengthChange" : false       } );
    
} );


    /*$('#userTable').DataTable( {
    language: { search: "Carian: "},
    pageLength: 5
} );*/
    </script>

</div>
        </div> 
</body>
</html>