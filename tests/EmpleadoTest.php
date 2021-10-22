<?php

abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase
{

    public function crear($nombre = "Juan", $apellido = "Quintana", $dni = 32985270, $salario = 30000, $sector = null)
    {
        $e = new \App\Empleado($nombre, $apellido, $dni, $salario, $sector);
        return $e;
    }

    //getNombreApellido
    public function testCrearConNombreYApellido()
    {
        $e = $this->crear();
        $this->assertEquals("Juan Quintana", $e->getNombreApellido());
    }
    //getDNI
    public function testArrojarDNI()
    {
        $e = $this->crear();
        $this->assertEquals(32985270, $e->getDNI());
    }

    //getSalario
    public function testArrojarSalario()
    {
        $e = $this->crear();
        $this->assertEquals(30000, $e->getSalario());
    }

    // getSector Y setSector

    public function testObtenerSector()
    {
        $sector = $this->crear();
        $sector->setSector("Permanente");
        $this->assertEquals("Permanente", $sector->getSector());
    }

    // to__string
    public function test__tostring()
    {
        $e = $this->crear();
        $this->assertEquals("Juan Quintana 32985270 30000", $e);
    }

    // Probar que si intento construir un empleado con el nombre vacío, lanza una excepción.
    public function testLanzarExcepcionSiCreoEmpleadoConNombreVacio()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear($nombre = "");
    }

    //Probar que si intento construir un empleado con el apellido vacío, lanza una excepción.
    public function testLanzarExcepcionSiCreoEmpleadoConApellidoVacio()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear($nombre = "Juan", $Apellido = "");
    }

    //Probar que si intento construir un empleado con el dni vacío, lanza una excepción.
    public function testLanzarExcepcionSiCreoEmpleadoConDniVacio()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear(null, null, $dni = "");
    }

    //Probar que si intento construir un empleado con el salario vacío, lanza una excepción.
    public function testLanzarExcepcionSiCreoEmpleadoConSalarioVacio()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear(null, null, null, $salario = "");
    }

    //Probar que si intento construir un empleado cuyo DNI contenga letras o caracteres no numéricos, lanza una excepción.
    public function testLanzarExcepcionSiCreoEmpleadoConDniConLetras()
    {
        $this->expectException(\Exception::class);
        $e = $this->crear(null, null, "35nfg928");
    }

    //Probar que si, al intentar construir un empleado, no se especifica el sector, el método getSector debe devolver la cadena “No especificado”.
    public function testSectorNoEspecificadoSiSeDanInstanciaSinEspecificar()
    {
        $e = $this->crear("Jose", "Caferatta", 8, 22000);
        $this->assertEquals("No especificado", $e->getSector());
    }

}
