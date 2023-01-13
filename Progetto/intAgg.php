<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="author" content="Vittorio Rossetto" />
            <meta name="description" content="Progetto biblioteca" />
            
            <title>Interrogazioni aggiuntive</title>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    
    </head>
    <body> 
        <h1>Interrogazioni aggiuntive</h1>

        <h2>Per tornare alla pagina iniziale:</h2>
        <button onclick="window.location.href='index.php'">INDICE</button></br></br>

        <form action="intAgg.php" method="POST">
            <fieldset>
                <label>Ricerca utenti che hanno preso un libro nella lingua inserita (lingua in inglese):</label>
                <input type="text" name="SearchLinguaL">
            </fieldset>
            <fieldset>
                <label>Ricerca libri cha abbiano almeno un autore originario di un luogo inserito (non necessario nome completo)</label>
                <input type="text" name="BirthPlace">
            </fieldset>
            <input type="submit" name="Search" value="CERCA">
        </form></br>

        <?php
            include_once('connessione.php');
            $language = $_POST['SearchLinguaL'];
            $birthPl = $_POST['BirthPlace'];

            if($language != NULL){
                $query = "SELECT UTENTE.* FROM 
                    LIBRO JOIN PRESTITO
                    ON LIBRO.TITOLO = PRESTITO.LIBRO_P
                    JOIN UTENTE
                    ON UTENTE.MATRICOLA = PRESTITO.UTENTE_P
                    WHERE LINGUA = '$language'";

                $result = mysqli_query($link,$query);

                echo"<h3>Utenti che hanno preso libri nella lingua ".$language."</h3>";
                echo"<table>";
                while($row = mysqli_fetch_array($result)) 
                    echo"<tr><td>" . htmlspecialchars($row['NOME_U']) . "</td><td>" . htmlspecialchars($row['COGNOME_U']). "</td><td>" . htmlspecialchars($row['INDIRIZZO_U']) . "</td><td>" . htmlspecialchars($row['TELEFONO']) . "</td><td>" . htmlspecialchars($row['MATRICOLA']) . "</td></tr>";
            
                echo"</table></br>";
            }
            
            if($birthPl != NULL){
                $query = "SELECT LIBRO.* FROM 
                    LIBRO JOIN HA_SCRITTO
                    ON LIBRO.CODE_L = HA_SCRITTO.CODE_L_REL
                    JOIN AUTORE
                    ON HA_SCRITTO.CODE_A_REL = AUTORE.CODE_A
                    WHERE LUOGON LIKE '%$birthPl%'";

                $result = mysqli_query($link,$query);

                echo"<h3>Libri con autore originario di ".$birthPl."</h3>";
                echo"<table>";
                while($row = mysqli_fetch_array($result)) 
                    echo"<tr><td>" . htmlspecialchars($row['TITOLO']) . "</td><td>" . htmlspecialchars($row['ISBN']) . "</td><td>" . htmlspecialchars($row['LINGUA']). "</td><td>" . htmlspecialchars($row['ANNO']) . "</td><td>" . htmlspecialchars($row['NCOPIE']) . "</td><td>" . htmlspecialchars($row['AUTORE_L']) . "</td></tr>";
                echo"</table>";
                }
            
            mysqli_close($link);
        ?>
    </body>
</html>