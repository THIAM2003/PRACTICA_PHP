<?php
// Activar servidor php -S localhost:8000

// echo gettype($numero); Me da unicamente el tipo de dato

declare(strict_types=1); //Para que PHP sea mas estricto con los tipos de datos a nivel de archivo

$nombre = "Richard";
$numero = 21;
$numero_2= "4";
$suma = $numero + $numero_2;
$frase = "hola " . $nombre;
$age = 1;
$isOld = $age > 40;
$isDev = $age >= 18 && $age <= 40;

$salida = 'Comillas simples no lo interpola como codigo $name';
$salida_2 = " La contrabarra exime el \"valor\" y muestra todo lo que este despues \$name";

$output = "$nombre y edad $numero años";

// Con define son constante globales, mejor escribirlas en un solo archivo para usar en todo el codigo.
define('LOGO_URL', 'https://www.php.net//images/logos/php-logo.svg');

// Constantes "Normales", no son dinámicas, es decir, funcionan en tiempo de compilación
const CONSTANTE = "CONSTANTE";

$outputage = match(true){
    $age < 2   => "Eres un bebe",
    $age < 10  => "Eres un niño",
    $age < 18  => "Eres un adolescente",
    $age <= 18 => "Eres un adulto",
    default    => "Eres humano"
};

$bestlanguages = ["PHP", "PYTHON", "C++"];
$bestlanguages[3]= "Java";//Esto reescribe el indice 3
$bestlanguages[]= "typeScript";

/* <h2><?= $outputage;?> </h2>
<?php if($isOld) : ?>
    <h2>Eres mayor</h2>
<?php elseif($isDev) : ?>
    <h2>Eres joven</h2>
<?php else :  ?>    
    <h2>Eres niño</h2>
<?php endif;  ?> 

<h3>El mejor lenguaje es <?= $bestlanguages[1] ?></h3>

<ul>
    <?php foreach($bestlanguages as $indice => $language) : ?>
        <li><?= $indice . $language ?> </li>
    <?php endforeach; ?>
</ul>
*/

//LLAMADA A UNA API

const API_URL = "https://www.whenisthenextmcufilm.com/api";

function get_data(string $url): array{
    $result = file_get_contents($url); //Si solo quieres hacer un GET de una API
    $data = json_decode($result, true); 
    return $data;
}
$data = get_data(API_URL);

// cURL es una biblioteca que permite realizar solicitudes HTTP desde PHP hacia otros servidores o APIs. 
//La función curl_setopt se utiliza para configurar cómo se comportará una solicitud cURL.
//INICIALIZAR UNA SESION DE cURL ; ch = cURL handle
// $ch = curl_init(API_URL);
//Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
//Controla si se verifica el certificado SSL del servidor (útil para conexiones HTTPS).
//Si se establece en true, la respuesta se devuelve como una cadena en lugar de imprimirla.
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch);
// $data = json_decode($result, true); 
// curl_close($ch);
// var_dump($nombre); Me da el tipo de dato y su valor String(7) "Richard"
//var_dump($data);
?>

<main>
    <section>
        <img src=<?= $data["poster_url"]; ?>, width="200", alt="Poster de <?= $data["title"];?>" >  
    </section>

    <hgroup>
        <h3> <?=$data["title"]; ?> se estrena en <?= $data["days_until"]; ?> días</h3>
    </hgroup>
</main>


<style>
    :root {
        color-scheme: dark light;
        --text-color: #2c3e50;
    }

    body {
        display: grid;
        place-content: center;
        background-color: var(--text-color);
        color: white;
    }

    section{
        display: flex;
        justify-content: center;        
    }

    hgroup{
        display: flex;
        justify-content: center;
    }
    
    img{
        margin: 0 auto;

    }
</style>