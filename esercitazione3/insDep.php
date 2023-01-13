<?php
    //Connessione al database
    $link = mysqli_connect("127.0.0.1", "vro5", "V!ttori0", "Azienda");

    if(!$link) {
        echo "Si e' verificato un errore, non e' possibile collegarsi al database <br/>";
        echo "Codice errore: " . mysqli_connect_errno() . "<br/>";
        echo "Messaggio errore: " . mysqli_connect_error() . "<br/>";
    }

    $NOME_D             = $_POST['NOME_D'];
    $NUMERO_D           = $_POST['NUMERO_D'];
    $SSN_DIR            = $_POST['SSN_DIR'];
    $DATA_INIZIO_DIR    = $_POST['DATA_INIZIO_DIR'];

    $sql = "SET foreign_key_checks = 0";
    $query = mysqli_query($link, $sql);

    $sql = "INSERT INTO DIPARTIMENTO
                                    VALUES ('$NOME_D','$NUMERO_D', '$SSN_DIR', '$DATA_INIZIO_DIR')";                                            
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

            <title>Inserimento Dipartimento</title>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    </head>
    <body>
        <p>Ho inserito il nuovo dipartimeto <?php echo $NOME_D; ?></p>
    </body>
</html>