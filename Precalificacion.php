<?php

class Precalificacion {


    public function cuiValido($dpi) {
        // Verificar si el DPI tiene exactamente 13 caracteres numéricos
        if(preg_match('/^\d{13}$/', $dpi)){
            // Verifica que el departamento sea válido (primeros 2 dígitos entre 01 y 22)
            $departamento = intval(substr($dpi, 9, 2));
            if ($departamento > 0 && $departamento < 23) {
                //evaluar municipio
                $municipio = intval(substr($dpi, 11, 2));
                if ( $municipio > 0 && $municipio < 18 ) {
                    return true;
                }
            }
        }
        return false;
    }

    
    public function cuiSinProblemas($dpi) {
        $listaNegra = array(
            "1234567801010",
            "2345678901011",
            "3456789001012",
            "4567890101013",
            "5678901201014",
            "6789012301015",
            "7890123401016",
            "8901234501017",
            "9012345601018",
            "0123456701019",
            "1123456801010",
            "2234567901011",
            "3345678001012",
            "4456789101013",
            "5567890201014",
            "6678901301015",
            "7789012401016",
            "8890123501017",
            "9901234601011",
            "0912345701013"
        );

        if (in_array($dpi, $listaNegra)) {
            return false;
        }
        return true;
    }
    
    public function nivelEndeudamientoValido($ingreso_mensual, $endeudamiento_mensual, $cuota_mensual) {
        
        return false;
    }

}



$precalificacion = new Precalificacion();
echo $precalificacion->cuiSinProblemas("1234567801010");

?>
