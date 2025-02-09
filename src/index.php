<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Engineers</title>
    <meta content="Join the order of engineers, researchers, and all scientists." name="description">  
    <meta content="The Order of Engineers, application form, engineering professionals" name="keywords">  

    <!-- Favicons -->
  
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
     
      $donnees_visitor=array();
      $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$vis_ip));   
      $donnees_visitor['pays']=$ipdat->geoplugin_countryName; 
      
      ?>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1><a href="/"><b style="color:#da7c43;">Eng</b> <b></b></a></h1>
        </div>
        <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#formulaire">Registration</a></li>
            <li><a class="nav-link scrollto" href="#team">Committee</a></li>
            <li><a class="nav-link scrollto" href="/login">Login</a></li>
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
}
    </style>
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" style="background-image: 'assets/img/accueil1.jpeg' !important;">
    <div class="hero-container">
        <h1 class="titre_taille"><?=mb_strtoupper("PROJECT FOR THE CREATION OF") ?></h1>
        <h1 class="titre_taille"><?=mb_strtoupper("THE ORDER OF ENGINEERS OF GABON") ?></h1>
    </div>

    </section>
    <!-- End Hero -->
    <main id="main">
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">
            <div class="row content">
                <div class="col-lg-12">
                    <h3 style="font-size:35px;">Our Vision</h3>

                    <p style="text-align:justify;padding-top:15px;">We are a professional, non-political public utility body. Our vision is to bring together all engineers around development issues across various sectors of activity.</p>
                    <br>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12" style="padding-bottom:30px;">
                            <h3 style="font-size:35px;">Our Missions</h3>
                            <ul style="text-align:justify;">
                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Promote, guarantee, and regulate the engineering profession;</li>
                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> List and unite engineers, researchers, and scientists;</li>
                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Validate qualifications to access the title of engineer;</li>
                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Ensure ethics, deontology, and quality of engineers' work;</li>
                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Ensure continuous skills development through ongoing training and technological watch;</li>
                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Guide schools and universities towards a culture of excellence;</li>
                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Advise and participate in actions by public and private authorities on strategic issues;</li>
                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Be of public utility by protecting citizens.</li>
                            </ul>
                        </div>

                        <div class="col-lg-12 pt-4 pt-lg-0">
                            <h3>Who can join the engineers' order?</h3>
                            <ul>
                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Graduate engineers;</li>

                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Certified engineering firms;</li>

                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Engineering professionals working individually or in companies;</li>

                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Engineering associations or federations;</li>

                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Schools and universities accredited by the Engineers' Order through its title and diploma validation commission;</li>

                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Sector-specific engineering orders;</li>

                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Engineering students;</li>

                                <li><i class="ri-check-double-line" style="text-align:justify;"></i> Engineering interns.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="" id="formulaire">
                        <div>
                            <h3 style="">Join the international directory of engineering skills and the diaspora.</h3>
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
                                        <label for="exampleInputPassword1">Last Name</label>
                                        <input type="text" name="nom" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">First Name</label>
                                        <input type="text" name="prenom" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Country of Residence</label>
                                        <select name="pays" class="custom-select form-control select21">
                                            <?php if(!empty($listPays)):  ?>
                                            <?php foreach($listPays as $item):  ?>
                                            <option style="height:190px !important;" value="<?=$item['name_fr']  ?>" <?=$donnees_visitor['pays']===$item['name_fr']?"selected" :''?> ><?=$item['name_fr']  ?></option>
                                            <?php endforeach  ?>
                                            <?php endif  ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">City</label>
                                        <input type="text" name="ville" value="<?=!empty($donnees_visitor['ville'])?$donnees_visitor['ville']:"";?>" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputPassword1">School or University Name</label>
                                        <input type="text" name="etablissement" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputPassword1">Field of Study or Specialization</label>
                                        <input type="text" name="formation" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">University or School Degree</label>
                                        <input type="text" name="diplome" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Promotion</label>
                                        <input type="text" name="promotion" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Position Held</label>
                                        <input type="text" name="fonction" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Sector of Activity</label>
                                        <input type="text" name="secteur" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" name="email" required class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" name="tel" class="form-control" id="exampleInputPassword1" placeholder="">
                                    </div>

                                    <div class="col-md-12" style="text-align:center;">
                                        <br>
                                        <div class="display_loaging_store" style="display:none;">
                                            <img src="assets/img/loading.gif" style="width:50px;" alt="">
                                        </div>
                                        <button type="submit" class="btn btn-success formSubmit"> <i class="bi bi-person-fill-up"></i> Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                  ">The Reflection Committee of the Engineers' Order</h3>
            </div>
            <div class="row load_page">
            </div>
            <div style="text-align:center;">
                <div class="display_loaging_load" style="display:none;">
                    <img src="assets/img/loading.gif" style="width:50px;" alt="">
                </div>
                <button style="background-color:#1e4152;color:white;" data-page="1" class="btn btn-lg btn-sm sx load_more"><i class="bi bi-arrow-clockwise"></i> See More</button>
            </div>
        </div>
    </section>

      
      <style>
        section {
            padding: 30px 0;
            overflow: hidden;
        }
      </style>
       
   
      
       <footer id="footer">
          <div class="container footer-bottom clearfix" style="padding-top:40px;">
              <div class="copyright">
                  &copy; Copyright <strong><span>The Reflection Committee of the Engineers' Order</span></strong>
              </div>
              <!-- <div class="credits">
                Designed by <a href="">Pascal Dissivouloud</a>
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
                  if(parseInt(rep) > 0){
                    loadData(1);
                    $(".alert-danger-ing").hide();
                    $(".alert-success-ing").show();
                    $(".alert-success-ing").text("Thank you for providing your information!");
                  }else if(parseInt(rep) == -1){
                    $(".alert-success-ing").hide();
                    $(".alert-danger-ing").show();
                    $(".alert-danger-ing").text("Your information already exists!");
                  }
                  $(".display_loaging_store").hide();
                  afterValidationEmpty();
                  $(".formData")[0].reset(); // Use [0] to access the native DOM element
              });
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
        let nom = $("input[name='nom']").val();
        let prenom = $("input[name='prenom']").val();
        let email = $("input[name='email']").val();
        let tel = $("input[name='tel']").val();

        let secteur = $("input[name='secteur']").val();
        let fonction = $("input[name='fonction']").val();
        let promotion = $("input[name='promotion']").val();
        let diplome = $("input[name='diplome']").val();
        let etablissement = $("input[name='etablissement']").val();
        let pays = $("select[name='pays']").val();
        let ville = $("input[name='ville']").val();
        let formation = $("input[name='formation']").val();

        let valid_ = secteur == "" || fonction == "" || promotion == "" || diplome == "" || etablissement == "" || pays == "" || ville == "" || formation == "";

        // Validate email if not empty
        if (email !== "") {
            if (!validateEmail(email)) {
                $("input[name='email']").css("border", "2px solid red");
                $("input[name='email']").attr("placeholder", "Invalid email address");
                return false;
            }
        }

        // Check if required fields are empty and set errors
        if (nom === "" || prenom === "" || email === "" || tel.length < 6 || valid_) {

            if (secteur === "") {
                $("input[name='secteur']").css("border", "2px solid red");
                $("input[name='secteur']").attr("placeholder", "Sector is required");
            }

            if (fonction === "") {
                $("input[name='fonction']").css("border", "2px solid red");
                $("input[name='fonction']").attr("placeholder", "Function is required");
            }

            if (promotion === "") {
                $("input[name='promotion']").css("border", "2px solid red");
                $("input[name='promotion']").attr("placeholder", "Promotion is required");
            }

            if (diplome === "") {
                $("input[name='diplome']").css("border", "2px solid red");
                $("input[name='diplome']").attr("placeholder", "Degree is required");
            }

            if (etablissement === "") {
                $("input[name='etablissement']").css("border", "2px solid red");
                $("input[name='etablissement']").attr("placeholder", "Institution is required");
            }

            if (pays === "") {
                $("select[name='pays']").css("border", "2px solid red");
                $("select[name='pays']").attr("placeholder", "Country is required");
            }

            if (ville === "") {
                $("input[name='ville']").css("border", "2px solid red");
                $("input[name='ville']").attr("placeholder", "City is required");
            }

            if (formation === "") {
                $("input[name='formation']").css("border", "2px solid red");
                $("input[name='formation']").attr("placeholder", "Field of study is required");
            }

            if (nom === "") {
                $("input[name='nom']").css("border", "2px solid red");
                $("input[name='nom']").attr("placeholder", "Last name is required");
            }

            if (prenom === "") {
                $("input[name='prenom']").css("border", "2px solid red");
                $("input[name='prenom']").attr("placeholder", "First name is required");
            }

            if (email === "") {
                $("input[name='email']").css("border", "2px solid red");
                $("input[name='email']").attr("placeholder", "Email address is required");
            }

            if (tel.length < 6) {
                $("input[name='tel']").css("border", "2px solid red");
                $("input[name='tel']").attr("placeholder", "Phone number is required");
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