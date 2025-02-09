<?php

use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    public function testDatabaseConnection()
    {
        $conn = new mysqli("localhost", "user", "password", "database");
        $this->assertTrue($conn->connect_error === null);
    }
}
