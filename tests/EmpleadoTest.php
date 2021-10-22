<?php

abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase 
{

    public function testCrearConNombreYApellido() 
    {
        $e = $this->crear ("Juan", "Quintana");
        $this->assertEquals("Juan Quintana", $e->getNombreApellido());
    }

    public function testArrojarDNI()
    {
        $e= $this->crear ();
        $this->assertEquals(32985270, $e->getDNI());
    }
    

    public function testArrojarSalario()
    {
        $e= $this->crear ();
        $this->assertEquals(32985270, $e->getSalario());
    }


public function testObtenerSector()
{
    return $this->sector;
}


public function test__toString()
{
    $e = $this->crear ("Juan", "Quintana", 32985270, 30000);
    $this->assertEquals("Juan Quintana 32985270 30000", $e->__toString());
}

}


?>