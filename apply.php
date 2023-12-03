<?php
    include "config.php";
    //include "login.php";

    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
    } 

   $query = mysqli_query($con, "SELECT name FROM applier WHERE email='$_SESSION[email]'") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query);
    
?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Internship Website</title>
        <link rel="stylesheet" href="style3.css">

        <script>
            var loadFile = function(event) {
	            var image = document.getElementById('output');
	            image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
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
                        <a href="#" class="act"><img src="icon/google-forms.png" alt="icon" id="form" class="form" title="Borang"></a>
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
                </p>
            </div>
    
            <form id="regForm" name="apply" method="POST" enctype="multipart/form-data" action="process.php" onsubmit="return validate_form()">
                <div class="profile">
                    <label class="label" for="file">
                        <span><i class="fas fa-user-edit"></i></span>
                        <span class="change">Tukar</span>
                    </label>
                        
                    <input id="file" name="file" type="file" onchange="loadFile(event)" require/>
                    <img src="asset/profile.png" id="output" width="200"/>      
                </div>

                <span class="warn"><span class="mark">*</span> Sila masukkan gambar IC/Passport sahaja.</span>

                <div class="header">
                    <img src="asset/Starts Here!2.png" alt="header" id="header">

                    <div class="name">
                        <?php
                            echo $fetch['name'];
                        ?>
                    </div>            
                </div>  
                <div class="box3">     
                    <?php                
                        $query = mysqli_query($con, "SELECT * FROM applier WHERE email='$_SESSION[email]'") or die(mysqli_error());
                        $fetch = mysqli_fetch_array($query);    
                        $last_req = mysqli_query($con, "SELECT * FROM student_details ORDER BY s_id DESC LIMIT 1");
                        $row = mysqli_fetch_array($last_req);		

                        if(empty( $row['s_id'])) {
		                    $row['s_id'] = 0;
                        }

                        $PrevComID = $row['s_id'];
                    ?>

                    <div class="main active">
                        <div class="edit_form">
                            <span class="student">BUTIRAN PELAJAR</span><span class="section">1/3</span>
                        </div>

                        <hr>			

                        <input type="text"  id ="s_id" name="s_id" class="form-control" value='<?php echo $PrevComID+1; ?>' hidden>

                        <div class="form-group">
                            <table>
                                <tr>
                                    <td class="form_name">
                                        Nama 
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="name" name="name" placeholder="<?php echo $fetch['name'];?>" class="disabled"  onClick="alert( 'Kemas kini di Profil.' )" readonly="readonly"/>                            
                                    </td>

                                    <td width="22%" class="form_address1">
                                        Alamat 1 <span class="mark">*</span>
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="address" name="address" class="input" require/>
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group2">
                                <tr>
                                    <td class="form_ic">
                                        No. IC/Pasport  
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="ic" name="ic" placeholder="<?php echo $fetch['ic'];?>" class="disabled"  onClick="alert( 'Kemas kini di Profil.' )" readonly="readonly"/>
                                    </td>

                                    <td class="form_address">
                                        Alamat 2 
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="address2" name="address2" class="form-control"/>
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group3">
                                <tr>
                                    <td class="form_id">
                                        ID Pelajar(No. Matrik) <span class="mark">*</span>                           
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="id" name="id" class="form-control" require/>
                                    </td>

                                    <td class="form_address">
                                        Alamat 3 
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="address3" name="address3" class="form-control"/>
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group4">
                                <tr>
                                    <td class="form_program">
                                        Program <span class="mark">*</span>                           
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="programme" name="programme" class="form-control" require/>
                                    </td>

                                    <td class="form_postcode">
                                        Poskod <span class="mark">*</span>
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="postcode" name="postcode" class="form-control" require/>
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group5">
                                <tr>
                                    <td class="form_phone">
                                        No. Telefon                           
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="phone" name="tel_no" placeholder="<?php echo $fetch['phone'];?>"  class="disabled"  onClick="alert( 'Kemas kini di Profil.' )" readonly="readonly"/>
                                    </td>

                                    <td class="form_city">
                                        Bandar <span class="mark">*</span>
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="city" name="city" class="form-control" require/>
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group6">
                                <tr>
                                    <td class="form_gender">
                                        Jantina                          
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <select id="gender" name="gender"  class="disabled"  onClick="alert( 'Kemas kini di Profil.' )" readonly="readonly">
                                            <option value=""><?php echo $fetch['gender'];?></option>
                                        </select>                                 
                                    </td>

                                    <td class="form_state">
                                        Negeri <span class="mark">*</span>
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="state" name="state" class="form-control" require/>
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group7">
                                <tr>
                                    <td class="form_marital">
                                        Status Perkahwinan <span class="mark">*</span>                          
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <select id="status" name="status" class="form-control" require>
                                            <option value="Bujang">Bujang</option>
                                            <option value="Berkahwin">Berkahwin</option>
                                            <option value="Ibu/Bapa Tunggal">Ibu/Bapa Tunggal</option>          
                                        </select>         
                                    </td>

                                    <td class="form_waris">
                                        Nama Waris 
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="beneficiary" name="beneficiary" class="form-control"/>
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group8">
                                <tr>
                                    <td class="form_bdate">
                                        Tarikh Lahir                         
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="date" id ="bdate" name="bdate" value="<?php echo $fetch['bdate'];?>"  class="disabled"  onClick="alert( 'Kemas kini di Profil.' )" readonly="readonly"/>
                                    </td>

                                    <td class="form_bphone">
                                        No. Telefon Waris                            
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="b_phone" name="b_phone" class="form-control"/>
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group9">
                                <tr>
                                    <td class="form_mail">
                                        E-Mel                       
                                    </td>   
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="email" id ="email" name="email" placeholder="<?php echo $fetch['email'];?>" class="form-control" class="disabled"  onClick="alert( 'Kemas kini di Profil.' )" readonly="readonly"/>
                                    </td>
                            </table>

                            <button type="button" name="btn_login_details" id="btn_login_details" class="next-btn">Seterusnya</button> 
                        </div>
                    </div>

                    <div class="main social">
                        <div class="edit_form">
                            <span class="intern">BUTIRAN LATIHAN PRAKTIKAL</span><span class="section2">2/3</span>
                        </div>

                        <hr>

                        <div class="form-group10">
                            <label>Mula <span id="mark" class="mark">*</span> :</label>
                            <input type="date" id ="sdate" name="sdate" class="form-control" require/>
       
                            <label class="tamat">Tamat <span id="mark" class="mark">*</span> :</label>
                            <input type="date" id ="edate" name="edate" class="form-control" require/>
                        </div>

                        <div class="form-group11">
                            <table class="table2">
                                <tr>
                                    <td class="form_letter">
                                        Surat Pengesahan Universiti/Kolej <span class="mark">*</span>                      
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="file" id="letter" name="letter[]" onchange="return fileValidation()" require/>
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group12">
                                <tr>
                                    <td class="form_resume">
                                        Resume (termasuk gambar IC/Pasport) <span class="mark">*</span>                        
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="file" id="resume" name="letter[]" onchange="return fileValidation2()" require/>
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group13">
                                <tr>
                                    <td class="form_transcript">
                                        Transkrip (sem 1 sehingga terkini) <span class="mark">*</span>                        
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="file" id="transcript" name="letter[]" onchange="return fileValidation3()" require/>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="button">
                            <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="previous-btn">Sebelumnya</button>
                            <button type="button" name="btn_personal_details" id="btn_personal_details" class="next-btn">Seterusnya</button>  </div>
                        </div>

                    <div class="main">
                        <div class="edit_form">
                            <span class="coordinator">BUTIRAN PENYELARAS</span><span class="section3">3/3</span>
                        </div>

                        <hr>       

                        <div class="form-group14">
                            <table class="table3">
                                <tr>
                                    <td class="form_cname">
                                        Nama Penyelaras <span class="mark">*</span>                        
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="nameC" name="nameC" class="input" require />
                                    </td>

                                    <td class="form_caddress">  
                                        Alamat 1 <span class="mark">*</span>                        
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="addressC" name="addressC" class="input" require />
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group15">
                                <tr>
                                    <td class="form_cmail">
                                        E-Mel <span class="mark">*</span>                        
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="email" id ="emailC" name="emailC" class="input" require />
                                    </td>

                                    <td class="form_caddress2">
                                        Alamat 2                         
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="address2C" name="address2C" class="form-control" />
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group16">
                                <tr>
                                    <td class="form_cphone">
                                        No. Telefon <span class="mark">*</span>                        
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="phoneC" name="phoneC" class="input" require />
                                    </td>

                                    <td class="form_caddress3">
                                        Alamat 3                         
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="address3C" name="address3C" class="form-control" />
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group17">
                                <tr>
                                    <td class="form_office">
                                        No. Telefon Pejabat <span class="mark">*</span>                        
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="ophone" name="ophone" class="form-control" />
                                    </td>

                                    <td class="form_cpostcode">
                                        Poskod <span class="mark">*</span>    
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="postcodeC" name="postcodeC" class="input" require />
                                    </td>
                                </tr>
                        </div>

                        <div class="form-group18">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td class="form_ccity">
                                        Bandar <span class="mark">*</span>                        
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="cityC" name="cityC" class="input" require />
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td class="form_cstate">
                                        Negeri <span class="mark">*</span>    
                                    </td>
                                    <td width="1px">
                                        :
                                    </td>
                                    <td>
                                        <input type="text" id ="stateC" name="stateC" class="input" require />
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="button2">
                            <button type="button" name="previous_btn_contact_details" id="previous_btn_personal_details" class="previous-btn">Sebelumnya</button>
                            <button type="submit" name="submit" id="btn_contact_details" class="submit-btn">Mohon</button>
                        </div>
                    </div>
                </div>
            </form>

        <script src="script.js"></script>
    </body>
</html>