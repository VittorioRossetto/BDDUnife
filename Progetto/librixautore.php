<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="author" content="Vittorio Rossetto" />
            <meta name="description" content="Progetto biblioteca" />
            
            <title>Libri</title>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    
    </head>
    <body> 
        <h1>Libri</h1>

        <h2>Per tornare alla pagina iniziale:</h2>
        <button onclick="window.location.href='index.php'">INDICE</button>
        <h2>Per tornare all'elenco libri:</h2>
        <button onclick="window.location.href='libri.php'">LIBRI</button></br></br>

        <?php

            include_once('connessione.php');

            $aut_to_search = $_POST['SearchAutore'];

            $query = "SELECT * FROM AUTORE 
            WHERE NOME_A='$aut_to_search'";

            $result = mysqli_query($link,$query);

            echo"<h3>Autore</h3>";
            echo"<table>";

            while($row = mysqli_fetch_array($result)) {
                echo"<tr><td>" . htmlspecialchars($row['NOME_A']) . "</td><td>" . htmlspecialchars($row['DATAN']). "</td><td>" . htmlspecialchars($row['LUOGON']) . "</td></tr>";
            }
            echo"</table>";


            $query = "SELECT * FROM LIBRO 
            WHERE AUTORE_L LIKE '%$aut_to_search%'";

            $result = mysqli_query($link,$query);

            echo"<h3>Lista Libri:</h3>";
            echo"<table>";

            while($row = mysqli_fetch_array($result)) {
                echo"<tr><td>" . htmlspecialchars($row['TITOLO']) . "</td><td>" . htmlspecialchars($row['ISBN']) . "</td><td>" . htmlspecialchars($row['LINGUA']). "</td><td>" . htmlspecialchars($row['ANNO']) . "</td><td>" . htmlspecialchars($row['NCOPIE']) . "</td><td>" . htmlspecialchars($row['AUTORE_L']) . "</td></tr>";
            }

            echo"</table>";
            
            mysqli_close($link);
        ?>
    </body>
</html>