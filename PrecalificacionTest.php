<?php

use PHPUnit\Framework\TestCase;

require_once 'Precalificacion.php';

class PrecalificacionTest extends TestCase {

    public function testCuiValido(){
        $precalificacion = new Precalificacion();
        //debe tener 13 digitos
        $this->assertEquals(true, $precalificacion->cuiValido("1234567890101"));
        $this->assertEquals(false, $precalificacion->cuiValido("11234567890101"));
        $this->assertEquals(false, $precalificacion->cuiValido("234567890101"));

        //deben ser caracteres numericos
        $this->assertEquals(true, $precalificacion->cuiValido("1234567890101"));
        $this->assertEquals(false, $precalificacion->cuiValido("a234567890101"));
        $this->assertEquals(false, $precalificacion->cuiValido("12345#7890101"));

        //departamento valido
        $this->assertEquals(true, $precalificacion->cuiValido("1234567890101"));
        $this->assertEquals(false, $precalificacion->cuiValido("1234567892301"));

        //municipio valido
        $this->assertEquals(true, $precalificacion->cuiValido("1234567890101"));
        $this->assertEquals(false, $precalificacion->cuiValido("1234567890118"));
    }


    public function testCuiSinProblemas(){
        $precalificacion = new Precalificacion();
        //1234567890101 no está en lista negra
        $this->assertEquals(true, $precalificacion->cuiSinProblemas("1234567890101"));
        //1234567801010 en lista negra
        $this->assertEquals(false, $precalificacion->cuiSinProblemas("1234567801010"));
    }

/*
    public function testNivelEndeudamientoValido(){
        $precalificacion = new Precalificacion();
        //evaluar si es apto
        $this->assertEquals(true, $precalificacion->nivelEndeudamientoValido(12000, 1000, 2500));
        //evaluar si no es apto
        $this->assertEquals(false, $precalificacion->nivelEndeudamientoValido(12000, 1200, 3500));
    }*/
}

?>

