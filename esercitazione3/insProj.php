<?php
    //Connessione al database
    $link = mysqli_connect("127.0.0.1", "vro5", "V!ttori0", "Azienda");

    if(!$link) {
        echo "Si e' verificato un errore, non e' possibile collegarsi al database <br/>";
        echo "Codice errore: " . mysqli_connect_errno() . "<br/>";
        echo "Messaggio errore: " . mysqli_connect_error() . "<br/>";
    }

    $NOME_P     = $_POST['NOME_P'];
    $NUMERO_P   = $_POST['NUMERO_P'];
    $SEDE_P     = $_POST['SEDE_P'];
    $NUM_D      = $_POST['NUM_D'];

    $sql = "SET foreign_key_checks = 0";
    $query = mysqli_query($link, $sql);

    $sql = "INSERT INTO PROGETTO
                                    VALUES ('$NOME_P','$NUMERO_P', '$SEDE_P', '$NUM_D')";                                            
    $query = mysqli_query($link, $sql);

    $sql = "SET foreign_key_checks = 0";
    $query = mysqli_query($link, $sql);

    if(!$query) {
        echo "Si e' verificato un errore: " . mysqli_error($link);
        exit;
    }

    mysqli_close($link);
?>

<html lang="it">
    <head>
        <meta charset="utf-8">

            <title>Inserimento Progetto</title>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    </head>
    <body>
        <p>Ho inserito il nuovo progetto <?php echo $NOME_P; ?></p>
    </body>
</html>