<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="author" content="Vittorio Rossetto" />
            <meta name="description" content="Progetto biblioteca" />
            
            <title>Utenti</title>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    
    </head>
    <body> 
        <h1>Utenti</h1>

        <h2>Per tornare alla pagina iniziale:</h2>
        <button onclick="window.location.href='index.php'">INDICE</button>

        <form action="res_utenti.php" method="POST">
            <fieldset>
                <label>Inserire Matricola per elenco prestiti</label>
                <input type="text" name="SearchMatU">
            </fieldset>
        
            <input type="submit" name="Search" value="CERCA">
        </form></br>

        <?php

            include_once('connessione.php');

            $query = "SELECT * FROM UTENTE";
            $result = mysqli_query($link,$query);

            echo"<table>";

            while($row = mysqli_fetch_array($result)) {
                echo"<tr><td>" . htmlspecialchars($row['NOME_U']) . "</td><td>" . htmlspecialchars($row['COGNOME_U']). "</td><td>" . htmlspecialchars($row['INDIRIZZO_U']) . "</td><td>" . htmlspecialchars($row['TELEFONO']) . "</td><td>" . htmlspecialchars($row['MATRICOLA']) . "</td></tr>";
            }

            echo"</table>";

            mysqli_close($link);
        ?>
    </body>
</html>