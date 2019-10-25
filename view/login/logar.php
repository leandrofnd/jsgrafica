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
            <div class="row">
                <div class="col-12 text-center">
                    <h1>LOGIN</h1>
                    <hr class="flinha"></hr>
                </div>
                <div class="col-12">
                    <form action=" <?= BASE . '/realizar-login' ?> " method="post"> 
                        <div class="form-group pt-5">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" required>
                        </div>
                        <div class="row mt-5">
                            <div class="col-6">
                                <button class="botaoEnviar">
                                        ENTRAR
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="botaoEnviar">
                                        CADASTRAR
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