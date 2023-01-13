<?php
    //Connessione al database
    $link = mysqli_connect("127.0.0.1", "vro5", "V!ttori0", "Azienda");

    if(!$link) {
        echo "Si e' verificato un errore, non e' possibile collegarsi al database <br/>";
        echo "Codice errore: " . mysqli_connect_errno() . "<br/>";
        echo "Messaggio errore: " . mysqli_connect_error() . "<br/>";
    }

    $NOME_BATT  = $_POST['NOME_BATT'];
    $INIZ_INT   = $_POST['INIZ_INT'];
    $COGNOME    = $_POST['COGNOME'];
    $SSN        = $_POST['SSN'];
    $DATA_N     = $_POST['DATA_N'];
    $INDIRIZZO  = $_POST['INDIRIZZO'];
    $SESSO      = $_POST['SESSO'];
    $STIPENDIO  = $_POST['STIPENDIO'];
    $SUPER_SSN  = $_POST['SUPER_SSN'];
    $N_D        = $_POST['N_D'];


    $sql = "SET foreign_key_checks = 0";
    $query = mysqli_query($link, $sql);

    $sql = "INSERT INTO IMPIEGATO
                                    VALUES ('$NOME_BATT','$INIZ_INT', '$COGNOME', '$SSN',
                                                      '$DATA_N', '$INDIRIZZO', '$SESSO', '$STIPENDIO',
                                                      '$SUPER_SSN', '$N_D')";                                            
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

            <title>Inserimento Impiegato</title>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    </head>
    <body>
        <p>Ho inserito il nuovo impiegato <?php echo $NOME_BATT; ?></p>
    </body>
</html>