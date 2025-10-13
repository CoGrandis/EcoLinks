<?php
require_once __DIR__ . '/../model/PostModel.php';
require_once __DIR__ . '/../model/PostFilesModel.php';
require_once __DIR__ . '/../services/uploadService.php';

class PostController {   
    private $postModel;
    private $fileModel;

    public function __construct() {
        $this->postModel = new PostModel();
        $this->fileModel = new PostFilesModel();
    }

    public function muro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $userId = $_SESSION['user']['ID_USUARIO'] ?? null;

            $postId = $this->postModel->create($userId, $title, $content);
            
            if (!empty($_FILES['files']['name'][0])) {
                $uploader = new UploadService();
                $uploadedFiles = $uploader->upload($_FILES['files'], "posts/$postId");
                foreach ($uploadedFiles as $file) {
                    $this->fileModel->create([
                        'FK_ID_POST' => $postId,
                        'filename'   => $file['filename'],
                        'filepath'   => $file['filepath']
                    ]);
                }
            }

            header("Location: /admin/news");
            exit;
        }

        $posts = $this->postModel->getAllWithFiles();
        $tpl = new TemplateMotor("muro");
        $current_page = basename($_SERVER['REQUEST_URI']);
        $tpl->assing([
            "NEWS_ACTIVE" => (strpos($current_page, 'news') !== false) ? 'active' : '',
            "posts" => $posts
        ]);
        $tpl->printToScreen();
    }


}
