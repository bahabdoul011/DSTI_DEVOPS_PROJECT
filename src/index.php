<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>CTRI</title>
    <meta content="Rejoignez l'ordre des ingénieurs,  des chercheurs et tous les scientifiques du Gabon et ceux de la diaspora." name="description">
    <meta content="L'Ordre des Ingénieurs du Gabon (O.I.G), formulaire, professionnels de l'ingénierie, CTRI" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/icon_gabon7.jpg" rel="icon">
    <link href="assets/img/icon_gabon7.jpg" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  </head>
  <body>
    <?php include("Pays/listPays.php");  ?>
    <?php include("Connexion/database.php");  ?>
    <?php $listPays=ListPays::LIST_PAYS;  ?>
    <?php // Store the IP address 
      $vis_ip = getVisIPAddr(); 
      // var_dump($listPays);
      // Use JSON encoded string and converts 
      // it into a PHP variable 
      $donnees_visitor=array();
      $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$vis_ip));   
      $donnees_visitor['pays']=$ipdat->geoplugin_countryName; 
      $donnees_visitor['ville']=$donnees_visitor['pays']==="Gabon"?"Libreville":"";

      // updateEngineerByName($nom="BOULINGUI MOUENFJI", $nouveauNom="BOULINGUI MOUENDJI");
      // updateEngineerByName2("Nkoulou","2006","Polytech’Lille");
      // updateEngineerByName2("Ondo","2001","Université de Bordeaux 1");
      ?>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
          <!-- <h1><a href="index.php"><b style="color:#da7c43;">CTRI</b> <b></b></a></h1> -->
          <a href="/"><img src="assets/img/logo_ctri.png" alt="" class="img-fluid"></a>
        </div>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
            <li><a class="nav-link scrollto" href="#formulaire">Inscription</a></li>
            <li><a class="nav-link scrollto" href="#team">Comité</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="nav-link scrollto" href="/login">Connexion</a></li>
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
  background: url("assets/img/accueil3.jpeg") top center;
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
  background: url("assets/img/accueil3.jpeg") top center;
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
  background: url("assets/img/accueil6.jpeg") top center;
  background-size: cover;
  position: relative;

  /* Ombre derrière l'image */
/*  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);*/

  /* Opacité de l'image */
  /*opacity: 0.7;*/

  /* Couleur de fond foncée */
/*  background-color: gray !important;*/

  /* Effet de flou */
/*  filter: blur(5px);*/
}
    </style>
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" style="background-image: 'assets/img/accueil1.jpeg' !important;">
      <div class="hero-container">
        <h1 class="titre_taille"><?=mb_strtoupper("PROJET PORTANT CRéATION DE") ?></h1>
        <h1 class="titre_taille"><?=mb_strtoupper("L'ORDRE DES INGéNIEURS DU GABON") ?></h1>
      </div>
    </section>
    <!-- End Hero -->
    <main id="main">
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">
          <div class="row content">
            <div class="col-lg-12">
                <h3 style="font-size:35px;">Notre vision</h3>

                  <p style="text-align:justify;padding-top:15px;">Nous sommes un organe professionnel d’utilité publique et apolitique. Notre vision est de réunir tous les ingénieurs du Gabon autour des enjeux de développement dans tous les secteurs d’activités.</p>
                  <br>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-12" style="padding-bottom:30px;">
                  <!-- <h3 style="font-size:35px;">Notre vision</h3>
                  <p style="text-align:justify;">Nous sommes un organe professionnel d’utilité publique et apolitique. <br> Notre vision est de réunir tous les ingénieurs du Gabon autour des enjeux de développement dans tous les secteurs d’activités.</p> -->
                  <h3 style="font-size:35px;">Nos missions </h3>
                  <ul style="text-align:justify;">
                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> Promouvoir, garantir et règlementer la profession d’ingénieur ;</li>
                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> Recenser et fédérer les ingénieurs, les chercheurs, et les scientifiques ;</li>
                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> Valider les acquis pour accéder au titre d’ingénieur ;</li>
                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> Garantir l’éthique, la déontologie et la qualité des travaux des ingénieurs ;</li>
                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> Assurer la mise à jour des compétences au travers de la formation continue et de la veille technologique ;</li>
                    <li><i class="ri-check-double-line" style="text-align:justify;"></i>  Orienter les écoles et universités vers une culture d'excellence ;</li>
                    <li><i class="ri-check-double-line" style="text-align:justify;"></i>  Conseiller et participer aux actions des pouvoirs publics et privés sur des enjeux stratégiques ;</li>
                    <li><i class="ri-check-double-line" style="text-align:justify;"></i>  Etre d'utilité publique en protégeant les citoyens.</li>
                  </ul>
                </div>

                <div class="col-lg-12 pt-4 pt-lg-0">
                  <h3>Qui peut adhérer à l'ordre des ingénieurs du Gabon ?  </h3>
                  <ul>
                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> les diplômés ingénieurs ;</li>

                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> les cabinets d’ingénieurs agréés ;</li>

                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> les professionnels de l'ingénierie exerçant individuellement ou en société ;</li>

                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> les associations ou fédérations des ingénieurs ;</li>

                    
                    <!-- <li><i class="ri-check-double-line" style="text-align:justify;"></i> les ingénieurs salariés;</li> -->
                    
                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> les écoles et universités habilitées par l’Ordre des ingénieurs à travers sa commission de validation des titres et diplômes d’ingénieurs ;</li>

                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> les ordres des ingénieurs sectoriels ;</li>

                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> les étudiants ingénieurs ;</li>

                    <li><i class="ri-check-double-line" style="text-align:justify;"></i> les ingénieurs stagiaires.</li>
                    <!-- <li><i class="ri-check-double-line" style="text-align:justify;"></i> </li> -->
                  </ul>
                  <!-- <h3>Quelles sont les instances de gouvernance ? </h3>
                  <p class="">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="" id="formulaire">
                  <div>
                    <h3 style="">Rejoignez l'annuaire international des compétences du Gabon et de la diaspora.</h3>
                  </div>
                  <div style="background-color:#1e4152;color:white;padding:20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;border-radius: 10px;">
                    <form action="traitement.php" method="POST" class="formData">
                      <div class="row">
                        <div class="col-md-12 alert-display" style="padding-bottom:15px;">
                          <span style="font-size:25px;">
                            <div class="alert alert-success alert-success-ing" role="alert">
                            </div>

                            <div class="alert alert-danger alert-danger-ing" role="alert">
                            </div>
                          </span>
                        </div>

                        <div class="form-group col-md-6">
                          <label for="exampleInputPassword1">Nom</label>
                          <input type="text" name="nom" class="form-control" id="exampleInputPassword1" placeholder="">
                          <!-- <small id="emailHelp" class="form-text" style="color:red;">Le nom est obligatoire.</small> -->
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputPassword1">Prénom</label>
                          <input type="text" name="prenom" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputPassword1">Pays de résidence</label>
                          <select name="pays" class="custom-select form-control select21">
                            <?php if(!empty($listPays)):  ?>
                            <?php foreach($listPays as $item):  ?>
                            <!-- <option selected></option> -->
                            <option style="height:190px !important;" value="<?=$item['name_fr']  ?>" <?=$donnees_visitor['pays']===$item['name_fr']?"selected" :''?> ><?=$item['name_fr']  ?></option>
                            <?php endforeach  ?>
                            <?php endif  ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputPassword1">Ville</label>
                          <input type="text" name="ville" value="<?=!empty($donnees_visitor['ville'])?$donnees_visitor['ville']:"";?>" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        
                        <div class="form-group col-md-12">
                          <label for="exampleInputPassword1">Nom de l'école ou de l'université</label>
                          <input type="text" name="etablissement" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        
                        <!-- <div class="form-group col-md-12">
                          <label for="exampleInputPassword1">Spécialité</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                          </div> -->
                        <!-- <div class="form-group col-md-12">
                          <label for="exampleInputPassword1">Titre universitaire ou diplôme d'école</label>
                          <input type="text" name="titre" class="form-control" id="exampleInputPassword1" placeholder=""> -->
                          <!-- <select name="titre" class="custom-select form-control">
                            <optgroup label="Formation générale">
                              <option  value="3">BAC</option>
                              <option  value="4">BAC+1</option>
                              <option  value="5">BAC+2</option>
                              <option  value="6">BAC+3</option>
                              <option  value="7">BAC+4</option>
                              <option  value="8">BAC+5</option>
                              <option  value="9">BAC+6</option>
                              <option  value="15">DOCTORAT</option>
                            </optgroup>
                            <optgroup label="Formation professionnelle">
                              <option  value="18">BTS</option>
                              <option  value="19">DUT</option>
                              <option  value="20">CAP</option>
                              <option  value="21">CFP</option>
                              <option  value="25">CQP</option>
                            </optgroup>
                            <option value="0">Autre diplôme</option>
                          </select> -->
                        <!-- </div> -->
                        <div class="form-group col-md-12">
                          <label for="exampleInputPassword1">Domaine d'étude ou spécialité</label>
                          <input type="text" name="formation" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail1">Diplôme universitaire ou d'école</label>
                          <input type="text" name="diplome" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputPassword1">Promotion</label>
                          <input type="text" name="promotion" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                          <label for="exampleInputPassword1">Fonction exercée</label>
                          <input type="text" name="fonction" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputPassword1">Secteur d'activité</label>
                          <input type="text" name="secteur" class="form-control" id="exampleInputPassword1" placeholder="">
                          <!-- <select name="secteur" class="custom-select form-control">
                            <option selected></option>
                            <option  value="1">Agriculture et élevage</option>
                            <option  value="2">Architecture</option>
                            <option  value="3">Artisanat d'art</option>
                            <option  value="4">Arts du spectacle</option>
                            <option  value="5">Audiovisuel et journalisme</option>
                            <option  value="6">Audit - Conseil</option>
                            <option  value="7">Automobile</option>
                            <option  value="8">Bien-être</option>
                            <option  value="9">Bâtiment et travaux publics (BTP)</option>
                            <option  value="10">Commerce et distribution</option>
                            <option  value="11">Comptabilité, gestion, ressources humaines</option>
                            <option  value="12">Construction aéronautique, ferroviaire et navale</option>
                            <option  value="13">Culture - Patrimoine</option>
                            <option  value="14">Droit et justice</option>
                            <option  value="15">Défense</option>
                            <option  value="16">Edition, librairie, bibliothèque</option>
                            <option  value="17">Electronique</option>
                            <option  value="18">Energie et étude des sols</option>
                            <option  value="19">Enseignement et formation</option>
                            <option  value="20">Environnement</option>
                            <option  value="21">Filière bois</option>
                            <option  value="22">Finance, banque et assurances</option>
                            <option  value="23">Fonction publique</option>
                            <option  value="24">Hôtellerie - Restauration</option>
                            <option  value="25">Industrie</option>
                            <option  value="26">Industrie alimentaire</option>
                            <option  value="27">Industrie chimique</option>
                            <option  value="28">Informatique et télécoms</option>
                            <option  value="29">Internet - Ecommerce</option>
                            <option  value="30">Logistique et transport</option>
                            <option  value="31">Maintenance et entretien</option>
                            <option  value="32">Marketing, publicité</option>
                            <option  value="33">Mode et textile</option>
                            <option  value="34">Mécanique</option>
                            <option  value="35">Recherche</option>
                            <option  value="36">Santé</option>
                            <option  value="37">Services à la personne ou à la collectivité</option>
                            <option  value="38">Social</option>
                            <option  value="39">Sport</option>
                            <option  value="40">Sécurité</option>
                            <option  value="41">Tourisme</option>
                          </select> -->
                        </div>
                        
                       
                        <div class="form-group col-md-12">
                          <label for="exampleInputPassword1">Email</label>
                          <input type="email" name="email" required class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="exampleInputPassword1">Tél.</label>
                          <input type="text" name="tel" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <!-- <div class="form-group col-md-6">
                          <label for="exampleInputPassword1">Page Linkedin <i class="bi bi-linkedin"></i></label>
                          <input type="text" name="linkedin" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputPassword1">Page Facebook <i class="bi bi-facebook"></i></label>
                          <input type="text" name="facebook" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div> -->
                        <div class="col-md-12" style="text-align:center;">
                          <br>
                          <div class="display_loaging_store" style="display:none;">
                            <img src="assets/img/loading.gif" style="width:50px;" alt="">
                          </div>
                          <!-- <button type="reset" class="btn btn-danger">Annuler</button> -->
                          <button type="submit" class="btn btn-success formSubmit"> <i class="bi bi-person-fill-up"></i> S'inscrire</button>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
            
            
            <!-- <div class="col-lg-6 pt-4 pt-lg-0">
              <h3>Quelles sont les instances de gouvernance ? </h3>
                <p class="">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
              </div> -->
            <style>
              .form-group{
              margin-bottom: 10px;
              }
            </style>
            
          </div>
        </div>
      </section>
      <!-- End About Section -->
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
          <div class="row load_page">
           
            <!-- <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img src="assets/img/equipe/avatar_woman1.png" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                </div>
              </div>
            </div> -->
            
          </div>
          <div style="text-align:center;">
          <div class="display_loaging_load" style="display:none;">
            <img src="assets/img/loading.gif" style="width:50px;" alt="">
          </div>
            <button style=" background-color:#1e4152;color:white;" data-page="1" class="btn btn-lg btn-sm sx load_more"><i class="bi bi-arrow-clockwise  "></i> Voir plus</button>
          </div>
        </div>
      </section>
      
      <style>
        section {
    padding: 30px 0;
    overflow: hidden;
}
      </style>
       <section id="contact" class="contact section-bg">
       <div class="container">
        
          <div class="section-title">
          <h3 style="
              font-weight: 500;
              line-height: 32px;
              font-size: 24px;
              color: #4d8090;
              ">Nous contacter</h3>
            <p>Pour toutes questions ou suggestions, veuillez nous contacter via le formulaire ci-dessous.</p>
          </div>
        </div>
        
        <div class="container">
          <div class="row justify-content-center">
            <!--
            <div class="col-lg-10">
        
              <div class="info-wrap">
                <div class="row">
                  <div class="col-lg-4 info">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Location :</h4>
                    <p>1 allée Berlioz<br>92320 Chatillon</p>
                  </div>
        
                  <div class="col-lg-4 info mt-4 mt-lg-0">
                    <i class="bi bi-envelope"></i>
                    <h4>Email :</h4>
                    <p>info@example.com<br>contact@example.com</p>
                  </div>
        
                  <div class="col-lg-4 info mt-4 mt-lg-0">
                    <i class="bi bi-phone"></i>
                    <h4>Tél. :</h4>
                    <p>+1 5589 55488 51<br>+1 5589 22475 14</p>
                  </div>
                </div>
              </div>
        
            </div>
        
          </div>
       -->
        
          <div class="row justify-content-center">
          <div class="col-lg-10 alert-display-message" style="padding-bottom:15px;">
              <span style="font-size:25px;">
                <div class="alert alert-success alert-success-message" role="alert">
                </div>

                <div class="alert alert-danger alert-danger-message" role="alert">
                </div>
              </span>
            </div>
            <div class="col-lg-10">
              <form action="" method="POST" role="form" class="php-email-form formDataMessage">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="exampleInputPassword1">Nom</label>
                    <input type="text" name="noms" class="form-control" id="nom" placeholder="Votre nom" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="mail" id="email" placeholder="Votre adresse email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <label for="exampleInputPassword1">Sujet</label>
                  <input type="text" class="form-control" name="sujet" id="sujet" placeholder="Sujet" required>
                </div>
                <div class="form-group mt-3">
                  <label for="exampleInputPassword1">Message</label>
                  <textarea class="form-control" name="contenu" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="form-group mt-3">
                  <label for="exampleInputPassword1">Joindre un document</label>
                  <input type="file" class="form-control" name="document" id="sujet" placeholder="" accept=".pdf">
                </div>
                <div class="my-3">
                  <!-- <div class="loading">Loading</div> -->
                  <div class="error-message"></div>
                  <!-- <div class="sent-message">Your message has been sent. Thank you!</div> -->
                </div>
                <div class="display_loaging_store_message" style="display:none;">
                  <img src="assets/img/loading.gif" style="width:50px;" alt="">
                </div>
                <div class="text-center" style="">
                <button type="submit" style="background-color:#1e4152;color:white;" class="btn btn-lg btn-sm sx formSubmitMessage"><i class="bi bi-send"></i> Envoyer le message</button>
                </div>
                
              </form>
            </div>
        
          </div>
        
        </div>
        </section> 
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
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      var listPays= <?=json_encode($listPays) ?>;
        function getCodePays(listPays,val){
          var code='';
          for(item in listPays){
            if(val===listPays[item].name_fr){
              code=listPays[item].code_telephone;
            }
          }
          return code;
        }
      $(document).ready(function(){
        var pays_selected = $("select[name='pays']").val();
        var code_pays=getCodePays(listPays,pays_selected);
        $("input[name='tel']").val("+"+code_pays);
        $("select[name='pays']").on("change",function(){
          pays_selected = $(this).val();
          code_pays=getCodePays(listPays,pays_selected);
          $("input[name='tel']").val("+"+code_pays);
        })
      })
    </script>
    <script>
      $(document).ready(function(){
        
        $(".alert-display").hide();
        $(".formSubmit").on("click", function(e){
            e.preventDefault();
            if(validationForm()){
              $(".display_loaging_store").show();
              let data = $(".formData").serialize();
              
              $(".alert-display").show();
              $.post("traitement.php", data, function(rep){
                  if(parseInt(rep)>0){
                    loadData(1);
                    $(".alert-danger-ing").hide();
                    $(".alert-success-ing").show();
                    $(".alert-success-ing").text("Nous vous remercions d'avoir fourni vos informations !");
                  }else if(parseInt(rep)==-1){
                    $(".alert-success-ing").hide();
                    $(".alert-danger-ing").show();
                    $(".alert-danger-ing").text("Vos informations existent déjà!");
                  }
                  $(".display_loaging_store").hide();
                  afterValidationEmpty();
                  $(".formData")[0].reset(); // Utilisez [0] pour accéder à l'élément DOM natif
              });
            }
        });
      });
    </script>

<script>
      $(document).ready(function(){
        
        $(".alert-display-message").hide();
        $(".formSubmitMessage").on("click", function(e){
            e.preventDefault();
            if(validationFormMessage()){
              $(".display_loaging_store_message").show();
              // let data = $(".formDataMessage").serialize();
              var data = new FormData($(".formDataMessage")[0]);
              $(".alert-display-message").show();

              $.ajax({
                  url: "traitementMessage.php",
                  type: "POST",
                  data: data,
                  processData: false,
                  contentType: false,
                  success: function(rep) {
                    if(parseInt(rep)>0){
                      loadData(1);
                      $(".alert-danger-message").hide();
                      $(".alert-success-message").show();
                      $(".alert-success-message").text("Nous vous remercions de votre patience. Nous vous répondrons dès que possible.");
                    }else if(parseInt(rep)==-1){
                      $(".alert-success-message").hide();
                      $(".alert-danger-message").show();
                      $(".alert-danger-message").text("Vos informations existent déjà!");
                    }
                    $(".display_loaging_store_message").hide();
                    afterValidationEmptyMessage();
                    $(".formDataMessage")[0].reset(); 
                    },
                  error: function(error) {
                      // Gérer les erreurs ici
                      console.log(error);
                  }
              });


              // $.post("traitementMessage.php", data, function(rep){
              //     if(parseInt(rep)>0){
              //       loadData(1);
              //       $(".alert-danger-message").hide();
              //       $(".alert-success-message").show();
              //       $(".alert-success-message").text("Nous vous remercions de votre patience. Nous vous répondrons dès que possible.");
              //     }else if(parseInt(rep)==-1){
              //       $(".alert-success-message").hide();
              //       $(".alert-danger-message").show();
              //       $(".alert-danger-message").text("Vos informations existent déjà!");
              //     }
              //     $(".display_loaging_store_message").hide();
              //     afterValidationEmptyMessage();
              //     $(".formDataMessage")[0].reset(); // Utilisez [0] pour accéder à l'élément DOM natif
              // });
            }
        });
      });
    </script>

    <script>
      function loadData(page){
        $(".display_loaging_load").show();
        $.get("page.php",{page:page},function(data){
          $(".load_page").append(data);
          $(".display_loaging_load").hide();
        })
      }

      function validationForm(){
        let nom=$("input[name='nom']").val();
        let prenom=$("input[name='prenom']").val();
        let email=$("input[name='email']").val();
        let tel=$("input[name='tel']").val();

        let secteur=$("input[name='secteur']").val();
        let fonction=$("input[name='fonction']").val();
        let promotion=$("input[name='promotion']").val();
        let diplome=$("input[name='diplome']").val();
        let etablissement=$("input[name='etablissement']").val();
        let pays=$("select[name='pays']").val();
        let ville=$("input[name='ville']").val();
        let formation=$("input[name='formation']").val();

        let valid_ = secteur == "" || fonction =="" || promotion =="" || diplome =="" || etablissement =="" || pays =="" || ville =="" || formation =="";

        if(email!==""){
          if(!validateEmail(email)){
            $("input[name='email']").css("border","2px solid red");
            $("input[name='email']").attr("placeholder","L'adresse mail est invalide");
            return false;
          }
        }
      

        if(nom==="" || prenom==="" || email==="" || tel.length<6 || valid_){
          if(secteur==""){
            $("input[name='secteur']").css("border","2px solid red");
            $("input[name='secteur']").attr("placeholder","Le secteur est obligatoire");
          }
          if(fonction==""){
            $("input[name='fonction']").css("border","2px solid red");
            $("input[name='fonction']").attr("placeholder","Le fonction est obligatoire");
          }

          if(promotion==""){
            $("input[name='promotion']").css("border","2px solid red");
            $("input[name='promotion']").attr("placeholder","Le promotion est obligatoire");
          }

          if(diplome==""){
            $("input[name='diplome']").css("border","2px solid red");
            $("input[name='diplome']").attr("placeholder","Le diplome est obligatoire");
          }

          if(etablissement==""){
            $("input[name='etablissement']").css("border","2px solid red");
            $("input[name='etablissement']").attr("placeholder","L'établissement est obligatoire");
          }

          if(pays==""){
            $("select[name='pays']").css("border","2px solid red");
            $("select[name='pays']").attr("placeholder","Le pays est obligatoire");
          }

          if(ville==""){
            $("input[name='ville']").css("border","2px solid red");
            $("input[name='ville']").attr("placeholder","La ville est obligatoire");
          }

          if(formation==""){
            $("input[name='formation']").css("border","2px solid red");
            $("input[name='formation']").attr("placeholder","La formation est obligatoire");
          }

          if(nom==""){
            $("input[name='nom']").css("border","2px solid red");
            $("input[name='nom']").attr("placeholder","Le nom est obligatoire");
          }

          if(prenom==""){
            $("input[name='prenom']").css("border","2px solid red");
            $("input[name='prenom']").attr("placeholder","Le prénom est obligatoire");
          }
          if(email==""){
            $("input[name='email']").css("border","2px solid red");
            $("input[name='email']").attr("placeholder","L'adresse mail est obligatoire");
          }

          if(tel.length<6){
            $("input[name='tel']").css("border","2px solid red");
            $("input[name='tel']").attr("placeholder","Le numéro de téléphone est obligatoire");
          }
          return false;
        }

        return true;
      }

      function validationFormMessage(){
        let nom=$("input[name='noms']").val();
        let sujet=$("input[name='sujet']").val();
        let mail=$("input[name='mail']").val();
        let contenu=$("textarea[name='contenu']").val();

        if(!validateEmail(mail)){
          $("input[name='mail']").css("border","2px solid red");
          $("input[name='mail']").attr("placeholder","L'adresse mail est invalide");
          return false;
        }
        
        if(nom==="" || sujet==="" || mail==="" || contenu===""){
          if(nom===""){
            $("input[name='noms']").css("border","2px solid red");
            $("input[name='noms']").attr("placeholder","Le nom est obligatoire");
          }
          if(sujet===""){
            $("input[name='sujet']").css("border","2px solid red");
            $("input[name='sujet']").attr("placeholder","Le sujet est obligatoire");
          }
          if(mail===""){
            $("input[name='mail']").css("border","2px solid red");
            $("input[name='mail']").attr("placeholder","L'adresse mail est obligatoire");
          }

          if(contenu===""){
            $("textarea[name='contenu']").css("border","2px solid red");
            $("textarea[name='contenu']").attr("placeholder","Veuillez écrire votre message");
          }
          return false;
        }

        return true;
      }


      function onEvent(obj){
        obj.css("border","");
        obj.attr("placeholder","");
        if(obj.val()!==""){
          obj.css({
                "border": "3px solid #198754",  
                "outline": "2px double white" 
            });
          }else{
            obj.css("border","2px solid red");
          }
      }

      function onEventEmpty(obj){
        obj.attr("placeholder","");
        obj.css({
              "border": "",  
              "outline": "" 
        });
       
      }

      function validateEmail(email) {
            // Expression régulière pour la validation de l'adresse e-mail
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Vérifier si l'adresse e-mail est valide
            if (emailRegex.test(email)) {
                return true; // L'adresse e-mail est valide, effacer le message d'erreur
            } else {
                return false;
            }
        }

      function afterValidationEmpty(){
       
        onEventEmpty($("input[name='nom']"));
       
        onEventEmpty($("input[name='prenom']"));

        onEventEmpty($("input[name='email']"));

        onEventEmpty($("input[name='ville']"));

        onEventEmpty($("input[name='etablissement']"));

        onEventEmpty($("input[name='formation']"));
      
        onEventEmpty($("input[name='diplome']"));
       
        onEventEmpty($("input[name='titre']"));
     
        onEventEmpty($("input[name='promotion']"));

        onEventEmpty($("input[name='tel']"));

        onEventEmpty($("input[name='facebook']"));

        onEventEmpty($("input[name='linkedin']"));

        onEventEmpty($("input[name='domaine']"));

        onEventEmpty($("input[name='secteur']"));

        onEventEmpty($("select[name='pays']"));
     
        onEventEmpty($("input[name='fonction']"));

      }

      function afterValidationEmptyMessage(){
       
       onEventEmpty($("input[name='noms']"));
      
       onEventEmpty($("input[name='mail']"));

       onEventEmpty($("input[name='sujet']"));

       onEventEmpty($("textarea[name='contenu']"));

     }

      function validation(){
        $("input[name='nom']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='prenom']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='email']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='ville']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='etablissement']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='formation']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='diplome']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='titre']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='promotion']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='tel']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='facebook']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='linkedin']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='domaine']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='secteur']").keyup(function(){
          onEvent($(this));
        })

        $("select[name='pays']").change(function(){
          onEvent($(this));
        })

        $("input[name='fonction']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='noms']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='mail']").keyup(function(){
          onEvent($(this));
        })

        $("input[name='sujet']").keyup(function(){
          onEvent($(this));
        })

        $("textarea[name='contenu']").keyup(function(){
          onEvent($(this));
        })

      }
      $(document).ready(function(){
        loadData(1);
        validation();
        $(".load_more").click(function(e){
          e.preventDefault();
          let page=$(this).attr("data-page");
          page++;
          loadData(page);
          $(this).attr("data-page",page);
          
        })
     
      });
    </script>
    <script>
      $(document).ready(function(){
        $('.select2').select2();
      })
    </script>
  </body>
</html>