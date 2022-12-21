<?php

$mensagem = "";

if ($_POST) {
    $distancia = $_POST['distancia']; //atribua a variavel, o valor do campo que está no form
    $autonomia = $_POST['autonomia'];

    if(is_numeric($distancia) && is_numeric($autonomia)) {//se o valor da distancia "e" o valor da autonomia
        
        if ($distancia > 0 && $autonomia > 0) { // se dist && auto for > 0 então exect o codigo
            
            $valorGasolina = 4.80;
            $valorAlcool = 3.80;
            $valorDiesel = 3.90;

            $calculoGasolina = ($distancia / $autonomia) * $valorGasolina;
            $calculoGasolina = number_format($calculoGasolina, 2, ',', '.');
            $calculoAlcool = ($distancia / $autonomia) * $valorAlcool;
            $calculoAlcool = number_format($calculoAlcool, 2, ',', '.');
            $calculoDiesel = ($distancia / $autonomia) * $valorDiesel;
            $calculoDiesel = number_format($calculoDiesel, 2, ',', '.');

            $mensagem.= "<div class='sucesso'>";
            $mensagem.= "O valor total gasto será de:";
            $mensagem.= "<ul>";
            $mensagem.= "<li><b>Gasolina: R$ </b>".$calculoGasolina."</li>";
            $mensagem.= "<li><b>Álcool: R$ </b>".$calculoAlcool."</li>";
            $mensagem.= "<li><b>Díesel: R$ </b>".$calculoDiesel."</li>";
            $mensagem.= "</ul>";
            $mensagem.= "</div>";
        } else {
            $mensagem.= "<div class='erro'>";
            $mensagem.= "<p>O valor da distância e da autonomia deve ser maior que 0.</p>";
            $mensagem.= "</div>";
        }

    } else {
        $mensagem.= "<div class='erro'>";
        $mensagem.= "<p> O valor recebido não é numérico.</p>";
        $mensagem.= "</div>";
    }
    

} else {
    $mensagem.= "<div class='erro'>";
    $mensagem.= "<p>Nenhum dado foi recebido pelo Formulário.</p>";
    $mensagem.= "</div>";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo de Consumo de Combustível</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <main>
        <div>
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