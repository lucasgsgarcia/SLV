<?php

include ("conexao.php");

session_start();

$servername="localhost";
$username="root";
$password="";
$db_name="trabalhoFinal";

$connect= mysqli_connect($servername, $username, $password, $db_name) or die ('Não foi possível conectar.');

if(isset($_POST['btn-registrar'])){
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $login= mysqli_escape_string($connect, $_POST['login']);
    $senha= mysqli_escape_string($connect, $_POST['senha']);
    $senha= md5($senha);
    if(empty($login)or empty($senha) or empty($nome)){
        echo 'Favor preencher os dados';
    }
    else {
        abrirBanco();
        inserirCliente();
        voltarIndex();
    }
}

if(mysqli_connect_error()==true){
    echo "Falha na conexao".mysqli_connect_error();
}