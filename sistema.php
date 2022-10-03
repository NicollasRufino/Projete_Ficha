<?php
   
   session_start();
    include_once('config.php');
    // print_r($_SESSION);
//     if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['telefone']) == true))
//     {
//         unset($_SESSION['nome']);
//         unset($_SESSION['telefone']);
//         header('Location: login.php');
//    }
//     $logado = $_SESSION['nome'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM fichas WHERE id LIKE '%$data%' or nome LIKE '%$data%' or telefone LIKE '%$data%' ORDER BY id DESC";
        // $sql = "SELECT * FROM fichas"
    }
    else
    {
        $sql = "SELECT * FROM fichas ORDER BY id DESC";
     }
     $result = $conexao->query($sql);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA | QS</title>
    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA DO Quick Screening</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php
        echo "<h1>Lista dos Pacientes <u></u></h1>";
    ?>
    <div>
        <br>
    <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>                   
                    <th scope="col">Nome</th>
                    <th scope="col">Peso</th>
                    <th scope="col">telefone</th>
                    <th scope="col">Altura</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Alergias</th>
                    <th scope="col">Histórico Médico</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">...</th>
                </tr> 
    </thead>
    <tbody>
        <?php
            while($user_data = mysqli_fetch_assoc($result)) 
            {
                echo "<tr>";
                echo "<td>".$user_data['id']."</td>";
                echo "<td>".$user_data['nome']."</td>";
                echo "<td>".$user_data['peso']."</td>";
                echo "<td>".$user_data['telefone']."</td>";
                echo "<td>".$user_data['altura']."</td>";
                echo "<td>".$user_data['sexo']."</td>";
                echo "<td>".$user_data['alergias']."</td>";
                echo "<td>".$user_data['hist_medic']."</td>";
                echo "<td>".$user_data['data_nascimento']."</td>";
                echo "<td>
                
                    <a class = 'btn btn-sm btn-light' href='edit.php?id=$user_data[id]' title='Editar'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                    </svg>
                    </a>
                    <a>
                    <a class = 'btn btn-sm btn-danger' href='delete.php?id=$user_data[id]' title= 'Deletar'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                    </svg>

                </td>";
                echo "</tr>";

                

            }                 

        ?>
    </tbody>
    </table>        
    <div>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <body>
    <script>
       var search = document.getElementById('pesquisar');

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") 
            {
                searchData();
            }
        });

        function searchData()
        {
            window.location = 'sistema.php?search='+search.value;
        }
                <?php
                    // while($user_data = mysqli_fetch_assoc($result)) {
                    //     echo "<tr>";
                    //     echo "<td>".$user_data['id']."</td>"; -->
//                         echo "<td>".$user_data['nome']."</td>";
//                         echo "<td>".$user_data['altura']."</td>";
//                         echo "<td>".$user_data['peso']."</td>";
//                         echo "<td>".$user_data['telefone']."</td>";
//                         echo "<td>".$user_data['sexo']."</td>";
//                         echo "<td>".$user_data['data_nasc']."</td>";
//                         echo "<td>".$user_data['alergias']."</td>";
//                         echo "<td>".$user_data['hist_medic']."</td>";
//                         echo "<td>
//                         <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]' title='Editar'>
//                             <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
//                                 <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
//                             </svg>
//                             </a> 
//                             <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]' title='Deletar'>
//                                 <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
//                                     <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
//                                 </svg>
//                             </a>
//                             </td>";
//                         echo "</tr>";
                   // }
                    ?>

                    

                        
//             </tbody>
//         </table>
//     </div>
// </body>
// <script>
//     var search = document.getElementById('pesquisar');

//     search.addEventListener("keydown", function(event) {
//         if (event.key === "Enter") 
//         {
//             searchData();
//         }
//     });

//     function searchData()
//     {
//         window.location = 'sistema.php?search='+search.value;
//     }
// </script>
</html>