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

function createEngineerTable() {
    global $pdo;

    try {

        $pdo->exec("DROP TABLE IF EXISTS engineers");

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



function createMessageTable() {
    global $pdo;

    try {

        $pdo->exec("DROP TABLE IF EXISTS messages");

        $pdo->exec("CREATE TABLE IF NOT EXISTS messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(100),
            adresse VARCHAR(50),
            mail VARCHAR(100),
            sujet VARCHAR(100),
            contenu TEXT,
            document Text,
            created_at DATETIME
        )");

        echo "Table 'messages' créée avec succès.";
    } catch (PDOException $e) {
        die("Erreur lors de la création de la table : " . $e->getMessage());
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
  

function envoyerEmail($destinataire, $sujet, $contenu,$expediteur) {
   
    // En-têtes du message
    $headers = 'From: ' . $expediteur . "\r\n";
    $headers .= 'Reply-To: ' . $expediteur . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'Content-Transfer-Encoding: 8bit' . "\r\n";
    $headers .= 'Return-Path: ' . $expediteur . "\r\n";

    // Envoi de l'e-mail
    $resultatEnvoi = mail($destinataire, $sujet, $contenu, $headers, array('-f', $expediteur),'-t', 587);

    // Vérifier le résultat de l'envoi
    if ($resultatEnvoi) {
        return true; // Succès
    } else {
        return false; // Échec
    } 
}

function envoyerEmail2($destinataire, $sujet, $contenu,$expediteur) {
   
    // En-têtes du message
    $headers = 'From: ' . $expediteur . "\r\n";
    $headers .= 'Reply-To: ' . $expediteur . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";

    // Envoi de l'e-mail
    $resultatEnvoi = mail($destinataire, $sujet, $contenu, $headers);

    // Vérifier le résultat de l'envoi
    if ($resultatEnvoi) {
        return true; // Succès
    } else {
        return false; // Échec
    }
}

function envoyerEmail1($destinataire, $sujet, $contenu, $expediteur, $cheminFichier = null) {
    // En-têtes du message
    $headers = 'From: ' . $expediteur . "\r\n";
    $headers .= 'Reply-To: ' . $expediteur . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: multipart/mixed; boundary=frontier' . "\r\n";

    // Corps du message
    $message = "--frontier\r\n";
    $message .= "Content-Type: text/html; charset=UTF-8\r\n";
    $message .= "Content-Transfer-Encoding: base64\r\n\r\n";
    // $message .= base64_encode($contenu) . "\r\n";

    // Ajouter la pièce jointe si spécifiée
    // if ($cheminFichier !== null && file_exists($cheminFichier)) {
    //     $fichierEncode = base64_encode(file_get_contents($cheminFichier));
    //     $message .= "--frontier\r\n";
    //     $message .= "Content-Type: application/pdf\r\n";
    //     $message .= "Content-Disposition: attachment; filename=\"" . basename($cheminFichier) . "\"\r\n";
    //     $message .= "Content-Transfer-Encoding: base64\r\n\r\n";
    //     $message .= $fichierEncode . "\r\n";
    // }

    // Envoyer l'e-mail
    $resultatEnvoi = mail($destinataire, $sujet, '', $headers, '-f' . $expediteur);

    // Vérifier le résultat de l'envoi
    if ($resultatEnvoi) {
        return true; // Succès
    } else {
        return false; // Échec
    }
}



function enregistrerFichier($dossierDestination, $inputNom, $nomFichier = null) {
    // Vérifier si le dossier de destination existe, sinon le créer
    if (!file_exists($dossierDestination)) {
        mkdir($dossierDestination, 0777, true);
    }
    $nom=$_POST['noms'];
    // Récupérer les informations sur le fichier
    $nomFichier = $nomFichier ?: basename($_FILES[$inputNom]["name"]);
    $cheminFichier = $dossierDestination . "/" . $nom. "_" . $nomFichier;
  
    // Vérifier si le fichier existe déjà (peu probable en raison de l'utilisation de uniqid)
    while (file_exists($cheminFichier)) {
        $cheminFichier = $dossierDestination . "/" . $nom. "_" . $nomFichier;
    }
  
    // Déplacer le fichier vers le dossier de destination
    if (move_uploaded_file($_FILES[$inputNom]["tmp_name"], $cheminFichier)) {
        return $cheminFichier; // Retourner le chemin complet du fichier enregistré
    } else {
        return false; // Retourner false en cas d'échec
    }
  }

// Fonction pour insérer les données et envoyer l'e-mail
function insertMessageData($data) {
    global $pdo;
    $nom = !empty($data['noms']) ? $data['noms'] : '';
    $adresse = !empty($data['adresse']) ? $data['adresse'] : '';
    $mail = !empty($data['mail']) ? $data['mail'] : '';
    $sujet = !empty($data['sujet']) ? $data['sujet'] : '';
    $contenu = !empty($data['contenu']) ? $data['contenu'] : '';
    $document = !empty($data['document']) ? $data['document'] : '';
    $created_at = date('Y-m-d h:i:s');

    // Vérifier d'abord si un enregistrement avec le même nom et prénom existe
    $existingRecord = $pdo->prepare("SELECT id FROM messages WHERE nom = ? AND contenu = ?");
    $existingRecord->execute([$nom, $contenu]);

    if ($existingRecord->rowCount() > 0) {
        // L'enregistrement existe déjà, vous pouvez gérer cette situation ici
        // return "Un enregistrement avec le même nom et prénom existe déjà.";
        return -1;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO messages (nom, adresse, mail, sujet, contenu,created_at,document) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $adresse,$mail, $sujet, $contenu, $created_at,$document]);

        // Récupérer l'ID de l'élément enregistré
        $lastInsertedId = $pdo->lastInsertId();

        // Envoyer l'e-mail
        // oliviermoulengue@gmail.com
        $destinataire = 'oliviermoulengue@gmail.com'; // Remplacez par l'adresse e-mail réelle
        $sujetEmail = "L'Ordre des Ingénieurs du Gabon";
        $contenuEmail = '<div style="background:#e2e7ec!important">
        <div style="padding-top:20px;padding-bottom:20px">
        <table style="padding:0px;vertical-align:top;width:100%;max-width:672px;margin:0px auto 24px;border-radius:16px;background:#1e4152;color:white!important;float:none;text-align:center" cellspacing="0" cellpadding="0" align="center">
        <tbody>
        <tr style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;text-align:left;vertical-align:top">
          <td style="margin:0px;color:rgb(10,10,10);font-family:&quot;SF Pro Text&quot;,-apple-system,BlinkMacSystemFont,Roboto,&quot;Segoe UI&quot;,Helvetica,Arial,sans-serif;font-size:16px;line-height:24px;vertical-align:top;padding-top:24px;padding-right:8px;padding-left:8px;border-collapse:collapse!important">
            <table style="vertical-align:top;width:100%;padding:0px!important" cellspacing="0" cellpadding="0" align="center">
              <tbody>
                <tr style="padding:0px;vertical-align:top">
                  <td style="margin:0px;line-height:24px;vertical-align:top;border-collapse:collapse!important">
                    <table style="vertical-align:top;width:100%;padding:0px!important" cellspacing="0" cellpadding="0" align="center">
                      <tbody>
                        <tr style="padding:0px;vertical-align:top">
    
                          <td style="line-height:24px;vertical-align:top;text-align:left;margin:0px auto;border-collapse:collapse!important;padding-right:16px!important;padding-bottom:16px!important;padding-left:16px!important">
                            
                            <table style="padding:0px;text-align:left;vertical-align:top;width:100%" cellspacing="0" cellpadding="0">
                              <tbody>
                                <tr style="padding:0px;vertical-align:top">
                                  <td style="margin:0px;vertical-align:top;font-size:32px;line-height:32px;border-collapse:collapse!important" height="32"></td>
                                </tr>
                              </tbody>
                            </table>
                            <h1 style="margin-top:0px;padding:0px;margin-bottom:16px;font-family:&quot;SF Pro Text&quot;,-apple-system,BlinkMacSystemFont,Roboto,&quot;Segoe UI&quot;,Helvetica,Arial,sans-serif;font-weight:bold;font-size:32px;line-height:40px;color:white!important"><strong>Orde des Ingénieurs du Gabon</strong></h1>
                            
                            <p style="padding:0px;line-height:24px;margin-bottom:16px;color:white!important;text-align:justify">
    
                            <b>Sujet</b> : '.$sujet.'  <br/>
                            <b>Nom </b>: '.$nom.'  <br/>
                            <b>Adresse e-mail </b>: '.$mail.' 
                            </p>

                            <p style="padding:0px;line-height:24px;margin-bottom:16px;color:white;text-align:justify">
    
                            '.$contenu.'
                            </p>
                            

                            <table style="padding:0px;text-align:left;vertical-align:top;width:100%" cellspacing="0" cellpadding="0">
                              <tbody>
                                <tr style="padding:0px;vertical-align:top">
                                  <td style="margin:0px;vertical-align:top;font-size:8px;line-height:8px;border-collapse:collapse!important" height="8"></td>
                                </tr>
                              </tbody>
                            </table>
                            
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>';
    
//   $comment='<p style="padding:0px;line-height:24px;margin-bottom:16px;color:white!important;text-align:justify">
    
//   Connectez-vous pour consulter ce document sur ce chemin daccès : </p> <p style="padding:0px;line-height:24px;margin-bottom:16px;color:white!important;text-align:justify"><u> Societe kikun digital<i style="font-size:20px"> /</i>Poles dactivites<i style="font-size:20px"> /</i>Pole marketing<i style="font-size:20px"> /</i>Template organisation </u></p>
  

//    <p style="padding:0px;color:white;text-align:justify;line-height:24px;margin-bottom:16px">

//   Voici le lien: <a href="https://ged-interne.cheyi.fr" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://ged-interne.cheyi.fr&amp;source=gmail&amp;ust=1695931022542000&amp;usg=AOvVaw1t7DofR78IOQcTrjh1MqF8">https://ged-interne.cheyi.fr</a>  
//    </p>';
        $cheminFichier="";
        // if(!empty($document)){
        //     $cheminFichier="/var/www/ctri.cheyi.fr/".$document;
        // }
        
        $resultatEnvoiEmail =envoyerEmail2($destinataire, $sujetEmail, $contenuEmail,$mail);
        // $resultatEnvoiEmail = envoyerEmail($destinataire, $sujetEmail, $contenuEmail,$mail,$cheminFichier);

        

        // Retourner l'ID ou un message de succès
        if ($resultatEnvoiEmail) {
            return $lastInsertedId;
        } else {
            return -1; // Échec de l'envoi de l'e-mail
        }

    } catch (PDOException $e) {
        die("Erreur lors de l'enregistrement des données : " . $e->getMessage());
    }
}

function insertMessageData1($data) {
    global $pdo;
    $nom = !empty($data['noms']) ? $data['noms'] : '';
    $adresse = !empty($data['adresse']) ? $data['adresse'] : '';
    $mail = !empty($data['mail']) ? $data['mail'] : '';
    $sujet = !empty($data['sujet']) ? $data['sujet'] : '';
    $contenu = !empty($data['contenu']) ? $data['contenu'] : '';
    $created_at = date('Y-m-d h:i:s');

    // Vérifier d'abord si un enregistrement avec le même nom et prénom existe
    $existingRecord = $pdo->prepare("SELECT id FROM messages WHERE nom = ? AND contenu = ?");
    $existingRecord->execute([$nom, $contenu]);

    if ($existingRecord->rowCount() > 0) {
        // L'enregistrement existe déjà, vous pouvez gérer cette situation ici
        // return "Un enregistrement avec le même nom et prénom existe déjà.";
        return -1;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO messages (nom, adresse, mail, sujet, contenu,created_at) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $adresse,$mail, $sujet, $contenu, $created_at]);

        // Récupérer l'ID de l'élément enregistré
        $lastInsertedId = $pdo->lastInsertId();

        // Retourner l'ID ou un message de succès
        return $lastInsertedId;

    } catch (PDOException $e) {
        die("Erreur lors de l'enregistrement des données : " . $e->getMessage());
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

function getAllMessages(){
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM messages");
    // Récupérez tous les enregistrements
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $messages;
}

function getAllMessagesByMonth($month) {
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM messages WHERE MONTH(created_at) = :month");
  $stmt->bindParam(':month', $month, PDO::PARAM_INT);
  $stmt->execute();

  // Retrieve all records
  $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $messages;
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

function getPreviousMonth($month){
  if($month==1){
    return 11;
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





?>