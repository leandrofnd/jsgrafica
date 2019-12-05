<?php

namespace Grafica\Projeto\Controller;

use Nyholm\Psr7\Response;
use Grafica\Projeto\Entity\Uploads;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Grafica\Projeto\Helper\FlashMessageTrait;

class Upload implements RequestHandlerInterface
{

    use FlashMessageTrait;

    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $id_usuario = $request->getQueryParams()['id_usuario'];
        $id_registro = $request->getQueryParams()['id_registro'];
        
        
        if(isset($_FILES['file'])){
            var_dump($_FILES['file']);
            
            $cleanName = str_replace(' ', '_', $_FILES['file']['name']);
            $date = date_create();
            $ts = date_timestamp_get($date);
            $newFileName = $ts.$cleanName;
            echo "</br> New file name: $newFileName";
            
            $tmpName = $_FILES['file']["tmp_name"];
            echo "</br> Tmp Name: $tmpName";
            
            if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                die("Upload failed with error " . $_FILES['file']['error']);
            }
            
            if($_FILES['file']['size'] > 25000000){
                die("Unsupported file size");
            }
            
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['file']['tmp_name']);
            $validated = false;
            
            switch ($mime) {
                case 'image/jpeg':
                    $validated = true;
                break;
                case 'application/pdf':
                    $validated = true;
                break;
                case 'application/msword':
                    $validated = true;
                break;
                default:
                die("<br> Unknown/not permitted file type");
            }

            // $caminho = str_replace('/', DIRECTORY_SEPARATOR , __DIR__ . '../../uploads/' .$newFileName);

            $file = $_FILES['file']['name'];

            // if(!move_uploaded_file($tmpName, $caminho . $newFileName)){
            //     echo "<br> Failed copy";
            // } else{
            //     echo "<br> Successful move";
            // }

            $arquivo = new Uploads($this->entityManager);

            $arquivo->setIdUsuario($id_usuario);
            $arquivo->setIdRegistro($id_registro);
            $arquivo->setFile($file);

            $this->entityManager->persist($arquivo);
            $this->entityManager->flush($arquivo);

            $this->defineMensagem('info', 'Anexo enviado!');
            return new Response(300, ['Location' => BASE . "/adm"]);
        }

        $this->defineMensagem('danger', 'Erro ao enviar o anexo!');
            return new Response(300, ['Location' => BASE . "/adm"]);

        // die();

    }
}