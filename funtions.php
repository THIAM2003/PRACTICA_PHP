<?php
//LLAMADA A UNA API

declare(strict_types=1);

//$variable_global= "Hola";

function render_template(string $template, array $data= []){

    extract($data); //Extrae las variables de un array asociativo y las convierte en variables.
    require_once("templates/$template.php");
} 

function get_data(string $url): array{
    //global $variable_global; //Para acceder a una variable global
    $result = file_get_contents($url); //Si solo quieres hacer un GET de una API
    $data = json_decode($result, true); 
    return $data;
}

// Se debe usar == o === para comparar valores, un solo = es asignación nada más.
function get_until_message(int $days): string{
    return match(true){
        $days == 0   => "Hoy se estrena!",
        $days == 1   => "Mañana se estrena",
        $days <= 7   => "Esta semana se estrena",
        $days < 30  => "Este mes se estrena",
        default     => "$days días para el estreno"
    };
}

?>