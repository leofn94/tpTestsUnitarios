<?php

require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest {

 public function crear($nombre = "Juan", $apellido = "Quintana", $dni = 32985270, $salario = 30000)

    {
        $r = new \App\EmpleadoEventual($nombre, $apellido, $dni, $salario);
        return $r;
    }

}


