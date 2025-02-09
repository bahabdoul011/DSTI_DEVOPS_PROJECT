<?php
$dsn = "mysql:host=db;dbname=mydatabase";  // 'db' est le nom du service MySQL dans docker-compose.yml
$username = "myuser";                      // Utilisateur de la base de données
$password = "mypassword";

try {
  // Connexion à la base de données avec PDO
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connexion à la base de données réussie.";
} catch (PDOException $e) {
  // En cas d'erreur, afficher un message d'erreur
  die("Erreur de connexion : " . $e->getMessage());
}

// Define the array containing the engineers' data
$LIST = array(
  0 => array('nom' => 'MOULENGUE MOMBO', 'prenom' => 'Olivier', 'etablissement' => 'EPITA', 'diplome' => 'Ingénieur', 'promotion' => '2006'),
  1 => array('nom' => 'BOULINGUI MOUENFJI', 'prenom' => 'Constant', 'etablissement' => 'ESIGETEL (Efrei)', 'diplome' => 'ingénieur', 'promotion' => '2000'),
  2 => array('nom' => 'MBADINGA', 'prenom' => 'Gelase', 'etablissement' => '', 'diplome' => '', 'promotion' => ''),
  3 => array('nom' => 'MBACKY', 'prenom' => 'Clause', 'etablissement' => 'ESIGELEC', 'diplome' => 'ingénieur', 'promotion' => '2007'),
  4 => array('nom' => 'OLENDE OLENDE', 'prenom' => 'Damien', 'etablissement' => 'ESIGELEC', 'diplome' => 'ingénieur', 'promotion' => '2008'),
  5 => array('nom' => 'MOUSSAVOU', 'prenom' => 'Pontien Romanic', 'etablissement' => 'ESAIP', 'diplome' => 'ingénieur', 'promotion' => ''),
  6 => array('nom' => 'EKOMI', 'prenom' => 'Rebecca', 'etablissement' => 'IMT-BS', 'diplome' => 'ingénieur', 'promotion' => '2010'),
  7 => array('nom' => 'Mme Sandra TAHIRO APERANO née MEDZA M\'ADZABA', 'prenom' => '', 'etablissement' => 'EPITA', 'diplome' => 'ingénieur', 'promotion' => '2010'),
  8 => array('nom' => 'REZENDJANI REMBOGO', 'prenom' => 'Steeve Hermann', 'etablissement' => 'ESME Sudria', 'diplome' => 'ingénieur', 'promotion' => '2010'),
  9 => array('nom' => 'MBA ABOGHE', 'prenom' => 'Valéry', 'etablissement' => 'ECAM-Rennes', 'diplome' => 'ingénieur', 'promotion' => '2005'),
  10 => array('nom' => 'MEZUI MAMADOU', 'prenom' => 'Yanick', 'etablissement' => 'ISEP', 'diplome' => 'ingénieur', 'promotion' => '2005'),
  11 => array('nom' => 'BIKANG ABOGHE', 'prenom' => 'Félicien', 'etablissement' => 'EFREI', 'diplome' => 'ingénieur', 'promotion' => '2001'),
  12 => array('nom' => 'ELLA', 'prenom' => 'Franck', 'etablissement' => 'ECE', 'diplome' => 'ingénieur', 'promotion' => '1999'),
  13 => array('nom' => 'MBONGUI NGADI MBONGO', 'prenom' => 'Jonas', 'etablissement' => 'ECE', 'diplome' => 'ingénieur', 'promotion' => '2000'),
  14 => array('nom' => 'OBAME BIYOGHO', 'prenom' => 'Arthur', 'etablissement' => 'ESIGETEL (Efrei)', 'diplome' => 'ingénieur', 'promotion' => '2000'),
  15 => array('nom' => 'MAVIOGA', 'prenom' => 'Patrick', 'etablissement' => 'univ. Polytechnique Hauts-de-France', 'diplome' => 'master2', 'promotion' => '2000'),
  16 => array('nom' => 'ZENG ADZABE', 'prenom' => 'Joris', 'etablissement' => 'univ. D\'Artois', 'diplome' => 'master 2', 'promotion' => '2019'),
  17 => array('nom' => 'OBIANG MINTO\'O', 'prenom' => 'Charles Mauril', 'etablissement' => 'univ. Polytechnique de Masuku', 'diplome' => 'ingénieur', 'promotion' => '2005'),
  18 => array('nom' => 'MAYANDJI', 'prenom' => 'tex Derryck', 'etablissement' => 'Ecole. Polytechnique d\'Orléans', 'diplome' => 'ingénieur', 'promotion' => '2013'),
  19 => array('nom' => 'NGOMO', 'prenom' => 'Valéry', 'etablissement' => 'Ecole Centrale Nantes', 'diplome' => 'ingénieur', 'promotion' => '2005'),
);

function seedEngineers() {
  // Loop through the array of engineers
  global $pdo;
  foreach ($LIST as $engineer) {
      $nom = $engineer['nom'];
      $prenom = $engineer['prenom'];
      $etablissement = $engineer['etablissement'];
      $diplome = $engineer['diplome'];
      $promotion = $engineer['promotion'];

      // Prepare and execute the SQL query to insert data into the engineers table
      $stmt = $pdo->prepare("INSERT INTO engineers (nom, prenom, etablissement, diplome, promotion) VALUES (?, ?, ?, ?, ?)");
      $stmt->execute([$nom, $prenom, $etablissement, $diplome, $promotion]);
  }

  echo "Engineers data seeded successfully.";
}


function createEngineerTable() {
    global $pdo;

    try {

        $pdo->exec("DROP TABLE IF EXISTS engineers");
        echo  "Création of the table engineers ".date('Y-m-d h:i:s');
        $pdo->exec("CREATE TABLE IF NOT EXISTS engineers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(100),
            prenom VARCHAR(50),
            email VARCHAR(100),
            pays VARCHAR(100),
            ville VARCHAR(50),
            etablissement VARCHAR(100),
            formation VARCHAR(100),
            diplome VARCHAR(50),
            fonction VARCHAR(100),
            secteur VARCHAR(100),
            promotion VARCHAR(50),
            tel VARCHAR(50),
            linkedin VARCHAR(191),
            facebook VARCHAR(191),
            created_at DATE
        )");

        echo "Table 'engineers' créée avec succès.";
    } catch (PDOException $e) {
        die("Erreur lors de la création de la table : " . $e->getMessage());
    }
}

function createUsersTable() {
    global $pdo;
  
    try {
      $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(100),
        email VARCHAR(100),
        password VARCHAR(255),
        last_connection_date DATE
      )");
  
      echo "Table 'users' créée avec succès.";
    } catch (PDOException $e) {
      die("Erreur lors de la création de la table : " . $e->getMessage());
    }
  }

  function dateFrancais($date) {
    // Définir la timezone à utiliser (à ajuster selon votre besoin)
    $timezone = new DateTimeZone('Europe/Paris');

    // Convertir la date en objet DateTime
    $dateTime = is_numeric($date) ? new DateTime("@$date", $timezone) : new DateTime($date, $timezone);

    // Formater la date au format français
    $dateFrancais = $dateTime->format('d/m/Y');

    // Retourner la date en français
    return $dateFrancais;
}

function isFile($filePath) {
  $filePath="../../".$filePath;
  if (file_exists($filePath) && is_file($filePath)) {
      return true;
  } else {
      return false;
  }
}


function registerDefaultUser() {
    // Définition des valeurs par défaut
    global $pdo;
    $nom = "Admin";
    $email = "admin@ctri.com";
    $password = "CTR1G@bon";
  
    // Hachage du mot de passe
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
  
    // Enregistrement de l'utilisateur
    $sql = "INSERT INTO users (nom, email, password, last_connection_date)
      VALUES (?, ?, ?, CURRENT_DATE())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $email, $passwordHash]);
  
    // Affichage d'un message de succès
    echo "Utilisateur enregistré avec succès.";
  }
  
  function authenticateUser(string $email, string $password) {
    global $pdo;
    // Vérification de la validité de l'adresse e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return false;
    }
  
    // Hachage du mot de passe
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
  
    // Vérification de l'existence de l'utilisateur
    $sql = "SELECT id, nom, email, password, last_connection_date
      FROM users
      WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
  
    $user = $stmt->fetch();
  
    // Si l'utilisateur existe, vérification du mot de passe
    if ($user && password_verify($password, $user["password"])) {
      // L'utilisateur est authentifié
      return $user;
    } else {
      // L'utilisateur n'est pas authentifié
      return false;
    }
  }




function insertEngineerData($data) {
    global $pdo;
    $nom = !empty($data['nom']) ? $data['nom'] : '';
    $prenom = !empty($data['prenom']) ? $data['prenom'] : '';
    $email = !empty($data['email']) ? $data['email'] : '';
    $pays = !empty($data['pays']) ? $data['pays'] : '';
    $ville = !empty($data['ville']) ? $data['ville'] : '';
    $etablissement = !empty($data['etablissement']) ? $data['etablissement'] : '';
    $formation = !empty($data['formation']) ? $data['formation'] : '';
    $diplome = !empty($data['diplome']) ? $data['diplome'] : '';
    $fonction = !empty($data['fonction']) ? $data['fonction'] : '';
    $secteur = !empty($data['secteur']) ? $data['secteur'] : '';
    $promotion = !empty($data['promotion']) ? $data['promotion'] : '';
    $tel = !empty($data['tel']) ? $data['tel'] : '';
    $linkedin = !empty($data['linkedin']) ? $data['linkedin'] : '';
    $facebook = !empty($data['facebook']) ? $data['facebook'] : '';

    // Vérifier d'abord si un enregistrement avec le même nom et prénom existe
    $existingRecord = $pdo->prepare("SELECT id FROM engineers WHERE nom = ? AND prenom = ?");
    $existingRecord->execute([$nom, $prenom]);

    if ($existingRecord->rowCount() > 0) {
        // L'enregistrement existe déjà, vous pouvez gérer cette situation ici
        // return "Un enregistrement avec le même nom et prénom existe déjà.";
        return -1;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO engineers (nom, prenom, email, pays, ville, etablissement, formation, diplome, fonction, secteur, promotion, tel, linkedin, facebook) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $pays, $ville, $etablissement, $formation, $diplome, $fonction, $secteur, $promotion, $tel, $linkedin, $facebook]);

        // Récupérer l'ID de l'élément enregistré
        $lastInsertedId = $pdo->lastInsertId();

        // Retourner l'ID ou un message de succès
        return $lastInsertedId;

    } catch (PDOException $e) {
        die("Erreur lors de l'enregistrement des données : " . $e->getMessage());
    }
}


function insertEngineerData1($data) {
    global $pdo;
    $nom = !empty($data['nom'])?$data['nom']:'';
    $prenom = !empty($data['prenom'])?$data['prenom']:'';
    $email = !empty($data['email'])?$data['email']:'';
    $pays = !empty($data['pays'])?$data['pays']:'';
    $ville = !empty($data['ville'])?$data['ville']:'';
    $etablissement = !empty($data['etablissement'])?$data['etablissement']:'';
    $formation = !empty($data['formation'])?$data['formation']:'';
    $diplome = !empty($data['diplome'])?$data['diplome']:'';
    $fonction = !empty($data['fonction'])?$data['fonction']:'';
    $secteur = !empty($data['secteur'])?$data['secteur']:'';
    $promotion = !empty($data['promotion'])?$data['promotion']:'';
    $tel = !empty($data['tel'])?$data['tel']:'';
    $linkedin = !empty($data['linkedin'])?$data['linkedin']:'';
    $facebook = !empty($data['facebook'])?$data['facebook']:'';

    try {
        $stmt = $pdo->prepare("INSERT INTO engineers (nom, prenom, email, pays, ville, etablissement, formation, diplome, fonction, secteur, promotion, tel, linkedin, facebook) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $pays, $ville, $etablissement, $formation, $diplome, $fonction, $secteur, $promotion, $tel, $linkedin, $facebook]);

        // echo "Données de l'ingénieur enregistrées avec succès.";
        // Récupérer l'ID de l'élément enregistré
        $lastInsertedId = $pdo->lastInsertId();

        // Retourner l'ID
        return $lastInsertedId;

    } catch (PDOException $e) {
        die("Erreur lors de l'enregistrement des données : " . $e->getMessage());
    }
}



function updateEngineerByName($nom, $nouveauNom) {
    global $pdo;

    try {
        // Mise à jour de l'ingénieur dans la table "engineers"
        $query = "UPDATE engineers 
                  SET nom = :nouveauNom
                  WHERE nom = :nom";

        $stmt = $pdo->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':nouveauNom', $nouveauNom, PDO::PARAM_STR);
        // Exécution de la requête
        $stmt->execute();

        echo "Ingénieur mis à jour avec succès.";
    } catch (PDOException $e) {
        die("Erreur lors de la mise à jour de l'ingénieur : " . $e->getMessage());
    }
}

function updateEngineerByName2($nom, $nouveauPromotion, $nouveauEtablissement) {
    global $pdo;

    try {
        // Mise à jour de l'ingénieur dans la table "engineers"
        $query = "UPDATE engineers 
                  SET etablissement = :etablissement,
                      promotion = :promotion
                  WHERE nom = :nom";

        $stmt = $pdo->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':etablissement', $nouveauEtablissement, PDO::PARAM_STR);
        $stmt->bindParam(':promotion', $nouveauPromotion, PDO::PARAM_STR);
        
        // Exécution de la requête
        $stmt->execute();

        echo "Ingénieur mis à jour avec succès.";
    } catch (PDOException $e) {
        die("Erreur lors de la mise à jour de l'ingénieur : " . $e->getMessage());
    }
}



function getEngineersList() {
    global $pdo;

    try {
        // Sélectionnez toutes les colonnes de la table engineers
        $stmt = $pdo->query("SELECT * FROM engineers");

        // Récupérez tous les enregistrements
        $engineers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $engineers;
        
    } catch (PDOException $e) {
        return arrary();
        // die("Erreur lors de la récupération de la liste des ingénieurs : " . $e->getMessage());
    }
}


function getEngineersListByMonth($month) {
  global $pdo;

  try {
      // Prepare the SQL query to prevent SQL injection
      $stmt = $pdo->prepare("SELECT * FROM engineers WHERE MONTH(created_at) = :month");

      // Bind the month parameter to the prepared statement
      $stmt->bindParam(':month', $month, PDO::PARAM_INT);

      // Execute the prepared statement
      $stmt->execute();

      // Retrieve all engineers
      $engineers = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Return the list of engineers
      return $engineers;
  } catch (PDOException $e) {
      // Handle error gracefully
      echo "Error retrieving engineers list: " . $e->getage();
      return [];
  }
}


function getEngineersByPage($page) {
    global $pdo;
    $perPage=8;
    try {
        // Calculez l'offset en fonction de la page
        $offset = ($page - 1) * $perPage;

        // Sélectionnez 10 ingénieurs à partir de l'offset
        $stmt = $pdo->prepare("SELECT * FROM engineers LIMIT $perPage OFFSET :offset");
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        // Récupérez tous les enregistrements
        $engineers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $engineers;

    } catch (PDOException $e) {
        return array();
        // Gérez les erreurs ici, par exemple :
        // die("Erreur lors de la récupération des ingénieurs : " . $e->getage());
    }
}

function enleverParentheses($phrase) {
    // Utilisation de la fonction str_replace pour supprimer les parenthèses
    $phrase = str_replace(array('(', ')'), '', $phrase);

    return $phrase;
}



function dernierMot($phrase) {

    $phrase=enleverParentheses($phrase);
    // Divise la phrase en mots
    $mots = explode(' ', $phrase);
    
    // Récupère le dernier mot
    $dernierMot = end($mots);
    
    return $dernierMot;
}

function promo($promo,$ecole){
    $pro=!empty($promo)?$promo:"";
    if(!empty($ecole)){
        // $pro=dernierMot($ecole)." - Promo ".$promo;
        $pro=$ecole." - Promo ".$promo;
    }
    return $pro;
}

function migrate() {
  // Créez toutes les tables nécessaires
  createEngineerTable();
  createUsersTable();
  echo "Migration terminée.";
  
}

// Lancer la migration
// migrate();

// seedEngineers();





?>