<html>
<head>
    <meta charset="UTF-8">
    <title>SLV - Início</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body class="body">



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="inicio.php">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Circle-icons-car.svg/1200px-Circle-icons-car.svg.png" width="30" height="30" class="d-inline-block align-top" alt="">
        SLV
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Veículos - Locação<span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cadastroBtn" href="cadastrarVeiculo.php">Gerenciar Veículos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="precosBtn" href="precos.php">Tabela de Preços</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="devolverBtn" href="devolucao.php">Locações</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="logoutBtn" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<?php include 'conexao.php';
require_once 'conexao.php';
$veiculos=listarVeiculos();
$idCliente = selecionarClienteId();
?>
<br>
<div class="container">
<h1>Veículos Disponíveis para Locação</h1>
    <input type="button" value="Imprimir" onClick="window.print()" class="btn btn-info"/>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Numero</th>
        <th scope="col">Tipo</th>
        <th scope="col">Modelo</th>
        <th scope="col">Identificação</th>
        <th scope="col">Ano</th>
        <th scope="col">Alugar</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($veiculos as $veiculo){ ?>
        <tr>
            <td><?=$veiculo["id"]?> </td>
            <td><?=$veiculo["tipo"]?> </td>
            <td><?=$veiculo["modelo"]?> </td>
            <td><?=$veiculo["identificacao"]?> </td>
            <td><?=$veiculo["ano"]?> </td>
            <th>
                <form name="alugar" action="conexao.php" method="post">
                    <input type="hidden" name="idUser" value='<?=$idCliente[0]?>'/>
                    <input type="hidden" name="id" value='<?=$veiculo["id"]?>'/>
                    <input type="hidden" name="acao" value='alugar'/>
                    <input type="submit"  value="Alugar" name="editar" class="btn btn-dark"/>
                    <input type="text" name="tempo_dias" class="form-control" placeholder="Tempo em Dias">
                    <input type="text" name="valor" class="form-control" placeholder="Valor Total da Locação">
                </form>
            </th>
        </tr>
    <?php }
    ?>
    </tbody>
</table>
</div>

</body>
</html>


<style>
    #cadastroBtn, #devolverBtn, #precosBtn{
        background-color: black;
        border-radius: 5px;
        color: white;
        border: 2px solid white;
    }
    #logoutBtn{
        background-color: darkred;
        border-radius: 5px;
        color: white;
        border: 2px solid white;
    }
    .body{
        background-color: #005cbf;
        color: black;
    }
    .container{
        background-color: white;
        border: 2px solid black;
        border-radius: 5px;
    }


</style>