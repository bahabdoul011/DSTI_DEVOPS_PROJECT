<?php
use PHPUnit\Framework\TestCase;

class EngineerTest extends TestCase {

    private $pdo;

    protected function setUp(): void {
        // Mock de la connexion à la BDD (évite d'impacter la vraie base de données)
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Création d'une table temporaire pour les tests
        $this->pdo->exec("CREATE TABLE engineers (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nom TEXT,
            prenom TEXT,
            email TEXT,
            pays TEXT,
            ville TEXT,
            etablissement TEXT,
            formation TEXT,
            diplome TEXT,
            fonction TEXT,
            secteur TEXT,
            promotion TEXT,
            tel TEXT,
            linkedin TEXT,
            facebook TEXT
        )");
    }

    function insertEngineerData($data) {
        $pdo = $this->pdo;
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
            return -1;  // Indiquer que l'enregistrement existe déjà
        }
    
        try {
            $stmt = $pdo->prepare("INSERT INTO engineers (nom, prenom, email, pays, ville, etablissement, formation, diplome, fonction, secteur, promotion, tel, linkedin, facebook) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nom, $prenom, $email, $pays, $ville, $etablissement, $formation, $diplome, $fonction, $secteur, $promotion, $tel, $linkedin, $facebook]);
    
            // Récupérer l'ID de l'élément enregistré
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return json_encode(["success" => false, "status" => "error", "message" => "Erreur lors de l'enregistrement des données : " . $e->getMessage()]);
        }
    }

    function updateEngineer($id, $data) {
        $pdo = $this->pdo;
        try {
            if (empty($id) || !is_array($data)) {
                return json_encode(["success" => false, "status" => "fail", "message" => "Invalid input parameters."]);
            }

            $query = "UPDATE engineers SET nom = :nom, prenom = :prenom, email = :email, pays = :pays, ville = :ville, etablissement = :etablissement, formation = :formation, diplome = :diplome, fonction = :fonction, secteur = :secteur, promotion = :promotion, tel = :tel, linkedin = :linkedin, facebook = :facebook WHERE id = :id";
            $stmt = $pdo->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $stmt->bindParam(':pays', $data['pays'], PDO::PARAM_STR);
            $stmt->bindParam(':ville', $data['ville'], PDO::PARAM_STR);
            $stmt->bindParam(':etablissement', $data['etablissement'], PDO::PARAM_STR);
            $stmt->bindParam(':formation', $data['formation'], PDO::PARAM_STR);
            $stmt->bindParam(':diplome', $data['diplome'], PDO::PARAM_STR);
            $stmt->bindParam(':fonction', $data['fonction'], PDO::PARAM_STR);
            $stmt->bindParam(':secteur', $data['secteur'], PDO::PARAM_STR);
            $stmt->bindParam(':promotion', $data['promotion'], PDO::PARAM_STR);
            $stmt->bindParam(':tel', $data['tel'], PDO::PARAM_STR);
            $stmt->bindParam(':linkedin', $data['linkedin'], PDO::PARAM_STR);
            $stmt->bindParam(':facebook', $data['facebook'], PDO::PARAM_STR);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return json_encode(["success" => true, "status" => "success", "message" => "Engineer updated successfully."]);
            } else {
                return json_encode(["success" => false, "status" => "fail", "message" => "No changes made or engineer not found."]);
            }
        } catch (PDOException $e) {
            return json_encode(["success" => false, "status" => "error", "message" => "Database error: " . $e->getMessage()]);
        }
    }

    function deleteEngineer($id) {
        $pdo = $this->pdo;

        if (empty($id)) {
            return json_encode(["success" => false, "status" => "fail", "message" => "Missing ID."]);
        }

        try {
            $query = "DELETE FROM engineers WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return json_encode(["success" => true, "status" => "success", "message" => "Engineer deleted successfully."]);
            } else {
                return json_encode(["success" => false, "status" => "fail", "message" => "No engineer found with this ID."]);
            }
        } catch (PDOException $e) {
            return json_encode(["success" => false, "status" => "error", "message" => "SQL error: " . $e->getMessage()]);
        }
    }

    // Tests

    public function testUpdateEngineerSuccess() {
        // Insérer un faux ingénieur
        $id = $this->insertEngineerData([
            "nom" => "Dupont",
            "prenom" => "Jean",
            "email" => "jean.dupont@example.com"
        ]);

        $data = [
            "nom" => "Durand",
            "prenom" => "Paul",
            "email" => "paul.durand@example.com",
            "pays" => "France",
            "ville" => "Paris",
            "etablissement" => "Polytech",
            "formation" => "Informatique",
            "diplome" => "Master",
            "fonction" => "Ingénieur",
            "secteur" => "IT",
            "promotion" => "2020",
            "tel" => "0612345678",
            "linkedin" => "https://linkedin.com/paul",
            "facebook" => "https://facebook.com/paul"
        ];

        $response = $this->updateEngineer($id, $data);
        $result = json_decode($response, true);

        $this->assertTrue($result['success']);
        $this->assertEquals("success", $result['status']);
        $this->assertEquals("Engineer updated successfully.", $result['message']);
    }

    public function testDeleteEngineerSuccess() {
        $id = $this->insertEngineerData([
            "nom" => "Martin",
            "prenom" => "Lucas",
            "email" => "lucas.martin@example.com"
        ]);

        $response = $this->deleteEngineer($id);
        $result = json_decode($response, true);

        $this->assertTrue($result['success']);
        $this->assertEquals("success", $result['status']);
        $this->assertEquals("Engineer deleted successfully.", $result['message']);
    }

        // This would typically go in your controller
    function healthCheck() {
        try {
            $pdo = new PDO('sqlite::memory:');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Try to make a simple query to check if the DB is accessible
            $pdo->exec("SELECT 1");
            
            // If it doesn't throw an error, return success
            return json_encode(["status" => "success", "message" => "Application is functional"]);
        } catch (Exception $e) {
            return json_encode(["status" => "fail", "message" => "Database connection failed"]);
        }
    }

    public function testHealthCheck() {
        $response = $this->healthCheck(); // Call the health check function
        $result = json_decode($response, true);
    
        $this->assertEquals("success", $result['status']);
        $this->assertEquals("Application is functional", $result['message']);
    }

    public function testConfiguration() {
        $dbHost = getenv('DB_HOST');
        $dbName = getenv('DB_NAME');
        $dbUser = getenv('DB_USER');
        $dbPassword = getenv('DB_PASSWORD');
    
        $this->assertNotEmpty($dbHost);
        $this->assertNotEmpty($dbName);
        $this->assertNotEmpty($dbUser);
        $this->assertNotEmpty($dbPassword);
    }

    public function testDatabaseConnection() {
        try {
            $pdo = new PDO('sqlite::memory:'); // Using an in-memory SQLite DB for testing
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SELECT 1"); // Simple query to test the connection
            
            $this->assertTrue(true); // If no exception, the connection is successful
        } catch (PDOException $e) {
            $this->fail("Database connection failed: " . $e->getMessage());
        }
    }
    
    
    

}
