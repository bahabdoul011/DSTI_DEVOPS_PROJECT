<?php

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public function testApiStatus()
    {
        $response = file_get_contents("http://localhost/api/status"); // Replace with actual API endpoint
        $this->assertEquals($response, '{"status":"ok"}');
    }
}
