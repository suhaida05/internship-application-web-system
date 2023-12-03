<?php
  include ('config.php');
?>
<html>
<head>
    <title>Internship Website</title>

    <link rel="stylesheet" href="view2.css">
</head>
<body>
    <?php
        $applier_id = $_GET['applier_id'];
        $s_id = $_GET['s_id'];
        $i_id = $_GET['i_id'];
        $c_id = $_GET['c_id'];

        $sql = "SELECT a.* , s.*, i.*, c.* FROM applier a CROSS JOIN student_details s, intern_details i, coordinator_details c WHERE  a.applier_id='$applier_id' AND s.s_id='$s_id' AND i.i_id='$i_id' and c.c_id='$c_id';";
        $query = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row = mysqli_fetch_array($query);
    ?>
        <div class="page">
            <page id="page" size="A4">
        
            <div class="border">
                <center><img src="asset/logo.png" alt="deco" id="image"></center>

                <h1>Butiran Pelajar</h1>

                <hr>

                <div class="details">
                    <table>
                        <tr>
                            <th width="22%" class="name">
                                Nama 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['name'];?> 
                            </td>
                        </tr>

                        <tr>
                            <th class="ic">
                                No. IC/Pasport 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['ic'];?> 
                            </td>
                        </tr>

                        <tr>
                            <th class="id">
                            ID Pelajar (No. Matrik) 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['matric_no'];?> 
                            </td>
                        </tr>
                        
                        <tr>
                            <th class="program">
                            Program 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['programme'];?> 
                            </td>
                        </tr>
                        
                        <tr>
                        <th class="phone">
                            No. Telefon 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['phone'];?> 
                            </td>
                        </tr>
                        
                        <tr>
                        <th class="gender">
                            Jantina 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['gender'];?> 
                            </td>
                        </tr>
                        
                        <tr>
                        <th class="marital">
                            Status Perkahwinan 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['marital'];?> 
                            </td>
                        </tr>
                        
                        <tr>
                        <th class="bdate">
                            Tarikh Lahir 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php 
                                 $old = $row['bdate'];
                                 $new = date("d-m-Y", strtotime($old));
     
                                echo $new;?> 
                            </td>
                        </tr>
                        
                        <tr>
                        <th class="mail">
                            E-Mel 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['email'];?> 
                            </td>
                        </tr>
                        
                        <tr>
                        <th class="address">
                            Alamat 1 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['address'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="address">
                            Alamat 2 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['address2'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="address">
                            Alamat 3 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['address3'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="postcode">
                            Poskod 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['postcode'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="city">
                            Bandar 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['city'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="state">
                            Negeri 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['state'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="beneficiary">
                            Nama Waris 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['beneficiary'];?> 
                            </td>
                        </tr>
                        <tr>
                        <th class="b_phone">
                            No. Telefon Waris 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['b_phone'];?> 
                            </td>
                        </tr>
                    </table>
                        <!--<label>Nama <span style= "margin-left:18.5%;">:</label></span><span class="text"> <?php echo $row['name'];?></span><br>
                        <label>No. IC/Pasport <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['ic'];?> <br>
                        <label>ID Pelajar (No. Matrik) <span style= "margin-left:3.5%;">:</span></label> <?php echo $row['matric_no'];?> <br>                   
                        <label>Program <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['programme'];?> <br>
                        <label>No. Telefon <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['phone'];?> <br>
                        <label>Jantina <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['gender'];?> <br>
                        <label> Status Perkahwinan<span style= "margin-left:18.5%;">:</span></label> <?php echo $row['marital'];?> <br>
                        <label>Tarikh Lahir<span style= "margin-left:18.5%;">:</span></label> <?php echo $row['bdate'];?> <br>
                        <label>E-Mel <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['email'];?> <br>
                        <label>Alamat 1 <span style= "margin-left:18.5%;">:</span></label> <span id="text"><?php echo $row['address'];?></span> <br>
                        <label>Alamat 2 <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['address2'];?> <br>
                        <label>Alamat 3 <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['address3'];?> <br>
                        <label>Poskod <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['postcode'];?> <br>
                        <label>Bandar <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['city'];?> <br>
                        <label>Negeri <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['state'];?> <br>
                        <label>Nama Waris <span style= "margin-left:18.5%;">:</span></label> <?php echo $row['beneficiary'];?><br>
                        <label>No. Telefon Waris <span style= "margin-left:5%;">:</span></label> <?php echo $row['b_phone'];?>-->
                </div>

                <hr>

                <h2>Butiran Latihan Praktikal</h2>

                <hr>

                <div class="details2">
                    <center>
                        <?php
                            $old_date_format = $row['start_date'];
                            $new_data_format = date("d-m-Y", strtotime($old_date_format));

                            $old_format = $row['end_date'];
                            $new_format = date("d-m-Y", strtotime($old_format));
                        ?>
                        <span class="e_date"><label>Tarikh Mula : </label> <?php echo $new_data_format;?></span>
                        <label>Tarikh Tamat : </label> <?php echo $new_format;?>
                    </center>
                </div>

                <hr class="line">

                <h3>Butiran Penyelia</h3>

                <hr class="line">

                <div class="details3">
                <table>
                        <tr>
                            <th width="22%" class="name">
                                Nama 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td width="100%" id="cname">
                                <?php echo $row['c_name'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="mail">
                            E-Mel 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['c_email'];?> 
                            </td>
                        </tr>
<tr>
                        <th class="phone">
                            No. Telefon 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['c_phone'];?> 
                            </td>
                        </tr> 
                        <tr>
                        <th class="office">
                            No. Telefon Pejabat 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['office_phone'];?> 
                            </td>
                        </tr>
                        
                        <tr>
                        <th class="address">
                            Alamat 1 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['c_address'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="address">
                            Alamat 2 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['c_address2'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="address">
                            Alamat 3 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['c_address3'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="postcode">
                            Poskod 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td>
                                <?php echo $row['c_postcode'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="city">
                            Bandar 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['c_city'];?> 
                            </td>
                        </tr>

                        <tr>
                        <th class="state">
                            Negeri 
                            </th>
                            <th width="1px">
                                :
                            </th>
                            <td id="cname">
                                <?php echo $row['c_state'];?> 
                            </td>
                        </tr>   
                    </table>

                    <!--<label>Nama <span style= "margin-left:18.5%;">:</label></span> <?php echo $row['c_name'];?><br>
                    <label>E-Mel <span style= "margin-left:18.5%;">:</label></span> <?php echo $row['c_email'];?><br>
                    <label>No. Telefon <span style= "margin-left:18.5%;">:</label></span> <?php echo $row['c_phone'];?><br>
                    <label>No. Telefon Pejabat <span style= "margin-left:10%;">:</label></span> <?php echo $row['office_phone'];?><br>
                    <label>Alamat 1 <span style= "margin-left:18.5%;">:</label></span> <?php echo $row['c_address'];?><br>
                    <label>Alamat 2 <span style= "margin-left:18.5%;">:</label></span> <?php echo $row['c_address2'];?><br>
                    <label>Alamat 3 <span style= "margin-left:18.5%;">:</label></span> <?php echo $row['c_address3'];?><br>
                    <label>Poskod <span style= "margin-left:18.5%;">:</label></span> <?php echo $row['c_postcode'];?><br>
                    <label>Bandar <span style= "margin-left:18.5%;">:</label></span> <?php echo $row['c_city'];?><br>
                    <label>Negeri <span style= "margin-left:18.5%;">:</label></span> <?php echo $row['c_state'];?>-->
                </div>

                <hr>    
            </div>

            <div class="button">  
                <button type="button" class="back" onclick="history.back()">Kembali</button>
                <button type="button" class="print" onclick="window.print()">Cetak</button>
            </div>
        </div>
    </page>
</body>
