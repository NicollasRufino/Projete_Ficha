<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['sexo'];
        $data_nasc = $_POST['data_nascimento'];
        $alergias= $_POST['alergias'];
        $hist_medic = $_POST['hist_medic'];
        
        $sqlUpdate = "UPDATE fichas
        SET nome='$nome',altura='$altura',peso='$peso',telefone='$telefone',sexo='$sexo',data_nascimento='$data_nasc',alergias='$alergias',hist_medic='$hist_medic'
        WHERE id=$id";
        $result = $conexao->query($sqlUpdate);
        
    }
    header('Location: sistema.php');

?>