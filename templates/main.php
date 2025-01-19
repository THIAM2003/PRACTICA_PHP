<main>
    <section>
        <img src=<?= $poster_url; ?>, width="200", alt="Poster de <?= $title;?>" >  
    </section>

    <hgroup>
        <h3><?=$title; ?> - <?= $until_Message;?></h3>
        <p>La siguiente pelicula es: <?=$following_production["title"];?></p>
    </hgroup>
</main> 