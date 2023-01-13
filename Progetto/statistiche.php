<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="Statistiche" content="Vittorio Rossetto" />
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
        <h1>Statistiche</h1>

        <h2>Per tornare alla pagina iniziale:</h2>
        <button onclick="window.location.href='index.php'">INDICE</button>

        <form action="statistiche.php" method="POST">
            <fieldset>
                <label>Numero libri in un dato anno: (inserire anno)</label>
                <input type="text" name="Year">
            </fieldset>
            <fieldset>
                <label>Numero prestiti in una data succursale: (inserire nome succursale)</label>
                <input type="text" name="Branch">
            </fieldset>
            <fieldset>
                <label>Numero libri di un dato autore: (inserire nome autore)</label>
                <input type="text" name="Author">
            </fieldset>
        
            <input type="submit" name="Search" value="CERCA">
        </form></br>
        
        <?php
            $year = $_POST['Year'];
            $branch = $_POST['Branch'];
            $author = $_POST['Author'];

            echo"<table>";

            if($year != NULL){
                $query = "SELECT COUNT(CODE_L) FROM LIBRO 
                WHERE ANNO = '$year'";
    
                $result = mysqli_query($link,$query);

                while($row = mysqli_fetch_array($result))
                    echo"<tr><td>Numero di libri nell'anno ".$year." = </td><td>".htmlspecialchars($row['COUNT(CODE_L)'])."</td></tr>";
            }

            if($branch != NULL){
                $query = "SELECT COUNT(D_RITIRO) FROM PRESTITO
                WHERE SUCCURSALE_P = '$branch'";

                $result = mysqli_query($link,$query);

                while($row = mysqli_fetch_array($result))
                    echo"<tr><td>Numero di prestiti nella succursale ".$branch." = </td><td>".htmlspecialchars($row['COUNT(D_RITIRO)'])."</td></tr>";
            }

            if($author != NULL){
                $query = "SELECT COUNT(CODE_L) FROM LIBRO 
                WHERE AUTORE_L LIKE '%$author%'";
    
                $result = mysqli_query($link,$query);

                while($row = mysqli_fetch_array($result))
                    echo"<tr><td>Numero di libri dell'autore ".$author." = </td><td>".htmlspecialchars($row['COUNT(CODE_L)'])."</td></tr>";
            }

            echo"</table>";

            mysqli_close($link);
        ?>
    </body>
</html>