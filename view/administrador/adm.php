<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/public/css/formulario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    
    <title>JS Gráfica</title>
</head>
<body class="body" id="jsgrafica">
    <nav class="navbar barra fixed-top navbar-expand-lg justify-content-between">
        <a class="navbar-brand ml-5 navLink" href="#jsgrafica">JS Gráfica</a>
        <a class="mr-5 navLink2" href="<?= BASE . '/logout'?>">Sair</a>
    </nav>
    <section class="dados pt-5" id="dados">
        <form action="<?= BASE . '/formView?' . 'user=' . $usuario ?> "method="post" class="container">
        <h1 class="titulo text-center pt-5 "> Olá Administrador!</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-6">
                    <?php foreach($user_data as $user):?>
                        Usuário: <?= $user['nome_usuario']?>
                        <?php foreach($user['registros'] as $registro):?>                   
                            <ul class="list-group my-3 shadow">
                                <li class="list-group-item d-flex ">
                                    CNPJ: <?= $registro->getCnpj();?>
                                </li>
                                <li class="list-group-item d-flex">
                                    Nome: <?= $registro->getNome();?>
                                </li>
                                <li class="list-group-item d-flex">
                                    Telefone: <?= $registro->getTelefone();?>
                                </li>
                                <li class="list-group-item d-flex">
                                    CPF: <?= $registro->getCpf();?>
                                </li>
                                <li class="list-group-item d-flex">
                                    CPF do titular: <?= $registro->getCpfTitular();?>
                                </li>
                                <li class="list-group-item d-flex">
                                    Função: <?= $registro->getFuncao();?>
                                </li>
                                <li class="list-group-item d-flex">
                                    Cidade: <?= $registro->getCidade();?>
                                </li>
                                <li class="list-group-item d-flex">
                                    Quantidade: <?= $registro->getQuantidade();?>
                                </li>
                                <li class="list-group-item d-flex">
                                    Total: R$ <?= $registro->getQuantidade() * 0.339 ;?>
                                </li>
                                <li class="list-group-item d-flex">
                                    Email: <?= $registro->getEmail();?>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </form>
    </section>
    <footer class="rodape mt-5">
            <div class="container">
                <div class="row text-center pt-5">
                    <div class="col-4">
                                  <!-- text-uppercase -->
                        <p class="rtitulo">LOCALIZAÇÃO</p>
                        <hr class="rlinha">
                        <p class="rcont">Rua Aimorés, 206. Vila Conceição</p>
                        <p class="rcont">Diadema-SP</p>
                        <p class="rcont">CEP 09990-310</p>
                    </div>
                    <div class="col-4">
                        <p class="rtitulo">REDES SOCIAIS</p>
                        <hr class="rlinha">
                        <a class="btn-social" href="https://www.facebook.com/">
                            <i class="fab fa-facebook-f mx-1"></i>
                        </a>
                        <a class="btn-social" href="https://www.instagram.com/leandro.fnd">
                            <i class="fab fa-instagram mx-1"></i>
                        </a>
                        <a class="btn-social" href="https://www.twitter.com/leancholic">
                            <i class="fab fa-twitter mx-1"></i>
                        </a>
                    </div>
                    <div class="col-4">
                            <p class="rtitulo">SOBRE A EMPRESA</p>
                            <hr class="rlinha">
                    </div>
                </div>
            </div>
    </footer>
        <section class="final py-4 text-center text-white">
            <div class="container">
                <small>Copyright &copy; JS Gráfica 2019</small>
            </div>
        </section>
</body>
</html>