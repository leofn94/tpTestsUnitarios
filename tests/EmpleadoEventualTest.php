<?php

require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest {

 public function crear($nombre = "Juan", $apellido = "Quintana", $dni = 32985270, $salario = 30000, $fecha = null, Array $ventas = [2000, 4000, 6000, 8000])

    {
        $r = new \App\EmpleadoEventual($nombre, $apellido, $dni, $salario, $ventas);
        return $r;
    }

    //Probar que el método calcularComision() funciona como se espera.
    public function testCalcularComision()

    {
        $r= $this->crear("Carlos", "Raeli", 30985472, 28000);
        $this->assertEquals(250, $r->calcularComision());
    }

    //Probar que el método calcularIngresoTotal() funciona como se espera.
    public function testCalcularIngresoTotal()
    {
       $r= $this->crear("Carlos" , "Raeli", 30985472, 28000);
        $this->assertEquals(28250, $r->calcularIngresoTotal());
    }

    //Probar que si intento construir un empleado proporcionando algún monto de venta negativo o cero, lanza una excepción.
    public function testCalculaComisionConMontoCeroONegativo()

    {   $this->expectException(\Exception::class);
        $r= $this->crear("Carlos", "Raeli", 30985472, 28000, null, [0,-2500, 1000, 4000]);
    }



    // //Probar que el método calcularComision() funciona como se espera.
    // public function testCalcularComision()

    // {
    //     $r= $this->crear("Carlos", "Raeli", 30985472, 28000, null, [100 + 200+ 300+ 400]);
    //     $this->assertEquals(250, $r->calcularComision());

    // }






}