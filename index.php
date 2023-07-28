<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reajustador de Preços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" 
</head>
<body>
    <div class="container-md">
        <form action="index.php" method="POST">
            <h2>Reajustador de Preços</h2>
            <div class="form-group">
                <label for="preco" class="form-label">Preço do produto (R$):</label>
                <input id="originalPrice" type="number" name="preco" min="0" required >
            </div>

            <div class="form-gorup">
                <label for="reajuste" class="form-label">Reajuste (%)</label>
                <input id="reajuste" type="range" min=0 max=250 value=100 name="reajuste" oninput ="changeValue(this.value)"/>
                <label id="value" for="reajuste">100</label>
            </div>

            <div class="form-gorup">
                <button type="submit" style="width: 100%;" class="btn btn-success col-12">Reajustar</button>
            </div>

       

<?php
    function reajuste($valor, $indice){
        return $valor * (1+($indice/100));
    }

    if (isset($_POST['preco']) and isset($_POST['reajuste'])){  
        $preco = $_POST['preco'];
        $reajuste = $_POST['reajuste'];
        $valorReajustado = reajuste($preco, $reajuste);

        echo "<div id='result'><h5>Resultado do Reajuste</h5></div>";
        echo "<span>O produto que custava <b>R$".$preco."</b>, com <b>".$reajuste."%</b> de aumento, passa a custar <b>R$".
                    $valorReajustado."</b><span>";
    }
?>
 </form>
    </div>
    <script>
        function changeValue(newVal) {             
            $("#value").text(newVal); 
        }
    </script>
</body>

</html>