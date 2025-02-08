<?php 
session_start();
if(empty($_SESSION["ctri"]["id"])){
    header("location:../login/");
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php include("../Connexion/database.php"); 
 
 

 $mois=date("m");
 $mois_passee=intval(date("m"))-1;
 $mois_passee=$mois_passee==0?11:$mois_passee;

 
 $list_mes= getAllMessages();
 $list_mes_mois= getAllMessagesByMonth($mois);
 $list_mes_mois_1= getAllMessagesByMonth($mois_passee);

 $list_eng=getEngineersList();
 $list_eng_mois = getEngineersListByMonth($mois);
 $list_eng_mois_1 = getEngineersListByMonth($mois_passee);
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>CTRI</title>
    <meta content="Rejoignez l'ordre des ingénieurs,  des chercheurs et tous les scientifiques du Gabon et ceux de la diaspora." name="description">
    <meta content="L'Ordre des Ingénieurs du Gabon (O.I.G), formulaire, professionnels de l'ingénierie, CTRI" name="keywords">
    <!-- Favicons -->
    <link href="../assets/img/icon_gabon7.jpg" rel="icon">
    <link href="../assets/img/icon_gabon7.jpg" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  </head>
  <body>
    
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
          <!-- <h1><a href="index.php"><b style="color:#da7c43;">CTRI</b> <b></b></a></h1> -->
          <a href="/"><img src="../assets/img/logo_ctri.png" alt="" class="img-fluid"></a>
        </div>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="javascript:void(0);">Accueil</a></li>
            <li><a class="nav-link scrollto" href="Ingenieurs/">Ingénieurs</a></li>
            <li><a class="nav-link scrollto" href="Messages/">Messages</a></li>
            <li><a class="nav-link scrollto" href="../">Site</a></li>
            <li><a class="nav-link scrollto" href="/logout">Deconnexion</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <style>
      @media (max-width: 767px) {
          /* Styles pour les petits écrans */
          .titre_taille {
            font-size:20px;
          }
          /* Autres styles pour les téléphones */
      }

      /* Pour les écrans d'une largeur minimale de 768px (généralement des PC) */
      @media (min-width: 768px) {
          /* Styles pour les PC */
          .titre_taille {
            font-size:60px;
          }
          /* Autres styles pour les PC */
      }

      #hero1 {
  width: 100%;
  height: 80vh;
  background: url("../assets/img/accueil3.jpeg") top center;
  background-size: cover;
  position: relative;

  /* Ombre derrière l'image */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

  /* Opacité de l'image */
/*  opacity: 0.7;*/
}

#hero1 {
  width: 100%;
  height: 80vh;
  background: url("../assets/img/accueil3.jpeg") top center;
  background-size: cover;
  position: relative;

  /* Ombre derrière l'image */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

  /* Opacité de l'image */
  /*opacity: 0.7;*/

  /* Couleur de fond foncée */
  background-color: gray !important;
}

#hero {
  width: 100%;
  height: 80vh;
  background: url("../assets/img/accueil6.jpeg") top center;
  background-size: cover;
  position: relative;

}
    </style>
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" >
      <div class="hero3-container3">
        
      </div>
    </section>
    <!-- End Hero -->
    <main id="main">
      
      <!-- ======= Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container">
          <div class="section-title">
            <h3 style="
              font-weight: 500;
              line-height: 32px;
              font-size: 24px;
              color: #4d8090;
              ">Le comité de réflexion de l'ordre des ingénieurs du Gabon</h3>
          </div>
          <div class="row">
           
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member" style="width:100%;">
                    <div class="member-img" >
                    <span class="bi bi-person-check" style="font-size: 50px;color:#1e4152;"></span>
                    </div>
                    <div class="member-info" style="padding-top: 1px !important;">
                    <h4 style="font-size:15px;">Nombre total d'ingénieurs déjà inscrits</h4>
                    <span style="color:black !important;font-weight:bold;"><?=count($list_eng) ?></span>
                    <span style="color:#1e4152;"><a href="Ingenieurs/">Voir la liste</a></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member" style="width:100%;">
                    <div class="member-img" >
                    <span class="bi bi-person-check" style="font-size: 50px;color:#1e4152;"></span>
                    </div>
                    <div class="member-info" style="padding-top: 1px !important;">
                    <h4 style="font-size:15px;">Nombre total d'ingénieurs inscrits le mois passé</h4>
                    <span style="color:black !important;font-weight:bold;"><?=count($list_eng_mois_1) ?></span>
                    <span style="color:#1e4152;"><a href="Ingenieurs/?type=2">Voir la liste</a></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member" style="width:100%;">
                    <div class="member-img" >
                    <span class="bi bi-person-check" style="font-size: 50px;color:#1e4152;"></span>
                    </div>
                    <div class="member-info" style="padding-top: 1px !important;">
                    <h4 style="font-size:15px;">Nombre total d'ingénieurs inscrits au mois en cours</h4>
                    <span style="color:black !important;font-weight:bold;"><?=count($list_eng_mois) ?></span>
                    <span style="color:#1e4152;"><a href="Ingenieurs/?type=1">Voir la liste</a></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member" style="width:100%;">
                    <div class="member-img" >
                    <span class="bi bi-envelope" style="font-size: 50px;color:#1e4152;"></span>
                    </div>
                    <div class="member-info" style="padding-top: 1px !important;">
                    <h4 style="font-size:15px;">Nombre total de messages</h4>
                    <span style="color:black !important;font-weight:bold;"><?=count($list_mes) ?></span>
                    <span style="color:#1e4152;"><a href="Messages/">Voir la liste</a></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member" style="width:100%;">
                    <div class="member-img" >
                    <span class="bi bi-envelope" style="font-size: 50px;color:#1e4152;"></span>
                    </div>
                    <div class="member-info" style="padding-top: 1px !important;">
                    <h4 style="font-size:15px;">Nombre total de messages du mois passé</h4>
                    <span style="color:black !important;font-weight:bold;"><?=count($list_mes_mois_1) ?></span>
                    <span style="color:#1e4152;"><a href="Messages/?type=2">Voir la liste</a></span>
                    </div>
                </div>
            </div>  

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member" style="width:100%;">
                    <div class="member-img" >
                    <span class="bi bi-envelope" style="font-size: 50px;color:#1e4152;"></span>
                    </div>
                    <div class="member-info" style="padding-top: 1px !important;">
                    <h4 style="font-size:15px;">Nombre total de messages du mois en cours</h4>
                    <span style="color:black !important;font-weight:bold;"><?=count($list_mes_mois) ?></span>
                    <span style="color:#1e4152;"><a href="Messages/?type=1">Voir la liste</a></span>
                    </div>
                </div>
            </div>
            
          </div>
          
        </div>
      </section>
      
      <style>
        section {
    padding: 30px 0;
    overflow: hidden;
}
      </style>
      
      <!-- End Contact Section -->
      
    <footer id="footer">
      <div class="container footer-bottom clearfix" style="padding-top:40px;">
        <div class="copyright">
          &copy; Copyright <strong><span>Le comité de réflexion de l'ordre des ingénieurs du Gabon</span></strong>
        </div>
        <!-- <div class="credits">
          Designed by <a href="">Kikun-Digital</a>
        </div> -->
      </div>
    </footer>
    <style>
        input[name='nom']::placeholder {
          color: red;
      }
      input[name='prenom']::placeholder {
          color: red;
      }
      input[name='email']::placeholder {
          color: red;
      }

    </style>

    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    

    
  </body>
</html>