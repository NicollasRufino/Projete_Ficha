<?php

    if(!empty($_GET['id']))
    {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM fichas WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if ($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){
                $nome = $user_data['nome'];
                $peso = $user_data['peso'];
                $altura = $user_data['altura'];
                $telefone = $user_data['telefone'];
                $sexo = $user_data['sexo'];
                $data_nasc = $user_data['data_nascimento'];
                $alergias = $user_data['alergias'];
                $hist_medic = $user_data['hist_medic'];
            }
            
           
        }

        else{
           
             header('Location : sistema.php');

        }

      
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
        #update{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #update:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head> 
<body>
    <a href="sistema.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Ficha dos Pacientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome?>" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="altura" id="altura" class="inputUser" value="<?php echo $altura?>" required>
                    <label for="altura" class="labelInput">Altura</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="peso" id="peso" class="inputUser" value="<?php echo $peso?>" required>
                    <label for="peso" class="labelInput">Peso</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone?>" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="sexo" value="feminino"required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="sexo" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="sexo" value="outro"  required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nasc?>" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="alergias" id="alergias" class="inputUser" value="<?php echo $alergias?>"required>
                    <label for="alergias" class="labelInput">Alergias</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="hist_medic" id="hist_medic" class="inputUser"  value="<?php echo $hist_medic?>" required>
                    <label for="hist_medic" class="labelInput">Histórico Médico</label>
                </div>
                <br><br>
                <input type ="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update"> 
            </fieldset>
        </form>
    </div>
</body>
</html>