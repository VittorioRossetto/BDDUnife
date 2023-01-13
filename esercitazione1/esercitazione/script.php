<?php
    $rows = array();

    $data = array(
        'Nome' => 'Mario',
        'Cognome' => 'Rossi',
        'Stipendio' => '3000');
    
    array_push($rows, $data);
    
    $data = array(
        'Nome' => 'Marco',
        'Cognome' => 'Bianchi',
        'Stipendio' => '4000');
    
    array_push($rows, $data);
    
    $data = array(
            'Nome' => 'Luisa',
            'Cognome' => 'Verdi',
            'Stipendio' => '1000');
    
    array_push($rows, $data);

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $stipendio = $_POST['stipendio'];

    $data = array(
        'Nome' => $nome,
        'Cognome' => $cognome,
        'Stipendio' => $stipendio);

    array_push($rows, $data)
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="author" content="Vittorio Rossetto" />
        <meta name="description" content="Esercitazione1" />
            <meta name="author" content="esercitazione 1 php" />

            <title>Esercitazione1</title>
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    
        <style>
            body{
                max-width: 1200px;
            }
        </style>
    
    </head>
    <body>
        <h1>Esercitazione1 php</h1>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Stipendio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <td class="col"><?php echo $row['Nome']; ?></td>
                        <td><?php echo $row['Cognome']; ?></td>
                        <td><?php echo $row['Stipendio']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </body>
</html>