
<?php
error_reporting(0);

$precos = array(
    1 => 65,
    2 => 85,
    3 => 70
);

$hotelPHP = $_GET['hotel'];
$chegadaPHP = $_GET['chegada'];
$partidaPHP = $_GET['partida'];

if (isset($_GET['hotel']) && isset($_GET['chegada']) && isset($_GET['partida'])) {
    $data1 = strtotime($chegadaPHP);
    $data2 = strtotime($partidaPHP);

    $dias = ($data2 - $data1) / 86400;

    $preco = $precos[$hotelPHP] ?? 0;

    $total = $dias * $preco;

    $chegadaFormatada = date("Y-m-d", $data1);
    $partidaFormatada = date("Y-m-d", $data2);

} else {
    $total = 0;
    $chegadaFormatada = $chegadaPHP;
    $partidaFormatada = $partidaPHP;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style1.css" rel="stylesheet">

</head>
<body>

    <div class="caixa1">
        <h1>calcular despesas da viagem</h1>

        <div class="hotel-lingua">
            <form method="get" action="">

                <!-- selecionar hotel -->
                <select name="hotel" id="hotel" onchange="carregarHotel(this.value);">
                    <option value="0">selecione o hotel</option>
                    <option value="1" <?php echo ($hotelPHP == 1) ? 'selected' : ''; ?>>hotel 1</option>
                    <option value="2" <?php echo ($hotelPHP == 2) ? 'selected' : ''; ?>>hotel 2</option>
                    <option value="3" <?php echo ($hotelPHP == 3) ? 'selected' : ''; ?>>hotel 3</option>
                </select>
                <!-- campo que exibe a língua materna -->

                <input type="text" id="lingua" placeholder="língua falada" disabled>



                <br><br>

                <!-- data de chegada e de partida  -->

                <p class="para-input">Data de chegada:</p> <input type="date" name="chegada" id="chegada" value="<?php echo $chegadaFormatada; ?>">
                <p class="para-input">Data de partida:</p> <input type="date" name="partida" id="partida" value="<?php echo $partidaFormatada; ?>"> <br> <br>
                <button type="submit" class="btn btn-primary">Calcular</button>

                <!-- campo que mostra o preço total -->
                <p id="preco-total">Preço total:<?php echo $total;?> €.</p>
</form>

<script>
    function carregarHotel(valor) {
            var linguaInput = document.getElementById("lingua");
            
            switch (valor) {
                case "1":
                    linguaInput.value = "Português";
                    break;
                case "2":
                    linguaInput.value = "Espanhol";
                    break;
                case "3":
                    linguaInput.value = "Inglês";
                    break;
                default:
                    linguaInput.value = "";
            }
            
            linguaInput.disabled = (valor === "0");
        }
</script>
</div>
</div>

</body>

</html>