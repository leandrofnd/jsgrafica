<!DOCTYPE html>
<html lang="en">
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
    </nav>
    <header class="alt-max image" id="particles-js">
        <div class="header">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h1 class="titulo">DADOS SALVOS</h1>
                </div>
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-3 bg-white linha rounded">
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="subtitulo">Obrigado pelo pedido!</h3>
                </div>
                <div class="col-12">
                    <a class="botao d-flex justify-content-center align-items-center text-white pr-2" href="#dados"><i class="fas fa-hand-point-down mx-2"></i>Ver Dados</a>
                </div>
            </div>
        </div>
    </header>
    <section class="dados pt-5" id="dados">
        <form action="<?= BASE ?>/formView" method="post" class="container">
                <h1 class="titulo text-center pt-5 "> SEUS DADOS</h1>
            <div class="row justify-content-center mt-4">
                <div class="col-6">
                    <ul class="list-group">
                        <li class="list-group-item d-flex ">
                            CNPJ: <?= $usuario->getCnpj();?>
                        </li>
                        <li class="list-group-item d-flex">
                            Nome: <?= $usuario->getNome();?>
                        </li>
                        <li class="list-group-item d-flex">
                            Telefone: <?= $usuario->getTelefone();?>
                        </li>
                        <li class="list-group-item d-flex">
                            CPF: <?= $usuario->getCpf();?>
                        </li>
                        <li class="list-group-item d-flex">
                           CPF do titular: <?= $usuario->getCpfTitular();?>
                        </li>
                        <li class="list-group-item d-flex">
                            Função: <?= $usuario->getFuncao();?>
                        </li>
                        <li class="list-group-item d-flex">
                            Cidade: <?= $usuario->getCidade();?>
                        </li>
                        <li class="list-group-item d-flex">
                            Quantidade: <?= $usuario->getQuantidade();?>
                        </li>
                        <li class="list-group-item d-flex">
                            Total: R$ <?= $usuario->getQuantidade() * 0.339 ;?>
                        </li>
                        <li class="list-group-item d-flex">
                            Email: <?= $usuario->getEmail();?>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="row justify-content-center mt-5">
                        <div class="col-3 mt-5">
                            <button  class="botaoEnviar">VOLTAR</button>
                        </div>
                        <div class="col-3 mt-5">
                            <button formaction="<?= BASE . '/formView?id=' . $usuario->getId() ?>" class="botaoEnviar">EDITAR</button>
                        </div>
                    </div>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
    
    <script src="/public/js/particles.js"></script>
    <script>
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('particles-js', '/public/js/particles.json', function() {
            console.log('callback - particles.js config loaded');
    });
    </script>
</body>
</html>