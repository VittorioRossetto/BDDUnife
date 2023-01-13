<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="author" content="Vittorio Rossetto" />
            <meta name="description" content="Progetto biblioteca" />
            
            <title>Autori</title>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    
    </head>
    <body> 
        <h1>Autori</h1>

        <h2>Per tornare alla pagina iniziale:</h2>
        <button onclick="window.location.href='index.php'">INDICE</button></br></br>

        <form action="autori.php" method="POST">
            <fieldset>
                <label>Nome Autore</label>
                <input type="text" name="SearchNomeA">
            </fieldset>
            <fieldset>
                <label>Data di Nascita</label>
                <input type="text" name="SearchDataA">
            </fieldset>
            <fieldset>
                <label>Luogo di nascita</label>
                <input type="text" name="SearchLuogoA">
            </fieldset>
            <input type="submit" name="Search" value="CERCA">
        </form></br>

        <?php
            include_once('connessione.php');
            
            $name_to_search = $_POST['SearchNomeA'];
            $date_to_search = $_POST['SearchDataA'];
            $place_to_search = $_POST['SearchLuogoA'];
            
            $query = "SELECT * FROM AUTORE 
            WHERE NOME_A LIKE '%$name_to_search%' AND
            DATAN LIKE '%$date_to_search%' AND
            LUOGON LIKE '%$place_to_search%'";

            $result = mysqli_query($link,$query);

            echo"<table>";

            while($row = mysqli_fetch_array($result)) {
                echo"<tr><td>" . htmlspecialchars($row['NOME_A']) . "</td><td>" . htmlspecialchars($row['DATAN']). "</td><td>" . htmlspecialchars($row['LUOGON']) . "</td></tr>";
            }

            echo"</table>";

            mysqli_close($link);
        ?>
    </body>
</html>