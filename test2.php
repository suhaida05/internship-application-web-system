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
      <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>-->

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

		
	/*	$count = $r['cntUser'];*/
    
    $last_req  = mysqli_query($con, "SELECT * FROM student_details ORDER BY s_id DESC LIMIT 1");
    $row       = mysqli_fetch_array($last_req);		
    if(empty( $row['s_id'])) {
		$row['s_id'] = 0;}
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
                            <td>
                                Nama 
                            </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="name" name="name" placeholder="<?php echo $fetch['name'];?>" class="disabled"  onClick="alert( 'Kemas kini di Profil.' )"
readonly="readonly"/>                            
                        </td>

                        <td id ="address_l" name="address_l">
                        Alamat 1 <span class="mark">*</span>
                            </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="address" name="address" class="input" require/>
                        </td>
                        </tr>
                        
        <!--Nama :
         <input type="text" id ="name" name="name" placeholder="<?php echo $fetch['name'];?>" class="form-control" disabled/>
     
         <label id ="address_l" name="address_l">Alamat 1 <span class="mark">*</span> :</label>
         <input type="text" id ="address" name="address" class="input" require/>-->
    <!-- <span id="error_address" class="text-danger"></span>-->
        </div>

        <div class="form-group2">
        <tr>
                            <td> 
                            No. IC/Pasport  
                            </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="ic" name="ic" placeholder="<?php echo $fetch['ic'];?>" class="disabled"  onClick="alert( 'Kemas kini di Profil.' )"
readonly="readonly"/>
                        </td>

                        <td >
                        Alamat 2 
                            </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="address2" name="address2" class="form-control"/>
                        </td>
                        </tr>
         <!--<label id ="ic_l" name="ic_l">No. IC/Pasport  :</label>
         <input type="text" id ="ic" name="ic" placeholder="<?php echo $fetch['ic'];?>" class="form-control" disabled/>
        
         <label id ="address_l2" name="address_l2">Alamat 2 :</label>
         <input type="text" id ="address2" name="address2" class="form-control"/>-->
        </div>


        <div class="form-group3">
        <tr>
                            <td> 
                            ID Pelajar(No. Matrik) <span class="mark">*</span>                           
                        </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="id" name="id" class="form-control" require/>
                        </td>

                        <td >
                        Alamat 3 
                            </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="address3" name="address3" class="form-control"/>
                        </td>
                        </tr>
        <!-- <label id ="id_l" name="id_l">ID Pelajar(No. Matrik) <span class="mark">*</span> :</label>
         <input type="text" id ="id" name="id" class="form-control" require/>-->
        <!-- <span id="error_id" class="text-danger"></span>-->
     
         <!--<label id ="address_l3" name="address_l3">Alamat 3 :</label>
         <input type="text" id ="address3" name="address3" class="form-control"/>-->
        </div>

        <div class="form-group4">
        <tr>
                            <td> 
                            Program <span class="mark">*</span>                           
                        </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="programme" name="programme" class="form-control" require/>
                        </td>

                        <td >
                        Poskod <span class="mark">*</span>
                            </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="postcode" name="postcode" class="form-control" require/>
                        </td>
                        </tr>
         <!--<label>Program <span class="mark">*</span> :</label>
         <input type="text" id ="programme" name="programme" class="form-control" require/>-->
         <!--<span id="error_prog" class="text-danger"></span>-->
    
         <!--<label id ="postcode_l" name="postcode_l">Poskod <span class="mark">*</span> :</label>
         <input type="text" id ="postcode" name="postcode" class="form-control" require/>-->
        <!-- <span id="error_post" class="text-danger"></span>-->
        </div>

        <div class="form-group5">
        <tr>
                            <td> 
                            No. Telefon                           
                        </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="phone" name="tel_no" placeholder="<?php echo $fetch['phone'];?>"  class="disabled"  onClick="alert( 'Kemas kini di Profil.' )"
readonly="readonly"/>
                        </td>

                        <td >
                        Bandar <span class="mark">*</span>
                            </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="city" name="city" class="form-control" require/>
                        </td>
                        </tr>
         <!--<label>No. Telefon :</label>
         <input type="text" id ="phone" name="tel_no" placeholder="<?php echo $fetch['phone'];?>" class="form-control" disabled/>
   
         <label id ="city_l" name="city_l">Bandar <span class="mark">*</span> :</label>
         <input type="text" id ="city" name="city" class="form-control" require/>-->
         <!--<span id="error_city" class="text-danger"></span>-->
        </div>

          <div class="form-group6">
          <tr>
                            <td> 
                            Jantina                          
                        </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <select id="gender" name="gender"  class="disabled"  onClick="alert( 'Kemas kini di Profil.' )"
readonly="readonly">
            <option value=""><?php echo $fetch['gender'];?></option>
          </select>                                 
        </td>

                        <td >
                        Negeri <span class="mark">*</span>
                            </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="state" name="state" class="form-control" require/>
                        </td>
                        </tr>
         <!-- <label>Jantina :</label>
          <select id="gender" name="gender" class="form-control" disabled>
            <option value=""><?php echo $fetch['gender'];?></option>
          </select>         
      
         <label id ="state_l" name="state_l">Negeri <span class="mark">*</span> :</label>
         <input type="text" id ="state" name="state" class="form-control" require/>-->
        <!-- <span id="error_state" class="text-danger"></span>-->
        </div>

        <div class="form-group7">
        <tr>
                            <td> 
                            Status Perkahwinan<span class="mark">*</span>                          
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

                        <td >
                        Nama Waris 
                            </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="beneficiary" name="beneficiary" class="form-control"/>
                        </td>
                        </tr>
          <!--<label>Status Perkahwinan<span class="mark">*</span> :</label>
          <select id="status" name="status" class="form-control" require>
            <option value="Single">Bujang</option>
            <option value="Married">Berkahwin</option>
            <option value="Separated">Ibu/Bapa Tunggal</option>          
          </select>         -->
          <!--<span id="error_status" class="text-danger"></span>-->
     
         <!--<label id ="beneficiary_l" name="beneficiary_l">Nama Waris :</label>
         <input type="text" id ="beneficiary" name="beneficiary" class="form-control"/>-->
        </div>

        <div class="form-group8">
        <tr>
                            <td> 
                            Tarikh Lahir :                        
                        </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="date" id ="bdate" name="bdate" value="<?php echo $fetch['bdate'];?>"  class="disabled"  onClick="alert( 'Kemas kini di Profil.' )"
readonly="readonly"/>

        </td>

                        <td >
                        No. Telefon Waris                            
                    </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="text" id ="b_phone" name="b_phone" class="form-control"/>
                        </td>
                        </tr>
         <!--<label>Tarikh Lahir :</label>
         <input type="date" id ="bdate" name="bdate" value="<?php echo $fetch['bdate'];?>" class="form-control" disabled/>
     
         <label id ="b_phone_l" name="b_phone_l">No. Telefon Waris :</label>
         <input type="text" id ="b_phone" name="b_phone" class="form-control"/>-->
        </div>

        <div class="form-group9">
        <tr>
                            <td> 
                            E-Mel :                        
                        </td>
                            <td width="1px">
                                :
                            </td>
                            <td>
                            <input type="email" id ="email" name="email" placeholder="<?php echo $fetch['email'];?>" class="form-control" class="disabled"  onClick="alert( 'Kemas kini di Profil.' )"
readonly="readonly"/>

        </td>
    </table>
        <!--<label id ="email_l" name="email_l">E-Mel :</label>
         <input type="email" id ="email" name="email" placeholder="<?php echo $fetch['email'];?>" class="form-control" disabled/-->
         <button type="button" name="btn_login_details" id="btn_login_details" class="next-btn">Seterusnya</button> 
  </div>

        </div>
        <div class="main social">
        <div class="edit_form">
    <span class="intern">BUTIRAN LATIHAN PRAKTIKAL</span><span class="section2">2/3</span>
        </div>
        <hr>
            <div class="form-group10">
         <label>Mula <span class="mark">*</span> :</label>
         <input type="date" id ="sdate" name="sdate" class="form-control" require/>
       <!--  <span id="error_s" class="text-danger"></span>-->
       
         <label>Tamat <span class="mark">*</span> :</label>
         <input type="date" id ="edate" name="edate" class="form-control" require/>
         <!--<span id="error_e" class="text-danger"></span>-->
        </div>

        <div class="form-group11">
         <label>Surat Pengesahan Universiti/Kolej<span class="mark">*</span> :</label>
         <label class="radio-inline">
          <input type="file" id="letter" name="letter[]" onchange="return fileValidation()" require/>
         </label>
         <!--<span id="error_letter" class="text-danger"></span>-->
        </div>

        <div class="form-group12">
         <label>Resume (termasuk gambar IC/Pasport) <span class="mark">*</span>:</label>
         <label class="radio-inline">
          <input type="file" id="resume" name="letter[]" onchange="return fileValidation2()" require/>
         </label>
         <!--<span id="error_resume" class="text-danger"></span>-->
        </div>

        <div class="form-group13">
         <label>Transkrip (sem 1 sehingga terkini) <span class="mark">*</span> :</label>
         <label class="radio-inline">
          <input type="file" id="transcript" name="letter[]" onchange="return fileValidation3()" require/>
         </label>
         <!--<span id="error_transcript" class="text-danger"></span>-->
        </div>
        <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="previous-btn">Sebelumnya</button>
            <button type="button" name="btn_login_details" id="btn_login_details" class="next-btn">Seterusnya</button>  </div>
       
        <div class="main">
        <div class="edit_form">
    <span class="coordinator">BUTIRAN PENYELARAS</span><span class="section3">3/3</span>

        </div>

        <hr>       
            <div class="form-group14">
         <label>Nama Penyelaras <span class="mark">*</span> :</label>
         <input type="text" id ="nameC" name="nameC" class="input" require />
        <!--<span id="error_nameC" class="text-danger"></span>-->
       
         <label>Alamat 1 <span class="mark">*</span> :</label>
         <input type="text" id ="addressC" name="addressC" class="input" require />
         <!--<span id="error_addressC" class="text-danger"></span>-->
        </div>

        <div class="form-group15">
         <label>E-Mel <span class="mark">*</span> :</label>
         <input type="email" id ="emailC" name="emailC" class="input" require />
         <!--<span id="error_email" class="text-danger"></span>-->
     
         <label id ="address2C_l" name="address2C_l">Alamat 2 :</label>
         <input type="text" id ="address2C" name="address2C" class="form-control" />
        </div>

        <div class="form-group16">
         <label>No. Telefon  <span class="mark">*</span> :</label>
         <input type="text" id ="phoneC" name="phoneC" class="input" require />
        <!-- <span id="error_phoneC" class="text-danger"></span>-->
    
         <label id ="address3C_l" name="address3C_l">Alamat 3 :</label>
         <input type="text" id ="address3C" name="address3C" class="form-control" />
        </div>

        <div class="form-group17">
         <label>No. Telefon Pejabat :</label>
         <input type="text" id ="ophone" name="ophone" class="form-control" />
      
         <label id ="postcodeC_l" name="postcodeC_l">Poskod <span class="mark">*</span> :</label>
         <input type="text" id ="postcodeC" name="postcodeC" class="input" require />
        </div>

        <div class="form-group18">
         <label>Bandar <span class="mark">*</span> :</label>
         <input type="text" id ="cityC" name="cityC" class="input" require />
        <!-- <span id="error_cityC" class="text-danger"></span>-->
     
         <label id ="stateC_l" name="stateC_l">Negeri <span class="mark">*</span> :</label>
         <input type="text" id ="stateC" name="stateC" class="input" require />
        <!-- <span id="error_stateC" class="text-danger"></span>-->
        </div>

            <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="previous-btn">Sebelumnya</button>
            <button type="submit" name="submit" id="btn_contact_details" class="submit-btn">Mohon</button>
        </div>
        <!--<div class="main">
            <div class="top-div">
            <div class="checkmark"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /> </svg> </div>
            <p class="congratulations">Congratulations Mr./Mrs. <span id="s_name"></span> your details have been successfully added.</p>
        </div>-->
    </form>
    

<script src="script.js"></script>

</body>