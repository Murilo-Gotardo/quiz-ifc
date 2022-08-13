<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .questao{
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <main>
    <?php
        $p = $_GET['p'];

        if ($p == 1) {
            echo "<p>correto</p>";
        } else {
            echo "<p>errado</p>";
        };
    ?>
        <div class="questao">
            <div class="pergunta">
                <p>pergunta</p>
            </div>
            <div class="resposta">
                <a href="index.php?p=1"><p>certo</p></a>
            </div>
            <div class="resposta">
                <a href="index.php?p=false"><p>errado</p></a>
            </div>
            <div class="resposta">
                <a href="index.php?p=false"><p>errado</p></a>
            </div>
            <div class="resposta">
                <a href="index.php?p=false"><p>errado</p></a>
            </div>

        </div>
    </main>
</body>
</html>