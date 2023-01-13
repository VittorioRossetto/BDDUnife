<?php

    $link = mysqli_connect("127.0.0.1", "vro5", "V!ttori0", "Azienda");

    if(!$link) {
        echo "Si e' verificato un errore, non e' possibile collegarsi al database <br/>";
        echo "Codice errore: " . mysqli_connect_errno() . "<br/>";
        echo "Messaggio errore: " . mysqli_connect_error() . "<br/>";
        exit(-1);
    } 
?>