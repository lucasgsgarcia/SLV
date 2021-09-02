<html>
<head>
    <meta charset="UTF-8">
    <title>SLV - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<form action="conexao.php" method="POST">
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Sistema de Locação de Veículos<br> Página de Login</h2>
            <p>Faça seu login ou crie uma conta gratuitamente.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form>
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" name="login" class="form-control" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                    </div>
                    <button type="submit" name="btn-entrar" class="btn btn-black">Login</button>
                    <td><input type="hidden" name="acao" value="logar"/></td>
                    <a href="registrar.php">
                    <button type="button" name="btn-registrar" class="btn btn-secondary" href="registrar.php">Registrar</button>
                    </a>
                </form>
            </div>
        </div>
    </div>


</form>
</body>
</html>

<style>
    body {
        font-family: "Lato", sans-serif;
    }

    .main-head{
        height: 150px;
        background: #FFF;

    }

    .sidenav {
        height: 100%;
        background-image: url("https://cdn.pixabay.com/photo/2014/09/07/22/34/car-race-438467_960_720.jpg");
        background-repeat: no-repeat;
        background-size: auto;
        background-position: center;
        background-color: #00bfbf;
        overflow-x: hidden;
        padding-top: 20px;
    }


    .main {
        padding: 0px 10px;

    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
    }

    @media screen and (max-width: 450px) {
        .login-form{
            margin-top: 90%;
        }

        .register-form{
            margin-top: 10%;
        }
    }

    @media screen and (min-width: 768px){
        .main{
            margin-left: 40%;
        }

        .sidenav{
            width: 40%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
        }

        .login-form{
            margin-top: 40%;
        }

        .register-form{
            margin-top: 20%;
        }
    }

    .login-main-text{
        margin-top: 20%;
        padding: 60px;
        color: black;
    }

    .login-main-text h2{
        font-weight: 300;
    }

    .btn-black{
        background-color: #000 !important;
        color: #fff;
    }
</style>