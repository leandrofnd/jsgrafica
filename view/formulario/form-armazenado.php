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
        <div class="navbar-nav">
            <a class="mr-4 navLink2 expand" href="<?= BASE . '/formView'?>">Formulário</a>         
            <a class="mr-5 navLink2 expand" href="<?= BASE . '/logout'?>">Sair</a>
        </div>
    </nav>
    <section class="dados pt-5" id="dados">
        <form action="<?= BASE . '/formView'?> "method="post" class="container">
            <h1 class="titulo text-center pt-5 "> SEUS REGISTROS</h1>
            <div class="row justify-content-center mt-4">
                <?php if($isObservacao):?>
                    <div id="alertObs" class="alert alert-info col-7 text-center">
                        <label>
                            Você possui uma observação!
                            <i class="ml-2 far fa-times-circle" onClick="remove('alertObs')" ></i>                    
                        </label>
                    </div>
                <?php endif; ?>
                <?php if($isArquivo):?>
                    <?php foreach($arquivos as $arquivo): ?>
                    <div id="alertObs" class="alert alert-info col-7 text-center">
                        <label>
                            <a class="text-reset" href="<?='/public/uploads/' . $arquivo->getFile() ?>">Você possui um arquivo, clique para vizualizar.</a> 
                            <i class="ml-2 far fa-times-circle" onClick="remove('alertObs')" ></i>                    
                        </label>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="col-12">
                <?php if(!empty($registros)):?>
                <?php foreach($registros as $registro):?>
                    <div class="border border-dark my-2 p-2 rounded mt-4">
                        <table class="table table-responsive table-active mt-3">
                            <thead class="thead-dark ">                               
                                <tr>
                                    <th>CNPJ</th>
                                    <th>NOME</th>
                                    <th>TELEFONE</th>
                                    <th>CPF</th>
                                    <th>CPF DO TITULAR</th>
                                    <th>FUNÇÃO</th>
                                    <th>CIDADE</th>
                                    <th>QUANTIDADE</th>
                                    <th>TOTAL</th>
                                    <th>EMAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $registro->getCnpj();?></td>
                                    <td><?= $registro->getNome();?></td>
                                    <td><?= $registro->getTelefone();?></td>
                                    <td><?=$registro->getCpf();?></td>
                                    <td><?= $registro->getCpfTitular();?></td>
                                    <td><?= $registro->getFuncao();?></td>
                                    <td><?= $registro->getCidade();?></td>
                                    <td><?= $registro->getQuantidade();?></td>
                                    <td><?= $registro->getQuantidade() *  0.339 ;?></td>
                                    <td><?= $registro->getEmail();?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <button formaction="<?= BASE . '/formView?registro_id=' . $registro->getId() ?>" class="botaoEnviar">EDITAR</button>
                            </div>
                            <?php if(!empty($registro->observacoes)):?>
                            <?php foreach($registro->observacoes as $observacao): ?>
                                <div <?= 'id="alert-' . $registro->getId() . $observacao->getId().'"' ?> class="alert alert-info ml-2 col-auto text-center">
                                    <label> 
                                        <u> <?= $observacao->observacao ?> </u>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>                       
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <h3 class="text-center">Você não possui registros!<h3>
                <?php endif; ?>
                </div>
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-3 mt-5">
                            <button class="botaoEnviar">FORMULÁRIO</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

<script>
    function remove(elemento_id) {
        $(`#${elemento_id}`).remove()
    }
</script>
</html>

