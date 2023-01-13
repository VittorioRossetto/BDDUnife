<?php
    $nome = $_POST['nome'];
    $esempio = $_POST['esempio'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="author" content="Vittorio Rossetto" />
        <meta name="description" content="Esercitazione1" />
            <meta name="author" content="esercitazione 1 php" />

            <title>Esercitazione1</title>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    
    </head>
    <body>
        <p>Ciao <?php echo $nome ?>, hai passato il valore <?php echo $esempio ?></p>
    </body>
</html>