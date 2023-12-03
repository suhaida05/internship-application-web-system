<?php
include "config.php";

if (!isset($_SESSION['id'])) {
  header("Location: empLogin.php");
} 

$sql= "SELECT s.department, COUNT(*) as total FROM student_details s CROSS JOIN intern_details i, coordinator_details c WHERE s.s_id=i.s_id and i.i_id=c.i_id and c.status='Diluluskan' and i.end_date>CURDATE() GROUP BY department;";
$pie = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($con));

$intern = array();
foreach ($pie as $row) {
    $department[] = $row['department'];
	$total[] = $row['total'];
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
    <link rel="stylesheet" href="dashboard2.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
        <div class="box">
                <div class="nav"><img src="asset/logo.png" alt="deco" id="image">
                
                    <ul class="navbar-nav ">
                        <li >
                            <a href="#" class="active">Dashboard</a>
                        </li>
                        <li>
                            <a class="manage" href="manage_intern.php">Senarai Permohonan</a>
                        </li>
                        <li>
                            <a class="intern" href="intern.php">Pelajar Praktikal</a>
                        </li>
                        <li>
                            <a  class="finished" href="finished.php">Alumni</a>
                        </li>
                        <li>
                            <a href="logout.php"><img src="icon/logout.png" alt="icon" id="logout" class="logout" title="Log Keluar"></a>
                        </li>
                    </ul>
                </div>
                <div class="box2">
                

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
                                $query = mysqli_query($con, "SELECT * FROM admin WHERE admin_id='$_SESSION[id]'") or die(mysqli_error());
                                $fetch = mysqli_fetch_array($query);
                                echo $fetch['a_name'];
                            ?></p>
                        </span>
                </div>

                <p class="title"> Dashboard</p>

                <div class="box3">
                <h1> Jumlah Semasa Pelajar Praktikal di Setiap Jabatan</h1>
                <canvas id="myChart"></canvas>

                <script>
/*var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];*/
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145",
  "#551e71",
  "#71291e",
  "#66b39e",
  "#b91d97",
  "#bf32b8",
  "#7f98fa",
  "#5ccc25"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels:<?php echo json_encode($department); ?>,


    datasets: [{
      backgroundColor: barColors,
      data: <?php echo json_encode($total); ?>
    }]
  },
  options: {
    title: {
      display: true,
      
    }
    
  }
});

</script>
                </div>
        <!--<div style="width:100%;height:100%;text-align:center">
            <h2 class="page-header" >Laporan Analisis </h2>
            <div> Jumlah Semasa Pelajar Praktikal di setiap Jabatan</div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    -->
    
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

  <!--<canvas id="myChart2" ></canvas>
  <script>
/*var xValues = <?php echo json_encode($name); ?>
var yValues = <?php echo json_encode($data); ?>*/
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart2", {
  type: "bar",
  data: {
    labels: <?php echo json_encode($name); ?>,
    datasets: [{
      backgroundColor: barColors,
      data: <?php echo json_encode($data); ?>
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "World Wine Production 2018"
    }
  }
});
</script>
  <!--  <script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($name); ?>,
                        datasets: [{
                            label: 'JUMLAH PELAJAR PRAKTIKAL',
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($data); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>-->

                </div>

                <div class="box4">
                    <p class="text2">MENUNGGU KELULUSAN</p>

                    <p class="count">
                        <?php
                        $sql = "SELECT count(c_id) AS cntUser FROM coordinator_details WHERE status = 'Dalam Proses...' ";
                        $result= mysqli_query($con, $sql);
                        $row= mysqli_fetch_array ($result);
                        echo $row['cntUser'];
                        ?>
                    </p>

                   <a href="manage_intern.php"><img src="icon/approved.png" alt="icon" id="approve" class="approval"></a>                    
                </div>

                <!--<div class="box5">
                <div class="p"> Jumlah Pelajar Praktikal di Setiap Jabatan</div>
                <canvas id="myChart"></canvas>

                <script>
/*var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];*/
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels:<?php echo json_encode($department); ?>,


    datasets: [{
      backgroundColor: barColors,
      data: <?php echo json_encode($total); ?>
    }]
  },
  options: {
    title: {
      display: true,
      
    }
    
  }
});

</script>
                </div>
        </div> -->
</body>
</html>