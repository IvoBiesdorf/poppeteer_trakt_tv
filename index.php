<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de filmes</title>
</head>
<?php
    header("Content-type: application/vnd.ms-excel");
    header("Content-type: application/force-download");
    header("Content-Disposition: attachment; filename=Ivo.xls");
    header("Pragma: no-cache");
?>
<body>
    <style>
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .center {
            margin-left: 50px;
            margin-right: auto;
        }
        th{
            padding: 2px 8px;
            text-align: left;
            border: 1px solid;
        }
    </style>
    <h1>Lista de Series Ivo</h1>

    
    <div class="container">
        <table class="center">
    <?php
    $indice = 1;
    for ($i=1; $i <= 40; $i++) { 
        $json = json_decode(file_get_contents('instagram'.$i.'.json'));
        foreach ($json as $value): ?>
            <tr>
                <th><?= $indice++ ?></th>
                <th><?= $value->titulo ?></th>
                <th><?= $value->subtitulo ?></th>
                <th><?= $value->data ?></th>
                <th><a href="<?= $value->src ?>"><button>Acessar</button></a></th>
            </tr>
        <?php endforeach;
    }?>
        
        </table>
    </div>
   
</body>
</html>