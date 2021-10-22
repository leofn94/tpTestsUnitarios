<?php

require_once 'EmpleadoTest.php';

class EmpleadoPermanenteTest extends EmpleadoTest
{

    public function crear($nombre = "Juan", $apellido = "Quintana", $dni = 32985270, $salario = 30000, $fecha = null)
    {
        $r = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fecha);
        return $r;
    }

    //Probar que el método getFechaIngreso() funciona como se espera.
    public function testRetornarFechaIngreso()
    {
        $f = new DateTime('2013-04-10');
        $r = $this->crear("Raul", "Perez", 32985270, 30000, $f);
        $this->assertEquals('2013-04-10', $r->getfechaIngreso()->format("Y-m-d"));
    }

    //Probar que el método calcularComision() funciona como se espera.
    public function testCalcularComision()
    {
        //Mismo que el anterior y ademas se verifica que el porcentaje de antiguedad sea = a calcularComision()
        $fechaDeIngreso = new DateTime('2003-12-12');
        $r = $this->crear("Raul", "Perez", 32985270, 30000, $fechaDeIngreso);
        $fechaActual = new DateTime();
        $antiguedad = $fechaActual->diff($fechaDeIngreso);
        $this->assertEquals("{$antiguedad->y}%", $r->calcularComision());
    }

    //Probar que el método calcularIngresoTotal() funciona como se espera.
    public function testCalcularIngresoTotal()
    {
        $antiguedad = 2500;
        $r = $this->crear("Raul", "Perez", 32985270, 30000 + $antiguedad);
        $this->assertEquals(32500, $r->calcularIngresoTotal());
    }

    //Probar que el método calcularAntiguedad() funciona como se espera para un empleado con varios años de antigüedad.
    public function testCalculaAntiguedad()
    {
        $fechaDeIngreso = new DateTime('2003-12-12');
        $r = $this->crear("Raul", "Perez", 32985270, 30000, $fechaDeIngreso);
        $fechaActual = new DateTime();
        $antiguedad = $fechaActual->diff($fechaDeIngreso);
        $this->assertEquals($antiguedad->y, $r->calcularAntiguedad());
    }

    //Probar que, si construyo un empleado proporcionando una fecha de ingreso posterior a la de hoy, lanza una excepción.
    public function testCalculaAntiguedadConFechaFutura()
    {
        $this->expectException(\Exception::class);
        $fechaDeIngreso = new DateTime('2028-04-11');
        $r = $this->crear("Raul", "Perez", 32985270, 30000, $fechaDeIngreso);
        $fechaActual = new DateTime();
        $antiguedad = $fechaActual->diff($fechaDeIngreso);
    }
}
?>