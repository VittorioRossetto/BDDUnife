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
        <h2>Per tornare all'elenco utenti:</h2>
        <button onclick="window.location.href='utenti.php'">UTENTI</button></br></br>

        <?php

            include_once('connessione.php');

            $mat_to_search = $_POST['SearchMatU'];

            $query = "SELECT * FROM UTENTE 
            WHERE MATRICOLA='$mat_to_search'";

            $result = mysqli_query($link,$query);

            echo"<h3>Utente</h3>";
            echo"<table>";

            while($row = mysqli_fetch_array($result)) {
                echo"<tr><td>" . htmlspecialchars($row['NOME_U']) . "</td><td>" . htmlspecialchars($row['COGNOME_U']). "</td><td>" . htmlspecialchars($row['INDIRIZZO_U']) . "</td><td>" . htmlspecialchars($row['TELEFONO']) . "</td><td>" . htmlspecialchars($row['MATRICOLA']) . "</td></tr>";
            }
            echo"</table>";


            $query = "SELECT * FROM PRESTITO 
            WHERE UTENTE_P='$mat_to_search'";

            $result = mysqli_query($link,$query);

            echo"<h3>Lista Prestiti:</h3>";
            echo"<table>";

            while($row = mysqli_fetch_array($result)) {
                echo"<tr><td>" . htmlspecialchars($row['D_RITIRO']) . "</td><td>" . htmlspecialchars($row['D_RICONSEGNA']). "</td><td>" . htmlspecialchars($row['LIBRO_P']) . "</td><td>" . htmlspecialchars($row['UTENTE_P']) . "</td><td>" . htmlspecialchars($row['SUCCURSALE_P']) . "</td></tr>";
            }

            echo"</table>";
            
            mysqli_close($link);
        ?>
    </body>
</html>