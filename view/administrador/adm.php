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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        
        <title>JS Gráfica</title>

    </head>

    <body class="body" id="jsgrafica">

        <nav class="navbar barra fixed-top navbar-expand-lg justify-content-between">
            <a class="navbar-brand ml-5 navLink" href="#jsgrafica">JS Gráfica</a>
            <a class="mr-5 navLink2" href="<?= BASE . '/logout'?>">Sair</a>
        </nav>

        <section class="dados pt-5" id="dados">
            <!-- <h1 class="titulo text-center pt-5 text-dark"> Olá Administrador!</h1> -->
            <div class="container">
                <div class="row justify-content-center mt-4 border shadow border-dark mt-5">
                    <div class="col-12 mt-2">
                        <?php if(isset ($_SESSION['mensagem'])) : ?>
                            <div class="alert font-weight-bold alert-<?= $_SESSION['tipo_mensagem']; ?>">
                                <?= $_SESSION['mensagem']; ?>
                            </div>
                        <?php  
                            unset($_SESSION['mensagem']);
                            unset($_SESSION['tipo_mensagem']);
                        endif; ?>
                    </div>
                    <div class="col-auto">
                        <?php foreach($user_data as $user):?>
                            <div class="border shadow-lg border-dark my-2 p-2 rounded mt-4">
                                <h3><?= $user['nome_usuario'] ?></h3>
                                <?php if(empty($user['registros'])):?>
                                    não possui registros!
                                    <br>
                                <?php else: ?>
                                    <?php foreach($user['registros'] as $registro):?>                  
                                        <table class="table table-active mt-3">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">CNPJ</th>
                                                    <th scope="col">NOME</th>
                                                    <th scope="col">TELEFONE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $registro->getCnpj();?></td>
                                                    <td><?= $registro->getNome();?></td>
                                                    <td><?= $registro->getTelefone();?></td>
                                            </tbody>
                                        </table>
                                        <div>
                                            <button onclick="botaoAlert(<?=  $user['id_usuario'] ?>, '<?=  $user['nome_usuario'] ?>', '<?= $registro->getId() ?>')" class="btn btn-dark">Observação</button>                                    
                                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalAnexar">Anexar</button>
                                            <div class="modal fade modal-xl" id="modalAnexar" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">                            
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Anexar Arquivos</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-auto">
                                                                <form action="<?= BASE . '/upload?id_usuario=' . $user['id_usuario'] . '&id_registro=' . $registro->getId()?>" method="post" enctype="multipart/form-data">  
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-auto">
                                                                            <input type="file" name="file"> 
                                                                            <button class="btn btn-dark" type="submit">Enviar</button>
                                                                            <!-- <div class="input-group">
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="file" class="custom-file-input">
                                                                                    <label class="custom-file-label">Escolha o Arquivo</label>
                                                                                </div>
                                                                                <div class="input-group-append">
                                                                                    <button class="btn btn-dark" type="submit">Enviar</button>
                                                                                </div>
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                </form>                     
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalMais"><i class="fas fa-plus"></i></button>
                                            <div class="modal fade modal-xl" id="modalMais" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">                            
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Descrições restantes</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body row justify-content-center">
                                                            <div class="col-auto" >
                                                                <table class="table table-responsive">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">CPF</th>
                                                                            <th scope="col">CPF DO TITULAR</th>
                                                                            <th scope="col">FUNÇÃO</th>
                                                                            <th scope="col">CIDADE</th>
                                                                            <th scope="col">QUANTIDADE</th>
                                                                            <th scope="col">TOTAL</th>
                                                                            <th scope="col">EMAIL</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?=$registro->getCpf();?></td>
                                                                            <td><?= $registro->getCpfTitular();?></td>
                                                                            <td><?= $registro->getFuncao();?></td>
                                                                            <td><?= $registro->getCidade();?></td>
                                                                            <td><?= $registro->getQuantidade();?></td>
                                                                            <td><?= $registro->getQuantidade() * 0.339 ;?></td>
                                                                            <td><?= $registro->getEmail();?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                   
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>

    function botaoAlert(id_usuario, nome_usuario, id_registro){
        Swal.fire({
            type: 'info',
            title: `<strong>Observações para <u>${nome_usuario}</u></strong>`,
            html:
                `<form id="formularioModal" action="<?= BASE . '/enviarObs?id_usuario='?>${id_usuario}&id_registro=${id_registro}" method="post" class="mt-3 justify-content-center">` +
                    '<div class="btn-group">' +
                        '<label>Campo</label>'+
                        '<select id="select-modal" class="ml-3">'+
                            '<option value="cnpj">CNPJ</option>' +    
                            '<option value="nome">Nome</option>' +   
                            '<option value="tel">Telefone</option>' +
                            '<option value="cpf">CPF</option>' +   
                            '<option value="cpf_titular">CPF do titular</option>' +   
                            '<option value="funcao">Função</option>' +   
                            '<option value="cidade">Cidade</option>' +   
                            '<option value="quantidade">Quantidade</option>' +   
                            '<option value="total">Total</option>' +   
                            '<option value="email">Email</option>' +   
                        '</select>' +
                        '<span onClick="add()" class="btn btn-dark"><i class="fas fa-plus"></i></span>' +
                    '</div>' +
                    '<div class="row justify-content-center mt-3">' +
                        ` <button  class="btn btn-dark mt-3" type="submit">Enviar</button> ` +
                    '</div>'+
                '</form>', 
            showCloseButton: false,
            showCancelButton: false,
            showConfirmButton: false,
        })
    }
   
   function add() {
       let fieldSelected = null;
       $('#select-modal').find('option').each((i, option)=>{
           if(option.selected){
                fieldSelected = option
           }
       })
        let field =
        `<div id="${fieldSelected.value}" class="form-group col-12 mt-3">
            <label>${fieldSelected.innerText}<span class="ml-1 text-white p-1 bg-dark rounded" onClick="remove('${fieldSelected.value}')"><i class="fa fa-times"></i></span></label>
            <textarea name="${fieldSelected.value}" class="form-control mt-1" rows="3"></textarea>
        </div>`

        $("#formularioModal").append(field)
   }

   function remove(elemento_id) {
    $(`#${elemento_id}`).remove()
   }

</script>