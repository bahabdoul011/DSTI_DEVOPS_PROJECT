<?php

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testDatabaseConfig()
    {
        $dbHost = getenv('DB_HOST');
        $this->assertNotEmpty($dbHost);
        $this->assertEquals('localhost', $dbHost); // Example assertion
    }
}
