<?php 
session_start();
if(empty($_SESSION["ctri"]["id"])){
    header("location:../../login/");
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php include("../../Connexion/database.php"); 
$mois=date("m");
$mois_passee=intval(date("m"))-1;
 $list= getAllMessagesByMonth(12);
 $list= getAllMessages();
//  var_dump($mois_passee);
//  $list=getEngineersList();

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
    <link href="../../assets/img/icon_gabon7.jpg" rel="icon">
    <link href="../../assets/img/icon_gabon7.jpg" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  </head>
  <body>
    
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
          <!-- <h1><a href="index.php"><b style="color:#da7c43;">CTRI</b> <b></b></a></h1> -->
          <a href="/"><img src="../../assets/img/logo_ctri.png" alt="" class="img-fluid"></a>
        </div>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" href="../">Accueil</a></li>
            <li><a class="nav-link scrollto" href="../Ingenieurs/">Ingénieurs</a></li>
            <li><a class="nav-link scrollto active" href="javascript:void(0);">Messages</a></li>
            <li><a class="nav-link scrollto" href="../../">Site</a></li>
            <li><a class="nav-link scrollto" href="../../logout">Deconnexion</a></li>
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
  background: url("../../assets/img/accueil3.jpeg") top center;
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
  background: url("../../assets/img/accueil3.jpeg") top center;
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
  background: url("../../assets/img/accueil6.jpeg") top center;
  background-size: cover;
  position: relative;

}

    </style>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 75%; margin: 0 auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Informations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
          <tr>
            <td>Nom</td>
            <td class="data-nom"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td class="data-mail"></td>
          </tr>
          <tr>
            <td>Sujet</td>
            <td class="data-sujet"></td>
          </tr>
          <tr>
            <td>Contenu</td>
            <td class="data-contenu" style="text-align:justify;"></td>
          </tr>
          <tr>
            <td>Date</td>
            <td class="data-date"></td>
          </tr>
          <tr class="isfile">
            <td>Document</td>
            <td class="data-document"></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Enregistrer</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>


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
           
          <!-- <h2>Responsive Table</h2> -->
            <div class="table-wrapper table-container">
                <table class="fl-table ">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Sujet</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($list)){ ?>
                    <?php foreach($list as $value){ ?>
                    <tr>
                        <td style="text-align:left;"><a href="javascript:void(0);" class="voir" onclick="showModal()" style="color:black;" data-isfile="<?=isFile($value['document']) ?>" data-nom="<?=$value['nom'] ?>" data-mail="<?=$value['mail'] ?>" data-sujet="<?=$value['sujet'] ?>" data-contenu="<?=$value['contenu'] ?>" data-document="../../<?=$value['document'] ?>" data-date="<?=dateFrancais($value['created_at']) ?>"><?=$value['nom'] ?></a></td>
                        <td style="text-align:left;"><?=$value['mail'] ?></td>
                        <td style="text-align:left;"><?=$value['sujet'] ?></td>
                        <td style="text-align:left;"><?=dateFrancais($value['created_at']) ?></td>
                        <td style="text-align:center;">
                            <button class="btn btn-sm btn-primary btn-xs voir" onclick="showModal()"  data-isfile="<?=isFile($value['document']) ?>" data-nom="<?=$value['nom'] ?>" data-mail="<?=$value['mail'] ?>" data-sujet="<?=$value['sujet'] ?>" data-contenu="<?=$value['contenu'] ?>" data-document="../../<?=$value['document'] ?>" data-date="<?=dateFrancais($value['created_at']) ?>">Voir</button>
                            <?php if(isFile($value['document'])){ ?>
                                <a class="btn btn-sm btn-success btn-xs" target="_blank" href="../../<?=$value['document'] ?>" download>PDF </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                    <tbody>
                </table>
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
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function showModal() {
        $('#myModal').modal('show');
        }
    </script>
    <script>
      $(document).ready(function() {

        $(".voir").on("click",function(e){
          let objet=$(this);
          let nom = objet.attr("data-nom");
          let sujet = objet.attr("data-sujet");
          let contenu = objet.attr("data-contenu");
          let mail = objet.attr("data-mail");
          let created_at = objet.attr("data-date");
          let document = objet.attr("data-document");
          let isfile = objet.attr("data-isfile");
          if(isfile!="1"){
            $(".isfile").hide();
          }else{
            $(".isfile").show();
          }
          $(".data-nom").text(nom);
          $(".data-sujet").text(sujet);
          $(".data-contenu").text(contenu);
          $(".data-mail").text(mail);
          $(".data-date").text(created_at);
          let balise='<a class="btn btn-sm btn-success btn-xs" class="data-document" target="_blank" href="'+document+'" download>Télécharger</a>';
          $(".data-document").html(balise);
          
        })
        // On écoute le clic sur les boutons "Fermé" et "Annuler"
        $("#myModal button[data-dismiss='modal']").click(function() {
          // On ferme le modal
          $("#myModal").modal("hide");
        });

        $('#myModal').modal({backdrop:'static', keyboard:false});
      });

    </script>
    <style>
        .btn-modal {
        cursor: pointer;
        }

        .modal {
        display: none;
        }


        table {border-collapse: collapse; font-family: helvetica}
td, th {border:  1px solid;
      padding: 10px;
      min-width: 200px;
      background: white;
      box-sizing: border-box;
      text-align: left;
}
.table-container {
  position: relative;
  max-height:  500px;
  width: 100%;
  overflow: scroll;
}

thead th {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 2;
  background: hsl(20, 50%, 70%);
}

thead th:first-child {
  left: 0;
  z-index: 3;
}

tfoot {
  position: -webkit-sticky;
  bottom: 0;
  z-index: 2;
}

tfoot td {
  position: sticky;
  bottom: 0;
  z-index: 2;
  background: hsl(20, 50%, 70%);
}

tfoot td:first-child {
  z-index: 3;
}

tbody {
  overflow: scroll;
  height: 200px;
}

/* MAKE LEFT COLUMN FIXEZ */
tr > :first-child {
  position: -webkit-sticky;
  position: sticky; 
  background: hsl(180, 50%, 70%);
  left: 0; 
}
/* don't do this */
tr > :first-child {
  box-shadow: inset 0px 1px black;
}
    </style>
   <style>

    *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    /* margin: 10px 70px 70px; */
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
   </style>
    
  </body>
</html>