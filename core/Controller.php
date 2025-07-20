<?php
class Controller {
    protected function view($view, $data = []) {
        extract($data);
        
        ob_start();
        require_once "app/views/{$view}.php";
        $content = ob_get_clean();
        
        require_once 'app/views/layout/header.php';
        echo $content;
        require_once 'app/views/layout/footer.php';
    }
    
    protected function redirect($path) {
        header("Location: {$path}");
        exit;
    }
    
    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
?>
