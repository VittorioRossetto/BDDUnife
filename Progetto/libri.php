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
        <button onclick="window.location.href='index.php'">INDICE</button></br></br>

        <form action="libri.php" method="POST">
            <fieldset>
                <label>Ricerca per Titolo</label>
                <input type="text" name="SearchTitolo">
            </fieldset>
        
            <input type="submit" name="Search" value="CERCA">
        </form></br>

        <form action="librixautore.php" method="POST">
            <fieldset>
                <label>Lbiri per Autore inserito</label>
                <input type="text" name="SearchAutore">
            </fieldset>
        
            <input type="submit" name="Search" value="CERCA">
        </form></br>

        <?php
            include_once('connessione.php');
                        
            $title_to_search = $_POST['SearchTitolo'];

            $query = "SELECT * FROM LIBRO 
            WHERE TITOLO LIKE '%$title_to_search%'";
            $result = mysqli_query($link,$query);

            echo"<table>";

            while($row = mysqli_fetch_array($result)) {
                echo"<tr><td>" . htmlspecialchars($row['TITOLO']) . "</td><td>" . htmlspecialchars($row['ISBN']) . "</td><td>" . htmlspecialchars($row['LINGUA']). "</td><td>" . htmlspecialchars($row['ANNO']) . "</td><td>" . htmlspecialchars($row['NCOPIE']) . "</td><td>" . htmlspecialchars($row['AUTORE_L']) . "</td></tr>";
            }

            echo"</table>";

            mysqli_close($link);
        ?>
    </body>
</html>
