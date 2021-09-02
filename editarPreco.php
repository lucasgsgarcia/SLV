<?php include ("conexao.php");
require_once 'conexao.php';
$preco=selecionarPrecoId($_POST["id"]);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>SLV - Preços</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>



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


<div class="container">
    <h1>Edição do Preço</h1>
    <form name="editarPreco" action="conexao.php" method="POST">
        <div class="form-row">
            <div class="col">
                Número do Veículo
                <input type="text" class="form-control" name="idVeiculo" value ='<?=$preco["idVeiculo"]?>'/>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                Preço da Diária
                <input type="text" class="form-control" name="preco" value ='<?=$preco["preco"]?>'/
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                Gasto
                <input type="text" class="form-control" name="gasto" value ='<?=$preco["gasto"]?>'/>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="hidden" name="acao" value="editarPreco"/>
                <input type="hidden" name="id" value="<?=$preco["idVeiculo"]?>"/>
                <input type="submit" value="Enviar" name="enviar" class="btn btn-success">
            </div>
        </div>
</div>
</body>
</html>




</body>
</html>
<style>
    #veiculosBtn, #devolverBtn, #cadastroBtn{
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


</style>