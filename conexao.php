<?php

if(mysqli_connect_error()==true){
    echo "Falha na conexao".mysqli_connect_error();
}


if (isset($_POST["acao"])) {
    if ($_POST["acao"] == "inserir") {
        inserirCliente();
    }
    if ($_POST["acao"] == "alterar") {
        alterarCliente();
    }
    if ($_POST["acao"] == "excluir") {
        excluirCliente();
    }
    if ($_POST["acao"] == "logar") {
        logar();
    }
    if ($_POST["acao"] == "alugar") {
        alugarVeiculo();
    }
    if ($_POST["acao"] == "inserirVeiculo") {
        inserirVeiculo();
    }
    if ($_POST["acao"] == "editarVeiculo") {
        editarVeiculo();
    }
    if ($_POST["acao"] == "editarPreco") {
        editarPreco();
    }
    if ($_POST["acao"] == "excluirPreco") {
        excluirPreco();
    }
    if ($_POST["acao"] == "inserirPreco") {
        inserirPreco();
    }

}

function logar() {
    if(!isset($_SESSION)){
        session_start();
    }
    $servername="localhost";
    $username="root";
    $password="";
    $db_name="trabalhofinal";
    $connect= mysqli_connect($servername, $username, $password, $db_name) or die ('Não foi possível conectar.');
    if(isset($_POST['btn-entrar'])){
        $login= mysqli_escape_string($connect, $_POST['login']);
        $senha= mysqli_escape_string($connect, $_POST['senha']);
        if(empty($login)or empty($senha)){
            echo 'Favor preencher os dados';
        }
        else{
            $sql="select login from login where login= '$login'";
            $resultado= mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado)>0){
                $senha= md5($senha);
                $sql="select * from login where login = '$login' and senha = '$senha'";
                $resultado= mysqli_query($connect, $sql);
                if(mysqli_num_rows($resultado)==1){
                    $dados= mysqli_fetch_array($resultado);
                    $_SESSION['logado']=true;
                    $_SESSION["id"]=$dados['id'];
                    irParaInicio();
                }
            }
            else{
                echo"usuario inexistente";
            }
        }
    }
}

function abrirBanco()
{
    $conexao = new mysqli("localhost", "root", "", "trabalhoFinal");
    return $conexao;

}


function alugarVeiculo(){
    $banco = abrirBanco();
    $alugado = "INSERT INTO locacoes(idUser, idVeiculo, valor, tempo_dias, data_locacao)"
        . " VALUES ('{$_POST["idUser"]}','{$_POST["id"]}', '{$_POST["valor"]}', '{$_POST["tempo_dias"]}', NOW())";
    $sql = "delete from veiculos where id='{$_POST["id"]}'";
    $banco->query($alugado);
    /*$banco->query($sql);*/
    $banco->close();
    irParaInicio();
}


function listarCliente()
{
    $banco = abrirBanco();
    $sql = "select * from login order by nome";
    $resultado = $banco->query($sql);
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;

}

function listarVeiculos()
{
    $banco = abrirBanco();
    $grupo = null;
    $sql = "select * from veiculos order by id";
    $resultado = $banco->query($sql);
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function listarPrecos()
{
    $banco = abrirBanco();
    $grupo = null;
    $sql = "select * from precos";
    $resultado = $banco->query($sql);
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function listarLocacoes()
{
    $banco = abrirBanco();
    $grupo = null;
    $sql = "select * from locacoes";
    $resultado = $banco->query($sql);
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}


function alterarCliente()
{
    $banco = abrirBanco();
    $sql = "UPDATE login SET nome ='{$_POST["nome"]}',login='{$_POST["login"]}',senha=MD5('{$_POST["senha"]}') WHERE id='{$_POST["id"]}'";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
}

function selecionarClienteId()
{
    if(!isset($_SESSION)){
        session_start();
    }

    $id=$_SESSION['id'];
    $sql="select id from login where id ='$id'";
    $link = mysqli_connect("localhost", "root", "", "trabalhofinal");

    $resultado= mysqli_query($link, $sql);

    $dados= mysqli_fetch_array($resultado);

    return $dados;
}

function selecionarVeiculoId($id){
    $banco = abrirBanco();
    $sql = "select * from veiculos where id=" . $id;
    $resultado = $banco->query($sql);
    $cliente = mysqli_fetch_assoc($resultado);
    return $cliente;
}

function selecionarPrecoId($id){
    $banco = abrirBanco();
    $sql = "select * from precos where idVeiculo=" . $id;
    $resultado = $banco->query($sql);
    $cliente = mysqli_fetch_assoc($resultado);
    return $cliente;
}


function inserirCliente(){
    $banco=abrirBanco();
    $sql="INSERT INTO login(nome,login, senha)"
        ." VALUES ('{$_POST["nome"]}','{$_POST["login"]}',MD5('{$_POST["senha"]}'))";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
}

function inserirVeiculo(){
    $banco=abrirBanco();
    $sql="INSERT INTO veiculos(tipo,modelo, identificacao, ano)"
        ." VALUES ('{$_POST["tipo"]}','{$_POST["modelo"]}','{$_POST["identificacao"]}', '{$_POST["ano"]}')";
    $banco->query($sql);
    $banco->close();
    header("Location:cadastrarVeiculo.php");
}

function inserirPreco(){
    $banco=abrirBanco();
    $sql="INSERT INTO precos(idVeiculo,preco, gasto)"
        ." VALUES ('{$_POST["idVeiculo"]}','{$_POST["preco"]}','{$_POST["gasto"]}')";
    $banco->query($sql);
    $banco->close();
    header("Location:precos.php");
}


function editarVeiculo(){
    $banco=abrirBanco();
    $sql="UPDATE veiculos SET tipo ='{$_POST["tipo"]}',modelo='{$_POST["modelo"]}',identificacao='{$_POST["identificacao"]}',ano='{$_POST["ano"]}' WHERE id='{$_POST["id"]}' ";
    $banco->query($sql);
    $banco->close();
    header("location:cadastrarVeiculo.php");
}

function editarPreco(){
    $banco=abrirBanco();
    $sql="UPDATE precos SET id ='{$_POST["id"]}',preco='{$_POST["preco"]}',gasto='{$_POST["gasto"]}' WHERE id='{$_POST["id"]}' ";
    $banco->query($sql);
    $banco->close();
    header("location:precos.php");
}


function excluirCliente()
{
    $banco = abrirBanco();
    $sql = "delete from veiculos where id='{$_POST["id"]}'";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
    header("location:cadastrarVeiculo.php");
}

function excluirPreco()
{
    $banco = abrirBanco();
    $sql = "delete from precos where idVeiculo='{$_POST["idVeiculo"]}'";
    $banco->query($sql);
    $banco->close();
    voltarIndex();
    header("location:precos.php");
}


function voltarIndex()
{
    header("location:index.php");

}

function irParaInicio(){
    header("Location:inicio.php");
}
