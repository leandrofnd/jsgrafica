<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://jsgrafica.local/public/css/formulario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    
    <title>JS Gráfica</title>
</head>
<body  class="body" id="jsgrafica">
    <nav class="navbar barra fixed-top navbar-expand-lg justify-content-between">
        <a class="navbar-brand ml-5 navLink" href="#jsgrafica">JS Gráfica</a>
    </nav>
    <div class="container">
        <div class="login">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h1>LOGIN</h1>
                    <hr class="flinha"></hr>
                </div>
                <div class="col-auto">
                    <form class="row formT" action=" <?= BASE . '/realizar-login' ?> " method="post"> 
                        <div class="form-group col-12 mt-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" required>
                        </div>
                        <div class="col-12">
                        <?php if(isset ($_SESSION['mensagem'])) : ?>
                            <div class="alert font-weight-bold alert-<?= $_SESSION['tipo_mensagem']; ?>">
                                <?= $_SESSION['mensagem']; ?>
                            </div>
                        <?php  
                            unset($_SESSION['mensagem']);
                            unset($_SESSION['tipo_mensagem']);
                        endif; ?>
                        </div>
                        <div class="row register justify-content-center mt-3">
                            <div class="col-auto">
                                <a class="font-weight-bold text-center text-muted justify-content-center text-dark" href="<?= BASE . '/cadastro'?>">Não possui login? Registre-se!</a>
                            </div>
                            <div class="col-6 mt-5">
                                <button class="botaoEnviar">
                                    ENTRAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>