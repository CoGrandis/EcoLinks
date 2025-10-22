<?php
require_once __DIR__ . '/../model/PostModel.php';
require_once __DIR__ . '/../model/PostFilesModel.php';
require_once __DIR__ . '/../model/ComentarioModel.php';
require_once __DIR__ . '/../services/UploadService.php';

class PostController {   
    private $postModel;
    private $fileModel;

    public function __construct() {
        $this->postModel = new PostModel();
        $this->fileModel = new PostFilesModel();
    }

    public function muro() {
        $usuarioId = $_SESSION['user']['ID_USUARIO'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'nuevo_post') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            $postId = $this->postModel->create($usuarioId, $title, $content);
            
            if (!empty($_FILES['files']['name'][0])) {
                $uploadService = new UploadService();
                $uploadedFiles = $uploadService->uploadFiles($_FILES['files']);

                foreach ($uploadedFiles as $file) {
                    $this->fileModel->create([
                        'FK_ID_POST' => $postId,
                        'filename'   => $file['filename'],
                        'filepath'   => $file['filepath']
                    ]);
                }
            }

            header('Location: /noticias');
            exit;
        }

         if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'nuevo_comentario') {
            $this->postModel->agregarComentario($_POST['post_id'], $usuarioId, $_POST['comentario']);
            header('Location: /noticias');
            exit;
        }

        $posts = $this->postModel->getAllWithFilesAndComments();
        $tpl = new TemplateMotor("muro");
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl->assing([
            "NEWS_ACTIVE" => (strpos($current_page, 'noticias') !== false) ? 'active' : '',
            "posts" => $posts,
        ]);
        $tpl->printToScreen();
    }


}
