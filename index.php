<?php

declare(strict_types=1); //Para que PHP sea mas estricto con los tipos de datos a nivel de archivo

//Para importar esta require e include
// Con requiere es como si pegase el codigo en esta pagina

require_once ('constantes.php');
require_once ('funtions.php');

$data = get_data(API_URL);
$until_Message= get_until_message($data["days_until"]);

render_template('head', ["title" => $data ["title"]]);
render_template('main', array_merge($data, ["until_Message" => $until_Message]));
render_template('styles');

?>