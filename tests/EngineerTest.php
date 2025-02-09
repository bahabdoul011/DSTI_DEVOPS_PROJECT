<?php

use PHPUnit\Framework\TestCase;

class EngineerTest extends TestCase
{
    // Test for inserting engineer data
    public function testInsertEngineerData()
    {
        $data = [
            'nom' => 'Doe',
            'prenom' => 'John',
            'email' => 'johndoe@example.com',
            'pays' => 'France',
            'ville' => 'Paris',
            'etablissement' => 'EPITA',
            'formation' => 'Engineering',
            'diplome' => 'Bachelor',
            'fonction' => 'Developer',
            'secteur' => 'IT',
            'promotion' => '2021',
            'tel' => '123456789',
            'linkedin' => 'https://www.linkedin.com/in/johndoe',
            'facebook' => 'https://www.facebook.com/johndoe'
        ];

        $result = insertEngineerData($data);

        $this->assertGreaterThan(0, $result, "Engineer data should be inserted successfully");
    }

    // Test for updating engineer data by name
    public function testUpdateEngineerByName()
    {
        $updatedData = [
            'nom' => 'Doe',
            'prenom' => 'John',
            'email' => 'johndoe_updated@example.com',
            'pays' => 'France',
            'ville' => 'Paris',
            'etablissement' => 'EPITA',
            'formation' => 'Engineering',
            'diplome' => 'Master',
            'fonction' => 'Senior Developer',
            'secteur' => 'IT',
            'promotion' => '2021',
            'tel' => '987654321',
            'linkedin' => 'https://www.linkedin.com/in/johndoe_updated',
            'facebook' => 'https://www.facebook.com/johndoe_updated'
        ];

        $result = updateEngineerByName('John', $updatedData);

        $this->assertTrue($result > 0, "Engineer data should be updated successfully");
    }

    // Test for listing all engineers
    public function testListEngineers()
    {
        $engineers = listEngineers();

        $this->assertNotEmpty($engineers, "Engineers list should not be empty");
        $this->assertArrayHasKey('nom', $engineers[0], "Each engineer should have a 'nom' field");
        $this->assertArrayHasKey('prenom', $engineers[0], "Each engineer should have a 'prenom' field");
    }

    // Test for deleting an engineer
    public function testDeleteEngineer()
    {
        $nameToDelete = 'John Doe';
        $result = deleteEngineer($nameToDelete);

        $this->assertTrue($result > 0, "Engineer data should be deleted successfully");
    }
}
