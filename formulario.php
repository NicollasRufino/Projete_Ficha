<?php

    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $nome = $_POST['nome'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['sexo'];
        $data_nasc = $_POST['data_nascimento'];
        $alergias = $_POST['alergias'];
        $hist_medic = $_POST['hist_medic'];
        

        $result = mysqli_query($conexao, "INSERT INTO fichas(nome,peso,altura,telefone,sexo,data_nascimento,alergias,hist_medic) 
        VALUES ('$nome','$peso','$altura','$telefone','$sexo','$data_nasc','$alergias','$hist_medic')");
        

        header('Location: home.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | QS</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Ficha dos Pacientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" onfocus="this.value='';"required>
                    <label for="nome" class="labelInput">Nome completo</label>
                    <form>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="altura" id="altura" class="inputUser" required>
                    <label for="altura" class="labelInput">Altura</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="peso" id="peso" class="inputUser" required>
                    <label for="peso" class="labelInput">Peso</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="sexo" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="sexo" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="sexo" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="alergias" id="alergias" class="inputUser" required>
                    <label for="alergias" class="labelInput">Alergias</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="hist_medic" id="hist_medic" class="inputUser" required>
                    <label for="hist_medic" class="labelInput">Histórico Médico</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit"> 
                </form>
            </fieldset>
        </form>
    </div>
</body>
</html>