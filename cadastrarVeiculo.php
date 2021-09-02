<html>
<head>
    <meta charset="UTF-8">
    <title>SLV - Veículos</title>
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
                <a class="nav-link" id="veiculosBtn" href="inicio.php">Veículos - Locação<span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" id="cadastroBtn" href="cadastrarVeiculo.php">Gerenciar Veículos</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" id="precosBtn" href="precos.php">Tabela de Preços</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" id="devolverBtn" href="devolucao.php">Locações</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" id="logoutBtn" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<br>
<div class="container">
    <h1>Cadastro de Novos Veículos</h1>
    <form action="conexao.php" method="POST">
        <div class="form-row">
            <div class="col">
                <input type="text" name="tipo" class="form-control" placeholder="Tipo">
            </div>
            <div class="col">
                <input type="text" name="modelo" class="form-control" placeholder="Modelo">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="text" name="identificacao" class="form-control" placeholder="Identificação (Placa/Chassi/...)">
            </div>
            <div class="col">
                <input type="text" name="ano" class="form-control" placeholder="Ano">
            </div>
        </div>
        <input type="hidden" name="acao" value='inserirVeiculo'/>
        <input type="submit" href="cadastrarVeiculo.php" value="Inserir Veiculo" name="inserirVeiculo" class="btn btn-dark"/>
    </form>
</div>


<?php include 'conexao.php';
require_once 'conexao.php';
$veiculos=listarVeiculos();
$idCliente = selecionarClienteId();
?>
<br><br><br>

<div class="container">
    <h1>Lista atual de veículos</h1>
    <input type="button" value="Imprimir" onClick="window.print()" class="btn btn-info"/>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Numero</th>
        <th scope="col">Tipo</th>
        <th scope="col">Modelo</th>
        <th scope="col">Identificação</th>
        <th scope="col">Ano</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($veiculos == null){
        print_r("Tabela vazia! Adicione");
    }else {
    foreach ($veiculos as $veiculo){ ?>
        <tr>
            <td><?=$veiculo["id"]?> </td>
            <td><?=$veiculo["tipo"]?> </td>
            <td><?=$veiculo["modelo"]?> </td>
            <td><?=$veiculo["identificacao"]?> </td>
            <td><?=$veiculo["ano"]?> </td>
            <th>
                <form name="alugar" action="conexao.php" method="post">
                    <input type="hidden" name="id" value='<?=$veiculo["id"]?>'/>
                    <input type="hidden" name="acao" value='excluir'/>
                    <input type="submit"  value="Excluir" name="excluir" class="btn btn-dark"/>
                </form>
            </th>
            <th>
                <form name="editarVeiculo" action="editarVeiculo.php" method="post">
                <a href="editarVeiculo.php">
                    <input type="hidden" name="id" value='<?=$veiculo["id"]?>'/>
                    <input type="submit"  value="Editar Veículo" name="editarVeiculo" class="btn btn-success"/>
                </a>
                </form>
            </th>
        </tr>
    <?php }}
    ?>
    </tbody>
</table>
</div>



</body>
</html>


<style>
    #veiculosBtn, #devolverBtn, #precosBtn{
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
    .col, .btn{
        margin: 10px;
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