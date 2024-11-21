<?php

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    public function testSuma()
    {
        $response = $this->makeRequest('sumar', 2, 3);
        $this->assertEquals(5, $response['resultado']);
    }

    public function testResta()
    {
        $response = $this->makeRequest('restar', 5, 3);
        $this->assertEquals(2, $response['resultado']);
    }

    public function testMultiplicacion()
    {
        $response = $this->makeRequest('multiplicar', 4, 3);
        $this->assertEquals(12, $response['resultado']);
    }

    public function testDivision()
    {
        $response = $this->makeRequest('dividir', 10, 2);
        $this->assertEquals(5, $response['resultado']);
    }

    public function testDivisionPorCero()
    {
        $response = $this->makeRequest('dividir', 10, 0);
        $this->assertArrayHasKey('error', $response);
        $this->assertEquals("No se puede dividir por cero", $response['error']);
    }

    public function testOperacionInvalida()
    {
        $response = $this->makeRequest('invalid', 10, 2);
        $this->assertArrayHasKey('error', $response);
        $this->assertEquals("Operación inválida", $response['error']);
    }

    private function makeRequest($operation, $a, $b)
    {
        $url = "http://localhost:3000/?operation=$operation&a=$a&b=$b";
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}