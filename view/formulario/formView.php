<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="/public/css/formulario.css">  
    <title>JS Gráfica</title>
</head>
<body class="body" id="jsgrafica">
    <nav class="navbar barra fixed-top navbar-expand-lg justify-content-between">
            <a class="navbar-brand ml-5 navLink" href="#jsgrafica">JS Gráfica</a>
        <div class="navbar-nav">
            <span class="mr-4 navLink2 text-white"> Bem Vindo, <?= $usuario->nome ?></span>
            <a class="mr-4 navLink2 expand" href="<?= BASE . '/form-armazenado'?>">Meus Registros</a>         
            <a class="mr-5 navLink2 expand" href="<?= BASE . '/logout'?>">Sair</a>
        </div>
    </nav>
    <?php if(!$isEdit): ?>
    <header class="alt-max image" id="particles-js">
        <div class="header">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h1 class="titulo"><?= $isEdit ? 'DADOS SALVOS' : 'REGISTRO DE IMÓVEIS SP' ?></h1>
                </div>
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-3 bg-white linha rounded">

                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="subtitulo"><?= $isEdit ? 'Obrigado pelo pedido!' : 'VALOR POR MILHEIRO: R$: 339,00' ?></h3>
                </div>
                <div class="col-12">
                    <a class="botao d-flex justify-content-center align-items-center text-white pr-2" href="#formulario"><i class="fas fa-hand-point-down mx-2"></i><?= $isEdit ? 'Ver dados' : 'Formulário' ?></a>
                </div>
            </div>
        </div>
    </header>
    <?php endif; ?>
    <section class="formulario" id="formulario">
        <div class="container">
            <h1 class="titulo text-center mb-0"><?= $isEdit ? 'SEUS DADOS' : 'FORMULÁRIO' ?></h1>
            <!-- <hr class="flinhat"></hr> -->
            <form action="<?= BASE . '/formEnviado?' .  ($isEdit ? 'registro_id=' . $registro->getId() : "")?>" method="post" class="row mt-5 justify-content-center">
                <div class="form-group floating-label-form-group col-4">
                    <label for="cnpj">CNPJ</label>
                    <input value="<?= $isEdit ? $registro->getCnpj() : ""?>" class="form-control" type="text" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00" required>
                    <hr class="flinha">   
                </div>
                <div class="form-group col-4">
                    <label for="nome">NOME</label>
                    <input value="<?= $isEdit ? $registro->getNome() : ""?>" type="text" name="nome" class="form-control" placeholder="Fulano Ciclano" required>
                    <hr class="flinha">   
                </div>
                <div class="form-group col-4">
                    <label for="telefone">TELEFONE</label>
                    <input value="<?= $isEdit ? $registro->getTelefone() : ""?>" type="tel" name="telefone" id="phone_with_ddd" class="form-control" placeholder="(00) 00000-0000" required>
                    <hr class="flinha">   
                </div>
                <div class="form-group col-4">
                    <label for="cpf">CPF</label>
                    <input value="<?= $isEdit ? $registro->getCpf() : ""?>" type="text" name="cpf" id="cpf" class="form-control" placeholder="000.000.000-00" required>
                    <hr class="flinha">   
                </div>
                <div class="form-group col-4">
                    <label for="cpf-titular">CPF DO TITULAR</label>
                    <input value="<?= $isEdit ? $registro->getCpfTitular() : ""?>" type="text" name="cpf_titular" id="cpf-t"class="form-control" placeholder="000.000.000-00" required>
                    <hr class="flinha">   
                </div>
                <div class="form-group col-4">
                    <label for="fun">FUNÇÃO</label>
                    <input value="<?= $isEdit ? $registro->getFuncao() : ""?>" type="text" name="funcao" class="form-control" placeholder="Trabalho como..." required>
                    <hr class="flinha">   
                </div>
                <div class="form-group col-4">
                    <label for="inputState">CIDADE</label>
                    <select name="cidade" id="inputState" class="form-control" required>
                        <?php foreach($cidades as $cidade): ?>
                                                 <!-- id                                                             id -->
                        <option value="<?= $cidade['cidade'] ?>" <?= ($isEdit && ($registro->getCidade() == $cidade['cidade'])) ? 'selected' : ''?>> <?= $cidade['cidade'] ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <hr class="flinha">
                </div>
                <div class="form-group col-4">
                    <label for="qnt">QUANTIDADE</label>
                    <input value="<?= $isEdit ? $registro->getQuantidade() : ""?>" type="number" name="quantidade" class="form-control" placeholder="Em milhar" min="1000" required>
                    <hr class="flinha">   
                </div>
                <div class="form-group col-4">
                    <label for="email">SEU EMAIL</label>
                    <input value="<?= $isEdit ? $registro->getEmail() : ""?>" type="email" class="form-control" name="EMAIL_USER" id="email" placeholder="nome@email.com" required>
                    <hr class="flinha">   
                </div>
                <?php if(!$isEdit): ?>
                <div class="form-group col-12">
                    <label for="email-text">ESCREVA AQUI SEU EMAIL (OPCIONAL)</label>
                    <textarea class="form-control" name="EMAIL_CONTENT" id="email-text" rows="5"></textarea>
                    <hr class="flinha">   
                </div>
                <?php endif; ?>
                <div class="col-2">
                    <button class="botaoEnviar">
                       <?= $isEdit ? 'SALVAR' : 'ENVIAR' ?>
                    </button>
                </div>        
            </form>
        </div>
    </section>
    <footer class="rodape">
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
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script> -->
<script src="/public/js/particles.js"></script>
<script>
    /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
    particlesJS.load('particles-js', '/public/js/particles.json', function() {
        console.log('callback - particles.js config loaded');
});
</script>

<?php include __DIR__ . '/../fimHtml.php'; ?>