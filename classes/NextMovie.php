<?php

declare(strict_types=1);

class NextMovie{

    public function __construct(
        private int $days_until,
        private string $title,
        private string $poster_url,
        private string $release_date,
        private string $overview,
        private string $following_production,
    ){ 
    }

    public function get_until_message(): string{

        $days = $this->days_until;
        return match(true){
            $days == 0   => "Hoy se estrena!",
            $days == 1   => "Mañana se estrena",
            $days <= 7   => "Esta semana se estrena",
            $days < 30  => "Este mes se estrena",
            default     => "$days días para el estreno"
        };
    }

    public static function fetch_and_create_movie(string $api_url):NextMovie{
        $result = file_get_contents($api_url); //Si solo quieres hacer un GET de una API
        $data = json_decode($result, true); 
        
        return new self(
            $data['days_until'],
            $data['title'],
            $data['poster_url'],
            $data['release_date'],
            $data['overview'],
            $data['following_production']['title'] ?? 'Desconocido'
        );
    }

    public function get_data(){
        //Muestra el objeto como un JsonArray
        return get_object_vars($this);
    }

}


?>


