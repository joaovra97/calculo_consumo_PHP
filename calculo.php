<?php

$mensagem = "";

if ($_POST) { //verifica se tem dado na requisição    poderia usar: (isset($_GET["distancia"]))

    $distancia = $_POST['distancia'];
    $autonomia = $_POST['autonomia'];
    
    if (is_numeric($distancia) && is_numeric($autonomia)){

        if ($distancia > 0 && $autonomia > 0){
            
            $valorGasolina = 4.80;
            $valorAlcool = 3.80;
            $valorDiesel = 3.90;
            
            $calculoGasolina = ($distancia/$autonomia) * $valorGasolina;
            $calculoGasolina = number_format($calculoGasolina, 2, ',', '.'); //valor, nº de casas decimais, separador decimal, separador de milhar

            $calculoAlcool = ($distancia/$autonomia) * $valorAlcool;
            $calculoAlcool = number_format($calculoAlcool, 2, ',', '.');

            $calculoDiesel = ($distancia/$autonomia) * $valorDiesel;
            $calculoDiesel = number_format($calculoDiesel, 2, ',', '.');            
            
            $mensagem.="<div class='sucesso'>";
            $mensagem.="O valor total gasto será de:";
            $mensagem.="<ul>";
            $mensagem.= "<li><b>Gasolina: R$ </b>".$calculoGasolina."</li>"; //concatena valor da string
            $mensagem.= "<li><b>Álcool: R$ </b>".$calculoAlcool."</li>";
            $mensagem.= "<li><b>Diesel: R$ </b>".$calculoDiesel."</li>";
            $mensagem.="</ul>";
            $mensagem.="</div>";
        
        } else {
            $mensagem.= "<div class='erro'>";
            $mensagem.= "<p>O valor da distância e da autonomia deve ser maior que zero!</p>";
            $mensagem.= "</div>";
        }        

    } else {
        $mensagem.= "<div class='erro'>";
        $mensagem.= "<p>O valor recebido não é numérico.</p>";
        $mensagem.= "</div>";
    }

} else {
    $mensagem.= "<div class='erro'>";
    $mensagem.= "<p>Nenhum dado foi recebido pelo formulário.</p>";
    $mensagem.= "</div>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculo de Consumo de Combustível</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="painel">
            <h2>Resultado do cálculo de consumo</h2>
            <div class="conteudo-painel">
                <?php
                echo $mensagem;
                ?>
                <a class="botao" href="index.php">Voltar</a>
            </div>
        </div>
    </main>
</body>
</html>