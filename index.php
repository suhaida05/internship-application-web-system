<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Website</title>
    <link rel="stylesheet" href="index2.css">
  </head>
  <body id="page-top">
    <div class="container">
      <div class="nav" id="nav">   
        <a  href="#page-top"><img src="asset/logo.png" alt="MDTM" class="logo"></a>
          <ul>
            <li>
              <a href="#contact">HUBUNGI KAMI</a>
            </li>
            <li>
              <a href="#department">JABATAN</a>
            </li>
            <li>
              <a href="empLogin.php">STAF</a>
            </li>
            <li>
              <a href="login.php">LOG MASUK</a>
            </li>          
          </ul>
      </div>
    </div>

    <script>    
      window.onscroll = () => {
        const nav = document.querySelector('#nav');
        if(this.scrollY <= 10) nav.className = 'nav'; else nav.className = 'scroll';
      };
    </script>
  
    <a id="department"></a>
    <section id="department-section">
      <h1>JABATAN-JABATAN DI MAJLIS DAERAH TANJONG MALIM</h1> 

      <hr class="line">
      
      <table>
        <tr>
          <td class="t1">JABATAN PENGUATKUASAAN</td>
          <td class="t2">BAHAGIAN  PENTADBIRAN DAN PERKHIDMATAN</td>
        </tr>

        <tr>
          <td class="t1">JABATAN KEJURUTERAAN</td>
          <td class="t2">JABATAN PERANCANGAN PEMBANGUNAN</td>
        </tr>

        <tr>
          <td class="t1">UNIT OSC</td>
          <td class="t2">JABATAN  PENILAIAN DAN PENGURUSAN HARTA</td>
        </tr>

        <tr>
          <td class="t1">UNIT UNDANG-UNDANG</td>
          <td class="t2">JABATAN PERBENDAHARAAN</td>
        </tr>

        <tr>
          <td class="t1">UNIT AUDIT DALAM</td>
          <td class="t2">JABATAN PERKHIDMATAN PERBANDARAN DAN KESIHATAN AM</td>
        </tr>

        <tr>
          <td class="t1">JABATAN TEKNOLOGI MAKLUMAT, PELANCONGAN DAN REKREASI</td>
        </tr>
      </table>
    </section>

    <a id="contact"></a>
    <section id="contact-section">

      <hr class="line2">

      <div class="footer"><span class="vl"></span>
        <img src="asset/logo.png" alt="deco" id="image" class="image"></img>

        <div class="mdtm"><span class="m">MAJLIS DAERAH TANJONG MALIM,</span> <span class="call">TALIAN AM  </span>05-4563410/20 <span class="faks">FAKS</span>	05-4563430/440<br>

        Peti Surat 59, <br>

        Bandar Behrang 2020, <span class="address">E-MEL	</span><a class="email" href="mailto:mdtmalim@mdtm.gov.my">mdtmalim@mdtm.gov.my</a><br>

        35900 Tanjong Malim
        </div>
      </div>
    </section>
  </body>
</html>
    


       