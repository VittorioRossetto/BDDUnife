<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="author" content="Vittorio Rossetto" />
            <meta name="description" content="Progetto biblioteca" />
            
            <title>Prestiti</title>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    
    </head>
    <body> 
        <h1>Prestiti</h1>

        <h2>Per tornare alla pagina iniziale:</h2>
        <button onclick="window.location.href='index.php'">INDICE</button>

        <form action="prestiti.php" method="POST">
            <fieldset>
                <label>Inizio</label>
                <input type="text" name="StartDate">
            </fieldset>
            <fieldset>
                <label>Fine</label>
                <input type="text" name="EndDate">
            </fieldset>
        
            <input type="submit" name="Search" value="CERCA">
        </form></br>
        
        <?php
            $startDate = $_POST['StartDate'];
            $endDate = $_POST['EndDate'];

            include_once('connessione.php');

            if($startDate != NULL && $endDate != NULL)
                $query = "SELECT * FROM PRESTITO
                    WHERE(D_RITIRO BETWEEN '$startDate' AND '$endDate')
                    OR (D_RICONSEGNA BETWEEN '$startDate' AND '$endDate')
                    OR (D_RITIRO <='$startDate' AND D_RICONSEGNA >='$endDate')";
            else
                $query = "SELECT * FROM PRESTITO";

            
            $result = mysqli_query($link,$query);

            echo"<table>";

            while($row = mysqli_fetch_array($result)) {
                echo"<tr><td>" . htmlspecialchars($row['D_RITIRO']) . "</td><td>" . htmlspecialchars($row['D_RICONSEGNA']). "</td><td>" . htmlspecialchars($row['LIBRO_P']) . "</td><td>" . htmlspecialchars($row['UTENTE_P']) . "</td><td>" . htmlspecialchars($row['SUCCURSALE_P']) . "</td></tr>";
            }

            echo"</table>";

            mysqli_close($link);
        ?>
    </body>
</html>