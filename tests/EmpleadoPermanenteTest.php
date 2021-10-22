<?php

require_once 'EmpleadoTest.php';

class EmpleadoPermanenteTest extends EmpleadoTest
{


public function crear($nombre ="Juan", $apellido="Quintana", $dni =32985270, $salario =30000, $fecha=null)

{
    $r = new \App\EmpleadoPermanente ($nombre, $apellido, $dni, $salario, $fecha);
    return $r;
}


public function testRetornarFechaIngreso()
{
    $f = new datetime("2013-04-10");
    $r= $this->crear("Raul", "Perez", 36478201, 25000, $f);
    $this->assertEquals("2013-04-10", $r->getFechaIngreso() ->format("Y-m-d"));
}

public function testCalcularAntiguedad()
{
    $antiguedad = $this->fechaIngreso->diff (new \DateTime());
    return $antiguedad->y;
}




}
