<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reajustador de Preços</title>
</head>
<body>
    <h2>Reajustador de Preços</h2>
    <form action="index.php" method="POST">
        Preco do produto (R$):
        <input type="text" name="preco" required>

        Percentual de Reajuste(%): (0~250)
        <input type="text" name="reajuste">

        <button type="submit">Reajustar</button>
    </form>
</body>

<?php
    function reajuste($valor, $indice){
        return $valor * (1+($indice/100));
    }

    if (isset($_POST['preco']) and isset($_POST['reajuste'])){  
        $preco = $_POST['preco'];
        $reajuste = $_POST['reajuste'];
        $valorReajustado = reajuste($preco, $reajuste);
        echo $valorReajustado;
    }
?>

</html>