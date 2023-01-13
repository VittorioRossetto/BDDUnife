<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="author" content="Vittorio Rossetto" />
            <meta name="description" content="Progetto biblioteca" />
            
            <title>Succursali</title>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    
    </head>
    <body> 
        <h1>Succursali</h1>

        <h2>Per tornare alla pagina iniziale:</h2>
        <button onclick="window.location.href='index.php'">INDICE</button></br></br>

        <?php

            include_once('connessione.php');

            $query = "SELECT * FROM SUCCURSALE";
            $result = mysqli_query($link,$query);

            echo"<table>";

            while($row = mysqli_fetch_array($result)) {
                echo"<tr><td>" . htmlspecialchars($row['NOME_S']) . "</td><td>" . htmlspecialchars($row['INDIRIZZO_S']) . "</td></tr>";
            }

            echo"</table>";

            mysqli_close($link);
        ?>

    </body>
</html>
