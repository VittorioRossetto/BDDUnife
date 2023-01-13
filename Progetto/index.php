<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="author" content="Vittorio Rossetto" />
            <meta name="description" content="Progetto biblioteca" />
            
            <title>Biblioteca</title>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    
    </head>
    <body> 
        
        <?php
                include_once('connessione.php');

                $queryLibri = "SELECT * FROM LIBRO";
                $resultLibri = mysqli_query($link,$queryLibri);
                while($rowLibri = mysqli_fetch_array($resultLibri)) {
                    $codeL=$rowLibri['CODE_L'];
                    
                    $queryAutore = "SELECT * FROM HA_SCRITTO
                        JOIN AUTORE
                        ON HA_SCRITTO.CODE_A_REL=AUTORE.CODE_A
                        WHERE HA_SCRITTO.CODE_L_REL='$codeL'";

                    $autoriL = "";
                    $resultAutore = mysqli_query($link,$queryAutore);
                    while($rowAutore = mysqli_fetch_array($resultAutore)) {
                        $autoriL .= $rowAutore['NOME_A'];
                        $autoriL .= "\n"; 
                    }
                    
                    $query = "UPDATE LIBRO
                        SET AUTORE_L = '$autoriL'
                        WHERE CODE_L='$codeL'";
                    mysqli_query($link,$query);
                }
                mysqli_close($link);
            ?>

        <h1>Biblioteca</h1>

        <h2>Per visualizzare dati relativi ai libri:</h2>
        <button onclick="window.location.href='libri.php'">LIBRI</button>

        <h2>Per visualizzare dati relativi agli autori:</h2>  
        <button onclick="window.location.href='autori.php'">AUTORI</button>      
   
        <h2>Per visualizzare l'elenco delle succursali:</h2>
        <button onclick="window.location.href='succursali.php'">SUCCURSALI</button>

        <h2>Per visualizzare dati relativi agli utenti:</h2>
        <button onclick="window.location.href='utenti.php'">UTENTI</button>

        <h2>Per visualizzare lo storico dei prestiti:</h2>
        <button onclick="window.location.href='prestiti.php'">PRESTITI</button>
        
        <h2>Per effettuare calcoli statistici:</h2>
        <button onclick="window.location.href='statistiche.php'">STATISTICHE</button>

        <h2>Per effettuare le funzioni aggiuntive:</h2>
        <button onclick="window.location.href='intAgg.php'">F AGGIUNTIVE</button>
    </body>
</html>