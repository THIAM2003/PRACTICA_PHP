<?php

declare(strict_types=1); //Para que PHP sea mas estricto con los tipos de datos a nivel de archivo

//Para importar esta require e include
// Con requiere es como si pegase el codigo en esta pagina

require_once ('constantes.php');
require_once ('funtions.php');
require_once ('classes/NextMovie.php');

$next_movie = NextMovie::fetch_and_create_movie(API_URL);
$next_movie_data =$next_movie->get_data();
$until_Message= get_until_message($next_movie_data["days_until"]);

render_template('head', ["title" => $next_movie_data ["title"]]);
render_template('main', array_merge($next_movie_data, ["until_Message" => $next_movie->get_until_message()]));
render_template('styles');

?>